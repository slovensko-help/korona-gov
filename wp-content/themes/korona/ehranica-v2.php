<?php define('EHR2_ASSETS_VERSION', '2.0.1'); ?>
    <script>
        var RC_LANGUAGE = '<?php echo apply_filters('wpml_current_language', NULL); ?>';
        var RC_TRANSLATIONS = {
            'select-country': '<?php echo __('Vyberte krajinu zo zoznamu.', 'ehranica'); ?>',
            'county': '<?php echo __('okres', 'ehranica'); ?>',
            'municipality-not-found': '<?php echo __('Mesto/obec nie je v zozname. Vyberte mesto/obec zo zoznamu.', 'ehranica'); ?>',
            'country-not-found': '<?php echo __('Krajina nie je v zozname', 'ehranica'); ?>'
        };
    </script>

    <script src="/wp-content/themes/korona/assets/js/moment.min.js?v=<?php echo EHR2_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/moment-timezone-with-data.js?v=<?php echo EHR2_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/jquery-3.5.1.min.js?v=<?php echo EHR2_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/ehranica-v2.js?v=<?php echo EHR2_ASSETS_VERSION; ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeFQ7IZAAAAABuiRASOsOQv4HFxAhGhwQiljFM0"></script>

    <style>
        .uc-add-country {
            display: inline-block;
            margin-bottom: 15px;
        }

        .uc-remove-country {
            margin-bottom: 0;
            width: auto !important;
            position: absolute;
            right: 4px;
            top: 4px;
            bottom: 4px;
            border: none !important;
            box-shadow: none;
        }

        .uc-municipality-holder,
        .uc-country-holder {
            max-width: 41ex;
            position: relative;
        }

        .uc-form label strong {
            font-weight: 300;
        }

        .uc-form .govuk-error-message {
            margin-bottom: 5px;
        }

        .uc-form .autocomplete-error .autocomplete__hint,
        .uc-form .autocomplete-error .autocomplete__input {
            border-color: #df3034;
            border-width: 4px;
            box-shadow: none;
        }

        .uc-form .autocomplete-error .autocomplete__input--focused {
            border-color: #0b0c0c;
        }

        .autocomplete__input--focused {
            outline-color: #ffbf47;
        }

        .uc-form .autocomplete__dropdown-arrow-down {
            z-index: 1;
        }

        @media (max-width: 640px) {
            .autocomplete__hint, .autocomplete__input {
                font-size: 1rem;
                line-height: 1.25;
                height: 40px;
            }
        }
    </style>
<?php

//echo KoronaShortcodes::getSingleton()->safeCountriesJavascript();

?>
    <script>
        var RC_SAFE_COUNTRIES={};
    </script>

    <div id="rc-form-holder" class="govuk-grid-row">

        <div class="govuk-grid-column-full">
            <a class="govuk-back-link js-back-button" style="display: none;" href="#"><?php echo __('Späť', 'ehranica'); ?></a>

<!--            <div class="js-when-unsafe" style="display: none;">
                <h2>
                    <?php /*echo __('Boli ste v rizikovej krajine. Máte povinnosť sa zaregistrovať.', 'ehranica'); */?>
                </h2>
            </div>
