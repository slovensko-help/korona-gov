<?php
if (!defined('ABSPATH')) {
    exit;
}
$block_id  = $block['id'];
$block_name  = $block['title'];

if(is_admin()){
    echo $block_name;
}
?>
<div class="govuk-accordion__section ">
    <div class="govuk-accordion__section-header">
        <h2 class="govuk-accordion__section-heading">
            <span class="govuk-accordion__section-button" id="<?= $block_id ?>-heading">
              <?php echo (get_field('nazov_accordionu') ? get_field('nazov_accordionu')  : ''); ?>
            </span>
        </h2>
    </div>
    <div id="<?= $block_id ?>-content" class="govuk-accordion__section-content" aria-labelledby="<?= $block_id ?>-heading">