<?php

include_once '_functions.php';

function updateStatistics()
{
    $result = ['health-check' => true];

    $ncziDataFilePath = ROOT_DIR . '../cache-api/nczi-stats.json';

    if (!is_file($ncziDataFilePath)) {
        return ['checks' => updateResult($result, 'nczi-data-file', false, 'NCZI data file does not exist.')];
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

    list($result, $resultData) = ncziResultData($ncziDataFilePath, $result, []);

    $manualData = loadCsvFile($manualDataFilePath);

    list($resultData, $result) = manualResultData($manualData, $resultData, $result);
    list($medians, $resultData, $result) = medians($manualData, $resultData, $result);

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

    return ['checks' => $result, 'koronastats' => $resultData, 'koronamedians' => $medians, 'safecountries' => $safeCountries];
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

        $allCountries[$countryData[0]] = [
            'name_sk' => $countryData[2],
            'name_en' => $countryData[4],
        ];
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
// 3.) MANUAL REGIONAL DATA
    list($resultData, $result) = regionalStats($manualData, $resultData, $result);

    // 4. MANUAL COVID-19 HOSPITALIZED DATA

    $resultData = hospitalizationStats($manualData, $resultData);
    return array($resultData, $result);
}

/**
 * @param string $ncziDataFilePath
 * @param array $result
 * @param array $resultData
 * @return array
 */
function ncziResultData(string $ncziDataFilePath, array $result, array $resultData): array
{
    list($result, $ncziStats, $lastUpdate) = ncziStats(
        loadJsonFile($ncziDataFilePath),
        $result);

    // 1.) NCZI CORE DATA
    foreach ($ncziStats as $numberType => $values) {
        $resultData[$numberType] = formattedNumberValue($values['value']);
    }

    // 2.) NCZI LAST UPDATE
    $resultData['last-update'] = [
        'value' => $lastUpdate,
        'formatted_value' => date('j. n. Y', $lastUpdate),
    ];
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

/**
 * @param $ncziData
 * @param array $result
 * @return array
 */
function ncziStats($ncziData, array $result): array
{
    $numberTypes = [
        'k5' => 'positives',
        'k7' => 'cured',
        'k8' => 'deceased',
        'k9' => 'hospitalized',
        'k23' => 'lab-tests',
    ];

    $ncziStats = [];
    $lastUpdate = 0;

    foreach ($numberTypes as $tileId => $numberType) {
        if (isArrayInTreeEmpty($ncziData, ['tiles', $tileId, 'data', 'd'])) {
            updateResult($result, $numberType, false, 'Data is not available.');
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
                }
            }
        }

        if (isArrayInTreeEmpty($ncziData, ['tiles', $tileId, 'updated'])) {
            $lastUpdate = max($lastUpdate, DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $ncziData['tiles'][$tileId]['updated'] . ' 9:15:00')->getTimestamp());
        }
    }

    if (empty($lastUpdate)) {
        updateResult($result, 'last-update', false, 'Last update date from NCZI is not available.');
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
function hospitalizationStats($manualData, array $resultData): array
{
    $resultData['hospitalized-covid19'] = formattedNumberValue((int)$manualData[1][11]);
    $resultData['hospitalized-covid19-intensive'] = formattedNumberValue((int)$manualData[1][12]);
    $resultData['hospitalized-covid19-ventilation'] = formattedNumberValue((int)$manualData[1][13]);
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
    $regionMappings = [
        'Banskobystrický' => 'bb',
        'Bratislavský' => 'ba',
        'Košický' => 'ke',
        'Nitriansky' => 'nr',
        'Prešovský' => 'po',
        'Trenčiansky' => 'tn',
        'Trnavský' => 'tt',
        'Žilinský' => 'za',
    ];

    for ($f = 0; $f < 8; $f++) {
        if (isset($regionMappings[$manualData[1 + $f][5]])) {
            $regionKey = 'positives-region-' . $regionMappings[$manualData[1 + $f][5]];

            $resultData[$regionKey] = formattedNumberValue((int)$manualData[1 + $f][6]);
            $resultData[$regionKey . '-delta'] = formattedNumberValue((int)$manualData[1 + $f][7]);
        } else {
            updateResult($result, 'manual-region-data', false, 'Unknown region "' . ($manualData[1 + $f][5]) . '"');
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
function medians(array $manualData, array $resultData, array $result): array
{
    $yesterday = new DateTime('yesterday 9:15:00');
    $day = 1;
    $medianSourceData = [];
    $shouldBeTime = new DateTime('2020-04-16 9:15:00');
    $lastTime = null;
    $medianRange = [];
    $medians = [];

    while (isset($manualData[$day][1]) && $manualData[$day][1] != '') {
        $date = DateTimeImmutable::createFromFormat('j.n.Y H:i:s', $manualData[$day][0] . '2020 9:15:00');

        if ($date->getTimestamp() === $shouldBeTime->getTimestamp()) {
            $lastTime = $date;
            $value = (int)$manualData[$day][1];
            $medianSourceData[$date->getTimestamp()] = $value;
            $shouldBeTime->add(new DateInterval('P1D'));

            $medianRange[] = $value;

            if (count($medianRange) === 8) {
                array_shift($medianRange);
            }

            if (count($medianRange) === 7) {
                $medianRangeSorted = $medianRange;
                sort($medianRangeSorted);

                $medianData = formattedNumberValue($medianRangeSorted[3]);
                $medianData['timestamp'] = $date->getTimestamp();
                $medianData['formatted_date'] = date('j. n. Y', $medianData['timestamp']);

                $medians[] = $medianData;
            }
        }

        $day++;
    }

    if ($lastTime->getTimestamp() === $yesterday->getTimestamp()) {
        $mediansCount = count($medians);

        $lastMedian = $medians[$mediansCount - 1];
        $oneBeforeLastMedian = $medians[$mediansCount - 2];

        $resultData['median'] = formattedNumberValue($lastMedian['value']);
        $resultData['median-delta'] = formattedNumberValue($lastMedian['value'] - $oneBeforeLastMedian['value']);
    } else {
        updateResult($result, 'median-last-update', false, 'Data is missing for calculation of 7-day moving median.');
    }

    $medians = array_reverse($medians);

    return [$medians, $resultData, $result];
}

function formattedNumberValue($value)
{
    return [
        'value' => $value,
        'formatted_value' => number_format($value, 0, ',', '&nbsp;'),
    ];
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

            return [
                'value' => $rawNumberData['v'],
                'last-update' => $lastUpdated,
            ];
        }
    }

    return null;
}