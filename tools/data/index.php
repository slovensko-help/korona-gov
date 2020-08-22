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

if (isset($result['koronamedians'])) {
    $mediansDataTable = '<table>
    <tr>
        <th>Raw value</th>
        <th>Formatted value</th>
        <th>Timestamp</th>
        <th>Formatted date</th>
    </tr>';

    $medianRows = [];

    foreach ($result['koronamedians'] as $medianData) {
        $mediansDataTable .= '<tr>
        <td>' . $medianData['value'] . '</td>
        <td>' . $medianData['formatted_value'] . '</td>
        <td>' . $medianData['timestamp'] . '</td>
        <td>' . $medianData['formatted_date'] . '</td>
    </tr>';

        $medianRows[] = '    <tr class="govuk-table__row">
        <td class="govuk-table__cell">' . $medianData['formatted_date'] . '</td>
        <td class="govuk-table__cell govuk-table__cell--numeric">' . $medianData['formatted_value'] . '</td>
    </tr>';
    }

    $mediansDataTable .= '</table>';

    $mediansContent =
        '<tbody class="govuk-table__body">' . "\n" . implode("\n", $medianRows) . '
</tbody>';

    $mediansLimitedContent =
        '<tbody class="govuk-table__body">' . "\n" . implode("\n", array_slice($medianRows, 0, 2)) . '
</tbody>';

    $content .= '<h2>koronamedians</h2>
    <p>Usage: <code>[koronamedians]</code></p>
    <p>Note: This shortcode generates HTML markup which needs to be put within <code>&lt;table&gt;&lt;/table&gt;</code> tags. 
    You are responsible for doing so. A proper header for two columns is recommended also.</p>
    <p>Example: <code>[koronamedians]</code>';

//$content .= '<pre>' . htmlentities($mediansContent) . '</pre>';

    $content .= '<p>Example: <code>[koronamedians limit=2]</code> puts this code to the page:';

    $content .= '<pre>' . htmlentities($mediansLimitedContent) . '</pre>';

    $content .= '<h3>Values</h3>' . $mediansDataTable;
}

echo $content;