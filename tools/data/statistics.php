<?php

include_once '_functions.php';

define('REGION_MAPPINGS', ['Banskobystrický' => 'bb', 'Bratislavský' => 'ba', 'Košický' => 'ke', 'Nitriansky' => 'nr',
    'Prešovský' => 'po', 'Trenčiansky' => 'tn', 'Trnavský' => 'tt', 'Žilinský' => 'za',]);

function updateStatistics()
{
    $result = ['health-check' => true];

    $ncziDataFilePath = ROOT_DIR . '../cache-api/nczi-stats.json';

    if (!is_file($ncziDataFilePath)) {
        return ['checks' => updateResult($result, 'nczi-data-file', false, 'NCZI data file does not exist.')];
    }

    $ncziMorningEmailsDataFilePath = ROOT_DIR . '../cache-api/nczi-morning-emails.json';

    if (!is_file($ncziMorningEmailsDataFilePath)) {
        return ['checks' => updateResult($result, 'nczi-morning-emails-data-file', false, 'NCZI morning emails file does not exist.')];
    }

    $manualDataFilePath = ROOT_DIR . '../cache-api/manual-stats.csv';

    if (!is_file($manualDataFilePath)) {
        return ['checks' => updateResult($result, 'manual-data-file', false, 'MANUAL data file does not exist.')];
    }

    $safeCountriesDataFilePath = ROOT_DIR . '../cache-api/safe-countries.csv';

    if (!is_file($safeCountriesDataFilePath)) {
        return ['checks' => updateResult($result, 'safe-countries-file', false, 'SAFE COUNTRIES data file does not exist.')];
    }

    $allCountriesDataFilePath = ROOT_DIR . '../cache-api/all-countries.csv';

    if (!is_file($allCountriesDataFilePath)) {
        return ['checks' => updateResult($result, 'all-countries-file', false, 'ALL COUNTRIES data file does not exist.')];
    }

    $ncziMorningEmailsData = loadJsonFile($ncziMorningEmailsDataFilePath);
    $manualData = loadCsvFile($manualDataFilePath);

    list($result, $resultData) = ncziResultData($ncziDataFilePath, $manualData, $result, []);
    list($resultData, $result) = ncziMorningEmailData($ncziMorningEmailsData, $resultData, $result);

    if ('ÁNO' === $manualData[7][11]) {
        list($resultData, $result) = manualResultData($manualData, $resultData, $result);
        list($medians, $averages, $resultData, $result) = aggregations($manualData, $resultData, $result);
    }
    else {
        $medians = [];
        $averages = [];
    }

    list($safeCountries, $result) = safeCountries($allCountriesDataFilePath, $safeCountriesDataFilePath, $result);

    // 6. safe countries

//    $manualDataFilePath = ROOT_DIR . '../cache-api/manual-stats.csv';
//
//    if (!is_file($manualDataFilePath)) {
//        return updateResult($result, 'manual-data-file', false, 'MANUAL data file does not exist.');
//    }
//
//    $csv = file_get_contents($manualDataFilePath);
//    $manualData = array_map("str_getcsv", explode("\n", $csv));
//    $ncziData = json_decode(file_get_contents($ncziDataFilePath), true);

    return ['checks' => $result, 'koronastats' => $resultData,
        'koronamedians' => $medians,
        'koronaaverages' => $averages, 'safecountries' => $safeCountries];
}

