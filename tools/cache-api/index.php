<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function download($url, $file)
{
    echo '<a href="' . $file . '" target="_blank">' . $file . '</a><br>';
    $content = file_get_contents($url);

    if (!empty($content)) {
        file_put_contents($file, $content);
    }
}

foreach (array('sk', 'en', 'hu') as $lang) {
    download('https://mojeezdravie.nczisk.sk/api/v1/web/faq?lang=' . $lang, 'faq-' . $lang . '.json');
}

download('https://mojeezdravie.nczisk.sk/api/v1/ezdravie-stats-proxy-api.php', 'hp-stats.json');
download('https://mojeezdravie.nczisk.sk/api/v1/svk-covid-driveins', 'driveins.json');