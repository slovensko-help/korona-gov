<?php

    /*
    * Template Name: Bez kontainera !
    * Template Post Type: page
    */

    get_header();
    the_post();

    $back_text = get_post_meta( get_the_ID(), 'gov_back_button_text', TRUE );
    $back_link = get_post_meta( get_the_ID(), 'gov_back_button_url', TRUE );

    ?>
    <div class="govuk-width-container">
    <?php

    if ( !empty( $back_link ) ) :
        echo '<a href="' . $back_link . '" class="govuk-back-link">' . esc_html( $back_text ) . '</a>';
    endif;

    echo '<h1 class="govuk-heading-xl govuk-!-margin-bottom-6">' . get_the_title() . '</h1>';

    ?>
    </div>
    <?php

    the_content();

    get_footer();