function ncziMorningEmailData(array $ncziMorningEmailsData, $resultData, $result): array
{
    $emailData = current($ncziMorningEmailsData['page']);

    // 1. regional PCR positives data
    foreach (REGION_MAPPINGS as $regionAbbreviation) {
        foreach (['total' => '', 'delta' => '-delta'] as $inputSuffix => $outputSuffix) {
            $value = $emailData["region_{$regionAbbreviation}_tests_pcr_positive_{$inputSuffix}"];
            $resultData["positives-region-{$regionAbbreviation}{$outputSuffix}"] = formattedNumberValue(null === $value ? 0 : $value);
        }
    }

    // 2. slovak AG positives and all tests
    foreach (['all' => 'tests', 'positive' => 'positives'] as $inputTypeSuffix => $outputTypeSuffix) {
        foreach (['total' => '', 'delta' => '-delta'] as $inputPeriodSuffix => $outputPeriodSuffix) {
            $value = $emailData["slovakia_tests_ag_{$inputTypeSuffix}_{$inputPeriodSuffix}"];
            $resultData["ag-{$outputTypeSuffix}{$outputPeriodSuffix}"] = formattedNumberValue(null === $value ? 0 : $value);
        }
    }

    $emailData['slovakia_vaccination_target'] = 3217305 - $emailData['slovakia_vaccination_all_total'];

    // 3. slovak hospital beds and patients
    // 4. vaccinations
    foreach ([
        'hospital_patients_confirmed_covid' => 'hospitalized-covid19',
        'hospital_patients_ventilated_covid' => 'hospitalized-covid19-ventilation',
        'hospital_beds_occupied_jis_covid' => 'hospitalized-covid19-intensive',
        'slovakia_vaccination_all_total' => 'slovakia_vaccination_all_total',
        'slovakia_vaccination_all_delta' => 'slovakia_vaccination_all_delta',
        'slovakia_vaccination_target' => 'slovakia_vaccination_target',
             ] as $inputName => $outputName) {
        $resultData[$outputName] = formattedNumberValue(null === $emailData[$inputName] ? 0 : $emailData[$inputName]);
    }

    $value = round($resultData['slovakia_vaccination_all_total']['value'] / $emailData['slovakia_vaccination_target'] * 100, 2);

    $resultData['slovakia_vaccination_total_percentage'] = [
        'value' => $value,
        'formatted_value' => number_format($value, 2, ',', '&nbsp;') . '&nbsp;%',
    ];

    // 5. median
    $medianSeries = [];
    foreach ($ncziMorningEmailsData['page'] as $emailData) {
        if (count($medianSeries) < 7) {
            $medianSeries[] = $emailData['slovakia_tests_pcr_positive_delta_without_quarantine'];
        }
    }

    sort($medianSeries);

    $resultData['median'] = formattedNumberValue($medianSeries[3]);

    return array($resultData, $result);
}

/**
 * @param string $allCountriesDataFilePath
 * @param string $safeCountriesDataFilePath
 * @param array $result
 * @return array[]
 */
function safeCountries(string $allCountriesDataFilePath, string $safeCountriesDataFilePath, array $result)
{
    $allCountriesData = loadCsvFile($allCountriesDataFilePath);
    $safeCountriesData = loadCsvFile($safeCountriesDataFilePath);
    $allCountries = [];
    $safeCountries = [];

    foreach ($allCountriesData as $countryData) {
        if (strlen($countryData[0]) != 2) {
            continue;
        }

        $allCountries[$countryData[0]] = ['name_sk' => $countryData[2], 'name_en' => $countryData[4],];
    }

    foreach ($safeCountriesData as $safeCountryData) {
        if (strlen($safeCountryData[0]) != 2) {
            continue;
        }

        $countryCode = $safeCountryData[0];

        if (!isset($allCountries[$countryCode])) {
            updateResult($result, 'safe-countries-' . $countryCode, false, 'Safe country code "' . $countryCode . '" is not defined in all countries list.');
        }

        $country = $allCountries[$countryCode];

        if (!empty($safeCountryData[5])) {
            $safeFrom = datetimeFromString($safeCountryData[5]);

            if (null === $safeFrom) {
                updateResult($result, 'safe-from-time-' . $countryCode, false, 'Invalid safe from date "' . $safeCountryData[5] . '" for country code "' . $countryCode . '".');
            }

            $country['safe_from'] = $safeFrom;
        }

        if (!empty($safeCountryData[6])) {
            $safeUntil = datetimeFromString($safeCountryData[6]);

            if (null === $safeUntil) {
                updateResult($result, 'safe-until-time-' . $countryCode, false, 'Invalid until from date "' . $safeCountryData[6] . '" for country code "' . $countryCode . '".');
            }

            $country['safe_until'] = $safeUntil;
        }

        $country['safe_from'] = isset($country['safe_from']) ? $country['safe_from']->format('Y-m-d H:i:s') : '';
        $country['safe_until'] = isset($country['safe_until']) ? $country['safe_until']->format('Y-m-d H:i:s') : '';;

        $safeCountries[$countryCode] = $country;
    }

    $languages = ['sk', 'en'];

    foreach ($languages as $language) {
        uasort($safeCountries, function ($a, $b) use ($language) {
            $aName = toAscii($a['name_' . $language]);
            $bName = toAscii($b['name_' . $language]);

            return ($aName === $bName ? 0 : ($aName > $bName ? 1 : -1));
        });

        $i = 1;

        foreach ($safeCountries as $countryCode => $foo) {
            $safeCountries[$countryCode]['sort_' . $language] = $i++;
        }
    }

    return [$safeCountries, $result];
}


