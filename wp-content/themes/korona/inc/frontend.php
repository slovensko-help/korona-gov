<?php

/** C O O K I E S **/

/**
 * Cookies necessary
 *
 * @param $atts
 * @param $content
 * @return string
 */
function consent_necessary_shortcode($atts, $content)
{
    $a = shortcode_atts(array(
        'name' => null,
    ), $atts);
    return '
           <div class="govuk-form-group">
              <div class="govuk-checkboxes">
                    <div class="govuk-checkboxes__item">
                      <input class="govuk-checkboxes__input" id="consent_necessary"  type="checkbox" checked="" disabled>
                      <label class="govuk-label govuk-checkboxes__label" for="consent_necessary">
                    ' . $a['name'] . '
                  </label>
                    </div>
              </div>
            </div>
            <div class="govuk-inset-text">' . do_shortcode($content) . '</div>';
}
add_shortcode('consent_necessary', 'consent_necessary_shortcode');

/**
 * Cookies performance
 *
 * @param $atts
 * @param $content
 * @return string
 */
function consent_performance_shortcode($atts, $content)
{
    $a = shortcode_atts(array(
        'name' => null,
    ), $atts);
    return '
            <div class="govuk-form-group">
              <div class="govuk-checkboxes">
                    <div class="govuk-checkboxes__item">
                      <input class="govuk-checkboxes__input" id="consent_performance" type="checkbox">
                      <label class="govuk-label govuk-checkboxes__label" for="consent_performance">
                    ' . $a['name'] . '
                  </label>
                    </div>
              </div>
            </div>
            <div class="govuk-inset-text">' . do_shortcode($content) . '</div>';
}
add_shortcode('consent_performance', 'consent_performance_shortcode');

/**
 * Cookies marketing
 *
 * @param $atts
 * @param $content
 * @return string
 */
function consent_marketing_shortcode($atts, $content)
{
    $a = shortcode_atts(array(
        'name' => null,
    ), $atts);
    return '<div class="govuk-form-group">
              <div class="govuk-checkboxes">
                    <div class="govuk-checkboxes__item">
                      <input class="govuk-checkboxes__input" id="consent_marketing" type="checkbox">
                      <label class="govuk-label govuk-checkboxes__label" for="consent_marketing">
                    ' . $a['name'] . '
                  </label>
                    </div>
              </div>
            </div>
            <div class="govuk-inset-text">' . do_shortcode($content) . '</div>';
}
add_shortcode('consent_marketing', 'consent_marketing_shortcode');

/**
 * Cookies targeting
 *
 * @param $atts
 * @param $content
 * @return string
 */
function consent_targeting_shortcode($atts, $content)
{
    $a = shortcode_atts(array(
        'name' => null,
    ), $atts);
    return '<div class="govuk-form-group">
              <div class="govuk-checkboxes">
                    <div class="govuk-checkboxes__item">
                      <input class="govuk-checkboxes__input" id="consent_targeting" type="checkbox">
                      <label class="govuk-label govuk-checkboxes__label" for="consent_targeting">
                    ' . $a['name'] . '
                  </label>
                    </div>
              </div>
            </div>
            <div class="govuk-inset-text">' . do_shortcode($content) . '</div>';
}
add_shortcode('consent_targeting', 'consent_targeting_shortcode');

/**
 * Shortcode cookies submit
 *
 * @param $atts
 * @param $content
 * @return string
 */
function consent_submit_shortcode($atts, $content)
{
    $a = shortcode_atts(array(
        'name' => null,
    ), $atts);
    return '<button type="button" class="govuk-button" id="consent_save">' . $a['name'] . '</button>';
}
add_shortcode('consent_submit', 'consent_submit_shortcode');

    /**
     * Yoast SEO clenauot spans
     * @param $link_output
     * @param $link
     * @return string|string[]|null
     */
    function id_sk_filter_breadcrumbs( $link_output, $link ) {

        //$link_output = preg_replace("/<span\s(.+?)>(.+?)<\/span>/is", "<h1 $1>$2</h1>", $link_output);
        //$output = strip_tags( $link_output, '<a>' );
        if( isset( $link['url'] ) ) {
            $link_output = '<li class="govuk-breadcrumbs__list-item"><a href="' . esc_url( $link['url'] ) . '" class="govuk-breadcrumbs__link">' . esc_html( $link['text'] ) . '</a></li>';
        }

        return $link_output;
    }
    add_filter('wpseo_breadcrumb_single_link', 'id_sk_filter_breadcrumbs', 10, 2);
