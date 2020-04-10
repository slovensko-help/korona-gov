<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_name = $block['title'];
$block_cat = $block['category'];

if (is_admin()) {
    echo $block_name;
}
?>
<div class="govuk-accordion" data-module="govuk-accordion" id="<?= $block_cat ?>" data-attribute="value">
