<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    const ENABLE_CACHE = TRUE;

    public function __construct() {
        parent::__construct();
        $this->db->save_queries = FALSE;
        $this->cache->is_supported('memcached');
    }

    protected function _mem_get($key) {
        if ( ! self::ENABLE_CACHE) {
            return FALSE;
        }
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
}
