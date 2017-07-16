<?php

define('GOOGLE_KEY', 'AIzaSyDb5B6BVZ7c_L94PmBPGmSWg1kKbBalgN4');

function convert_address($lat, $lng, $lang = 'zh-TW') {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json';
    $get_parameter = array(
        'key' => GOOGLE_KEY,
        'latlng' => $lat . ',' . $lng,
        'language' => $lang,
        'region' => 'tw',
    );

    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url . '?' . http_build_query($get_parameter),
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,

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

function convert_coordinate($address, $lang = 'zh-TW') {
    $url = 'https://maps.googleapis.com/maps/api/geocode/json';
    $get_parameter = array(
        'key' => GOOGLE_KEY,
        'address' => $address,
        'language' => $lang,
        'region' => 'tw',
    );

    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url . '?' . http_build_query($get_parameter),
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,

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

function convert_place_info($place_id, $lang = 'zh-TW') {
    $url = 'https://maps.googleapis.com/maps/api/place/details/json';
    $get_parameter = array(
        'key' => GOOGLE_KEY,
        'placeid' => $place_id,
        'language' => $lang,
    );

    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url . '?' . http_build_query($get_parameter),
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,

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

function convert_place_photo_url($photo_refrence) {
    $url = 'https://maps.googleapis.com/maps/api/place/photo';
    $get_parameter = array(
        'key' => GOOGLE_KEY,
        'photoreference' => $photo_refrence,
        'maxheight' => 500,
        'maxheight' =>500,
    );

    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 1,
        CURLOPT_URL => $url . '?' . http_build_query($get_parameter),
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,

        CURLOPT_FOLLOWLOCATION => 0,

        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_NOBODY => 1,
        //CURLOPT_POSTFIELDS => http_build_query($post)
    );

    if ( ! empty($cookie)) {
        $defaults[CURLOPT_COOKIE] = $cookie;
    }

    $ch = curl_init();
    curl_setopt_array($ch, $defaults);

    if( ! $result = curl_exec($ch)) {
        trigger_error(curl_error($ch));
    }

    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $newUrl = NULL;
    if ($code == 301 || $code == 302 || $code == 303 || $code == 307) {
        preg_match('/Location:(.*?)\n/', $result, $matches);
        $newUrl = trim(array_pop($matches));
    }

    curl_close($ch);

    return $newUrl;
}
