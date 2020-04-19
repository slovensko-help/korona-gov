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

download('https://raw.githubusercontent.com/gunsoft/obce-okresy-kraje-slovenska/master/JSON/regions.json', 'regions.json');
download('https://raw.githubusercontent.com/gunsoft/obce-okresy-kraje-slovenska/master/JSON/districts.json', 'districts.json');