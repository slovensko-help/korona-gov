<?php

get_header();

if ( have_posts() ) {

    // Load posts loop.
    while ( have_posts() ) {
        the_post();
        //remove_filter('the_content', 'wpautop', 12);
        the_content();
    }
}

get_footer();
