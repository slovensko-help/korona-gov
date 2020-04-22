<?php

if (!defined('ROOT_DIR')) define('HOMEPAGE_ROOT_DIR', '');

include_once HOMEPAGE_ROOT_DIR . '_functions.php';

echo json_encode(updateDetailsStats('coronavirus-covid-19-in-the-slovak-republic-in-numbers/index.html'), JSON_PRETTY_PRINT);