<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];
    $block_name = $block['title'];

    if( is_admin() ) {
        echo '<p><code> ' . $block_name . '</code></p>';
    }
    ?>
    <div id="<?php echo $block_id ?>" class="govuk-grid-row">