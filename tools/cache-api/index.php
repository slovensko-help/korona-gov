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

//foreach (array('sk', 'en', 'hu') as $lang) {
//    download('https://mojeezdravie.nczisk.sk/api/v1/web/faq?lang=' . $lang, 'faq-' . $lang . '.json');
//}

//download('https://mojeezdravie.nczisk.sk/api/v1/ezdravie-stats-proxy-api.php', 'nczi-stats.json');
download('https://covid-19.nczisk.sk/webapi/v1/kpi?nocache', 'nczi-stats.json');
download('https://data.korona.gov.sk/raw/api/nczi-morning-emails?published_since=' . (new DateTimeImmutable('8 days ago'))->format('Y-m-d'), 'nczi-morning-emails.json');
download('https://data.korona.gov.sk/api/vaccinations/in-slovakia?published_since=' . (new DateTimeImmutable('8 days ago'))->format('Y-m-d'), 'vaccinations.json');
download('https://data.korona.gov.sk/api/regions', 'regions.json');
download('https://data.korona.gov.sk/api/vaccinations/by-region?published_since=' . (new DateTimeImmutable('8 days ago'))->format('Y-m-d'), 'vaccinations-by-region.json');
download('https://docs.google.com/spreadsheets/d/e/2PACX-1vTKsdlkKe-569DalEg9h-e02PNzvtLSE50Wucek1XzPXFOFnz0EdUobMrk6wFOi0NslkqA6C7W7eMvY/pub?gid=0&single=true&output=csv&cachebuster=' . time(), 'manual-stats.csv');
download('https://docs.google.com/spreadsheets/d/e/2PACX-1vQv1TpXK9vrKHBrhfO0CP5QZ53A_xSZ8exwFxZ0CBJSWoKlvzhdv44cMhKmai3SqtBpkNx9PyOg_N-g/pub?gid=574757827&single=true&output=csv', 'safe-countries.csv');
download('https://docs.google.com/spreadsheets/d/e/2PACX-1vQv1TpXK9vrKHBrhfO0CP5QZ53A_xSZ8exwFxZ0CBJSWoKlvzhdv44cMhKmai3SqtBpkNx9PyOg_N-g/pub?gid=0&single=true&output=csv', 'all-countries.csv');


include_once dirname(__DIR__) . "/data/index.php";