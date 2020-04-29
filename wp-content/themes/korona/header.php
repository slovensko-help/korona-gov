<!DOCTYPE html>
<html <?php language_attributes(); ?> class="govuk-template app-no-canvas-background">
<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PQWLJHB');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#0b0c0c"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <?php wp_head(); ?>

    <script async src="https://scripts.luigisbox.com/LBX-134645.js"></script>
</head>
<body class="govuk-template__body ">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQWLJHB" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>

    <a href="#main-content" class="govuk-skip-link"><?php _e('Preskočiť na hlavný obsah', 'gov') ?></a>

    <header class="idsk-header " role="banner" data-module="govuk-header">
        <div class="idsk-header__container govuk-width-container">
            <div class="idsk-header__logo">
                <a
                    href="<?php echo esc_url( apply_filters( 'wpml_home_url', get_option( 'home' ) ) ); ?>"
                    title="<?php echo get_bloginfo('name') . ' - ' . __('Domov', 'gov') ?>"
                    class="idsk-header__link idsk-header__link--homepage">
                    <span class="idsk-header__logotype">
                        <?php include_once 'inc/partials/nav-logo.php'; ?>
                    </span>
                </a>
            </div>

            <div class="idsk-header__content">
                <?php include_once 'inc/partials/search-form.php'; ?>
                <?php include_once 'inc/partials/language-picker.php'; ?>
            </div>
        </div>
    </header>

    <?php include_once 'inc/partials/alert-panel.php'; ?>
    <?php include_once 'inc/partials/phase-banner.php'; ?>
    <?php include_once 'inc/partials/breadcrumbs.php'; ?>

    <main class="govuk-main-wrapper govuk-!-padding-top-6 govuk-!-padding-bottom-6 govuk-body" id="main-content" role="main">
