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
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQWLJHB"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<script>document.body.className = ((document.body.className) ? document.body.className + ' js-enabled' : 'js-enabled');</script>

<a href="#main-content" class="govuk-skip-link">Preskočiť na hlavný obsah</a>

<?php
    $home_url = apply_filters( 'wpml_home_url', get_option( 'home' ) );
?>

<header class="idsk-header " role="banner" data-module="govuk-header">
    <div class="idsk-header__container govuk-width-container">
        <div class="idsk-header__logo">
            <a 
                href="<?php echo esc_url( $home_url ); ?>" 
                title="<?php echo get_bloginfo('name') . ' - ' . __('Domov', 'gov') ?>" 
                class="idsk-header__link idsk-header__link--homepage"
            >
                <span class="idsk-header__logotype">
                    <svg role="presentation" focusable="false" class="idsk-header__logotype-crown"
                         xmlns="http://www.w3.org/2000/svg" width="188" height="30" viewBox="0 0 277 44" fill="none">
                                    <style>
                                        .a {
                                            fill: white;
                                        }
                                    </style>
                                    <path
                                            d="M13.7 39L13.5 38.9C8 36.3 0 31 0 20.4 0 15.2 0.1 11.5 0.2 9 0.3 7.8 0.4 6.9 0.4 6.3 0.4 6 0.5 5.7 0.5 5.6 0.5 5.5 0.5 5.5 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4 0.5 5.4L0.5 5.4C0.5 5.4 0.5 5.4 0.9 5.4 0.9 5.4 0.4 10.1 0.4 20.4 0.4 30.7 8.2 35.9 13.7 38.6 19.1 35.9 26.9 30.7 26.9 20.4 26.9 10.1 26.4 5.4 26.4 5.4 26.8 5.4 26.8 5.4 26.8 5.4L26.8 5.4C26.8 5.4 26.8 5.4 26.8 5.4 26.8 5.4 26.8 5.4 26.8 5.4 26.8 5.5 26.9 5.5 26.9 5.6 26.9 5.7 26.9 6 26.9 6.3 27 6.9 27 7.8 27.1 9 27.2 11.5 27.3 15.2 27.3 20.4 27.3 31 19.3 36.3 13.8 38.9L13.7 39ZM26.4 5.4L26.8 5.4 26.8 5H0.5L0.5 5.4 0.9 5.4H26.4Z"
                                            class="a"/>
                                    <path
                                            d="M14.8 25.8V20.1C16.5 20.1 19.4 20.1 21.8 20.9 21.8 20.9 21.7 20 21.7 18.9 21.7 17.8 21.8 16.9 21.8 16.9 19.2 17.8 16.3 17.7 14.8 17.7V14.1C16.2 14.1 18.1 14.2 20.3 14.9 20.3 14.9 20.2 14 20.2 12.9 20.2 11.8 20.3 10.9 20.3 10.9 18.1 11.7 16.2 11.7 14.8 11.7 14.9 9.4 15.6 6.6 15.6 6.6 15.6 6.6 14.2 6.7 13.7 6.7 13.1 6.7 11.8 6.6 11.8 6.6 11.8 6.6 12.4 9.4 12.5 11.7 11.1 11.7 9.2 11.7 7 10.9 7 10.9 7.1 11.8 7.1 12.9 7.1 14 7 14.9 7 14.9 9.2 14.2 11.2 14.1 12.5 14.1V17.7C11 17.7 8.1 17.8 5.6 16.9 5.6 16.9 5.6 17.8 5.6 18.9 5.6 20 5.6 20.9 5.6 20.9 7.9 20.1 10.8 20.1 12.5 20.1V25.8H14.8V25.8Z"
                                            class="a"/>
                                    <path
                                            d="M24.3 29.8C23.6 28.5 22.5 27.2 20.9 27.2 18.7 27.2 17.9 29 17.9 29 17.9 29 16.4 25.2 13.7 25.2 10.9 25.2 9.4 29 9.4 29 9.4 29 8.6 27.2 6.4 27.2 4.9 27.2 3.7 28.5 3 29.8 5.8 34.2 10.2 36.9 13.7 38.6 17.1 36.9 21.5 34.2 24.3 29.8Z"
                                            class="a"/>
                                    <path
                                            d="M42.5 35V8.4H47.9V23.6H48.1L54 16.2H60.1L53.5 23.9 60.6 35H54.6L50.3 27.7 47.9 30.4V35H42.5ZM70.3 35.5C69.1 35.5 68 35.2 66.8 34.8 65.7 34.4 64.7 33.7 63.9 32.9 63 32 62.4 31 61.9 29.8 61.4 28.6 61.1 27.1 61.1 25.6 61.1 24 61.4 22.6 61.9 21.4 62.4 20.2 63 19.1 63.9 18.3 64.7 17.4 65.7 16.8 66.8 16.4 68 15.9 69.1 15.7 70.3 15.7 71.5 15.7 72.6 15.9 73.7 16.4 74.8 16.8 75.8 17.4 76.7 18.3 77.5 19.1 78.2 20.2 78.7 21.4 79.2 22.6 79.5 24 79.5 25.6 79.5 27.1 79.2 28.6 78.7 29.8 78.2 31 77.5 32 76.7 32.9 75.8 33.7 74.8 34.4 73.7 34.8 72.6 35.2 71.5 35.5 70.3 35.5ZM70.3 30.9C71.4 30.9 72.3 30.5 72.9 29.5 73.5 28.5 73.8 27.2 73.8 25.6 73.8 23.9 73.5 22.6 72.9 21.7 72.3 20.7 71.4 20.2 70.3 20.2 69.1 20.2 68.3 20.7 67.7 21.7 67.1 22.6 66.8 23.9 66.8 25.6 66.8 27.2 67.1 28.5 67.7 29.5 68.3 30.5 69.1 30.9 70.3 30.9ZM83.3 35V16.2H87.9L88.2 19.5H88.4C89.1 18.2 89.9 17.2 90.9 16.6 91.8 16 92.8 15.7 93.7 15.7 94.3 15.7 94.7 15.7 95 15.8 95.4 15.9 95.7 15.9 96 16.1L95.1 20.9C94.7 20.8 94.4 20.7 94.1 20.7 93.8 20.6 93.4 20.6 93 20.6 92.3 20.6 91.6 20.9 90.8 21.4 90 21.9 89.4 22.8 88.9 24.1V35H83.3ZM106.2 35.5C105 35.5 103.8 35.2 102.7 34.8 101.6 34.4 100.6 33.7 99.7 32.9 98.9 32 98.2 31 97.7 29.8 97.2 28.6 97 27.1 97 25.6 97 24 97.2 22.6 97.7 21.4 98.2 20.2 98.9 19.1 99.7 18.3 100.6 17.4 101.6 16.8 102.7 16.4 103.8 15.9 105 15.7 106.2 15.7 107.3 15.7 108.5 15.9 109.6 16.4 110.7 16.8 111.7 17.4 112.5 18.3 113.4 19.1 114 20.2 114.6 21.4 115.1 22.6 115.3 24 115.3 25.6 115.3 27.1 115.1 28.6 114.6 29.8 114 31 113.4 32 112.5 32.9 111.7 33.7 110.7 34.4 109.6 34.8 108.5 35.2 107.3 35.5 106.2 35.5ZM106.2 30.9C107.3 30.9 108.2 30.5 108.7 29.5 109.3 28.5 109.6 27.2 109.6 25.6 109.6 23.9 109.3 22.6 108.7 21.7 108.2 20.7 107.3 20.2 106.2 20.2 105 20.2 104.1 20.7 103.5 21.7 103 22.6 102.7 23.9 102.7 25.6 102.7 27.2 103 28.5 103.5 29.5 104.1 30.5 105 30.9 106.2 30.9ZM119.1 35V16.2H123.7L124.1 18.5H124.2C125 17.8 125.9 17.1 126.9 16.6 127.9 16 129 15.7 130.3 15.7 132.3 15.7 133.8 16.4 134.7 17.7 135.7 19.1 136.1 20.9 136.1 23.3V35H130.5V24C130.5 22.7 130.3 21.7 130 21.2 129.6 20.7 129 20.4 128.2 20.4 127.5 20.4 126.9 20.6 126.4 20.9 125.9 21.2 125.3 21.7 124.7 22.3V35H119.1ZM145.6 35.5C144.8 35.5 144 35.3 143.3 35 142.6 34.7 142 34.3 141.5 33.8 141 33.3 140.7 32.7 140.4 32 140.1 31.3 140 30.6 140 29.8 140 27.8 140.8 26.2 142.5 25.1 144.2 24 146.9 23.3 150.6 22.9 150.6 22 150.3 21.4 149.9 20.9 149.4 20.4 148.7 20.1 147.6 20.1 146.8 20.1 146 20.3 145.2 20.6 144.4 20.9 143.6 21.3 142.7 21.9L140.7 18.2C141.9 17.4 143.1 16.8 144.5 16.4 145.8 15.9 147.2 15.7 148.7 15.7 151.1 15.7 153 16.4 154.3 17.8 155.6 19.2 156.2 21.3 156.2 24.2V35H151.6L151.3 33.1H151.1C150.3 33.8 149.4 34.4 148.6 34.8 147.7 35.2 146.7 35.5 145.6 35.5ZM147.5 31.1C148.2 31.1 148.7 31 149.2 30.7 149.6 30.4 150.1 30 150.6 29.5V26.2C148.6 26.5 147.3 26.9 146.5 27.4 145.7 28 145.4 28.6 145.4 29.3 145.4 29.9 145.6 30.4 145.9 30.7 146.3 31 146.9 31.1 147.5 31.1ZM164.2 35.5C163.2 35.5 162.4 35.1 161.7 34.5 161.1 33.8 160.8 32.9 160.8 32 160.8 30.9 161.1 30.1 161.7 29.5 162.4 28.8 163.2 28.4 164.2 28.4 165.1 28.4 165.9 28.8 166.5 29.5 167.2 30.1 167.5 30.9 167.5 32 167.5 32.9 167.2 33.8 166.5 34.5 165.9 35.1 165.1 35.5 164.2 35.5ZM179 43C177.9 43 176.9 42.9 175.9 42.7 175 42.5 174.2 42.3 173.4 41.9 172.7 41.5 172.2 41 171.7 40.4 171.3 39.8 171.1 39.1 171.1 38.2 171.1 36.7 172 35.4 173.8 34.4V34.3C173.3 33.9 172.9 33.5 172.6 33 172.3 32.5 172.1 31.9 172.1 31.1 172.1 30.4 172.3 29.8 172.7 29.1 173.1 28.5 173.6 28 174.2 27.6V27.4C173.6 26.9 173 26.3 172.4 25.5 171.9 24.6 171.7 23.6 171.7 22.5 171.7 21.4 171.9 20.4 172.3 19.5 172.7 18.7 173.3 18 174 17.4 174.8 16.8 175.6 16.4 176.5 16.1 177.5 15.8 178.4 15.7 179.5 15.7 180.6 15.7 181.6 15.8 182.4 16.2H189.3V20.2H186.3C186.4 20.5 186.6 20.9 186.7 21.3 186.8 21.7 186.9 22.2 186.9 22.7 186.9 23.8 186.7 24.7 186.3 25.5 185.9 26.3 185.4 27 184.7 27.5 184 28 183.3 28.4 182.3 28.7 181.5 28.9 180.5 29 179.5 29 178.7 29 178 28.9 177.2 28.7 176.9 28.9 176.7 29.1 176.6 29.3 176.5 29.5 176.5 29.7 176.5 30.1 176.5 30.5 176.7 30.9 177.1 31.1 177.5 31.4 178.3 31.5 179.3 31.5H182.4C184.7 31.5 186.5 31.8 187.7 32.6 188.9 33.3 189.6 34.6 189.6 36.3 189.6 37.2 189.3 38.1 188.8 39 188.3 39.8 187.6 40.5 186.7 41.1 185.8 41.7 184.7 42.2 183.4 42.5 182.1 42.8 180.7 43 179 43ZM179.5 25.7C180.2 25.7 180.8 25.4 181.3 24.9 181.8 24.4 182 23.6 182 22.5 182 21.5 181.8 20.8 181.3 20.3 180.8 19.7 180.2 19.5 179.5 19.5 178.7 19.5 178.1 19.7 177.6 20.2 177.1 20.7 176.9 21.5 176.9 22.5 176.9 23.6 177.1 24.4 177.6 24.9 178.1 25.4 178.7 25.7 179.5 25.7ZM179.9 39.5C181.2 39.5 182.2 39.3 183 38.8 183.8 38.4 184.2 37.9 184.2 37.2 184.2 36.6 184 36.2 183.5 36 183 35.8 182.3 35.7 181.4 35.7H179.4C178.8 35.7 178.2 35.7 177.8 35.6 177.4 35.6 177.1 35.6 176.8 35.5 176.1 36.1 175.7 36.7 175.7 37.4 175.7 38.1 176.1 38.6 176.9 39 177.6 39.3 178.6 39.5 179.9 39.5ZM200 35.5C198.9 35.5 197.7 35.2 196.6 34.8 195.5 34.4 194.5 33.7 193.6 32.9 192.8 32 192.1 31 191.6 29.8 191.1 28.6 190.8 27.1 190.8 25.6 190.8 24 191.1 22.6 191.6 21.4 192.1 20.2 192.8 19.1 193.6 18.3 194.5 17.4 195.5 16.8 196.6 16.4 197.7 15.9 198.9 15.7 200 15.7 201.2 15.7 202.4 15.9 203.5 16.4 204.6 16.8 205.6 17.4 206.4 18.3 207.2 19.1 207.9 20.2 208.4 21.4 208.9 22.6 209.2 24 209.2 25.6 209.2 27.1 208.9 28.6 208.4 29.8 207.9 31 207.2 32 206.4 32.9 205.6 33.7 204.6 34.4 203.5 34.8 202.4 35.2 201.2 35.5 200 35.5ZM200 30.9C201.2 30.9 202 30.5 202.6 29.5 203.2 28.5 203.5 27.2 203.5 25.6 203.5 23.9 203.2 22.6 202.6 21.7 202 20.7 201.2 20.2 200 20.2 198.9 20.2 198 20.7 197.4 21.7 196.9 22.6 196.6 23.9 196.6 25.6 196.6 27.2 196.9 28.5 197.4 29.5 198 30.5 198.9 30.9 200 30.9ZM217.1 35L210.7 16.2H216.3L218.8 25C219 26 219.3 26.9 219.5 27.9 219.7 28.9 220 29.9 220.3 30.9H220.4C220.6 29.9 220.9 28.9 221.1 27.9 221.3 26.9 221.6 26 221.8 25L224.3 16.2H229.7L223.5 35H217.1ZM233.6 35.5C232.6 35.5 231.8 35.1 231.2 34.5 230.5 33.8 230.2 32.9 230.2 32 230.2 30.9 230.5 30.1 231.2 29.5 231.8 28.8 232.6 28.4 233.6 28.4 234.5 28.4 235.3 28.8 236 29.5 236.6 30.1 237 30.9 237 32 237 32.9 236.6 33.8 236 34.5 235.3 35.1 234.5 35.5 233.6 35.5ZM247.3 35.5C246.1 35.5 244.8 35.2 243.5 34.7 242.2 34.3 241 33.6 240.1 32.8L242.6 29.3C243.4 30 244.3 30.5 245.1 30.8 245.8 31.1 246.6 31.3 247.4 31.3 248.3 31.3 248.9 31.2 249.3 30.9 249.7 30.6 249.8 30.2 249.8 29.7 249.8 29.4 249.7 29.1 249.5 28.9 249.3 28.7 249 28.4 248.6 28.2 248.3 28 247.9 27.9 247.4 27.7 247 27.5 246.5 27.3 246 27.1 245.4 26.9 244.8 26.6 244.3 26.3 243.7 26 243.1 25.7 242.7 25.2 242.2 24.8 241.8 24.3 241.5 23.7 241.2 23.1 241 22.4 241 21.6 241 20.7 241.2 19.9 241.5 19.2 241.9 18.5 242.4 17.8 243 17.3 243.6 16.8 244.4 16.4 245.3 16.2 246.2 15.8 247.2 15.7 248.2 15.7 249.7 15.7 251 15.9 252 16.5 253.1 16.9 254.1 17.5 254.9 18.1L252.4 21.4C251.7 20.9 251 20.5 250.4 20.3 249.7 20 249.1 19.8 248.4 19.8 247 19.8 246.3 20.3 246.3 21.3 246.3 21.6 246.4 21.9 246.6 22.1 246.8 22.3 247 22.5 247.4 22.7 247.7 22.9 248.1 23 248.5 23.2 249 23.4 249.5 23.5 250 23.7 250.6 23.9 251.2 24.2 251.7 24.5 252.3 24.8 252.9 25.1 253.4 25.6 253.9 26 254.3 26.5 254.6 27.2 254.9 27.8 255 28.5 255 29.4 255 30.2 254.9 31 254.6 31.8 254.2 32.5 253.7 33.2 253.1 33.7 252.4 34.2 251.6 34.7 250.6 35 249.7 35.3 248.6 35.5 247.3 35.5ZM258.6 35V8.4H264V23.6H264.2L270.1 16.2H276.2L269.6 23.9 276.7 35H270.7L266.4 27.7 264 30.4V35H258.6Z"
                                            class="a"/>
                                </svg>
                </span>
            </a>
        </div>

        <div class="idsk-header__content">

            <div class="language-picker js-language-picker" data-trigger-class="btn btn--subtle js-tab-focus">
                <form action="" class="x-nua"><label for="language-picker-select">Select your language</label>
                    <select name="language-picker-select" id="language-picker-select">
                        <?php
                        $languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');
                        foreach($languages as $key => $value){
                            $active = null;
                            if($value['active'] == 1){
                                $active = 'selected=""';
                            }
                            echo '<option lang="'.$key.'" value="'.$value['native_name'].'" data-url="'.$value['url'].'" '.$active.'>'.$value['native_name'].'</option>';
                        }
                        ?>
                    </select>
                </form>
            </div>
        </div>
    </div>
