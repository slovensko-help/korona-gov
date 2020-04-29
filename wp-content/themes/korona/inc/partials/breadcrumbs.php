<?php
if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
    ?>
    <div class="govuk-width-container">
        <?php
        yoast_breadcrumb( '<div class="govuk-breadcrumbs"><ol class="govuk-breadcrumbs__list">','</ol></div>' );
        ?>
    </div>
    <?php
}
?>