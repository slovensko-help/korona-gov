<?php

include_once FAQ_ROOT_DIR . '../_functions.php';

function fixFaqContent($perex, $content)
{
    if (strpos($perex, '<p') === false) {
        $perex = '<p>' . $perex . '</p>';
    }

    $content = $perex . $content;

    $content = preg_replace('/<div>(\W|&nbsp;)*<\/div>/s', '', $content);
    $content = preg_replace('/<div>\W*<br>\W*<\/div>/s', '', $content);
    $content = preg_replace('/<p/', '<p class="govuk-body"', $content);
    $content = preg_replace('/<ul/', '<ul class="govuk-list govuk-list--bullet"', $content);
    $content = preg_replace('/<a/', '<a class="govuk-link"', $content);
    $content = preg_replace('/<div/', '<p class="govuk-body"', $content);
    $content = preg_replace('/<\/div>/', '</p>', $content);

    return $content;
}

function updateFaq($contentFile, $dataFile)
{
    $result = ['health-check' => true];

    $contentFilePath = STATIC_BASE_PATH . $contentFile;
    $dataFilePath = FAQ_ROOT_DIR . '../../cache-api/' . $dataFile;

    if (!is_file($contentFilePath)) {
        return updateResult($result, 'content-file', false, 'Content file does not exist.');
    }

    if (!is_file($dataFilePath)) {
        return updateResult($result, 'data-file', false, 'Data file does not exist.');
    }

    $data = json_decode(file_get_contents($dataFilePath), true);

    if (empty($data['payload']) || !is_array($data['payload'])) {
        return updateResult($result, 'data-file', false, 'No payload.');
    }

    $content = file_get_contents($contentFilePath);
    $faqSections = [];
    $questionIndex = 0;

    foreach ($data['payload'] as $question) {
        if (!isset($faqSections[$question['topic']])) {
            $faqSections[$question['topic']] = [
                'title' => $question['topic_name'],
                'questions' => [],
            ];
        }

        $faqSections[$question['topic']]['questions'][] = [
            'title' => $question['title'],
            'content' => fixFaqContent($question['perex'], $question['content']),
        ];
    }

    $faqContent = '';

    foreach ($faqSections as $faqSectionId => $faqSection) {
        $questionIndex++;
        $questionId = $faqSectionId . '-' . $questionIndex;

        $faqContent .= '
            <h2 class="govuk-heading-l">' . $faqSection['title'] .'</h2>
            <div class="govuk-accordion" data-module="govuk-accordion" id="s-' . $faqSectionId . '" data-attribute="value">';

        foreach ($faqSection['questions'] as $question) {
            $faqContent .= '
                <div class="govuk-accordion__section ">
                    <div class="govuk-accordion__section-header">
                      <h2 class="govuk-accordion__section-heading">
                        <span class="govuk-accordion__section-button" id="q-' . $questionId . '-heading">
                         ' . $question['title'] . '
                        </span>
                      </h2>
                    </div>
                    <div id="q-' . $questionId . '-content" class="govuk-accordion__section-content" aria-labelledby="q-' . $questionId . '-heading">
                      ' . $question['content'] . '                
                    </div>
                </div>';
        }

        $faqContent .= '</div>';
    }

    $updatedContent = updatePlaceholder($content, 'faq', $faqContent, $result);

    if ($content !== $updatedContent) {
        file_put_contents($contentFilePath, $updatedContent);
    }

    return $result;
}