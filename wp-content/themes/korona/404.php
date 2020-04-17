<?php

    /**
     * The template for displaying 404 pages (Not Found)
     */

    get_header();

    $allow = [
      'a' => [ 'href' => [], 'class' => [], 'target' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'p' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'div' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'details' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], 'data-module' => [] ],
      'summary' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [],],
      'span' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'br' => [],
      'strong' => [],
      'h2' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'h3' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'h4' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'ul' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'ol' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
      'li' => [ 'class' => [], 'role' => [], 'aria-label' => [], 'id' => [], 'style' => [], ],
    ];
?>
    <div class="govuk-width-container">
        <?php

            echo '<h1 class="govuk-heading-xl govuk-!-margin-bottom-6">' . esc_html( get_field( 'page_404_title', 'options' ) ) . '</h1>';

            if( $content = get_field( 'page_404_content', 'options' ) ) :
                echo wp_kses( $content, $allow );
            endif;

        ?>
    </div>
<?php
    get_footer();
