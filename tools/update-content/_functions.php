<?php

include_once 'config.php';

function updateResult(&$result, $section, $isOk, $message = '')
{
    $result['health-check'] = (bool)$result['health-check'] && $isOk;
    $result[$section] = $message;
    return $result;
}

function updatePlaceholder($content, $placeholder, $value, &$result)
{
    $pattern = '/<!--\W*REPLACE:\W*' . $placeholder . '\W*-->(.*)<!--\W*\/REPLACE\W*-->/sU';

    if (preg_match($pattern, $content) !== 1) {
        updateResult($result, $placeholder, false, 'Pattern not found');

        return $content;
    }

    return preg_replace(
        $pattern,
        '<!-- REPLACE:' . $placeholder . ' -->' . $value . '<!-- /REPLACE -->',
        $content);
}

function isArrayInTreeEmpty($variable, $path)
{
    $node = $variable;
    foreach ($path as $key) {
        if (empty($node[$key]) || !is_array($node[$key])) {
            return true;
        }

        $node = $node[$key];
    }

    return false;
}

function toAscii(string $s): string
{
    $iconv = defined('ICONV_IMPL') ? ICONV_IMPL : null;
    static $transliterator = null;
    if ($transliterator === null && class_exists('Transliterator', false)) {
        $transliterator = \Transliterator::create('Any-Latin; Latin-ASCII');
    }

    // remove control characters and check UTF-8 validity
    $s = preg_replace('#[^\x09\x0A\x0D\x20-\x7E\xA0-\x{2FF}\x{370}-\x{10FFFF}]#u', '', $s);

    // transliteration (by Transliterator and iconv) is not optimal, replace some characters directly
    $s = strtr($s, ["\u{201E}" => '"', "\u{201C}" => '"', "\u{201D}" => '"', "\u{201A}" => "'", "\u{2018}" => "'", "\u{2019}" => "'", "\u{B0}" => '^', "\u{42F}" => 'Ya', "\u{44F}" => 'ya', "\u{42E}" => 'Yu', "\u{44E}" => 'yu']); // „ “ ” ‚ ‘ ’ ° Я я Ю ю
    if ($iconv !== 'libiconv') {
        $s = strtr($s, ["\u{AE}" => '(R)', "\u{A9}" => '(c)', "\u{2026}" => '...', "\u{AB}" => '<<', "\u{BB}" => '>>', "\u{A3}" => 'lb', "\u{A5}" => 'yen', "\u{B2}" => '^2', "\u{B3}" => '^3', "\u{B5}" => 'u', "\u{B9}" => '^1', "\u{BA}" => 'o', "\u{BF}" => '?', "\u{2CA}" => "'", "\u{2CD}" => '_', "\u{2DD}" => '"', "\u{1FEF}" => '', "\u{20AC}" => 'EUR', "\u{2122}" => 'TM', "\u{212E}" => 'e', "\u{2190}" => '<-', "\u{2191}" => '^', "\u{2192}" => '->', "\u{2193}" => 'V', "\u{2194}" => '<->']); // ® © … « » £ ¥ ² ³ µ ¹ º ¿ ˊ ˍ ˝ ` € ™ ℮ ← ↑ → ↓ ↔
    }

    if ($transliterator) {
        $s = $transliterator->transliterate($s);
        // use iconv because The transliterator leaves some characters out of ASCII, eg → ʾ
        if ($iconv === 'glibc') {
            $s = strtr($s, '?', "\x01"); // temporarily hide ? to distinguish them from the garbage that iconv creates
            $s = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $s);
            $s = str_replace(['?', "\x01"], ['', '?'], $s); // remove garbage and restore ? characters
        } elseif ($iconv === 'libiconv') {
            $s = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $s);
        } else { // null or 'unknown' (#216)
            $s = preg_replace('#[^\x00-\x7F]++#', '', $s); // remove non-ascii chars
        }
    } elseif ($iconv === 'glibc' || $iconv === 'libiconv') {
        // temporarily hide these characters to distinguish them from the garbage that iconv creates
        $s = strtr($s, '`\'"^~?', "\x01\x02\x03\x04\x05\x06");
        if ($iconv === 'glibc') {
            // glibc implementation is very limited. transliterate into Windows-1250 and then into ASCII, so most Eastern European characters are preserved
            $s = iconv('UTF-8', 'WINDOWS-1250//TRANSLIT//IGNORE', $s);
            $s = strtr($s,
                "\xa5\xa3\xbc\x8c\xa7\x8a\xaa\x8d\x8f\x8e\xaf\xb9\xb3\xbe\x9c\x9a\xba\x9d\x9f\x9e\xbf\xc0\xc1\xc2\xc3\xc4\xc5\xc6\xc7\xc8\xc9\xca\xcb\xcc\xcd\xce\xcf\xd0\xd1\xd2\xd3\xd4\xd5\xd6\xd7\xd8\xd9\xda\xdb\xdc\xdd\xde\xdf\xe0\xe1\xe2\xe3\xe4\xe5\xe6\xe7\xe8\xe9\xea\xeb\xec\xed\xee\xef\xf0\xf1\xf2\xf3\xf4\xf5\xf6\xf8\xf9\xfa\xfb\xfc\xfd\xfe\x96\xa0\x8b\x97\x9b\xa6\xad\xb7",
                'ALLSSSSTZZZallssstzzzRAAAALCCCEEEEIIDDNNOOOOxRUUUUYTsraaaalccceeeeiiddnnooooruuuuyt- <->|-.');
            $s = preg_replace('#[^\x00-\x7F]++#', '', $s);
        } else {
            $s = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $s);
        }
        // remove garbage that iconv creates during transliteration (eg Ý -> Y')
        $s = str_replace(['`', "'", '"', '^', '~', '?'], '', $s);
        // restore temporarily hidden characters
        $s = strtr($s, "\x01\x02\x03\x04\x05\x06", '`\'"^~?');
    } else {
        $s = preg_replace('#[^\x00-\x7F]++#', '', $s); // remove non-ascii chars
    }

    return $s;
}

function trimString(string $s, string $charlist = " \t\n\r\0\x0B\u{A0}"): string
{
    $charlist = preg_quote($charlist, '#');
    return preg_replace('#^[' . $charlist . ']+|[' . $charlist . ']+$#Du', '', $s);
}