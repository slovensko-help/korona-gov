<?php

include_once DRIVEINS_ROOT_DIR . '../_functions.php';

function updateDriveins($contentFile, $dataFile)
{
    $result = ['health-check' => true];

    $contentFilePath = STATIC_BASE_PATH . $contentFile;
    $dataFilePath = DRIVEINS_ROOT_DIR . '../../cache-api/' . $dataFile;

    if (!is_file($contentFilePath)) {
        return updateResult($result, 'content-file', false, 'Content file does not exist.');
    }

    if (!is_file($dataFilePath)) {
        return updateResult($result, 'data-file', false, 'Data file does not exist.');
    }

    $data = json_decode(file_get_contents($dataFilePath), true);

    if (empty($data['map']) || !is_array($data['map'])) {
        return updateResult($result, 'data-file', false, 'No payload.');
    }

    $municipalityParents = municipalityParents($result);

    $content = file_get_contents($contentFilePath);
    $regions = [];
    $regionIndex = 0;

    foreach ($data['map'] as $place) {
        $cityNameKey = toAscii(fixedCity($place['city']));

        if (isset($municipalityParents[$cityNameKey])) {
            $regionName = $municipalityParents[$cityNameKey]['region'];
        } else {
            updateResult($result, 'data-file', false, 'Unknow region for municipality ' . $cityNameKey);
            $regionName = 'Nezaradené';
        }

        if (!isset($regions[$regionName])) {
            $regions[$regionName] = [
                'title' => $regionName,
                'places' => [],
                'capacity' => 0,
            ];
        }

        $placeDetails = placeDetails($result, $place);

        if ($placeDetails['capacity'] > 0) {
            $regions[$regionName]['capacity'] += $placeDetails['capacity'];
            $regions[$regionName]['places'][] = $placeDetails;
        }
    }

    foreach ($regions as $key => $region) {
        $places = $region['places'];
        usort($places, function ($place1, $place2) {
            return $place2['capacity'] - $place1['capacity'];
        });

        $regions[$key]['places'] = $places;
    }

    usort($regions, function ($region1, $region2) {
        return $region2['capacity'] - $region1['capacity'];
    });

    $placesContent = '
            <div class="govuk-accordion" data-module="govuk-accordion" id="driveins-regions" data-attribute="value">';

    foreach ($regions as $regionId => $region) {
        $regionIndex++;

        $placesContent .= '
            <div class="govuk-accordion__section ">
                <div class="govuk-accordion__section-header">
                  <h2 class="govuk-accordion__section-heading">
                    <span class="govuk-accordion__section-button" id="driveins-region-' . $regionIndex . '-heading">
                     ' . $region['title'] . '
                    </span>
                  </h2>
                </div>
                <div id="driveins-regions-' . $regionIndex . '-content" class="govuk-accordion__section-content" aria-labelledby="driveins-regions-' . $regionIndex . '-heading">
                  <table class="govuk-table">
                      <thead class="govuk-table__head">
                        <tr class="govuk-table__row">
                          <th scope="col" class="govuk-table__header">&nbsp;</th>
                          <th scope="col" class="govuk-table__header">Otváracie hodiny</th>
                        </tr>
                      </thead>
                      <tbody class="govuk-table__body">';

        foreach ($region['places'] as $place) {
            $placesContent .= '
                <tr class="govuk-table__row">
                  <td class="govuk-table__cell">
                    <strong>' . $place['title'] . '</strong> (' . $place['provider'] . ')
                    <div>' . $place['address'] . '</div>
                    Denná kapacita: ' . $place['capacity'] . '
                  </td>
                  <td class="govuk-table__cell">';

            foreach ($place['opening_hours'] as $day => $hours) {
                if (!empty($hours)) {
                    $placesContent .= $day . ': ' . $hours . '<br>';
                }
            }

            $placesContent .= '</td>
                </tr>';
        }

        $placesContent .= '</tbody>
                    </table>
                </div>
            </div>';
    }

    $placesContent .= '</div>
            <p class="govuk-body">Čas poslednej aktualizácie: ' . date('j.n.Y H:i', floor(time() / 900) * 900) . '</p>';

    $updatedContent = updatePlaceholder($content, 'driveins', $placesContent, $result);

    if ($content !== $updatedContent) {
        file_put_contents($contentFilePath, $updatedContent);
    }

    return $result;
}

