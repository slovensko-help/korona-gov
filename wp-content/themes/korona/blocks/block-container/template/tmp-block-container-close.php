<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];

    if( is_admin() ) {
        echo '<p style="text-align: right;"><strong>Používajte iba s Templateom Bez kontajnera!</strong> <code>' . $block_name . '</code> </p>';
    }
    ?>
        </div>
    </div><!-- Outer wrapper C L O S E -->
