<?php

include_once HOMEPAGE_ROOT_DIR . '../_functions.php';

function updateHpStats($contentFile)
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

    $numberTypes = [
        'k5' => 'positive',
        'k6' => 'negative',
        'k7' => 'cured',
        'k8' => 'deceased',
    ];

    $translations = [
        'Jan' => 'január', 'Feb' => 'február', 'Mar' => 'marec', 'Apr' => 'apríl', 'May' => 'máj', 'Jun' => 'jún',
        'Jul' => 'júl', 'Aug' => 'august', 'Sep' => 'september', 'Oct' => 'október', 'Nov' => 'november', 'Dec' => 'december',
    ];

    $stats = [];

    foreach ($numberTypes as $tileId => $numberType) {
        if (isArrayInTreeEmpty($data, ['tiles', $tileId, 'data', 'd'])) {
            updateResult($result, $numberType, false, 'Data is not available.');
        } else {
            $numberData = array_pop($data['tiles'][$tileId]['data']['d']);

            if (empty($numberData['v']) || !is_numeric($numberData['v'])) {
                updateResult($result, $numberType, false, 'Value is not available.');
            } elseif (empty($numberData['d'])) {
                updateResult($result, $numberType, false, 'Last update date is not available.');
            } else {

                $lastUpdated = DateTimeImmutable::createFromFormat('ymd', $numberData['d']);

                if (false === $lastUpdated) {
                    updateResult($result, $numberType, false, 'Last update date is not available.');
                } else {
                    if ($lastUpdated->diff(new DateTimeImmutable('now'))->days > 2) {
                        updateResult($result, $numberType, false, 'Last update date is more than two days before or after today.');
                    }

                    $stats[$numberType] = [
                        'value' => $numberData['v'],
                        'last-update' => str_replace(
                            array_keys($translations),
                            $translations,
                            $lastUpdated->format('j. M Y')),
                    ];
                }
            }
        }
    }

    $content = file_get_contents($contentFilePath);
    $updatedContent = $content;

    foreach ($stats as $numberType => $values) {
        $updatedContent = updatePlaceholder($updatedContent, 'stats-' . $numberType . '-value', $values['value'], $result);
        $updatedContent = updatePlaceholder($updatedContent, 'stats-' . $numberType . '-last-update', $values['last-update'], $result);
    }

    if ($content !== $updatedContent) {
        file_put_contents($contentFilePath, $updatedContent);
    }

    return $result;
}