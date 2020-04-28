<?php

class KoronaShortcodes
{
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

    public function koronamedians($attributes = [])
    {
        $limit = isset($attributes['limit']) ? (int) $attributes['limit'] : null;

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

add_shortcode('koronastats', [new KoronaShortcodes, 'koronastats']);
add_shortcode('koronamedians', [new KoronaShortcodes, 'koronamedians']);