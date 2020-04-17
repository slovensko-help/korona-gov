<?php

if (!defined('ROOT_DIR')) define('HOMEPAGE_ROOT_DIR', '');

include_once HOMEPAGE_ROOT_DIR . '_functions.php';

echo json_encode(updateHpStats('hu/index.html'), JSON_PRETTY_PRINT);