/**
 * @param $string
 * @return DateTimeImmutable|null
 */
function datetimeFromString($string)
{
    $result = DateTimeImmutable::createFromFormat('j.n.YG:i:s', str_replace(' ', '', $string), new DateTimeZone('Europe/Bratislava'));

    return $result instanceof DateTimeImmutable ? $result : null;
}

/**
 * @param array $manualData
 * @param $resultData
 * @param $result
 * @return array
 */
function manualResultData(array $manualData, $resultData, $result): array
{
    updateResult($result, 'nczi-email-data', true, 'Notice: Manual override from Spreadsheet data is in effect.');
    // 3.) MANUAL REGIONAL DATA
    list($resultData, $result) = regionalStats($manualData, $resultData, $result);

    // 4. MANUAL COVID-19 HOSPITALIZED DATA
    $resultData = hospitalizationStats($manualData, $resultData);

    // 4. MANUAL AG TESTING DATA
    $resultData = agTestingStats($manualData, $resultData);

    return array($resultData, $result);
}

/**
 * @param string $ncziDataFilePath
 * @param array $result
 * @param array $resultData
 * @return array
 */
function ncziResultData(string $ncziDataFilePath, array $manualData, array $result, array $resultData): array
{
    list($result, $ncziStats, $lastUpdate) = ncziStats(loadJsonFile($ncziDataFilePath), fallbackData($manualData), $result);

    // 1.) NCZI CORE DATA
    foreach ($ncziStats as $numberType => $values) {
        $resultData[$numberType] = formattedNumberValue($values['value']);

        if (isset($values['error'])) {
            $resultData[$numberType]['error'] = $values['error'];
        }
    }

    // 2.) NCZI LAST UPDATE
    $resultData['last-update'] = ['value' => $lastUpdate, 'formatted_value' => date('j. n. Y', $lastUpdate),];
    return array($result, $resultData);
}

function loadJsonFile($filePath)
{
    return json_decode(file_get_contents($filePath), true);
}

function loadCsvFile($filePath)
{
    $csv = file_get_contents($filePath);
    return array_map("str_getcsv", explode("\n", $csv));
}

function fallbackData(array $manualData)
{
    return ['last-update' => (new DateTimeImmutable('today', new DateTimeZone('Europe/Bratislava')))->getTimestamp(),];
}

/**
 * @param $ncziData
 * @param array $result
 * @return array
 */
