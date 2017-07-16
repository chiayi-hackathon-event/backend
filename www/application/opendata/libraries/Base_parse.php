<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class Base_parse {

    protected function _parse(int $i, $result, DOMDocument $doc, array $rules_array, $tag) {
        $doc->loadHTML($result);
        $xpath = new DOMXpath($doc);

        $data = array();
        foreach ($rules_array as $rule) {
            if (empty($rule['rule'])) {
                continue;
            }
            $elements = $xpath->query($rule['rule']);
            if ($elements->length == 0) {
                if ($i == 1) {
                    echo 'Parse length = 0 Error' . PHP_EOL;
                    $this->_error($tag);
                }
                continue;
                //return FALSE;
            }
            foreach ($elements as $key => $value) {
                $data[$key][$rule['name']] = $value->nodeValue;
            }
        }

        return $data;
    }

    protected function _error($function) {
        send_email(
            'showsky@gmail.com',
            'GamePrice Data Error: ' . $function,
            'GamePrice Data Error: ' . $function
        );
    }
}
