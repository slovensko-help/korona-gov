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