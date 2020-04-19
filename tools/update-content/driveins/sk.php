<?php

if (!defined('ROOT_DIR')) define('DRIVEINS_ROOT_DIR', '');

include_once DRIVEINS_ROOT_DIR . '_functions.php';

echo json_encode(updateDriveins('poziadat-o-vysetrenie-na-covid-19/index.html', 'driveins.json'), JSON_PRETTY_PRINT);