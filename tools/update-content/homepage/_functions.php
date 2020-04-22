<?php

include_once HOMEPAGE_ROOT_DIR . '../_functions.php';

function updateHpStats($contentFile) {
    return updateStats($contentFile, [
        'k5' => 'positive',
        'k7' => 'cured',
        'k8' => 'deceased',
        'k23' => 'lab-tests',
    ]);
}

function updateDetailsStats($contentFile) {
    return updateStats($contentFile, [
        'k5' => 'positive',
        'k7' => 'cured',
        'k8' => 'deceased',
        'k9' => 'hospitalized',
        'k23' => 'lab-tests',
    ]);
}

function updateStats($contentFile, $numberTypes)
{
    $result = ['health-check' => true];

    $contentFilePath = STATIC_BASE_PATH . $contentFile;
    $dataFilePath = HOMEPAGE_ROOT_DIR . '../../cache-api/hp-stats.json';

    if (!is_file($contentFilePath)) {
        return updateResult($result, 'content-file', false, 'Content file does not exist.');
    }

    if (!is_file($dataFilePath)) {
        return updateResult($result, 'data-file', false, 'Data file does not exist.');
    }

    $data = json_decode(file_get_contents($dataFilePath), true);

    $stats = [];
    $lastUpdate = 0;

    foreach ($numberTypes as $tileId => $numberType) {
        if (isArrayInTreeEmpty($data, ['tiles', $tileId, 'data', 'd'])) {
            updateResult($result, $numberType, false, 'Data is not available.');
        } else {
            $currentNumberData = array_pop($data['tiles'][$tileId]['data']['d']);
            $previousNumberData = array_pop($data['tiles'][$tileId]['data']['d']);

            $currentStats = statsNumberData($result, $numberType, $currentNumberData);

            if ($currentStats !== null) {
                $stats[$numberType] = $currentStats;

                $lastUpdate = max($lastUpdate, $currentStats['last-update']->getTimestamp());

                $previousStats = statsNumberData($result, $numberType, $previousNumberData);

                if ($previousStats !== null) {
                    $stats[$numberType . '-delta'] = $currentStats;
                    $stats[$numberType . '-delta']['value'] -= $previousStats['value'];
                }
            }
        }
    }

    $content = file_get_contents($contentFilePath);
    $updatedContent = $content;

    foreach ($stats as $numberType => $values) {
        $value = number_format($values['value'], 0, ',', '&nbsp;');
        $updatedContent = updatePlaceholder($updatedContent, 'stats-' . $numberType . '-value', $value, $result);
    }

    $translations = [
        'Jan' => 'januára', 'Feb' => 'februára', 'Mar' => 'marca', 'Apr' => 'apríla', 'May' => 'mája', 'Jun' => 'júna',
        'Jul' => 'júla', 'Aug' => 'augusta', 'Sep' => 'septembra', 'Oct' => 'októbra', 'Nov' => 'novembra', 'Dec' => 'decembra',
    ];

    $dayInSeconds = 24 * 3600;

    $lastUpdatedValue = str_replace(
        array_keys($translations),
        $translations,
        date('j. M Y', floor($lastUpdate / $dayInSeconds) * $dayInSeconds + 7200));

    $updatedContent = updatePlaceholder($updatedContent, 'stats-last-update', $lastUpdatedValue, $result);

    if ($content !== $updatedContent) {
        file_put_contents($contentFilePath, $updatedContent);
    }

    return $result;
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