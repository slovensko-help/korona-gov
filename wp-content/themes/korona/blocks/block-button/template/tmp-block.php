<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id    = $block['id'];
    $class       = '';
    $icon        = '';

    if( isset( $block['className'] ) && !empty( $block['className'] ) ) {
        $class .= $block['className'] . ' ';
    }

    $button_link = get_field( 'button_link' );
    $button_link_ext = get_field( 'button_link_ext' );

    if ( !empty( $button_link ) || !empty( $button_link_ext ) ) {
        $button_type = get_field( 'button_type' );
        $title    = get_field( 'button_text_url' );
        if( get_field( 'button_typ_odkazu' ) ) {
            $url      = get_field( 'button_link_ext' );
            $targetVal = get_field( 'button_target_ext' );
            $target   = !empty( $targetVal[0] ) ? $targetVal[0] : '_self';
        } else {
            $selectedID = get_field( 'button_link' );
            $targetVal = get_field( 'button_target_int' );
            $target   = !empty( $targetVal[0] ) ? $targetVal[0] : '_self';
            $url         = get_the_permalink( $selectedID );
            if( empty( $title ) ) {
                $title = get_the_title( $selectedID );
            }
        }
        if ( $button_type !== FALSE ) {
            $button_color = get_field( 'button_color' );
            $button_arrow = get_field( 'button_arrow' );
            $class        .= 'govuk-button govuk-!-margin-right-3';

            if ( $button_arrow ) {
                $icon = '<svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19" viewBox="0 0 33 40" role="presentation" focusable="false"><path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/></svg>';
                $class .= ' govuk-button--start';
            }

            if ( $button_color === 'gray' ) {
                $class .= ' govuk-button--secondary';
            }
        }
        if ( $button_type !== TRUE ) :
            ?>
            <p class="govuk-body">
        <?php endif; ?>
        <a href="<?php echo esc_url( $url ) ?>" target="<?php echo $target; ?>" <?php echo $button_type !== FALSE ? 'role="button" draggable="false" class="' . esc_attr( $class ) . '" data-module="govuk-button"' : 'class="govuk-link ' . esc_attr( $class ) . '"'; ?>><?php echo esc_html( $title ); ?><?php echo $icon; ?></a>
        <?php
        if ( $button_type !== TRUE ) :
            ?>
            </p>
        <?php endif; ?>

    <?php } else { ?>
        <h3>Začnite editovať obsah Tlačidla s odkazom</h3>
    <?php } ?>
