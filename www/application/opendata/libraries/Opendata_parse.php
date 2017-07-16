<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/Base_parse.php';

class Opendata_parse extends Base_parse {

    private $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('opendata_model');
        $this->CI->load->helper(array('curl', 'sendgrid'));
        libxml_use_internal_errors(true);
    }

    private function parse_place_id_info(string $place_id, int $image_num = 0, $lang = 'zh-TW') {
        $data = array(
            'phone' => NULL
        );

        if ($place_id === NULL) {
            return $data;
        }

        $this->CI->load->helper('curl_google_map');
        $result = convert_place_info($place_id, $lang);
        $result_json = json_decode($result, TRUE);

        if ($result_json['status'] !== 'OK') {
            echo 'Fail parse place id info' . PHP_EOL;
            return $data;
        }

        if (isset($result_json['result']['formatted_phone_number'])) {
            $data['phone'] = str_replace(
                ' ',
                '-',
                $result_json['result']['formatted_phone_number']
            );
        }

        if ($image_num != 0) {
            if (isset($result_json['result']['photos']) && is_array($result_json['result']['photos'])) {
                $photo_array = $result_json['result']['photos'];
                for ($i = 0; $i < $image_num; $i++) {
                    if (isset($photo_array[$i])) {
                        $data['image_' . ($i + 1)] = convert_place_photo_url($photo_array[$i]['photo_reference']);
                        sleep(1);
                    }
                }
            }
        }

        return $data;
    }

    private function parse_address_location(string $address, bool $is_return_address = FALSE, $lang = 'zh-TW') {
        $data = array(
            'location' => NULL,
            'address' => NULL,
            'lat' => '0.000000',
            'lng' => '0.000000',
            'place_id' => NULL,
        );

        $this->CI->load->helper('curl_google_map');
        $result = convert_coordinate($address, $lang);
        $result_json = json_decode($result, TRUE);

        if ($result_json['status'] !== 'OK') {
            echo 'Fail parse address location' . PHP_EOL;
            return $data;
        }

        foreach ($result_json['results'][0]['address_components'] as $value) {
            if ($value['types'][0] === 'administrative_area_level_1') {
                $data['location'] = $value['long_name'];
            }
        }

        if ($data['location'] === NULL) {
            $data_size = count($result_json['results']);
            for ($i = 0; $i < $data_size; $i++) {
                foreach ($result_json['results'][$i]['address_components'] as $value) {
                    if ($value['types'][0] === 'administrative_area_level_1') {
                        $data['location'] = $value['long_name'];
                        break;
                    } else if ($value['types'][0] === 'administrative_area_level_2') {
                        $data['location'] = $value['long_name'];
                        break;
                    }
                }

                if ($data['location'] !== NULL) {
                    break;
                }
            }
        }

        $data['place_id'] = $result_json['results'][0]['place_id'];

        if ($is_return_address) {
            $data['address'] = $result_json['results'][0]['formatted_address'];
        } else {
            unset($data['address']);
        }

        $data['lat'] = $result_json['results'][0]['geometry']['location']['lat'];
        $data['lng'] = $result_json['results'][0]['geometry']['location']['lng'];

        return $data;
    }

    private function convert_lang(int $lang_type) {
        switch ($lang_type) {
            case 0:
                return 'zh-TW';
            case 1:
                return 'en';
            case 2:
                return 'ja';
            case 3:
                return 'ko';
        }
    }

    public function parse_insert_csv_green_store($content, array $data_rule, bool $is_insert_location) {
        $array_content = explode("\n", trim($content));
        unset($array_content[0]);
        $this->CI->load->helper(array('curl_google_map', 'log'));

        //$array_content = array_slice($array_content, 303);
        //exit(var_dump($array_content[0]));

        foreach ($array_content as $line => $value) {
            $row = explode(',', $value);
            $data = array();
            foreach ($data_rule as $key => $value) {
                $trim_value = (is_int($value)) ? trim($row[$value]) : $value;
                $data[$key] = (empty($trim_value)) ? NULL : $trim_value;
            }

            $parse_location = $this->parse_address_location($data['address']);
            if ( ! $is_insert_location) {
                unset($parse_location['location']);
            }

            if ($parse_location['place_id'] === NULL) {
                echo 'Place id NULL' . PHP_EOL;
                continue;
            }

            $parse_place_id_info = $this->parse_place_id_info(
                $parse_location['place_id'],
                3
            );

            $merge_array = $data + $parse_location + $parse_place_id_info;

            $this->CI->opendata_model->replace_green_store($merge_array);
            log_db_insert($line, $merge_array, function($merge_array) {
                return $this->CI->opendata_model->replace_green_store($merge_array);
            });

            unset($data);
            unset($parse_location);
            unset($parse_place_id_info);

            sleep(2);
        }

        return TRUE;
    }

    public function parse_insert_csv_power($content, array $data_rule, bool $is_insert_location) {
        $array_content = explode("\n", trim($content));
        unset($array_content[0]);
        $this->CI->load->helper(array('curl_google_map', 'log'));

        //$array_content = array_slice($array_content, 303);
        //exit(var_dump($array_content[0]));

        foreach ($array_content as $line => $value) {
            $row = explode(',', $value);
            $data = array();
            foreach ($data_rule as $key => $value) {
                $trim_value = (is_int($value)) ? trim($row[$value]) : $value;
                $data[$key] = (empty($trim_value)) ? NULL : $trim_value;
            }

            $parse_location = $this->parse_address_location($data['address']);
            if ( ! $is_insert_location) {
                unset($parse_location['location']);
            }

            if ($parse_location['place_id'] === NULL) {
                echo 'Place id NULL' . PHP_EOL;
                continue;
            }

            $parse_place_id_info = $this->parse_place_id_info(
                $parse_location['place_id'],
                1
            );

            $merge_array = $data + $parse_location + $parse_place_id_info;

            log_db_insert($line, $merge_array, function($merge_array) {
                return $this->CI->opendata_model->replace_power($merge_array);
            });

            unset($data);
            unset($parse_location);
            unset($parse_place_id_info);

            sleep(2);
        }

        return TRUE;
    }

    public function parse_attractions_list($url, $lang) {
        $cookie = NULL;
        $rules = array(
            array(
                'rule' => '//*[@id="main"]/section/ul/div[2]/li[*]/div/div[2]/a/@href',
                'name' => 'url'
            )
        );

        $doc = new DOMDocument();

        $result = curl_get($url, $cookie, $url);

        if ($result === FALSE) {
            $this->_error(__METHOD__);
            echo 'End Ruten list' . PHP_EOL;
            return;
        }

        $data = $this->_parse(0, $result, $doc, $rules, __METHOD__);
        if ($data === FALSE) {
            echo 'End Ruten list' . PHP_EOL;
            return;
        }

        foreach ($data as $key => &$value) {
            $value['url'] = 'http://ct-pass.com' . $value['url'] . $lang;
        }

        return $data;
    }

    public function parse_attractions($url, $lang_type) {
        $cookie = NULL;
        $rules = array(
            array(
                'rule' => '//*[@id="main"]/section/div/div/div/div[1]/h2',
                'name' => 'title'
            ),
            array(
                'rule' => '//*[@class="garments-collection col-md-9 col-sm-9"]',
                'name' => 'description'
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/div/div[2]/@style',
                'name' => 'image_1'
            )
        );

        $doc = new DOMDocument();

        $result = curl_get($url, $cookie, $url);

        if ($result === FALSE) {
            $this->_error(__METHOD__);
            echo 'End Ruten list' . PHP_EOL;
            return;
        }

        $data = $this->_parse(0, $result, $doc, $rules, __METHOD__);
        if ($data === FALSE) {
            echo 'End Ruten list' . PHP_EOL;
            return;
        }

        foreach ($data[0] as $key => $value) {
            if ($key === 'description' && $value !== NULL) {
                $data[0][$key] = trim($data[0][$key]);
            }

            if ($key == 'image_1') {
                preg_match('/\'(.*)\'/', $value, $matches);
                if (count($matches) == 2) {
                    $data[0][$key] = 'http://ct-pass.com' . $matches[1];
                }
            }
        }

        $parse_location = $this->parse_address_location(
            $data[0]['title'],
            TRUE,
            $this->convert_lang($lang_type)
        );

        $parse_place_id_info = $this->parse_place_id_info(
            $parse_location['place_id']
        );

        $data[0]['url'] = $url;
        $data[0]['lang'] = $lang_type;

        $merge_data[] = $data[0] + $parse_location + $parse_place_id_info;

        //exit(var_dump($merge_data));

        return $merge_data;
    }

    public function parse_store_list($url, $lang) {
        $cookie = NULL;
        $rules = array(
            array(
                'rule' => '//*[@class="text-box"]/a/@href',
                'name' => 'url'
            )
        );

        $doc = new DOMDocument();

        $result = curl_get($url, $cookie, $url);

        if ($result === FALSE) {
            $this->_error(__METHOD__);
            echo 'End store list' . PHP_EOL;
            return;
        }

        $data = $this->_parse(0, $result, $doc, $rules, __METHOD__);
        if ($data === FALSE) {
            echo 'End store list' . PHP_EOL;
            return;
        }

        foreach ($data as $key => &$value) {
            $value['url'] = 'http://ct-pass.com' . $value['url'] . $lang;
        }

        return $data;
    }

    public function parse_store($url, $lang_type) {
        $cookie = NULL;
        $rules = array(
            array(
                'rule' => '//*[@id="main"]/section/div/div/div[1]/div/h2',
                'name' => 'title'
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/section/p',
                'name' => 'description',
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/section/div[3]/following-sibling::text()',
                'name' => 'promo',
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/div[2]/aside/div/ul/li/div[1]/a[1]',
                'name' => 'address',
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/div[2]/aside/div/ul/li/div[1]/a[2]',
                'name' => 'phone',
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/div[2]/aside/div/ul/li/div[1]/a[4]/@href',
                'name' => 'official_url',
            ),
            array(
                'rule' => '//*[@class="map_frame"]/iframe/@src',
                'name' => 'map_url',
            ),
            array(
                'rule' => '//*[@id="main"]/section/div/div/div[2]/aside/div/ul/li/div[1]/a[3]',
                'name' => 'office_hours',
            ),
            array(
                'rule' => '//*[@id="slider-post"]/li[1]/img/@src',
                'name' => 'image_1',
            ),
            array(
                'rule' => '//*[@id="slider-post"]/li[2]/img/@src',
                'name' => 'image_2',
            ),
            array(
                'rule' => '//*[@id="slider-post"]/li[3]/img/@src',
                'name' => 'image_3',
            ),
        );

        $doc = new DOMDocument();

        $result = curl_get($url, $cookie, $url);

        if ($result === FALSE) {
            $this->_error(__METHOD__);
            echo 'End store' . PHP_EOL;
            return;
        }

        $data = $this->_parse(0, $result, $doc, $rules, __METHOD__);
        if ($data === FALSE) {
            echo 'End store' . PHP_EOL;
            return;
        }

        foreach ($data[0] as $key => $value) {
            $data[0][$key] = trim($data[0][$key]);
            if ($key === 'image_1' && ! empty($data[0][$key])) {
                $data[0][$key] = 'http://ct-pass.com' . $data[0][$key];
            }
            if ($key === 'image_2' && ! empty($data[0][$key])) {
                $data[0][$key] = 'http://ct-pass.com' . $data[0][$key];
            }
            if ($key === 'image_3' && ! empty($data[0][$key])) {
                $data[0][$key] = 'http://ct-pass.com' . $data[0][$key];
            }
        }

        $data[0]['url'] = $url;
        $data[0]['lang'] = $lang_type;

        $parse_address = $this->parse_address_location(
            $data[0]['address'],
            FALSE,
            $this->convert_lang($lang_type)
        );
        $parse_place_id_info = $this->parse_place_id_info(
            $parse_address['place_id'],
            0,
            $this->convert_lang($lang_type)
        );

        $data[0] = $data[0] + $parse_address + $parse_place_id_info;

        return $data;
    }
}
