<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id  = $block['id'];

    if( empty( $section_id = get_field( 'tab_content_identifier' ) ) ) {
        echo '<h3>Musíte pridať jednoznačný identifikátor!</h3>';
    }

    if( is_admin() && !empty( $section_id ) ) {
        echo '(Tab) <span>Jednoznačný identifikátor obsahu: <code>' . $section_id . '</code></span>';
    }

    ?>
<section class="govuk-tabs__panel" id="<?php echo esc_attr( $section_id ) ?>">