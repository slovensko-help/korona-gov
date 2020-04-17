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

    if( $col_background !== 'no' ) {
        $class .= ' ' . $col_background;
    }

    if( get_field( 'col_padding' ) ) {
        $col_padding_top = get_field( 'col_padding_top' );
        $col_padding_bottom = get_field( 'col_padding_down' );
        $col_padding_left = get_field( 'col_padding_left' );
        $col_padding_right = get_field( 'col_padding_right' );

        if( $col_padding_top !== 'no' ) {
            $class .= ' ' . $col_padding_top;
        }

        if( $col_padding_bottom !== 'no' ) {
            $class .= ' ' . $col_padding_bottom;
        }

        if( $col_padding_right !== 'no' ) {
            $class .= ' ' . $col_padding_right;
        }

        if( $col_padding_left !== 'no' ) {
            $class .= ' ' . $col_padding_left;
        }
    }

    if( is_admin() ) {
        echo '<code> ' . $block_name . ' </code> Aktuálne zvolená šírka: <strong>' . $width['label'] . '</strong> <small>- časť šírky z obsahu riadku</small>';
    }
    ?>
    <div id="<?php echo $block_id; ?>" class="<?php echo 'govuk-grid-column-' . $width['value'] ?>">
        <div<?php echo !empty( $class ) ? ' class="' . $class . '"' : ''; ?>>