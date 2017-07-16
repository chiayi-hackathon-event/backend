<?php

function curl_post($url, $post, $cookie, $referrer_url, array $header_array = array()) {
    //echo 'POST: ' . $url . "\n";

    $header = array(
        'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1309.0 Safari/537.17',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    );
    if (count($header_array) != 0) {
        $header = array_merge($header, $header_array);
    }

    if ( ! empty($referrer_url)) {
        array_push($header, sprintf('Referer: %s', $referrer_url));
    }

    $defaults = array(
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url ,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => $header,

        CURLOPT_FOLLOWLOCATION => 1,

        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POSTFIELDS => $post
    );

    if ( ! empty($cookie)) {
        $defaults[CURLOPT_COOKIE] = $cookie;
    }

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);

    if( ! $result = curl_exec($ch)) {
        trigger_error(curl_error($ch));
    } else {
        switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
            case 302:
                return FALSE;
        }
    }

    curl_close($ch);

    return $result;
}

function curl_get($url, $cookie = NULL, $referrer_url = NULL, array $header_array = array()) {
    //echo 'GET: ' . $url . "\n";

    $header = array(
        'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1309.0 Safari/537.17',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
    );
    if (count($header_array) != 0) {
        $header = array_merge($header, $header_array);
    }

    if ( ! empty($referrer_url)) {
        array_push($header, sprintf('Referer: %s', $referrer_url));
    }

    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url ,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_HTTPHEADER => $header,

        CURLOPT_FOLLOWLOCATION => 1,

        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        //CURLOPT_POSTFIELDS => http_build_query($post)
    );

    if ( ! empty($cookie)) {
        $defaults[CURLOPT_COOKIE] = $cookie;
    }

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);

    if( ! $result = curl_exec($ch)) {
        trigger_error(curl_error($ch));
    } else {
        switch ($http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE)) {
            case 302:
                return FALSE;
        }
    }

    curl_close($ch);

    return $result;
}
