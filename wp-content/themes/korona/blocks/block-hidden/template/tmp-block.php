<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id = $block['id'];

    $className = ' section-hidden';

    $hidden_text_title = get_field( 'hidden_text_title' );
    $hidden_obsah      = get_field( 'hidden_obsah' );

    if ( !empty( $hidden_text_title ) || !empty( $hidden_obsah ) ) :
        ?>

        <details class="govuk-details" data-module="govuk-details">
            <summary class="govuk-details__summary">
                <span class="govuk-details__summary-text" role="heading" aria-level="3" aria-label="<?php echo get_field( 'hidden_aria_label' ); ?>">
                  <?php echo esc_html( $hidden_text_title ); ?>
                </span>
            </summary>
            <div class="govuk-details__text"><?php echo wp_kses_post( $hidden_obsah ); ?></div>
        </details>
    <?php else : ?>
        <h2>Začnite editovať obsah</h2>
    <?php endif; ?>
