<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];

    if( is_admin() ) {
        echo '<p style="text-align: right;"><code>' . $block_name . '</code> ';
    }
    ?>
        </div>
    </div>
