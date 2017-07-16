<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->cache->is_supported('memcached');
        $this->cache->is_supported('file');
    }

    protected function _success($data = NULL, $total = NULL, $is_elapsed = FALSE) {
        $response = array(
            "status" => "success",
            "errno" => NULL,
            "errmsg" => NULL,
            "data" => $data
        );

        if ($total != NULL) {
            $response['total'] = (string)$total;
        }

        if ($is_elapsed) {
            $response['elapsed'] = $this->benchmark->elapsed_time();
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function _fail($errno, $errmsg) {
        $response = array(
            "status" => "fail",
            "errno" => $errno,
            "errmsg" => $errmsg,
            "data" => NULL
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    protected function _verifyToken() {
        $access_token = $this->input->get_request_header('X-auth-token', TRUE);
        if ($access_token === NULL) {
            return FALSE;
        }

        $this->load->model('carpool/user_model');

        $uid = $this->user_model->get_uid_by_access_token($access_token);
        if ($uid) {
            return $access_token;
        } else {
            return FALSE;
        }
    }

    protected function _mem_get($key) {
        return $this->cache->memcached->get($key);
    }

    protected function _mem_del($key) {
        return $this->cache->memcached->delete($key);
    }

    protected function _mem_save($key, $data, $time = 600) {
        return $this->cache->memcached->save($key, $data, $time);
    }

    protected function _mem_clean() {
        return $this->cache->memcached->clean();
    }

    protected function _file_get($key) {
        return $this->cache->file->get($key);
    }

    protected function _file_del($key) {
        return $this->cache->file->delete($key);
    }

    protected function _file_save($key, $data, $time = 600) {
        return $this->cache->file->save($key, $data, $time);
    }

    protected function _file_clean() {
        return $this->cache->file->clean();
    }
}
