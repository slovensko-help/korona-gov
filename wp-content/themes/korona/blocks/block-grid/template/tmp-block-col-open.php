<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $class = '';
    $block_id  = $block['id'];
    $block_name = $block['title'];
    if( isset( $block['className'] ) && !empty( $block['className'] ) ) {
        $class .= $block['className'];
    }

    $width = get_field( 'grid_col_width' );
    $col_background = get_field( 'col_background' );
    $col_padding = get_field( 'col_padding' );

    if( $col_background !== 'no' ) {
        $class .= ' ' . $col_background;
    }
    if( $col_padding !== 'no' ) {
        $class .= ' ' . $col_padding;
    }

    if( is_admin() ) {
        echo '<code> ' . $block_name . ' </code> Aktuálne zvolená šírka: <strong>' . $width['label'] . '</strong> <small>- časť šírky z obsahu riadku</small>';
    }
    ?>
    <div id="<?php echo $block_id; ?>" class="<?php echo 'govuk-grid-column-' . $width['value'] ?>">
        <div<?php echo !empty( $class ) ? ' class="' . $class . '"' : ''; ?>>