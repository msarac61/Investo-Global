<?php

function TCMB_Converter($from = 'TRY', $to = 'USD', $val = 1)
{
    if (!function_exists('simplexml_load_string') || !function_exists('curl_init')) {
        return 'Simplexml extension missing.';
    }

    $CurrencyData = [
        'from' => 1,
        'to' => 1
    ];

    try {
        $tcmbMirror = 'https://www.tcmb.gov.tr/kurlar/today.xml';
        $curl = curl_init($tcmbMirror);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $tcmbMirror);
        $dataFromtcmb = curl_exec($curl);
    } catch (Exception $e) {
        echo 'Unhandled exception, maybe from cURL' . $e->getMessage();
        return 0;
    }

    $Currencies = simplexml_load_string($dataFromtcmb);

    foreach ($Currencies->Currency as $Currency) {
        if ($from == $Currency['CurrencyCode']) $CurrencyData['from'] = $Currency->BanknoteSelling;
        if ($to == $Currency['CurrencyCode']) $CurrencyData['to'] = $Currency->BanknoteSelling;
    }

    return number_format(round(($CurrencyData['to'] / $CurrencyData['from']) * $val, 10), 0, ',', '.');
}

?>