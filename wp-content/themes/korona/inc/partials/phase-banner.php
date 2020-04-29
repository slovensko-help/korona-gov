<?php
if (get_field('version_display', 'options')) {
    ?>
    <div class="govuk-width-container">
        <div class="govuk-phase-banner">
            <p class="govuk-phase-banner__content">
                <strong class="govuk-tag govuk-phase-banner__content__tag">
                    <?php echo esc_html(get_field('version_phase', 'options')); ?>
                </strong>
                <span class="govuk-phase-banner__text">
                  <?php echo wp_kses(get_field('version_info', 'options'), ['a' => ['target' => [], 'href' => [], 'class' => [], 'title' => [], 'aria-label' => [], 'id' => [],]]) . esc_html(get_field('version_date', 'options')); ?>
                </span>
            </p>
        </div>
    </div>
<?php }