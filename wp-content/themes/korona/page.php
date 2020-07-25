<?php

    get_header();

    ?>
    <div class="govuk-width-container">
    <?php

    $back_text = get_post_meta( get_the_ID(), 'gov_back_button_text', TRUE );
    $back_link = get_post_meta( get_the_ID(), 'gov_back_button_url', TRUE );

    if ( !empty( $back_link ) ) :
        echo '<a href="' . $back_link . '" class="govuk-back-link">' . esc_html( $back_text ) . '</a>';
    endif;

    echo '<h1 class="govuk-heading-xl govuk-!-margin-bottom-6">' . get_the_title() . '</h1>';

    if ( have_posts() ) {

        // Load posts loop.
        while ( have_posts() ) {
            the_post();
            //remove_filter('the_content', 'wpautop', 12);

            $included_file = get_post_meta($post->ID, 'korona_include', true);
            $allowed_includes = ['registration-from-unsafe-country.php'];

            if (!empty($included_file) && in_array($included_file, $allowed_includes)) {
                echo '<div class="js-native-content">';
                the_content();
                echo '</div>';
                include_once $included_file;
            }
            else {
                the_content();
            }
        }
    }

    ?>
    </div>
    <?php
    get_footer();
