<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];
    $class = '';

    $container_background = get_field( 'container_background' );
    $container_padding_top = get_field( 'container_padding_top' );
    $container_padding_bottom = get_field( 'container_padding_bottom' );

    if( $container_background !== 'no' ) {
        $class .= $container_background . ' ';
    }

    $class .= $container_padding_top . ' ' . $container_padding_bottom;

    if( is_admin() ) {
        echo '<p><code> ' . $block_name . '</code> <strong>Používajte iba s Templateom Bez kontajnera!</strong></p>';
    }
    ?>
    <div class="<?php echo $class; ?>"><!-- Outer wrapper O P E N -->
        <div id="<?php echo $block_id ?>" class="govuk-width-container">