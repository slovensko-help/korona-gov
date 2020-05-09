<?php

include_once '_functions.php';

function updateStatistics()
{
    $numberTypes = [
        'k5' => 'positives',
        'k7' => 'cured',
        'k8' => 'deceased',
        'k9' => 'hospitalized',
        'k23' => 'lab-tests',
    ];

    $result = ['health-check' => true];

    $ncziDataFilePath = ROOT_DIR . '../cache-api/nczi-stats.json';

    if (!is_file($ncziDataFilePath)) {
        return updateResult($result, 'nczi-data-file', false, 'NCZI data file does not exist.');
    }

    $manualDataFilePath = ROOT_DIR . '../cache-api/manual-stats.csv';

    if (!is_file($manualDataFilePath)) {
        return updateResult($result, 'manual-data-file', false, 'MANUAL data file does not exist.');
    }

    $csv = file_get_contents($manualDataFilePath);
    $manualData = array_map("str_getcsv", explode("\n", $csv));
    $ncziData = json_decode(file_get_contents($ncziDataFilePath), true);

    $stats = [];
    $lastUpdate = 0;

    foreach ($numberTypes as $tileId => $numberType) {
        if (isArrayInTreeEmpty($ncziData, ['tiles', $tileId, 'data', 'd'])) {
            updateResult($result, $numberType, false, 'Data is not available.');
        } else {
            $currentNumberData = array_pop($ncziData['tiles'][$tileId]['data']['d']);
            $previousNumberData = array_pop($ncziData['tiles'][$tileId]['data']['d']);

            $currentStats = statsNumberData($result, $numberType, $currentNumberData);

            if ($currentStats !== null) {
                $stats[$numberType] = $currentStats;

                $previousStats = statsNumberData($result, $numberType, $previousNumberData);

                if ($previousStats !== null) {
                    $stats[$numberType . '-delta'] = $currentStats;
                    $stats[$numberType . '-delta']['value'] -= $previousStats['value'];
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

    $resultData = [];

    // 1.) NCZI CORE DATA

    foreach ($stats as $numberType => $values) {
        $resultData[$numberType] = formattedNumberValue($values['value']);
    }

    // 2.) NCZI LAST UPDATE

    $resultData['last-update'] = [
        'value' => $lastUpdate,
        'formatted_value' => date('j. n. Y', $lastUpdate),
    ];

    // 3.) MANUAL REGIONAL DATA
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

    // 4. MANUAL COVID-19 HOSPITALIZED DATA

    $resultData['hospitalized-covid19'] = formattedNumberValue((int)$manualData[1][11]);
    $resultData['hospitalized-covid19-intensive'] = formattedNumberValue((int)$manualData[1][12]);
    $resultData['hospitalized-covid19-ventilation'] = formattedNumberValue((int)$manualData[1][13]);

    // 5. MANUAL 7-DAY MOVING MEDIAN DATA

    $day = 1;
    $medianSourceData = [];
    $shouldBeTime = new DateTime('2020-04-16 9:15:00');
    $lastTime = null;
    $yesterday = new DateTime('yesterday 9:15:00');
    $medianRange = [];
    $medians = [];

    while(isset($manualData[$day][1]) && $manualData[$day][1] != '') {
        $date = DateTimeImmutable::createFromFormat('j.n.Y H:i:s', $manualData[$day][0] . '2020 9:15:00');

        if ($date->getTimestamp() === $shouldBeTime->getTimestamp()) {
            $lastTime = $date;
            $value = (int) $manualData[$day][1];
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
    }
    else {
        updateResult($result, 'median-last-update', false, 'Data is missing for calculation of 7-day moving median.');
    }

    $medians = array_reverse($medians);

    return ['checks' => $result, 'koronastats' => $resultData, 'koronamedians' => $medians];
}

function formattedNumberValue($value) {
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