function ncziStats($ncziData, array $fallbackData, array $result): array
{
    $numberTypes = ['k5' => 'positives', 'k7' => 'cured', 'k8' => 'deceased', 'k9' => 'hospitalized',
        'k23' => 'lab-tests',];

    $everIncreasingSeries = ['k5', 'k7', 'k8', 'k23'];

    $ncziStats = [];
    $lastUpdate = 0;

    foreach ($numberTypes as $tileId => $numberType) {
        if (isArrayInTreeEmpty($ncziData, ['tiles', $tileId, 'data', 'd'])) {
            updateResult($result, $numberType, false, 'Data for ' . $numberType . ' is not available in NCZI API or Spreadsheet data.');
        } else {
            $currentNumberData = array_pop($ncziData['tiles'][$tileId]['data']['d']);
            $previousNumberData = array_pop($ncziData['tiles'][$tileId]['data']['d']);

            $currentStats = statsNumberData($result, $numberType, $currentNumberData);

            if ($currentStats !== null) {
                $ncziStats[$numberType] = $currentStats;

                $previousStats = statsNumberData($result, $numberType, $previousNumberData);

                if ($previousStats !== null) {
                    $ncziStats[$numberType . '-delta'] = $currentStats;
                    $ncziStats[$numberType . '-delta']['value'] -= $previousStats['value'];

                    if (in_array($tileId, $everIncreasingSeries) && $ncziStats[$numberType . '-delta']['value'] < 0) {
                        $ncziStats[$numberType . '-delta']['error'] = '-';
                        $ncziStats[$numberType]['error'] = '-';
                    }
                }
            }
        }

        if (isArrayInTreeEmpty($ncziData, ['tiles', $tileId, 'updated'])) {
            $lastUpdate = max($lastUpdate, DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $ncziData['tiles'][$tileId]['updated'] . ' 9:15:00')->getTimestamp());
        }
    }

    if (empty($lastUpdate)) {
        if (empty($fallbackData['last-update'])) {
            updateResult($result, 'last-update', false, 'Last update date from NCZI and Spreadsheet is not available.');
        } else {
            $lastUpdate = $fallbackData['last-update'];
            updateResult($result, 'last-update', true, 'Last update date from NCZI is not available. Using current date.');
        }
    } else {
        if ($lastUpdate < (new DateTimeImmutable('today 9:15'))->getTimestamp()) {
            updateResult($result, 'last-update', false, 'Last update date from NCZI is older than today at 9:15.');
        }
    }
    return array($result, $ncziStats, $lastUpdate);
}

/**
 * @param $manualData
 * @param array $resultData
 * @return array
 */
function agTestingStats($manualData, array $resultData): array
{
    $FIRST_COL = 7;

    $resultData['ag-tests'] = formattedNumberValue((int)$manualData[11][$FIRST_COL]);
    $resultData['ag-tests-delta'] = formattedNumberValue((int)$manualData[11][$FIRST_COL + 1]);

    $resultData['ag-positives'] = formattedNumberValue((int)$manualData[12][$FIRST_COL]);
    $resultData['ag-positives-delta'] = formattedNumberValue((int)$manualData[12][$FIRST_COL + 1]);

    return $resultData;
}

/**
 * @param $manualData
 * @param array $resultData
 * @return array
 */
function hospitalizationStats($manualData, array $resultData): array
{
    $FIRST_COL = 12;

    $resultData['hospitalized-covid19'] = formattedNumberValue((int)$manualData[1][$FIRST_COL]);
    $resultData['hospitalized-covid19-intensive'] = formattedNumberValue((int)$manualData[1][$FIRST_COL + 1]);
    $resultData['hospitalized-covid19-ventilation'] = formattedNumberValue((int)$manualData[1][$FIRST_COL + 2]);
    return $resultData;
}

/**
 * @param $manualData
 * @param array $resultData
 * @param array $result
 * @return array[]
 */
function regionalStats($manualData, array $resultData, array $result): array
{
    $FIRST_COL = 6;

    for ($f = 0; $f < 8; $f++) {
        if (isset(REGION_MAPPINGS[$manualData[1 + $f][$FIRST_COL]])) {
            $regionKey = 'positives-region-' . REGION_MAPPINGS[$manualData[1 + $f][$FIRST_COL]];

            if (!isset($resultData[$regionKey])) {
                $resultData[$regionKey] = formattedNumberValue((int)$manualData[1 + $f][$FIRST_COL + 1]);
                $resultData[$regionKey . '-delta'] = formattedNumberValue((int)$manualData[1 + $f][$FIRST_COL + 2]);
            }
        } else {
            updateResult($result, 'manual-region-data', false, 'Unknown region "' . ($manualData[1 + $f][$FIRST_COL]) . '"');
        }
    }
    return array($resultData, $result);
}

