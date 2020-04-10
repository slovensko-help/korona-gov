<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_id = $block['id'];
$block_name = $block['title'];

if (get_field('text')) {
    ?>

    <div class="govuk-inset-text">
        <?= get_field('text');?>
    </div>

<?php } else { ?>

    <h2>Začnite editovať obsah - <?= $block_name ?></h2>

<?php } ?>