</header>
<?php
    if( get_field( 'opatrenia', 'options' ) ) {
        $bcg = get_field( 'farba_opatrenia', 'options' );
        $text = get_field( 'text_opatreni', 'options' );
        $link_opatrenia = get_field( 'link_opatrenia', 'options' );
        $link_url = get_permalink( $link_opatrenia );
        $title_opatrenia = get_the_title( $link_opatrenia );
        $link_opatrenia_text = get_field( 'link_opatrenia_text', 'options' );
?>
        <div class="app-pane-<?php echo esc_attr( $bcg ) ?> govuk-!-padding-top-3">
            <div class="govuk-width-container">
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-full">
                        <p class="govuk-body">
                            <?php echo wp_kses( $text, [ 'strong' => [] ] ) . ' ' . '<a href="' . $link_url . '" class="govuk-link" title="' . esc_attr( $title_opatrenia ) . '">' . esc_html( $link_opatrenia_text ) . '</a>'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>
<?php
    if( get_field( 'version_display', 'options' ) ) {
?>
    <div class="govuk-width-container">
        <div class="govuk-phase-banner">
            <p class="govuk-phase-banner__content">
                <strong class="govuk-tag govuk-phase-banner__content__tag">
                    <?php echo esc_html( get_field( 'version_phase', 'options' ) ); ?>
                </strong>
                <span class="govuk-phase-banner__text">
                  <?php echo wp_kses( get_field( 'version_info', 'options' ), [ 'a' => [ 'target' => [], 'href' => [], 'class' => [], 'title' => [], 'aria-label' => [], 'id' => [], ] ] ) . esc_html( get_field( 'version_date', 'options' ) ); ?>
                </span>
            </p>
        </div>
    </div>
<?php }
    if ( !is_front_page() && function_exists('yoast_breadcrumb') ) {
        ?>
        <div class="govuk-width-container">
        <?php
        yoast_breadcrumb( '<div class="govuk-breadcrumbs"><ol class="govuk-breadcrumbs__list">','</ol></div>' );
        ?>
        </div>
        <?php
    }
    ?>
<main class="govuk-main-wrapper govuk-!-padding-top-6 govuk-!-padding-bottom-6 govuk-body" id="main-content" role="main">
