<?php

include_once '_config.php';

/**
 * @param string $url
 * @param array $data
 * @param bool $postJson
 * @return array
 * @throws Exception
 */
function httpPost($url, $data, $postJson = false)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postJson ? json_encode($data) : http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    if ($postJson) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    }

    $response = curl_exec($curl);
    $error = curl_error($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($response === false) {
        throw new Exception('Curl error "' . $error . '" occurred while requesting "' . $url . '". status="' . $httpCode . '"');
    }

    $response = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Malformed response when requesting url "' . $url . '". status="' . $httpCode . '"');
    }

    return [$response, $httpCode];
}

try {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $requestData = json_decode(@file_get_contents('php://input'), TRUE);

    if (json_last_error() !== JSON_ERROR_NONE || !is_array($requestData)) {
        throw new Exception('Malformed raw request body.');
    }

    if (!isset($requestData['token']) || !is_string($requestData['token'])) {
        throw new Exception('"token" request variable is missing or invalid.');
    }

    if (!isset($requestData['isTest']) || !is_bool($requestData['isTest'])) {
        throw new Exception('"isTest" request variable is missing or invalid.');
    }

    if (!isset($requestData['people']) || !is_array($requestData['people'])) {
        throw new Exception('"people" request variable is missing or invalid.');
    }

    list($googleResponse, $googleHttpCode) = httpPost('https://www.google.com/recaptcha/api/siteverify', [
        'secret' => RECAPTCHA_SECRET,
        'response' => $requestData['token'],
    ]);

    if ($googleResponse['success'] && $googleResponse['score'] > 0.6) {
        $apiUrl = $requestData['isTest'] ? 'https://t.mojeezdravie.sk/api/v1/risk/new-pass' : 'https://mojeezdravie.nczisk.sk/api/v1/risk/new-pass';

        list($apiResponse, $apiHttpCode) = httpPost($apiUrl, ['people' => $requestData['people']], true);

        if (is_array($apiResponse)) {
            if (isset($apiResponse['payload'])) {
                if (!isset($apiResponse['payload']['vCovid19Pass'])) {
                    error_log('[EHRANICA][WARNING] NCZI API response.payload doesn\'t contain vCovid19Pass variable. status="' . $apiHttpCode . '"');
                    error_log('[EHRANICA][WARNING] NCZI API Full response: ' . json_encode($apiResponse) . '. status="' . $apiHttpCode . '"');
                }
                else {
                    error_log('[EHRANICA][OK] Successful registration. status="' . $apiHttpCode . '".');
                }
            } else {
                error_log('[EHRANICA][NOTICE] NCZI API didn\'t return response.payload (validation error probably). status="' . $apiHttpCode . '"');
                error_log('[EHRANICA][NOTICE] NCZI API Full response: ' . json_encode($apiResponse) . '. status="' . $apiHttpCode . '"');
            }

            echo json_encode($apiResponse);
            exit;
        }

        error_log('[EHRANICA][NOTICE] Uknown NCZI API response. status="' . $apiHttpCode . '".');
    }
    else {
        error_log('[EHRANICA][NOTICE] Google Recaptcha check failed.');
    }

    echo json_encode(['success' => false]);
} catch (Exception $exception) {
    error_log('[EHRANICA][CRITICAL] ' . $exception->getMessage());
    echo json_encode(['success' => false]);
}