-->
            <div class="js-when-safe" style="display: none;">
                <p class="govuk-body-lead">
                    <?php echo __('Zo zoznamu ste vybrali iba bezpečné krajiny. Pokiaľ nepociťujete príznaky (horúčka nad 38°C, kašeľ,
                    sťažené dýchanie, bolesť svalov, bolesť hlavy, únava, malátnosť, strata čuchu a chuti), môžete do
                    Slovenskej republiky cestovať bez obmedzení.', 'ehranica'); ?>

                </p>
                <p>
                    <?php echo __('Pokiaľ sa po príchode na Slovensko u Vás prejavia
                    akékoľvek príznaky, zostaňte doma a kontaktuje svojho všeobecného lekára alebo <a
                            href="https://korona.gov.sk/poziadat-o-vysetrenie-na-covid-19/">požiadajte o
                        vyšetrenie na COVID-19</a>. Pamätajte na
                    to, že zodpovedáte za správnosť vyplnených údajov a zamlčanie návštevy rizikových krajín môže
                    byť trestané pokutou. Ďakujeme za Vašu zodpovednosť.', 'ehranica'); ?>
                </p>

                <div>
                    <h2 class="govuk-heading-m">
                        <?php echo __('Ďalšie akcie', 'ehranica'); ?>
                    </h2>
                    <a href="." class="govuk-button"><?php echo __('Chcem registrovať ďalšiu osobu', 'ehranica'); ?></a>
                </div>
            </div>
        </div>

        <div class="govuk-grid-column-two-thirds">
            <form class="uc-form js-uc-form js-enabled" style="display: none;">
                <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group" aria-describedby="uc-country">
                    <div class="js-countries">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-country">
                                <?php echo __('Zadajte krajiny navštívené za posledných 14 dní', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <div class="uc-country-holder">
                                <label class="govuk-label" for="country-inner-uc-country">
                                    <strong><?php echo __('Z ktorej krajiny ste prišli?', 'ehranica'); ?></strong>
                                </label>
                                <div><span class="govuk-error-message" id="country-error-uc-country"
                                           style="display: none;"><?php echo __('Vyberte krajinu zo zoznamu.', 'ehranica'); ?></span>
                                </div>
                                <input type="hidden" name="country-arrival" id="country-input-uc-country">
                                <div id="country-field-uc-country"></div>
                            </div>
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-1 js-other-countries-label"
                             style="display: none;">
                            <label class="govuk-label">
                                <strong><?php echo __('Ktoré ďalšie krajiny ste navštívili za posledných 14 dní?', 'ehranica'); ?></strong>
                            </label>
                        </div>

                        <a href="#" class="js-uc-add-country uc-add-country govuk-link">
                            <?php echo __('Pridať ďalšiu navštívenú krajinu', 'ehranica'); ?></a>
                    </div>

                    <div class="govuk-form-group js-when-unsafe" style="display: none;">
                        <label class="govuk-label" for="uc-arrival-date-day">
                            <strong><?php echo __('Dátum príchodu na Slovensko', 'ehranica'); ?></strong>
                        </label>
                        <span class="govuk-hint">
                          <?php echo __('Mesiac zadávajte ako číslo od 1 do 12.', 'ehranica'); ?>
                        </span>
                        <span id="uc-arrival-date-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte správny deň a mesiac príchodu.', 'ehranica'); ?>
                            </span>
                        <div class="govuk-date-input" id="uc-arrival-date">
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label" for="uc-arrival-date-day">
                                        <?php echo __('Deň', 'ehranica'); ?>
                                    </label>
                                    <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                           id="uc-arrival-date-day"
                                           name="arrival-day" type="text" autocomplete="aday-day" pattern="[0-9]*"
                                           inputmode="numeric">
                                </div>
                            </div>
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label" for="uc-arrival-date-month">
                                        <?php echo __('Mesiac', 'ehranica'); ?>
                                    </label>
                                    <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                           id="uc-arrival-date-month"
                                           name="arrival-month" type="text" autocomplete="aday-month" pattern="[0-9]*"
                                           inputmode="numeric">
                                </div>
                            </div>
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label">
                                        <?php echo __('Rok', 'ehranica'); ?>
                                    </label>

                                    <input class="govuk-input govuk-date-input__input govuk-input--width-4"
                                           id="uc-arrival-date-year"
                                           name="arrival-year" type="text" autocomplete="aday-year" pattern="[0-9]*"
                                           inputmode="numeric">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <div class="js-when-unsafe" style="display: none;">
                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-personal-data">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-personal-data">
                                <?php echo __('Osobné údaje', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-first-name-1">
                                <strong><?php echo __('Meno', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-first-name-1-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte meno.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-first-name-1" name="first-name-1"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-last-name-1">
                                <strong><?php echo __('Priezvisko', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-last-name-1-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte priezvisko.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-last-name-1" name="last-name-1"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-1">
                            <label class="govuk-label">
                                <strong><?php echo __('Identifikačné číslo', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-id-1-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte správne rodné číslo, BIČ alebo ID pridelené inou krajinou.', 'ehranica'); ?>
                            </span>
                            <div class="govuk-radios govuk-radios--conditional" data-module="govuk-radios">
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-id-type-1-slovak" name="id-type-1"
                                           type="radio" value="slovak" data-aria-controls="id-type-conditional-slovak-1"
                                           checked>
                                    <label class="govuk-label govuk-radios__label" for="uc-id-type-1-slovak">
                                        <?php echo __('Slovenské rodné číslo alebo BIČ', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__conditional govuk-radios__conditional--hidden"
                                     id="id-type-conditional-slovak-1">
                                    <input class="govuk-input govuk-!-width-one-third" name="id-slovak-1" type="text"
                                           id="uc-id-slovak-1">
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-id-type-1-foreign" name="id-type-1"
                                           type="radio" value="foreign"
                                           data-aria-controls="id-type-conditional-foreign-1">
                                    <label class="govuk-label govuk-radios__label" for="uc-id-type-1-foreign">
                                        <?php echo __('ID pridelené inou krajinou', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__conditional govuk-radios__conditional--hidden"
                                     id="id-type-conditional-foreign-1">
                            <span class="govuk-hint govuk-radios__hint" style="padding-left: 0;">
                                <?php echo __('Vyplňte iba ak nemáte slovenské rodné číslo alebo BIČ.', 'ehranica'); ?>
                              </span>
                                    <input class="govuk-input govuk-!-width-one-third" name="id-foreign-1" type="text"
                                           id="uc-id-foreign-1">
                                </div>
                            </div>
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-dob-day-1">
                                <strong><?php echo __('Dátum narodenia', 'ehranica'); ?></strong>
                            </label>
                            <span class="govuk-hint">
                                <?php echo __('Mesiac zadávajte ako číslo od 1 do 12.', 'ehranica'); ?>
                            </span>
                            <span id="uc-dob-1-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte správny deň, mesiac a rok narodenia.', 'ehranica'); ?>
                            </span>
                            <div class="govuk-date-input" id="uc-dob-1">
                                <div class="govuk-date-input__item">
                                    <div class="govuk-form-group">
                                        <label class="govuk-label govuk-date-input__label" for="uc-dob-day-1">
                                            <?php echo __('Deň', 'ehranica'); ?>
                                        </label>
                                        <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                               id="uc-dob-day-1"
                                               name="dob-day-1" type="text" autocomplete="off" pattern="[0-9]*"
                                               inputmode="numeric">
                                    </div>
                                </div>
                                <div class="govuk-date-input__item">
                                    <div class="govuk-form-group">
                                        <label class="govuk-label govuk-date-input__label" for="uc-dob-month-1">
                                            <?php echo __('Mesiac', 'ehranica'); ?>
                                        </label>
                                        <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                               id="uc-dob-month-1"
                                               name="dob-month-1" type="text" autocomplete="off" pattern="[0-9]*"
                                               inputmode="numeric">
                                    </div>
                                </div>
                                <div class="govuk-date-input__item">
                                    <div class="govuk-form-group">
                                        <label class="govuk-label govuk-date-input__label" for="uc-dob-year-1">
                                            <?php echo __('Rok', 'ehranica'); ?>
                                        </label>
                                        <input class="govuk-input govuk-date-input__input govuk-input--width-4"
                                               id="uc-dob-year-1"
                                               name="dob-year-1" type="text" autocomplete="off" pattern="[0-9]*"
                                               inputmode="numeric">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label">
                                <strong><?php echo __('Zdravotná poisťovňa', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-insurance-1-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zvoľte spôsob poistenia.', 'ehranica'); ?>
                            </span>
                            <div class="govuk-radios">
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-vseobecna" name="insurance-1"
                                           type="radio"
                                           value="25">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-vseobecna">
                                        <?php echo __('Všeobecná zdravotná poisťovňa', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-dovera" name="insurance-1"
                                           type="radio"
                                           value="24">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-dovera">
                                        <?php echo __('Dôvera zdravotná poisťovňa', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-union" name="insurance-1"
                                           type="radio"
                                           value="27">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-union">
                                        <?php echo __('Union zdravotná poisťovňa', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-eu" name="insurance-1"
                                           type="radio"
                                           value="98">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-eu">
                                        <?php echo __('Poistenie v inej krajine EÚ', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-none" name="insurance-1"
                                           type="radio"
                                           value="99">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-none">
                                        <?php echo __('Bez poistenia v EÚ', 'ehranica'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group" aria-describedby="uc-contact">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-contact">
                                <?php echo __('Kontaktné údaje', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-email">
                                <strong><?php echo __('Emailová adresa', 'ehranica'); ?></strong>
                            </label>
                            <span class="govuk-hint">
                              <?php echo __('Zadajte email, na ktorý Vám odošleme potvrdenie o registrácii. Potvrdením sa preukážete na hraniciach pri príchode na Slovensko.', 'ehranica'); ?>
                            </span>
                            <span id="uc-email-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte správnu emailovú adresu.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-email" name="email" type="email">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-phone">
                                <strong><?php echo __('Telefónne číslo (s ktorým ste pricestovali zo zahraničia)', 'ehranica'); ?></strong>
                                <span class="govuk-hint">
                                    <?php echo __('Zadajte aj s medzinárodnou predvoľbou, napríklad +421 pre slovenské čísla.', 'ehranica'); ?>
                                  </span>
                            </label><span id="uc-phone-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte správne telefónne číslo. Musí začínať medzinárodnou predvoľbou + alebo 00.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-phone" name="phone" type="text">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-phone-verify">
                                <strong><?php echo __('Zadajte telefónne číslo ešte raz', 'ehranica'); ?></strong>
                                <span class="govuk-hint">
                                    <?php echo __('Pozorne si skontrolujte, či ste vo Vašom telefónnom čísle omylom nezamenili niektorú číslicu.', 'ehranica'); ?>
                                  </span>
                            </label><span id="uc-phone-verify-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadané telefónne číslo nie je rovnaké ako v&nbsp;predchádzajúcom políčku.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-phone-verify" name="phone-verify" type="text">
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-isolation-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                <?php echo __('Adresa absolvovania domácej izolácie', 'ehranica'); ?>
                            </h2>
                        </legend>
                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <div class="uc-municipality-holder">
                                <label class="govuk-label" for="municipality-inner-uc-isolation-municipality">
                                    <strong><?php echo __('Mesto/obec', 'ehranica'); ?></strong>
                                </label>
                                <div><span class="govuk-error-message" id="municipality-error-uc-isolation-municipality"
                                           style="display: none;"><?php echo __('Vyberte mesto/obec zo zoznamu.', 'ehranica'); ?></span></div>
                                <input type="hidden" name="isolation-municipality"
                                       id="municipality-input-uc-isolation-municipality">
                                <input type="hidden" name="isolation-county"
                                       id="county-input-uc-isolation-municipality">
                                <div id="municipality-field-uc-isolation-municipality"></div>
                            </div>
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-isolation-street">
                                <strong><?php echo __('Ulica', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-isolation-street-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte ulicu.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-street"
                                   name="isolation-street"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-isolation-house-number">
                                <strong><?php echo __('Orientačné číslo (číslo domu)', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-isolation-house-number-error" class="govuk-error-message"
                                  style="display: none;">
                              <?php echo __('Zadajte číslo domu.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-house-number"
                                   name="isolation-house-number" type="text">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-isolation-zip">
                                <strong><?php echo __('PSČ', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-isolation-zip-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte PSČ.', 'ehranica'); ?>
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-zip" name="isolation-zip"
                                   type="text">
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset" role="group" aria-describedby="uc-permanent-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-permanent-address">
                                <?php echo __('Adresa trvalého bydliska', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <div class="govuk-form-group">
                            <div class="govuk-radios">
                                <div class="govuk-radios__item">
                                    <input class="js-uc-permanent-type govuk-radios__input"
                                           id="uc-permanent-same-as-isolation" name="permanent-address"
                                           type="radio"
                                           value="same-as-isolation" checked>
                                    <label class="govuk-label govuk-radios__label" for="uc-permanent-same-as-isolation">
                                        <?php echo __('Rovnaká ako adresa domácej izolácie', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="js-uc-permanent-type govuk-radios__input"
                                           id="uc-permanent-other-than-isolation" name="permanent-address" type="radio"
                                           value="other-than-isolation">
                                    <label class="govuk-label govuk-radios__label" for="uc-permanent-other-than-isolation">
                                        <?php echo __('Iná ako adresa domácej izolácie', 'ehranica'); ?>
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="js-uc-permanent-type govuk-radios__input" id="uc-permanent-none"
                                           name="permanent-address" type="radio"
                                           value="none">
                                    <label class="govuk-label govuk-radios__label" for="uc-permanent-none">
                                        <?php echo __('Bez trvalého bydliska na Slovensku', 'ehranica'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="js-uc-permanent-fields" style="display: none;">
                            <div class="govuk-form-group govuk-!-margin-bottom-3">
                                <div class="uc-municipality-holder">
                                    <label class="govuk-label" for="municipality-inner-uc-permanent-municipality">
                                        <strong><?php echo __('Mesto/obec', 'ehranica'); ?></strong>
                                    </label>

                                    <div><span class="govuk-error-message" id="municipality-error-uc-permanent-municipality"
                                               style="display: none;"><?php echo __('Vyberte mesto/obec zo zoznamu.', 'ehranica'); ?></span></div>
                                    <input type="hidden" name="permanent-municipality" id="municipality-input-uc-permanent-municipality">
                                    <input type="hidden" name="permanent-county" id="county-input-uc-permanent-municipality">
                                    <div id="municipality-field-uc-permanent-municipality"></div>
                                </div>
                            </div>

                            <div class="govuk-form-group govuk-!-margin-bottom-3">
                                <label class="govuk-label" for="uc-permanent-street">
                                    <strong><?php echo __('Ulica', 'ehranica'); ?></strong>
                                </label>
                                <span id="uc-permanent-street-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte ulicu.', 'ehranica'); ?>
                            </span>
                                <input class="govuk-input govuk-input--width-20" id="uc-permanent-street"
                                       name="permanent-street" type="text">
                            </div>

                            <div class="govuk-form-group govuk-!-margin-bottom-3">
                                <label class="govuk-label" for="uc-permanent-house-number">
                                    <strong><?php echo __('Orientačné číslo (číslo domu)', 'ehranica'); ?></strong>
                                </label>
                                <span id="uc-permanent-house-number-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte číslo domu.', 'ehranica'); ?>
                            </span>
                                <input class="govuk-input govuk-input--width-20" id="uc-permanent-house-number"
                                       name="permanent-house-number" type="text">
                            </div>

                            <div class="govuk-form-group">
                                <label class="govuk-label" for="uc-permanent-zip">
                                    <strong><?php echo __('PSČ', 'ehranica'); ?></strong>
                                </label>
                                <span id="uc-permanent-zip-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte PSČ.', 'ehranica'); ?>
                            </span>
                                <input class="govuk-input govuk-input--width-20" id="uc-permanent-zip" name="permanent-zip"
                                       type="text">
                            </div>
                        </div>
                    </fieldset>


                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-isolation-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                <?php echo __('Výnimka z povinnej karantény', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <p style="margin-top: 0;" class="govuk-body govuk-hint">
                            <?php echo __('O výnimku môžete požiadať, ak disponujete negatívnym AG testom nie starším ako 48 hodín, respektíve PCR testom nie starším ako 72 hodín a spĺňate jednu z nasledovných podmienok.', 'ehranica'); ?>
                        </p>

                        <div class="govuk-form-group">
                            <label class="govuk-label">
                                <strong><?php echo __('Ktorú podmienku na výnimku spĺňate?', 'ehranica'); ?></strong>
                            </label>
                            <div class="govuk-form-group">
                                <div class="govuk-radios">
                                    <div class="govuk-radios__item">
                                        <input class="js-uc-exception govuk-radios__input" id="uc-exception-none" name="exception"
                                               type="radio" value="none" checked>
                                        <label class="govuk-label govuk-radios__label" for="uc-exception-none">
                                            <?php echo __('Nespĺňam žiadnu z nižšie uvedených podmienok na výnimku.', 'ehranica'); ?>
                                        </label>
                                    </div>
                                    <div class="govuk-radios__item">
                                        <input class="js-uc-exception govuk-radios__input" id="uc-exception-foreign-permanent-address" name="exception"
                                               type="radio" value="foreign-permanent-address">
                                        <label class="govuk-label govuk-radios__label" for="uc-exception-foreign-permanent-address">
                                            <?php echo __('Mám doklad o trvalom alebo prechodnom pobyte v zahraničí.', 'ehranica'); ?>
                                        </label>
                                    </div>
                                    <div class="govuk-radios__item">
                                        <input class="js-uc-exception govuk-radios__input" id="uc-exception-work-abroad" name="exception"
                                               type="radio" value="work-abroad">
                                        <label class="govuk-label govuk-radios__label" for="uc-exception-work-abroad">
                                            <?php echo __('Mám doklad o výkone zamestnania alebo iného obdobného pracovného vzťahu v zahraničí.', 'ehranica'); ?>
                                        </label>
                                    </div>
                                    <div class="govuk-radios__item">
                                        <input class="js-uc-exception govuk-radios__input" id="uc-exception-vaccinated" name="exception"
                                               type="radio" value="vaccinated">
                                        <label class="govuk-label govuk-radios__label" for="uc-exception-vaccinated">
                                            <?php echo __('Mám doklad o zaočkovaní proti ochoreníu Covid 19 starší ako 14 dní po zaočkovaní druhou dávkou.', 'ehranica'); ?>
                                        </label>
                                    </div>
                                    <div class="govuk-radios__item">
                                        <input class="js-uc-exception govuk-radios__input" id="uc-exception-had-covid" name="exception"
                                               type="radio" value="had-covid">
                                        <label class="govuk-label govuk-radios__label" for="uc-exception-had-covid">
                                            <?php echo __('Mám doklad o prekonaní ochorenia Covid 19 pred nie viac ako 90 dňami.', 'ehranica'); ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="js-uc-foreign-permanent-address-fields govuk-form-group govuk-!-margin-bottom-1" style="display: none;">
                            <label class="govuk-label" for="uc-foreign-permanent-address">
                                <strong><?php echo __('Adresa trvalého alebo prechodného pobytu v zahraničí', 'ehranica'); ?></strong>
                            </label>
                            <span id="uc-foreign-permanent-address-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Zadajte adresu trvalého alebo prechodného pobytu v zahraničí.', 'ehranica'); ?>
                            </span>
                            <textarea class="govuk-textarea" id="uc-foreign-permanent-address" name="foreign-permanent-address" rows="3"></textarea>
                        </div>

                        <div class="js-uc-work-abroad-fields" style="display: none;">
                            <div class="govuk-form-group govuk-!-margin-bottom-3">
                                <label class="govuk-label" for="uc-work-abroad-company-name">
                                    <strong><?php echo __('Názov firmy v zahraničí', 'ehranica'); ?></strong>
                                </label>
                                <span id="uc-work-abroad-company-name-error" class="govuk-error-message" style="display: none;">
                                  <?php echo __('Zadajte názov firmy v zahraničí.', 'ehranica'); ?>
                                </span>
                                <input class="govuk-input" id="uc-work-abroad-company-name"
                                       name="work-abroad-company-name" type="text">
                            </div>

                            <div class="govuk-form-group govuk-!-margin-bottom-1">
                                <label class="govuk-label" for="uc-work-abroad-address">
                                    <strong><?php echo __('Adresa firmy v zahraničí', 'ehranica'); ?></strong>
                                </label>
                                <span id="uc-work-abroad-address-error" class="govuk-error-message" style="display: none;">
                                  <?php echo __('Zadajte adresu firmy v zahraničí.', 'ehranica'); ?>
                                </span>
                                <textarea class="govuk-textarea" id="uc-work-abroad-address" name="work-abroad-address" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="js-uc-have-exception govuk-inset-text" style="display: none;">
                            <div class="govuk-warning-text govuk-!-margin-bottom-3">
                                <span class="govuk-warning-text__icon" aria-hidden="true">!</span>
                                <strong class="govuk-warning-text__text">
                                    <span class="govuk-warning-text__assistive"><?php echo __('Upozornenie', 'ehranica'); ?></span>
                                    <?php echo __('Hore uvedený doklad spolu s negatívnym testom môže byť kontrolovaný pri prechode cez štátnu hranicu.', 'ehranica'); ?>
                                </strong>
                            </div>
                            <p class="govuk-body govuk-!-margin-top-3">
                                <?php echo __('Povinú karanténu budete môcť opustiť hneď po obdržaní negatívneho PCR testu, ktorý si musíte zaobstarať na vlastné náklady na území Slovenskej republiky.', 'ehranica'); ?>
                            </p>
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-isolation-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                <?php echo __('Dodatočné údaje', 'ehranica'); ?>
                            </h2>
                        </legend>

                        <p style="margin-top: 0;" class="govuk-body govuk-hint">
                            <?php echo __('V prípade pozitívneho testu, v záujme ochrany Vás a Vašich blízkych, budú od&nbsp;Vás
                            hygienici vyžadovať dodatočné informácie. Pomôžete nám, ak ich dobrovoľne zadáte už teraz.', 'ehranica'); ?>
                        </p>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-household-members-count">
                                <strong>
                                    <?php echo __('Počet osôb žijúcich alebo zdržiavajúcich sa v mieste izolácie', 'ehranica'); ?>
                                </strong>
                            </label>
                            <input class="govuk-input govuk-input--width-20" id="uc-household-members-count"
                                   name="household-members-count" type="text" maxlength="2">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-gp">
                                <strong><?php echo __('Meno a priezvisko všeobecného lekára', 'ehranica'); ?></strong>
                            </label>
                            <input class="govuk-input govuk-input--width-20" id="uc-gp" name="gp"
                                   type="text">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-gp">
                                <strong><?php echo __('Poznámka', 'ehranica'); ?></strong>
                            </label>
                            <span class="govuk-hint">
                          <?php echo __('Do poznámky môžete uviesť upresňujúce informácie.', 'ehranica'); ?>
                        </span>
                            <textarea class="govuk-textarea" id="uc-note" name="note"></textarea>
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset" role="group">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                <?php echo __('Potvrdenia', 'ehranica'); ?>
                            </h2>
                        </legend>
                        <div class="govuk-form-group">
                          <span id="uc-tos-error" class="govuk-error-message" style="display: none;">
                          <?php echo __('Prosím, akceptujte súhlas so spracovaním osobných údajov.', 'ehranica'); ?>
                          </span>
                            <div class="govuk-checkboxes">
                                <div class="govuk-checkboxes__item">
                                    <input class="govuk-checkboxes__input" id="uc-tos" name="tos" type="checkbox"
                                           value="yes" aria-describedby="uc-tos-error">
                                    <label class="govuk-label govuk-checkboxes__label" for="uc-tos">
                                        <?php echo __('Oboznámil(a) som sa s Poučením o ochrane osobných údajov', 'ehranica'); ?>
                                    </label>
                                    <span class="govuk-hint govuk-checkboxes__hint">
                                        <?php echo __('<a href="/poucenie-o-ochrane-osobnych-udajov/" target="_blank">Poučenie o ochrane osobných údajov</a>', 'ehranica'); ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="govuk-form-group">
                          <span id="uc-confirm-error" class="govuk-error-message" style="display: none;">
                              <?php echo __('Prosím, potvrďte správnosť zadaných údajov.', 'ehranica'); ?>
                          </span>
                            <div class="govuk-checkboxes">
                                <div class="govuk-checkboxes__item">
                                    <input class="govuk-checkboxes__input" id="uc-confirm" name="confirm"
                                           type="checkbox" value="yes" aria-describedby="uc-confirm-error">
                                    <label class="govuk-label govuk-checkboxes__label" for="uc-confirm">
                                        <?php echo __('Potvrdzujem a prehlasujem, že všetky uvedené údaje sú pravdivé', 'ehranica'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <button class="govuk-button js-uc-submit govuk-button--start" type="submit"
                        data-step-2="<?php echo __('Odoslať registráciu', 'ehranica'); ?>" data-step-1="<?php echo __('Pokračovať', 'ehranica'); ?>"><span><?php echo __('Pokračovať', 'ehranica'); ?></span>
                    <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                         viewBox="0 0 33 40" role="presentation" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"></path>
                    </svg>
                </button>

                <p style="margin-top: 0;" class="govuk-body">
                    <?php echo __('V prípade otázok zavolajte na číslo <a href="tel:+421232353030" style="display: inline-block;">+421 2 32 35 30 30</a>.', 'ehranica'); ?>
                </p>
            </form>
        </div>

        <div class="govuk-grid-column-full">
            <div style="display: none;" id="uc-loading">
                <h1 class="govuk-heading-l">
                    <?php echo __('Registrácia sa odosiela', 'ehranica'); ?>
                </h1>

                <p>
                    <?php echo __('Prosím, čakajte na výsledok registrácie.', 'ehranica'); ?>
                </p>
            </div>

            <div style="display: none;" id="uc-error">
                <h1 class="govuk-heading-l">
                    <?php echo __('Pri registrácii nastala chyba', 'ehranica'); ?>
                </h1>

                <p id="uc-slovak-id-registered" style="display: none;" class="govuk-body">
                    <?php echo __('Nie je možné vám vytvoriť novú požiadavku o vyšetrenie na COVID-19. Prosím kontaktujte Call centrum na telefónnom čísle: <a href="tel:+421232353030" style="display: inline-block;">+421 2 32 35 30 30</a>. Ďakujeme, že ste zodpovedný.', 'ehranica'); ?>
                </p>

                <p id="uc-foreign-id-registered" style="display: none;" class="govuk-body">
                    <?php echo __('Nie je možné vám vytvoriť novú požiadavku o vyšetrenie na COVID-19. Prosím kontaktujte Call centrum na telefónnom čísle: <a href="tel:+421232353030" style="display: inline-block;">+421 2 32 35 30 30</a>. Ďakujeme, že ste zodpovedný.', 'ehranica'); ?>
                </p>

                <p id="uc-foreign-id-registered" class="govuk-body">
                    <strong>
                    <?php echo __('Ak ste už v minulosti dostali pridelený COVID-19-PASS, tak skúste <a href="https://www.old.korona.gov.sk/covid-19-validate-patient.php" target="_blank">zmeniť svoje údaje v systéme NCZI</a> a potom sa skúste znovu zaregistrovať cez tento formulár.', 'ehranica'); ?>
                    </strong>
                </p>

                <div>
                    <h2 class="govuk-heading-m">
                        <?php echo __('Ďalšie akcie', 'ehranica'); ?>
                    </h2>
                    <a href="." class="govuk-button"><?php echo __('Chcem registrovať ďalšiu osobu', 'ehranica'); ?></a>
                </div>
            </div>

            <div style="display: none;" id="uc-thank-you">
                <div class="govuk-panel govuk-panel--confirmation">
                    <h1 class="govuk-panel__title">
                        <?php echo __('Registrácia dokončená', 'ehranica'); ?>
                    </h1>
                    <div class="govuk-panel__body">
                        <?php echo __('Ďalšie inštrukcie Vám prídu v najbližších dňoch v&nbsp;SMS&nbsp;správe alebo emailom.', 'ehranica'); ?>
                    </div>
                </div>

                <div>
                    <h2 class="govuk-heading-m">
                        <?php echo __('Ďalšie akcie', 'ehranica'); ?>
                    </h2>
                    <a href="." class="govuk-button"><?php echo __('Chcem registrovať ďalšiu osobu', 'ehranica'); ?></a>
                </div>
            </div>
        </div>
    </div>

    <!-- I Am Part of the Resistance Inside the Klingon Administration -->
