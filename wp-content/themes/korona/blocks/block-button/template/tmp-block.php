<?php
    if ( !defined( 'ABSPATH' ) ) {
        exit;
    }

    $block_id = $block['id'];

    $button_link = get_field( 'button_link' );

    if ( !empty( $button_link ) ) {
        $button_type = get_field( 'button_type' );
        $target      = $button_link['target'] ? 'target="' . $button_link['target'] . '" ' : 'target="_self" ';
        $icon        = '';
        $class       = '';
        if ( $button_type !== FALSE ) {
            $button_color = get_field( 'button_color' );
            $button_arrow = get_field( 'button_arrow' );
            $class        .= ' govuk-button';

            if ( $button_arrow ) {
                $icon = '<svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19" viewBox="0 0 33 40" role="presentation" focusable="false"><path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"/></svg>';
            }

            if ( $button_color === 'gray' ) {
                $class .= ' govuk-button--secondary';
            }
        }
        if ( $button_type !== TRUE ) :
            ?>
            <p class="govuk-body">
        <?php endif; ?>
        <a href="<?php echo esc_url( $button_link['url'] ) ?>" <?php echo $target; ?><?php echo $button_type !== FALSE ? 'role="button" draggable="false" class="govuk-button' . esc_attr( $class ) . '" data-module="govuk-button"' : ''; ?>>
            <?php echo esc_html( $button_link['title'] ); ?>
            <?php echo $icon; ?>
        </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php
        if ( $button_type !== TRUE ) :
            ?>
            </p>
        <?php endif; ?>

    <?php } else { ?>
        <h2>Začnite editovať obsah</h2>
    <?php } ?>
