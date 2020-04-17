<?php

if (!defined('ROOT_DIR')) define('FAQ_ROOT_DIR', '');

include_once FAQ_ROOT_DIR . '_functions.php';

echo json_encode(updateFaq('hu/faq/index.html', 'faq-hu.json'), JSON_PRETTY_PRINT);