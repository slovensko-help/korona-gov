<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_id = $block['id'];
$block_name = $block['title'];

if (get_field('oznam')) {
    ?>

    <div class="govuk-warning-text">
        <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
        <strong class="govuk-warning-text__text">
            <span class="govuk-warning-text__assistive">Upozornenie</span>
            <?= get_field('oznam')?>
        </strong>
    </div>

<?php } else { ?>

    <h2>Začnite editovať obsah - <?= $block_name ?></h2>

<?php } ?>
