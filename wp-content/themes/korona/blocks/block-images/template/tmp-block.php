<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_id = $block['id'];
$block_name = $block['title'];

if (1==1) {
    ?>

    <div class="govuk-grid-row">
        <div class="govuk-grid-column-one-half">
            <img src="https://idsk-preview.herokuapp.com/public/assets/images/examples/3by2.jpg" alt="3:2">
        </div>
        <div class="govuk-grid-column-one-half">
            <img src="https://idsk-preview.herokuapp.com/public/assets/images/examples/3by2.jpg" alt="">
        </div>
    </div>

<?php } else { ?>

    <h2>Začnite editovať obsah - <?= $block_name ?></h2>

<?php } ?>
