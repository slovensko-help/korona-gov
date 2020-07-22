<?php

class KoronaShortcodes
{
    private static $instance;

    private function __construct()
    {
    }

    public static function getSingleton()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function koronastats($attributes = [])
    {
        $item = isset($attributes['item']) ? $attributes['item'] : '';

        $data = $this->data('koronastats', $item);

        if (null === $data) {
            $value = '-';
        } else {
            $value = $data['formatted_value'];
        }

        return '<!-- REPLACE:koronastats-' . $item . ' -->' . $value . '<!-- /REPLACE -->';
    }

    private function data($section, $item = null)
    {
        static $data;

        if (null === $data) {
            $filePath = ABSPATH . 'tools/data/data.json';

            $data = [];

            if (is_file($filePath)) {
                $data = json_decode(file_get_contents($filePath), true);
            }
        }

        if (isset($data[$section])) {
            $section = $data[$section];
        } else {
            return null;
        }

        if (null === $item) {
            return $section;
        }

        return isset($section[$item]) ? $section[$item] : null;
    }

    /*
     * IMPORTANT: This method is used in ehranica form. Do not delete it if you are not absolutely sure.
     */
    public function safeCountriesJavascript()
    {
        $safeCountries = [];
        $data = $this->data('safecountries');

        if (is_array($data)) {
            foreach ($data as $countryCode => $country) {
                $safeCountries[$countryCode] = [$country['safe_from'], $country['safe_until']];
            }
        }

        return
            '<script>' .
            '   var RC_SAFE_COUNTRIES=' . (empty($safeCountries) ? '{}' : json_encode($safeCountries)) . ';' .
            '</script>';
    }

    public function safecountries()
    {
        $timezone = date_default_timezone_get();
        $now = new DateTime('now', new DateTimeZone($timezone));
        $now->setTimezone(new DateTimeZone('Europe/Bratislava'));
        $nowString = $now->format('Y-m-d H:i:s');

        $currentLanguageCode = apply_filters('wpml_current_language', NULL);

        $safeCountries = $this->data('safecountries');
        $content = '';

        if (is_array($safeCountries) && !empty($safeCountries)) {
            $count = count($safeCountries);

            uasort($safeCountries, function ($a, $b) use ($currentLanguageCode) {
                $lang = isset($a['sort_' . $currentLanguageCode]) ? $currentLanguageCode : 'en';
                return $a['sort_' . $lang] - $b['sort_' . $lang];
            });

            if ($count / 4 > 8) {
                $nrOfColumns = 4;
            } elseif ($count / 3 > 8) {
                $nrOfColumns = 3;
            } elseif ($count / 2 > 8) {
                $nrOfColumns = 2;
            } else {
                $nrOfColumns = 1;
            }

            $nrOfColumns = 1;

            $columns = array_chunk($safeCountries, ceil($count / $nrOfColumns));

            $content .= '';

            foreach ($columns as $column) {

                $content .= '';
                        //<ul class="govuk-list govuk-list--bullet">';

                $countriesContent = [];

                foreach ($column as $country) {
                    $language = isset($country['name_' . $currentLanguageCode]) ? $currentLanguageCode : 'en';

                    $safeFrom = $this->datetimeFromString($country['safe_from'], 'Europe/Bratislava');
                    $safeUntil = $this->datetimeFromString($country['safe_until'], 'Europe/Bratislava');

                    $times = [];

                    $from = __('od', 'ehranica');
                    $to = __('do', 'ehranica');


                    if (null !== $safeFrom && $safeFrom->format('Y-m-d H:i:s') > $nowString) {
                        $times[] = $from . '&nbsp;' . str_replace(' ', '&nbsp;', $safeFrom->format('j. n. Y H:i'));
                    }

                    if (null !== $safeUntil && $safeUntil->format('Y-m-d H:i:s') > $nowString) {
                        $times[] = $to . '&nbsp;' . str_replace(' ', '&nbsp;', $safeUntil->format('j. n. Y H:i'));
                    }

                    $countriesContent[] =
                        '' .
                        $country['name_' . $language] .
                        (count($times) > 0 ? (' (' . join('&nbsp;', $times) . ')') : '') .
                        '';
                }

                $content .= join(', ', $countriesContent) . '</p>';

                $content .= //'</ul>
                    '';
            }

            $content .= '';
        }

        return '<!-- REPLACE:safecountries -->' . $content . '<!-- /REPLACE -->';
    }

    /**
     * @param string $string
     * @param string $timezone
     * @return DateTimeImmutable|null
     */
    private function datetimeFromString(string $string, string $timezone)
    {
        if (empty($string)) {
            return null;
        }

        $time = DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $string, new DateTimeZone($timezone));

        return $time instanceof DateTimeImmutable ? $time : null;
    }

    public function koronamedians($attributes = [])
    {
        $limit = isset($attributes['limit']) ? (int)$attributes['limit'] : null;

        $medians = $this->data('koronamedians');
        $content = '';

        if (null !== $limit && count($medians) > $limit) {
            $medians = array_slice($medians, 0, $limit);
        }

        if (null !== $medians) {
            $content .= '<tbody class="govuk-table__body">';

            foreach ($medians as $medianData) {
                $content .= '<tr class="govuk-table__row">';
                $content .= '<td class="govuk-table__cell">' . $medianData['formatted_date'] . '</td>';
                $content .= '<td class="govuk-table__cell govuk-table__cell--numeric">' . $medianData['formatted_value'] . '</td>';
                $content .= '</tr>';

                $content .= '</tbody>';
            }
        }

        return '<!-- REPLACE:koronamedians -->' . $content . '<!-- /REPLACE -->';
    }
}

add_shortcode('koronastats', [KoronaShortcodes::getSingleton(), 'koronastats']);
add_shortcode('koronamedians', [KoronaShortcodes::getSingleton(), 'koronamedians']);
add_shortcode('safecountries', [KoronaShortcodes::getSingleton(), 'safecountries']);