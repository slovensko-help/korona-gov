<?php

get_header();

?>
    <div class="govuk-width-container">
<?php

if ( have_posts() ) {

    // Load posts loop.
    while ( have_posts() ) {
        the_post();
        the_content();
    }
}

?>
    </div>
<?php
    
get_footer();
