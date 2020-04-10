<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_id = $block['id'];
$block_name = $block['title'];

if (get_field('nadpis')) {
    ?>

    <<?= get_field('uroven_nadpisu')?> class="<?= get_field('velkost_nadpisu')?>"><?= get_field('nadpis')?></<?= get_field('uroven_nadpisu')?>>

<?php } else { ?>

    <h2>Začnite editovať obsah - <?= $block_name ?></h2>

<?php } ?>
