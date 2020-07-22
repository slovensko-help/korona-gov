<?php define('RC_ASSETS_VERSION', '1.0.10'); ?>

    <script src="/wp-content/themes/korona/assets/js/moment.min.js?v=<?php echo RC_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/moment-timezone-with-data.js?v=<?php echo RC_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/jquery-3.5.1.min.js?v=<?php echo RC_ASSETS_VERSION; ?>"></script>
    <script src="/wp-content/themes/korona/assets/js/registration-from-unsafe-country.js?v=<?php echo RC_ASSETS_VERSION; ?>"></script>
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

echo KoronaShortcodes::getSingleton()->safeCountriesJavascript();

?>
    <div id="rc-form-holder" class="govuk-grid-row">

        <div class="govuk-grid-column-full">
            <a class="govuk-back-link js-back-button" style="display: none;">Späť</a>

            <div class="js-when-unsafe" style="display: none;">
                <h2>
                    Boli ste v rizikovej krajine. Máte povinnosť sa zaregistrovať.
                </h2>
            </div>

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
                        Ďalšie akcie
                    </h2>
                    <a href="." class="govuk-button">Chcem registrovať ďalšiu osobu</a>
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
                                <strong>Ktoré ďalšie krajiny ste navštívili za posledných 14 dní?</strong>
                            </label>
                        </div>

                        <a href="#" class="js-uc-add-country uc-add-country govuk-link">Pridať ďalšiu navštívenú
                            krajinu</a>
                    </div>

                    <div class="govuk-form-group js-when-unsafe" style="display: none;">
                        <label class="govuk-label" for="uc-arrival-date-day">
                            <strong>Dátum príchodu na Slovensko</strong>
                        </label>
                        <span class="govuk-hint">
                      Mesiac zadávajte ako číslo od 1 do 12.
                    </span>
                        <span id="uc-arrival-date-error" class="govuk-error-message" style="display: none;">
                              Zadajte správny deň a mesiac príchodu.
                            </span>
                        <div class="govuk-date-input" id="uc-arrival-date">
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label" for="uc-arrival-date-day">
                                        Deň
                                    </label>
                                    <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                           id="uc-arrival-date-day"
                                           name="arrival-day" type="text" autocomplete="bday-day" pattern="[0-9]*"
                                           inputmode="numeric">
                                </div>
                            </div>
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label" for="uc-arrival-date-month">
                                        Mesiac
                                    </label>
                                    <input class="govuk-input govuk-date-input__input govuk-input--width-2"
                                           id="uc-arrival-date-month"
                                           name="arrival-month" type="text" autocomplete="bday-month" pattern="[0-9]*"
                                           inputmode="numeric">
                                </div>
                            </div>
                            <div class="govuk-date-input__item">
                                <div class="govuk-form-group">
                                    <label class="govuk-label govuk-date-input__label">
                                        Rok
                                    </label>

                                    <input type="hidden" name="arrival-year" value="2020">
                                    <input class="govuk-input govuk-date-input__input govuk-input--width-4"
                                           type="text" autocomplete="off"
                                           inputmode="numeric" disabled value="2020"
                                           style="opacity: 0.7; width: 100px; border-color: #dcdcdc;">
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
                                Osobné údaje
                            </h2>
                        </legend>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-first-name-1">
                                <strong>Meno</strong>
                            </label>
                            <span id="uc-first-name-1-error" class="govuk-error-message" style="display: none;">
                              Zadajte meno.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-first-name-1" name="first-name-1"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-last-name-1">
                                <strong>Priezvisko</strong>
                            </label>
                            <span id="uc-last-name-1-error" class="govuk-error-message" style="display: none;">
                              Zadajte priezvisko.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-last-name-1" name="last-name-1"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-1">
                            <label class="govuk-label">
                                <strong>Identifikačné číslo</strong>
                            </label>
                            <span id="uc-id-1-error" class="govuk-error-message" style="display: none;">
                              Zadajte správne rodné číslo, BIČ alebo ID pridelené inou krajinou.
                            </span>
                            <div class="govuk-radios govuk-radios--conditional" data-module="govuk-radios">
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-id-type-1-slovak" name="id-type-1"
                                           type="radio" value="slovak" data-aria-controls="id-type-conditional-slovak-1"
                                           checked>
                                    <label class="govuk-label govuk-radios__label" for="uc-id-type-1-slovak">
                                        Slovenské rodné číslo alebo BIČ
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
                                        ID pridelené inou krajinou
                                    </label>
                                </div>
                                <div class="govuk-radios__conditional govuk-radios__conditional--hidden"
                                     id="id-type-conditional-foreign-1">
                            <span class="govuk-hint govuk-radios__hint" style="padding-left: 0;">
                                Vyplňte iba ak nemáte slovenské rodné číslo alebo BIČ.
                              </span>
                                    <input class="govuk-input govuk-!-width-one-third" name="id-foreign-1" type="text"
                                           id="uc-id-foreign-1">
                                </div>
                            </div>
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-dob-day-1">
                                <strong>Dátum narodenia</strong>
                            </label>
                            <span class="govuk-hint">
                      Mesiac zadávajte ako číslo od 1 do 12.
                    </span>
                            <span id="uc-dob-1-error" class="govuk-error-message" style="display: none;">
                              Zadajte správny deň, mesiac a rok narodenia.
                            </span>
                            <div class="govuk-date-input" id="uc-dob-1">
                                <div class="govuk-date-input__item">
                                    <div class="govuk-form-group">
                                        <label class="govuk-label govuk-date-input__label" for="uc-dob-day-1">
                                            Deň
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
                                            Mesiac
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
                                            Rok
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
                                <strong>Zdravotná poisťovňa</strong>
                            </label>
                            <span id="uc-insurance-1-error" class="govuk-error-message" style="display: none;">
                              Zvoľte spôsob poistenia
                            </span>
                            <div class="govuk-radios">
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-vseobecna" name="insurance-1"
                                           type="radio"
                                           value="25">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-vseobecna">
                                        Všeobecná zdravotná poisťovňa
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-dovera" name="insurance-1"
                                           type="radio"
                                           value="24">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-dovera">
                                        Dôvera zdravotná poisťovňa
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-union" name="insurance-1"
                                           type="radio"
                                           value="27">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-union">
                                        Union zdravotná poisťovňa
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-eu" name="insurance-1"
                                           type="radio"
                                           value="98">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-eu">
                                        Poistenie v inej krajine EÚ
                                    </label>
                                </div>
                                <div class="govuk-radios__item">
                                    <input class="govuk-radios__input" id="uc-insurance-1-none" name="insurance-1"
                                           type="radio"
                                           value="99">
                                    <label class="govuk-label govuk-radios__label" for="uc-insurance-1-none">
                                        Bez poistenia v EÚ
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group" aria-describedby="uc-contact">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-contact">
                                Kontaktné údaje
                            </h2>
                        </legend>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-email">
                                <strong>Emailová adresa</strong>
                            </label>
                            <span id="uc-email-error" class="govuk-error-message" style="display: none;">
                              Zadajte správnu emailovú adresu.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-email" name="email" type="email">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-phone">
                                <strong>Telefónne číslo</strong>
                                <span class="govuk-hint">
                        Zadajte aj s medzinárodnou predvoľbou, napríklad +421 pre slovenské čísla.
                      </span>
                            </label><span id="uc-phone-error" class="govuk-error-message" style="display: none;">
                              Zadajte správne telefónne číslo. Musí začínať medzinárodnou predvoľbou + alebo 00.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-phone" name="phone" type="text">
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-isolation-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                Adresa absolvovania domácej izolácie
                            </h2>
                        </legend>
                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <div class="uc-municipality-holder">
                                <label class="govuk-label" for="municipality-inner-uc-isolation-municipality">
                                    <strong>Mesto/obec</strong>
                                </label>
                                <div><span class="govuk-error-message" id="municipality-error-uc-isolation-municipality"
                                           style="display: none;">Vyberte mesto/obec zo zoznamu.</span></div>
                                <input type="hidden" name="isolation-municipality"
                                       id="municipality-input-uc-isolation-municipality">
                                <input type="hidden" name="isolation-county"
                                       id="county-input-uc-isolation-municipality">
                                <div id="municipality-field-uc-isolation-municipality"></div>
                            </div>
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-isolation-street">
                                <strong>Ulica</strong>
                            </label>
                            <span id="uc-isolation-street-error" class="govuk-error-message" style="display: none;">
                              Zadajte ulicu.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-street"
                                   name="isolation-street"
                                   type="text">
                        </div>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-isolation-house-number">
                                <strong>Orientačné číslo (číslo domu)</strong>
                            </label>
                            <span id="uc-isolation-house-number-error" class="govuk-error-message"
                                  style="display: none;">
                              Zadajte číslo domu.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-house-number"
                                   name="isolation-house-number" type="text">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-isolation-zip">
                                <strong>PSČ</strong>
                            </label>
                            <span id="uc-isolation-zip-error" class="govuk-error-message" style="display: none;">
                              Zadajte PSČ.
                            </span>
                            <input class="govuk-input govuk-input--width-20" id="uc-isolation-zip" name="isolation-zip"
                                   type="text">
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset govuk-!-margin-bottom-5" role="group"
                              aria-describedby="uc-isolation-address">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                Dodatočné údaje
                            </h2>
                        </legend>

                        <p style="margin-top: 0;" class="govuk-body">
                            V prípade pozitívneho testu, v záujme ochrany Vás a Vašich blízkych, budú od&nbsp;Vás
                            hygienici vyžadovať dodatočné informácie. Pomôžete nám, ak ich dobrovoľne zadáte už teraz.
                        </p>

                        <div class="govuk-form-group govuk-!-margin-bottom-3">
                            <label class="govuk-label" for="uc-household-members-count">
                                <strong>Počet osôb žijúcich alebo zdržiavajúcich sa v mieste izolácie</strong>
                            </label>
                            <input class="govuk-input govuk-input--width-20" id="uc-household-members-count"
                                   name="household-members-count" type="text" maxlength="2">
                        </div>

                        <div class="govuk-form-group">
                            <label class="govuk-label" for="uc-gp">
                                <strong>Meno a priezvisko všeobecného lekára</strong>
                            </label>
                            <input class="govuk-input govuk-input--width-20" id="uc-gp" name="gp"
                                   type="text">
                        </div>
                    </fieldset>

                    <fieldset class="govuk-fieldset" role="group">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                            <h2 class="govuk-fieldset__heading" id="uc-isolation-address">
                                Potvrdenia
                            </h2>
                        </legend>
                        <div class="govuk-form-group">
                          <span id="uc-tos-error" class="govuk-error-message" style="display: none;">
                          Prosím, akceptujte súhlas so spracovaním osobných údajov.
                          </span>
                            <div class="govuk-checkboxes">
                                <div class="govuk-checkboxes__item">
                                    <input class="govuk-checkboxes__input" id="uc-tos" name="tos" type="checkbox"
                                           value="yes" aria-describedby="uc-tos-error">
                                    <label class="govuk-label govuk-checkboxes__label" for="uc-tos">
                                        Potvrdzujem, že súhlasím so spracovaním osobných údajov
                                    </label>
                                    <span class="govuk-hint govuk-checkboxes__hint">
                                <a href="/poucenie-o-ochrane-osobnych-udajov/" target="_blank">Poučenie o ochrane osobných údajov</a>
                              </span>
                                </div>
                            </div>
                        </div>
                        <div class="govuk-form-group">
                          <span id="uc-confirm-error" class="govuk-error-message" style="display: none;">
                          Prosím, potvrďte správnosť zadaných údajov.
                          </span>
                            <div class="govuk-checkboxes">
                                <div class="govuk-checkboxes__item">
                                    <input class="govuk-checkboxes__input" id="uc-confirm" name="confirm"
                                           type="checkbox" value="yes" aria-describedby="uc-confirm-error">
                                    <label class="govuk-label govuk-checkboxes__label" for="uc-confirm">
                                        Potvrdzujem a prehlasujem, že všetky uvedené údaje sú pravdivé.
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>

                <button class="govuk-button js-uc-submit govuk-button--start" type="submit"
                        data-step-2="Odoslať registráciu" data-step-1="Pokračovať"><span>Pokračovať</span>
                    <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19"
                         viewBox="0 0 33 40" role="presentation" focusable="false">
                        <path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z"></path>
                    </svg>
                </button>

                <p style="margin-top: 0;" class="govuk-body">
                    V prípade otázok zavolajte na číslo <a href="tel:+421232353030" style="display: inline-block;">+421
                        2 32 35 30 30</a>.
                </p>
            </form>
        </div>

        <div class="govuk-grid-column-full">
            <div style="display: none;" id="uc-loading">
                <h1 class="govuk-heading-l">
                    Registrácia sa odosiela
                </h1>

                <p>
                    Prosím, čakajte na výsledok registrácie.
                </p>
            </div>

            <div style="display: none;" id="uc-error">
                <h1 class="govuk-heading-l">
                    Pri registrácii nastala chyba
                </h1>

                <p id="uc-slovak-id-registered" style="display: none;" class="govuk-body">
                    Zadané rodné číslo alebo BIČ už bolo registrované (napr. pri registrácii na vyšetrenie na COVID-19).
                </p>

                <p id="uc-foreign-id-registered" style="display: none;" class="govuk-body">
                    Zadané ID pridelené inou krajinou už bolo registrované (napr. pri registrácii na vyšetrenie na
                    COVID-19).
                </p>

                <p class="govuk-body">
                    Pre dokončenie registrácie, prosím, zavolajte na číslo <a href="tel:+421232353030"
                                                                              style="display: inline-block;">+421 2 32
                        35 30 30</a>.
                </p>

                <div>
                    <h2 class="govuk-heading-m">
                        Ďalšie akcie
                    </h2>
                    <a href="." class="govuk-button">Chcem registrovať ďalšiu osobu</a>
                </div>
            </div>

            <div style="display: none;" id="uc-thank-you">
                <div class="govuk-panel govuk-panel--confirmation">
                    <h1 class="govuk-panel__title">
                        Registrácia dokončená
                    </h1>
                    <div class="govuk-panel__body">
                        Ďalšie inštrukcie Vám prídu v najbližších dňoch v&nbsp;SMS&nbsp;správe alebo emailom.
                    </div>
                </div>

                <div>
                    <h2 class="govuk-heading-m">
                        Ďalšie akcie
                    </h2>
                    <a href="." class="govuk-button">Chcem registrovať ďalšiu osobu</a>
                </div>
            </div>
        </div>
    </div>

    <!-- I Am Part of the Resistance Inside the Klingon Administration -->


