<?php

    /*
 * Template Name: Užší obsah
 * Template Post Type: page, post
 */

    get_header();

    get_header();

    $back_text = get_post_meta( get_the_ID(), 'gov_back_button_text', TRUE );
    $back_link = get_post_meta( get_the_ID(), 'gov_back_button_url', TRUE );

    if ( !empty( $back_link ) ) :
        echo '<a href="' . $back_link . '" class="govuk-back-link">' . esc_html( $back_text ) . '</a>';
    endif;

    echo '<h1 class="govuk-heading-xl govuk-!-margin-bottom-6">' . get_the_title() . '</h1>';

    if ( have_posts() ) {
        ?>
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
        <?php
        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            //remove_filter('the_content', 'wpautop', 12);
            the_content();
        }
        ?>
            </div>
        </div>
        <?php
    }


    get_footer();
