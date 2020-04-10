<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_name  = $block['title'];

    if(is_admin()){
        echo $block_name;
    }
    ?>

    </div>
