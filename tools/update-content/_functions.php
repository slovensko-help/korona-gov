<?php

function updateResult(&$result, $section, $isOk, $message = '')
{
    $result['health-check'] = (bool)$result['health-check'] && $isOk;
    $result[$section] = $message;
    return $result;
}

function updatePlaceholder($content, $placeholder, $value, &$result)
{
    $count = 0;
    $updateContent = preg_replace(
        '/<!--\W*REPLACE:\W*' . $placeholder . '\W*-->(.*)<!--\W*\/REPLACE\W*-->/',
        '<!-- REPLACE:' . $placeholder . ' -->' . $value . '<!-- /REPLACE -->',
        $content,
        -1,
        $count);

    if ($count === 0) {
        updateResult($result, $placeholder, false, 'Pattern not found');
    }

    return $updateContent;
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