/**
 * @param array $manualData
 * @param array $resultData
 * @param array $result
 * @return array
 */
function aggregations(array $manualData, array $resultData, array $result): array
{
    $yesterday = new DateTime('yesterday 9:15:00');
    $day = 1;
    $medianSourceData = [];
    $shouldBeTime = new DateTime('2020-04-16 9:15:00');
    $lastTime = null;
    $range = [];
    $medians = [];
    $averages = [];
    $sum = 0;

    while (isset($manualData[$day][1]) && $manualData[$day][1] != '') {
        $date = DateTimeImmutable::createFromFormat('j.n.Y H:i:s', $manualData[$day][0] . ' 9:15:00');

        if ($date->getTimestamp() === $shouldBeTime->getTimestamp()) {
            $lastTime = $date;
            $value = (int)$manualData[$day][1];
            $medianSourceData[$date->getTimestamp()] = $value;
            $shouldBeTime->add(new DateInterval('P1D'));

            $range[] = $value;
            $sum += $value;

            if (count($range) === 8) {
                $sum -= array_shift($range);
            }

            if (count($range) === 7) {
                $medianRangeSorted = $range;
                sort($medianRangeSorted);

                $medianData = formattedNumberValue($medianRangeSorted[3]);
                $medianData['timestamp'] = $date->getTimestamp();
                $medianData['formatted_date'] = date('j. n. Y', $medianData['timestamp']);

                $medians[] = $medianData;

                $averageData = formattedNumberValue((int)round($sum / 7));
                $averageData['timestamp'] = $date->getTimestamp();
                $averageData['formatted_date'] = date('j. n. Y', $averageData['timestamp']);

                $averages[] = $averageData;
            }
        }

        $day++;
    }

    if ($lastTime->getTimestamp() === $yesterday->getTimestamp()) {
        $averagesCount = count($averages);

        $lastAverage = $averages[$averagesCount - 1];
        $oneBeforeLastAverage = $averages[$averagesCount - 2];

        $resultData['average'] = formattedNumberValue($lastAverage['value']);
        $resultData['average-delta'] = formattedNumberValue($lastAverage['value'] - $oneBeforeLastAverage['value']);

        $mediansCount = count($medians);

        $lastMedian = $medians[$mediansCount - 1];
        $oneBeforeLastMedian = $medians[$mediansCount - 2];

        $resultData['median'] = formattedNumberValue($lastMedian['value']);
        $resultData['median-delta'] = formattedNumberValue($lastMedian['value'] - $oneBeforeLastMedian['value']);
    } else {
        updateResult($result, 'aggregates-last-update', false, 'Data is missing for calculation of 7-day moving median and 7-day moving average.');
    }

    $averages = array_reverse($averages);
    $medians = array_reverse($medians);

    return [$medians, $averages, $resultData, $result];
}

function formattedNumberValue($value)
{
    return ['value' => $value, 'formatted_value' => number_format($value, 0, ',', '&nbsp;'),];
}

function statsNumberData(&$result, $numberType, $rawNumberData)
{
    if (empty($rawNumberData['v']) || !is_numeric($rawNumberData['v'])) {
        updateResult($result, $numberType, false, 'Value is not available.');
    } elseif (empty($rawNumberData['d'])) {
        updateResult($result, $numberType, false, 'Last update date is not available.');
    } else {

        $lastUpdated = DateTimeImmutable::createFromFormat('ymd', $rawNumberData['d']);

        if (false === $lastUpdated) {
            updateResult($result, $numberType, false, 'Last update date is not available.');
        } else {
            if ($lastUpdated->diff(new DateTimeImmutable('now'))->days > 3) {
                updateResult($result, $numberType, false, 'Last update date is more than two days before or after today.');
            }

            return ['value' => $rawNumberData['v'], 'last-update' => $lastUpdated,];
        }
    }

    return null;
}