<?php

/*
 *

            <fieldset class="govuk-fieldset" role="group" aria-describedby="uc-permanent-address">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">
                    <h2 class="govuk-fieldset__heading" id="uc-permanent-address">
                        Adresa trvalého bydliska
                    </h2>
                </legend>

                <div class="govuk-form-group">
                    <div class="govuk-radios govuk-radios--small">
                        <div class="govuk-radios__item">
                            <input class="js-uc-permanent-type govuk-radios__input"
                                   id="uc-permanent-same-as-isolation" name="permanent-address"
                                   type="radio"
                                   value="same-as-isolation" checked>
                            <label class="govuk-label govuk-radios__label" for="uc-permanent-same-as-isolation">
                                Rovnaká ako adresa domácej izolácie
                            </label>
                        </div>
                        <div class="govuk-radios__item">
                            <input class="js-uc-permanent-type govuk-radios__input"
                                   id="uc-permanent-other-than-isolation" name="permanent-address" type="radio"
                                   value="other-than-isolation">
                            <label class="govuk-label govuk-radios__label" for="uc-permanent-other-than-isolation">
                                Iná ako adresa domácej izolácie
                            </label>
                        </div>
                        <div class="govuk-radios__item">
                            <input class="js-uc-permanent-type govuk-radios__input" id="uc-permanent-none"
                                   name="permanent-address" type="radio"
                                   value="none">
                            <label class="govuk-label govuk-radios__label" for="uc-permanent-none">
                                Bez trvalého bydliska na Slovensku
                            </label>
                        </div>
                    </div>
                </div>

                <div class="js-uc-permanent-fields" style="display: none;">
                    <div class="govuk-form-group govuk-!-margin-bottom-3">
                        <div class="uc-municipality-holder">
                            <label class="govuk-label" for="municipality-inner-uc-permanent-municipality">
                                <strong>Mesto/obec</strong>
                            </label>
                            <div><span class="govuk-error-message" id="municipality-error-uc-permanent-municipality"
                                       style="display: none;">Vyberte mesto/obec zo zoznamu.</span></div>
                            <input type="hidden" name="permanent-municipality" id="municipality-input-uc-permanent-municipality">
                            <input type="hidden" name="permanent-county" id="county-input-uc-permanent-municipality">
                            <div id="municipality-field-uc-permanent-municipality"></div>
                        </div>
                    </div>

                    <div class="govuk-form-group govuk-!-margin-bottom-3">
                        <label class="govuk-label" for="uc-permanent-street">
                            <strong>Ulica</strong>
                        </label>
                        <span id="uc-permanent-street-error" class="govuk-error-message" style="display: none;">
                              Zadajte ulicu.
                            </span>
                        <input class="govuk-input govuk-input--width-20" id="uc-permanent-street"
                               name="permanent-street" type="text">
                    </div>

                    <div class="govuk-form-group govuk-!-margin-bottom-3">
                        <label class="govuk-label" for="uc-permanent-house-number">
                            <strong>Orientačné číslo (číslo domu)</strong>
                        </label>
                        <span id="uc-permanent-house-number-error" class="govuk-error-message" style="display: none;">
                              Zadajte číslo domu.
                            </span>
                        <input class="govuk-input govuk-input--width-20" id="uc-permanent-house-number"
                               name="permanent-house-number" type="text">
                    </div>

                    <div class="govuk-form-group">
                        <label class="govuk-label" for="uc-permanent-zip">
                            <strong>PSČ</strong>
                        </label>
                        <span id="uc-permanent-zip-error" class="govuk-error-message" style="display: none;">
                              Zadajte PSČ.
                            </span>
                        <input class="govuk-input govuk-input--width-20" id="uc-permanent-zip" name="permanent-zip"
                               type="text">
                    </div>
                </div>
            </fieldset>












<div class="js-uc-summary" style="display: none;">
        <div class="govuk-grid-column-full">
            <h1 class="govuk-heading-xl">Skontrolujte svoje odpovede pred odoslaním registrácie</h1>
        </div>

        <div class="govuk-grid-column-two-thirds-from-desktop">

            <h2 class="govuk-heading-m">Navštívené krajiny za ostatných 14 dní</h2>


            <dl class="govuk-summary-list govuk-!-margin-bottom-9">
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Prišli ste z krajiny
                    </dt>
                    <dd class="govuk-summary-list__value">
                        Česko
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Ďalšie navštívené krajiny
                    </dt>
                    <dd class="govuk-summary-list__value">
                        USA<br>
                        Somálsko
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Dátum príchodu
                    </dt>
                    <dd class="govuk-summary-list__value">
                        28. 6. 2020
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
            </dl>


            <h2 class="govuk-heading-m">Osoby</h2>


            <dl class="govuk-summary-list govuk-!-margin-bottom-9">
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Vy
                    </dt>
                    <dd class="govuk-summary-list__value">
                        Janko Mrkvička<br>
                        123456/1234<br>
                        13. 8. 1989<br>
                        Všeobecná zdravotná poisťovňa
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        2. osoba
                    </dt>
                    <dd class="govuk-summary-list__value">
                        Janko Mrkvička<br>
                        123456/1234<br>
                        31. 2. 1952<br>
                        Všeobecná zdravotná poisťovňa
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                    </dt>
                    <dd class="govuk-summary-list__value">
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Pridať ďalšiu osobu
                        </a>
                    </dd>
                </div>
            </dl>

            <h2 class="govuk-heading-m">Kontaktné údaje</h2>


            <dl class="govuk-summary-list govuk-!-margin-bottom-9">
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Emailová adresa
                    </dt>
                    <dd class="govuk-summary-list__value">
                        janko.mrkvicka@gmail.com
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Telefónne číslo
                    </dt>
                    <dd class="govuk-summary-list__value">
                        +421 910 123 321
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Adresa absolvovania domácej izolácie
                    </dt>
                    <dd class="govuk-summary-list__value">
                        Dubova 8<br>
                        82105<br>
                        Bratislava
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
                <div class="govuk-summary-list__row">
                    <dt class="govuk-summary-list__key">
                        Adresa trvalého bydliska
                    </dt>
                    <dd class="govuk-summary-list__value">
                        Dubova 8<br>
                        82105<br>
                        Bratislava
                    </dd>
                    <dd class="govuk-summary-list__actions">
                        <a class="govuk-link" href="#">
                            Zmeniť
                        </a>
                    </dd>
                </div>
            </dl>


            <h2 class="govuk-heading-m">Teraz odošlite registráciu</h2>

            <p class="govuk-body">Odoslaním tejto registrácie potvrdzujete, že podľa Vášho najlepšieho vedomia ste
                registráciu vyplnili správne a úplne.

            <form action="/form-handler" method="post" novalidate="">

                <input type="hidden" name="answers-checked" value="true">

                <button class="govuk-button" data-module="govuk-button">
                    Potvrdiť a odoslať
                </button>

            </form>

        </div>
    </div>
 */