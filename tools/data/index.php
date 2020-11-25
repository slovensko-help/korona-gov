<?php

define('ROOT_DIR', __DIR__ . '/');

$statsContent = include_once 'statistics.php';

$result = updateStatistics();

file_put_contents(ROOT_DIR . 'data.json', json_encode($result, JSON_PRETTY_PRINT));

$content = '
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }   
        
        table th,
        table td {
            border: 1px solid black;
            padding: 3px 5px;
        }    
        
        code {
            font-size: 1.2em;
        }
    </style>
    <h1>Shortcodes</h1>
    <p><a href="data.json">JSON data source</a></p>';

if ($result['checks']['health-check']) {
    $content .= '<p style="color: green;">Data health check: All good</p>';

    if (!empty($result['checks'])) {
        $content .= '<ul style="color: #02bf85;">';
    }

    foreach ($result['checks'] as $key => $value) {
        if ('health-check' !== $key) {
            $content .= '<li>' . $value . '</li>';
        }
    }

    if (!empty($result['checks'])) {
        $content .= '</ul>';
    }
} else {
    $content .= '<div style="color: red;">Data health check: We have issues<br><ul>';

    foreach ($result['checks'] as $key => $value) {
        if ('health-check' !== $key) {
            $content .= '<li>' . $value . '</li>';
        }
    }

    $content .= '</ul></div>';
}

if (isset($result['safecountries'])) {
    $content .= '
        <h2>safecountries</h2>
        <p>Usage: <code>[safecountries]</code></p>
        <h3>Values</h3>
        <table>
            <tr>
                <th>Country code</th>
                <th>Slovak name</th>
                <th>English name</th>
                <th>Safe from</th>
                <th>Safe until</th>
            </tr>';

    foreach ($result['safecountries'] as $key => $data) {
        $content .= '<tr>
            <td>' . $key . '</td>
            <td>' . $data['name_sk'] . '</td>
            <td>' . $data['name_en'] . '</td>
            <td>' . $data['safe_from'] . '</td>
            <td>' . $data['safe_until'] . '</td>
        </tr>';
    }

    $content .= '
        </table>';
}

if (isset($result['koronastats'])) {

    $content .= '
    <h2>koronastats</h2>
    <p>Usage: <code>[koronastats item=&lt;Item&gt;]</code></p>
    <p>Example: <code>[koronastats item=hospitalized-delta]</code> puts 
    <strong>' . $result['koronastats']['hospitalized-delta']['formatted_value'] . '</strong> to the page.</p>
    <h3>Values</h3>
    <table>
        <tr>
            <th>Item</th>
            <th>Formatted value</th>
            <th>Raw value</th>
        </tr>';

    foreach ($result['koronastats'] as $key => $data) {
        $content .= '<tr>
            <td>' . $key . '</td>
            <td>' . $data['formatted_value'] . '</td>
            <td>' . $data['value'] . '</td>
        </tr>';
    }

    $content .= '</table>';
}

$content .= koronaAggregate('koronamedians', $result['koronamedians']);
$content .= koronaAggregate('koronaaverages', $result['koronaaverages']);

function koronaAggregate($name, $data) {
    $result = '';

    if (isset($data)) {
        $table = '<table>
    <tr>
        <th>Raw value</th>
        <th>Formatted value</th>
        <th>Timestamp</th>
        <th>Formatted date</th>
    </tr>';

        $rows = [];

        foreach ($data as $aggregate) {
            $table .= '<tr>
        <td>' . $aggregate['value'] . '</td>
        <td>' . $aggregate['formatted_value'] . '</td>
        <td>' . $aggregate['timestamp'] . '</td>
        <td>' . $aggregate['formatted_date'] . '</td>
    </tr>';

            $rows[] = '    <tr class="govuk-table__row">
        <td class="govuk-table__cell">' . $aggregate['formatted_date'] . '</td>
        <td class="govuk-table__cell govuk-table__cell--numeric">' . $aggregate['formatted_value'] . '</td>
    </tr>';
        }

        $table .= '</table>';

        $mediansContent =
            '<tbody class="govuk-table__body">' . "\n" . implode("\n", $rows) . '
</tbody>';

        $limitedContent =
            '<tbody class="govuk-table__body">' . "\n" . implode("\n", array_slice($rows, 0, 2)) . '
</tbody>';

        $result .= '<h2>' . $name .'</h2>
    <p>Usage: <code>[' . $name .']</code></p>
    <p>Note: This shortcode generates HTML markup which needs to be put within <code>&lt;table&gt;&lt;/table&gt;</code> tags. 
    You are responsible for doing so. A proper header for two columns is recommended also.</p>
    <p>Example: <code>[koronamedians]</code>';

        $result .= '<p>Example: <code>[' . $name .' limit=2]</code> puts this code to the page:';

        $result .= '<pre>' . htmlentities($limitedContent) . '</pre>';

        $result .= '<h3>Values</h3>' . $table;
    }

    return $result;
}

echo $content;