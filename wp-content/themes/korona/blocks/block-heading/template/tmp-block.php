<?php
if (!defined('ABSPATH')) {
    exit;
}

$block_id = $block['id'];
$block_name = $block['title'];
$id_nadpisu='';

if ($nadpis = get_field('nadpis')) {

    $id_nadpisu = get_field( 'id_nadpisu' );

    ?>

    <<?= get_field('uroven_nadpisu')?><?= ( !empty( $id_nadpisu ) ? ' id="' . sanitize_title( $id_nadpisu ) . '"' : '' ); ?> class="<?= get_field('velkost_nadpisu')?>"><?= wp_kses( $nadpis, [ 'br' => [] ] ) ?></<?= get_field('uroven_nadpisu')?>>

<?php } else { ?>

    <h2>Začnite editovať obsah - <?= $block_name ?></h2>

<?php } ?>
