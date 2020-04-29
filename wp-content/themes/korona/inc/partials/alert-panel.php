<?php

if (get_field('opatrenia', 'options')) {
    $bcg = get_field('farba_opatrenia', 'options');
    $text = get_field('text_opatreni', 'options');
    $link_opatrenia = get_field('link_opatrenia', 'options');
    $link_url = get_permalink($link_opatrenia);
    $title_opatrenia = get_the_title($link_opatrenia);
    $link_opatrenia_text = get_field('link_opatrenia_text', 'options');
    ?>
    <div class="app-pane-<?php echo esc_attr($bcg) ?> govuk-!-padding-top-3">
        <div class="govuk-width-container">
            <div class="govuk-grid-row">
                <div class="govuk-grid-column-full">
                    <p class="govuk-body">
                        <?php echo wp_kses($text, ['strong' => []]) . ' ' . '<a href="' . $link_url . '" class="govuk-link" title="' . esc_attr($title_opatrenia) . '">' . esc_html($link_opatrenia_text) . '</a>'; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>