function municipalityParents(&$result)
{
    $regionsFilePath = DRIVEINS_ROOT_DIR . '../../cache-api/regions.json';
    $districtsFilePath = DRIVEINS_ROOT_DIR . '../../cache-api/districts.json';

    if (!is_file($regionsFilePath)) {
        updateResult($result, 'regions-file', false, 'Regions data file does not exist.');

        return false;
    }

    if (!is_file($districtsFilePath)) {
        updateResult($result, 'districts-file', false, 'Districts data file does not exist.');

        return false;
    }

    $regions = json_decode(file_get_contents($regionsFilePath), true);
    $districts = json_decode(file_get_contents($districtsFilePath), true);

    if (empty($regions) || !is_array($regions)) {
        updateResult($result, 'regions-file', false, 'Regions not available.');

        return false;
    }

    if (empty($districts) || !is_array($districts)) {
        updateResult($result, 'districts-file', false, 'Districts not available.');

        return false;
    }

    $regionsById = [];

    foreach ($regions as $region) {
        $regionsById[$region['id']] = $region['name'];
    }

    $districtToRegion = [];

    foreach ($districts as $district) {
        if (isset($regionsById[$district['region_id']])) {
            $districtToRegion[$district['name']] = $regionsById[$district['region_id']];
        } else {
            updateResult($result, 'districts-file', false, 'Unknow region_id ' . $district['region_id']);
            $districtToRegion[$district['name']] = 'Nezaradené';
        }
    }

    $municipalities = include_once DRIVEINS_ROOT_DIR . '_municipalities.php';
    $municipalityParents = [];

    foreach ($municipalities as $municipalityName => $municipalityDistrict) {
        $municipalityName = toAscii($municipalityName);
        if (isset($districtToRegion[$municipalityDistrict])) {
            $regionName = $districtToRegion[$municipalityDistrict];
        } else {
            $municipalityDistrict = str_replace(' - ', '-', $municipalityDistrict);

            if (isset($districtToRegion[$municipalityDistrict])) {
                $regionName = $districtToRegion[$municipalityDistrict];
            } else {
                updateResult($result, '_municipality-file', false, 'Unknow region for district name ' . $municipalityDistrict);

                $regionName = 'Nezaradené';
            }
        }

        $municipalityParents[$municipalityName] = [
            'district' => $municipalityDistrict,
            'region' => $regionName,
        ];
    }

    return $municipalityParents;
}

function placeDetails(&$result, $place)
{
    $addressParts = [];

    if (!empty($place['street_name'])) {
        $streetParts = [$place['street_name']];

        if (!empty($place['street_number'])) {
            $streetParts[] = $place['street_number'];
        }

        $addressParts[] = implode(' ', $streetParts);
    }

    if (!empty($place['city'])) {
        $cityParts = [fixedCity($place['city'])];

        if (!empty($place['zip_code'])) {
            array_unshift($cityParts, str_replace(' ', '&nbsp;', $place['zip_code']));
        }

        $addressParts[] = implode(' ', $cityParts);
    }

    if (empty($place['daily_capacity'])) {
        $capacity = 0;
    } else {
        $capacity = (int)$place['daily_capacity'];
    }

    if (empty($place['operated_by'])) {
        $provider = '';
    } else {
        $provider = $place['operated_by'];
    }

    foreach ([
                 'MO' => 'Pondelok',
                 'TU' => 'Utorok',
                 'WE' => 'Streda',
                 'TH' => 'Štvrtok',
                 'FR' => 'Piatok',
                 'SA' => 'Sobota',
                 'SU' => 'Nedeľa',
             ] as $dayAbbr => $dayName) {
        $openingHours[$dayName] = empty($place['service_' . $dayAbbr]) ? '' : $place['service_' . $dayAbbr];
    }

    return [
        'title' => $place['title'],
        'address' => implode(', ', $addressParts),
        'capacity' => $capacity,
        'provider' => $provider,
        'opening_hours' => $openingHours,
    ];
}

function fixedCity($city)
{
    $city = str_replace('MZ SR', '', $city);
    $city = trimString($city);

    return $city;
}