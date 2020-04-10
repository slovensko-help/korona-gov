<?php
if (!defined('ABSPATH')) {
    exit;
}
$block_id  = $block['id'];
$block_name = $block['title'];
$block_cat = $block['category'];

if (is_admin()) {
    echo $block_name;
}
?>
<div class="govuk-accordion" data-module="govuk-accordion" id="<?= $block_cat.'-'.$block_id ?>" data-attribute="value">
