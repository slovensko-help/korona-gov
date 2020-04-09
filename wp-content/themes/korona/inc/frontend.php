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