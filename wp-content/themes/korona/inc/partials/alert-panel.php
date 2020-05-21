<?php

if (get_field('opatrenia', 'options')) {
    $bcg = get_field('farba_opatrenia', 'options');
    $text = get_field('text_opatreni', 'options');
    $link_opatrenia_text = get_field('link_opatrenia_text', 'options');
    $target_link = '_self';
    if( get_field( 'link_type', 'options' ) ) {
        $link_opatrenia  = get_field( 'link_opatrenia', 'options' );
        $link_url        = get_permalink( $link_opatrenia );
        $title_opatrenia = get_the_title( $link_opatrenia );
    } else {
        $link_url = get_field( 'externy_link', 'options' );
        $title_opatrenia = $link_opatrenia_text;
        $new_tab = get_field( 'new_tab', 'options' );
        if( !empty($new_tab) && isset( $new_tab[0] ) && $new_tab[0] == '_blank' ) :
            $target_link = '_blank';
        endif;
    }
    ?>
    <div class="app-pane-<?php echo esc_attr($bcg) ?> govuk-!-padding-top-3">
        <div class="govuk-width-container">
            <div class="govuk-grid-row">
                <div class="govuk-grid-column-full">
                    <p class="govuk-body">
                        <?php echo wp_kses($text, ['strong' => []]) . ' ' . '<a href="' . esc_url( $link_url ) . '" class="govuk-link" target="' . esc_attr( $target_link ) . '" title="' . esc_attr($title_opatrenia) . '">' . esc_html($link_opatrenia_text) . '</a>'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>