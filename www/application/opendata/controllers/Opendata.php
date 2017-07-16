<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opendata extends MY_Controller {

    const CATCH_TIME = 10;

    public function __construct() {
        parent::__construct();
        $this->load->model('opendata_model');
        $this->load->library('opendata_parse');
    }

    public function index() {
        $data = array(
            'name' => 'Ting Cheng',
            'email' => 'showsky@gmail.com'
        );
        $this->_success($data);
    }

    public function coordinate() {
        $address = $this->input->get('address');

        if ($address === NULL || empty(trim($address))) {
            $this->_fail(999, 'Parameters empty');
            return;
        }

        $this->load->helper('curl_google_map');

        $result = convert_coordinate($address);
        $result_json = json_decode($result, TRUE);

        if ($result_json['status'] === 'OK') {
            $data = array(
                'lat' => NULL,
                'lng' => NULL,
            );

            foreach ($result_json['results']as $key => $value) {
                $data['lat'] = $value['geometry']['location']['lat'];
                $data['lng'] = $value['geometry']['location']['lng'];
                break;
            }

            $this->_success($data);
        } else {
            $this->_fail(302, 'Not found lat lng');
        }
    }

    public function image() {
         $url = $this->input->get('url', TRUE);

         if ($url === NULL) {
             show_error('WTF...', 404);
             return;
         }

         if (strpos($url, 'ct-pass.com') === FALSE) {
             show_error('WTF...', 404);
             return;
         }

         $this->cache->is_supported('file');

         $file_md5 = md5($url);
         $data = $this->cache->file->get($file_md5);

         if ($data === FALSE) {
             $ch = curl_init();
             curl_setopt($ch, CURLOPT_URL, $url);
             curl_setopt($ch, CURLOPT_HEADER, 0);
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
             $data = curl_exec($ch);
             curl_close($ch);

             $this->cache->file->save($file_md5, $data, 3600 * 60 * 24 * 7);
         }

         $file_time = filemtime(APPPATH . 'cache/' . $file_md5);
         $last_modified = gmdate('D, d M Y H:i:s', $file_time).' GMT';

         $parse_url = parse_url($url);
         $file_extension = (isset(pathinfo($parse_url['path'])['extension'])) ? pathinfo($parse_url['path'])['extension'] : 'jpg';

         $headers = $this->input->request_headers();
         if (isset($headers['If-Modified-Since']) && (strtotime($headers['If-Modified-Since']) == $file_time)) {
             $this->output
                ->set_header('Last-Modified: ' . $last_modified)
                ->set_status_header('304');
         } else {
             $this->output
                 ->set_content_type($file_extension)
                 ->set_header('Last-Modified: ' . $last_modified)
                 ->set_output($data);
         }
    }

    public function run_green_store() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $data = array(
            array(
                'file' => '../csv/green_01.csv',
                'rule' => array(
                    'title' => 0,
                    'address' => 1,
                    'phone' => 2,
                    'tag' => '環保旅店'
                )
            ),
            array(
                'file' => '../csv/green_02.csv',
                'rule' => array(
                    'title' => 0,
                    'address' => 1,
                    'phone' => 2,
                    'tag' => '環保餐館'
                )
            ),
            array(
                'file' => '../csv/green_03.csv',
                'rule' => array(
                    'title' => 0,
                    'address' => 3,
                    'phone' => 4,
                    'tag' => '綠色商店'
                )
            )
        );

        foreach ($data as $key => $value) {
            $content = file_get_contents($value['file']);

            echo 'Start parse power CSV' . PHP_EOL;
            $result = $this->opendata_parse->parse_insert_csv_green_store(
                $content,
                $value['rule'],
                TRUE
            );
            echo 'End parse power CSV' . PHP_EOL;
        }
    }

    // 台北市
    public function run_power_4() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $url = 'http://data.taipei/opendata/datalist/datasetMeta/download;jsessionid=849EFA72B46E1D6DD870E0C286AF23FB?id=166e8fda-93ea-4f2c-84b2-62ddea6fd0d2&rid=c2b666e0-f848-4609-90cb-5e416435b93a';

        $this->load->helper('curl');
        $content = curl_get($url);

        $data_rule = array(
            'title' => 1,
            'address' => 3,
            'local' => 4,
            //'office_hours' => $row[5],
            //'cost' => $row[6],
            //'restrict_status' => $row[7]
        );

        echo 'Start parse power CSV' . PHP_EOL;
        $result = $this->opendata_parse->parse_insert_csv_power(
            $content,
            $data_rule,
            TRUE
        );
        echo 'End parse power CSV' . PHP_EOL;
    }

    //  嘉義市
    public function run_power_3() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        //$url = 'http://data.chiayi.gov.tw/opendata/api/getResource/download?oid=02601580-97ec-430c-a8a4-da38fe57f9ae&rid=0945993c-4eb2-41d9-8ca4-7d7597eb1391';

        $content = <<<EOT
