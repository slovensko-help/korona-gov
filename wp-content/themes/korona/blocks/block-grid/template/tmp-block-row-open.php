<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];
    $block_class = '';

    if( isset( $block['className'] ) && !empty( $block['className'] ) ) {
        $block_class = ' ' . $block['className'];
    }

    $row_background = get_field( 'row_background' );
    $row_padding_top = get_field( 'row_padding_top' );
    $row_padding_bottom = get_field( 'row_padding_bottom' );

    if( $row_background )
        $block_class .= ' ' . $row_background;

    if( $row_padding_top )
        $block_class .= ' ' . $row_padding_top;

    if( $row_padding_bottom )
        $block_class .= ' ' . $row_padding_bottom;


    if( is_admin() ) {
        echo '<p><code> ' . $block_name . '</code></p>';
    }
    ?>
    <div id="<?php echo $block_id ?>" class="govuk-grid-row<?php echo $block_class; ?>">