<?php

function parse_image_url($url) {
    $defaults = array(
        //CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_URL => $url,
        CURLOPT_FRESH_CONNECT => 1,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FORBID_REUSE => 1,
        CURLOPT_TIMEOUT => 20,

        CURLOPT_FOLLOWLOCATION => 1,

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
    curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $result = FALSE;

    if ($http_code == 200) {
        $result = $url;
    }

    curl_close($ch);

    return $result;
}