編號(Id),名稱(Site),地址(Address),備註(Remark)
1,嘉義市政府環境保護局,嘉義市吳鳳北路184號,地下室停車場,
2,財團法人天主教聖馬爾定醫院,嘉義市民權路60號,機車停車場,
3,行政院國軍退除役官兵輔導委員會臺中榮民總醫院嘉義分院,嘉義市世賢路2段600號,機車停車場,
4,嘉進車業股份有限公司,嘉義市金山路215號,
5,振南機車行,嘉義市宣信街173號,
6,滿金機車行,嘉義市民生南路570號,
7,全家便利商店股份有限公司-博東店,嘉義市博東路183號 ,
8,昇暘車業股份有限公司,嘉義市博愛路2段131-1號,
9,建福車業行,嘉義市民生北路231號,
10,嘉義市政府,嘉義市中山路199號,地下室收費亭旁,
11,衛生福利部嘉義醫院,嘉義市北港路312號,機車停車場,
12,巨豐車業有限公司,嘉義市博愛路1段438號,
13,南榮機車行,嘉義市自強街84巷2號1樓,
14,家福股份有限公司-嘉義店,嘉義市博愛路2段461號,機車停車場,
15,家福股份有限公司-北門店,嘉義市忠孝路346巷21號,機車停車場,
16,大潤發流通事業股份有限公司-嘉義分公司,嘉義市博愛路2段281號,機車停車場,
17,嘉義市西區戶政事務所,嘉義市錦州二街28號,
18,嘉義市中央廣場,嘉義市文化路與民權路機車停車格,
19,嘉義市垃圾焚化廠,嘉義市湖子內路741號,
20,嘉義市政府文化局,嘉義市忠孝路275號,機車停車場,
21,嘉義市體育場,嘉義市體育路2號,
22,港坪運動公園,嘉義市大同路100號,東側機車停車場,
23,港坪運動公園,嘉義市大同路100號,西側機車停車場,
24,全聯福利中心民權店,嘉義市民權路177號,
EOT;

        $this->load->helper('curl');
        //$content = curl_get($url);

        $data_rule = array(
            'title' => 1,
            'address' => 2,
            'local' => 3,
            //'office_hours' => $row[5],
            //'cost' => $row[6],
            //'restrict_status' => $row[7]
        );

        echo 'Start parse power CSV' . PHP_EOL;
        $result = $this->opendata_parse->parse_insert_csv_power(
            $content,
            $data_rule,
            TRUE
        );
        echo 'End parse power CSV' . PHP_EOL;
    }

    // 嘉義縣
    public function run_power_2() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $url = 'https://trello-attachments.s3.amazonaws.com/58ff06913e41a44a4619f758/594a4544ef1c1a93184e2cad/9647fd1b49f328fbfb196caacfb08859/43dc4d72-b8b7-49c0-995b-35368cead994.csv';

        $this->load->helper('curl');
        $content = curl_get($url);

        $data_rule = array(
            'title' => 2,
            'address' => 6,
            'local' => 7,
        );

        echo 'Start parse power CSV' . PHP_EOL;
        $result = $this->opendata_parse->parse_insert_csv_power(
            $content,
            $data_rule,
            TRUE
        );
        echo 'End parse power CSV' . PHP_EOL;
    }

    // 台南市
    public function run_power() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $url = 'http://data.tainan.gov.tw/dataset/97438c01-5916-49f4-b6b4-c19415ea88e5/resource/5b5eb3a9-4f35-4ef9-aba3-af38548299ca/download/automotocadd.csv';

        $this->load->helper('curl');
        $content = curl_get($url);

        $data_rule = array(
            'title' => 1,
            //'location' => 2,
            'address' => 3,
            'local' => 4,
            'office_hours' => 5,
            'cost' => 6,
            'restrict_status' => 7
        );

        echo 'Start parse power CSV' . PHP_EOL;
        $result = $this->opendata_parse->parse_insert_csv_power(
            $content,
            $data_rule,
            TRUE
        );
        echo 'End parse power CSV' . PHP_EOL;
    }

    public function run_store() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $base_url = 'http://ct-pass.com/store/storeIndex';
        $langs = array(
            '?lang=zh_TW',
            '?lang=en_US',
            '?lang=ja',
            '?lang=ko',
        );

        $this->load->helper('log');

        foreach ($langs as $lang_type => $lang) {
            $result_store_list = $this->opendata_parse->parse_store_list($base_url, $lang);

            echo 'Start parse: ' . $base_url . $lang . PHP_EOL;

            foreach ($result_store_list as $key => $value) {
                echo 'Parse url: ' . $value['url'] . PHP_EOL;
                $result_store = $this->opendata_parse->parse_store($value['url'], $lang_type);

                if ( ! is_array($result_store)) {
                    echo 'Parse result store not array !!';
                    continue;
                }

                log_db_insert($key, $result_store[0], function() {
                    return $this->opendata_model->replace_store($result_store[0]);
                });

                unset($result_store[0]);
                sleep(2);
            }
        }

        echo 'End parse' .PHP_EOL;
    }

    public function run_attractions() {
        if ( ! is_cli()) {
            exit('Not cli mode');
        }

        $base_url = 'http://ct-pass.com/store/spotIndex';
        $langs = array(
            '?lang=zh_TW',
            '?lang=en_US',
            '?lang=ja',
            '?lang=ko',
        );

        $this->load->helper('log');

        foreach ($langs as $lang_type => $lang) {
            $result_attractions_list = $this->opendata_parse->parse_attractions_list($base_url, $lang);

            echo 'Start parse: ' . $base_url . $lang . PHP_EOL;

            foreach ($result_attractions_list as $key => $value) {
                $result_attraction = $this->opendata_parse->parse_attractions($value['url'], $lang_type);

                if ( ! is_array($result_attraction)) {
                    echo 'Parse result attractions not array !!';
                    continue;
                }

                log_db_insert($key, $result_attraction[0], function($result_attraction) {
                    return $this->opendata_model->replace_attractions($result_attraction);
                });

                unset($result_attraction[0]);
                sleep(2);
            }
        }

        echo 'End parse' .PHP_EOL;
    }

    public function ticket() {
        $date = $this->input->get('date');
        $time = $this->input->get('time');

        if ($date === NULL) {
            $this->_fail(999, 'Parameters empty');
            return;
        }

        $dt = DateTime::createFromFormat("Y/m/d", $date);

        if ($dt === FALSE) {
            $this->_fail(301, 'Date illegal');
            return;
        }

        $result_json = $this->_mem_get(__CLASS__ . __METHOD__ . $date);

        if ($result_json === FALSE) {
            $this->load->helper('curl');

            $url = 'https://tickets.npm.gov.tw/ReservationHandler.ashx';
            $post_paramers = array(
                'CommandType' => 'ReadAllTimeTicket',
                'Date' => $date,
            );

            $result = curl_post(
                $url,
                $post_paramers,
                $cookie = '_ga=GA1.3.869326713.1499541925; _gid=GA1.3.1284313417.1499541925; ASP.NET_SessionId=i3gnsdpfeknrpgggcsq3ooso; sto-id=PCAKBAKM; TS018e7399=015d424a256ee5291333abb83c42b652c6af9de53880d275295d5406b326990d71b835e4394e3099e7d9d09a0215a6bc3fce0aa88ca11dad7bf39ef252f1d837751b43d90b',
                'https://tickets.npm.gov.tw/Reserve_detail.aspx'
            );

            $result_json = json_decode($result, TRUE);

            $this->_mem_save(__CLASS__ . __METHOD__ . $date, $result_json, self::CATCH_TIME);
        }

        $data = array();

        if ($time !== NULL) {
            foreach ($result_json as $key => $value) {
                if ($value['time'] === $time) {
                    array_push($data, $value);
                    break;
                }
            }
        } else {
            $data = $result_json;
        }

        $this->_success($data);
    }

    public function power() {
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');
        $distance = $this->input->get('distance');
        $limit = $this->input->get('limit');

        if ($lat === NULL || $lng === NULL) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $lat = floatval($lat);
        $lng = floatval($lng);

        if ($lat == 0 || $lng == 0) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $distance = intval($distance);
        $limit = intval($limit);

        if ($limit == 0) {
            $limit = 10;
        }

        $cache_key = md5(sprintf(
            '%s-%.3f-%.3f-%d-%d',
            __METHOD__,
            $lat,
            $lng,
            $distance,
            $limit
        ));

        $result = $this->_mem_get($cache_key);
        if ($result === FALSE) {
            $result = $this->opendata_model->select_power_by_lat_lng_distance(
                $lat,
                $lng,
                $distance,
                $limit
            );

            $this->_mem_save($cache_key, $result, self::CATCH_TIME);
        }

        $this->_success($result);
    }

    public function store() {
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');
        $distance = $this->input->get('distance');
        $desc = $this->input->get('desc');
        $limit = $this->input->get('limit');


        if ($lat === NULL || $lng === NULL) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $lat = floatval($lat);
        $lng = floatval($lng);

        if ($lat == 0 || $lng == 0) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $distance = intval($distance);
        $limit = intval($limit);

        if (empty(trim($desc))) {
            $desc = NULL;
        }

        if ($limit == 0) {
            $limit = 10;
        }

        $cache_key = md5(sprintf(
            '$s-%.3f-%.3f-%d-%s-%d',
            __METHOD__,
            $lat,
            $lng,
            $distance,
            $desc,
            $limit
        ));

        $result = $this->_mem_get($cache_key);
        if ($result === FALSE) {
            $result = $this->opendata_model->select_store_by_lat_lng_distance(
                $lat,
                $lng,
                $desc,
                $distance,
                $limit
            );

            $this->_mem_save($cache_key, $result, self::CATCH_TIME);
        }

        $this->_success($result);
    }

    public function attractions() {
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');
        $distance = $this->input->get('distance');
        $desc = $this->input->get('desc');
        $limit = $this->input->get('limit');

        if ($lat === NULL || $lng === NULL) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $lat = floatval($lat);
        $lng = floatval($lng);

        if ($lat == 0 || $lng == 0) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $distance = intval($distance);
        $limit = intval($limit);

        if (empty(trim($desc))) {
            $desc = NULL;
        }

        if ($limit == 0) {
            $limit = 10;
        }

        $cache_key = md5(sprintf(
            '%s-%.3f-%.3f-%d-%s-%d',
            __METHOD__,
            $lat,
            $lng,
            $distance,
            $desc,
            $limit
        ));

        $result = $this->_mem_get($cache_key);
        if ($result === FALSE) {
            $result = $this->opendata_model->select_attractions_by_lat_lng_distance(
                $lat,
                $lng,
                $desc,
                $distance,
                $limit
            );

            $this->_mem_save($cache_key, $result, self::CATCH_TIME);
        }

        $this->_success($result);
    }

    public function green_store() {
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');
        $distance = $this->input->get('distance');
        $desc = $this->input->get('desc');
        $limit = $this->input->get('limit');

        if ($lat === NULL || $lng === NULL) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $lat = floatval($lat);
        $lng = floatval($lng);

        if ($lat == 0 || $lng == 0) {
            $this->_fail(999, 'Parameters empty or fail');
            return;
        }

        $distance = intval($distance);
        $limit = intval($limit);

        if (empty(trim($desc))) {
            $desc = NULL;
        }

        if ($limit == 0) {
            $limit = 10;
        }

        $cache_key = md5(sprintf(
            '%s-%.3f-%.3f-%d-%s-%d',
            __METHOD__,
            $lat,
            $lng,
            $distance,
            $desc,
            $limit
        ));

        $result = $this->_mem_get($cache_key);
        if ($result === FALSE) {
            $result = $this->opendata_model->select_green_store_by_lat_lng_distance(
                $lat,
                $lng,
                $desc,
                $distance,
                $limit
            );

            $this->_mem_save($cache_key, $result, self::CATCH_TIME);
        }

        $this->_success($result);
    }
}
