<?php

define('HOMEPAGE_ROOT_DIR', defined('ROOT_DIR') ? ROOT_DIR . '/homepage/' : '');

echo "\nhomepage/sk.php\n";
include_once 'sk.php';

echo "\nhomepage/en.php\n";
include_once 'en.php';

echo "\nhomepage/hu.php\n";
include_once 'hu.php';

echo "\nhomepage/rom.php\n";
include_once 'rom.php';

echo "\ndetails/sk.php\n";
include_once 'details-sk.php';

echo "\ndetails/en.php\n";
include_once 'details-en.php';
