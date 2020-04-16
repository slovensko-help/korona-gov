<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];

    $width = get_field( 'grid_col_width' );
    if( is_admin() ) {
        echo '<code> ' . $block_name . ' </code> Aktuálne zvolená šírka: <strong>' . $width['label'] . '</strong> <small>- časť šírky z obsahu riadku</small>';
    }
    ?>
    <div id="<?php echo $block_id; ?>" class="govuk-grid-column-<?php echo $width['value'] ?>">