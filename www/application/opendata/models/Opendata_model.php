<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opendata_model extends MY_Model {


    public function __construct() {
        parent::__construct();
        $this->db = $this->load->database('opendata', TRUE);
    }

    public function select_power_by_lat_lng_distance($lat, $lng, int $distance = 3000, int $limit = 10) {
        $select = sprintf(
            '`title`, `location`, `address`, `local`,
            `lat`, `lng`,`phone`, `image_1`,
            `office_hours`, `cost`, `restrict_status`,
            ROUND(ST_DISTANCE_SPHERE(POINT(`lng`, `lat`), POINT(%f, %f))) AS `distance`',
            $lng,
            $lat
        );

        $this->db->select($select, FALSE);
        $this->db->having('distance <', $distance);
        $this->db->order_by('distance', 'ASC');
        $this->db->limit($limit);

        $query = $this->db->get('power');

        //exit(var_dump($this->db->last_query()));

        return $query->result_array();
    }

    public function select_store_by_lat_lng_distance($lat, $lng, $desc = NULL, int $distance = 3000, int $limit = 10) {
        $select = sprintf(
            '`title`, `description`, `location`,
            `lat`, `lng`,
            `phone`, `office_hours`, `promo`, `image_1`, `image_2`, `image_3`,
            ROUND(ST_DISTANCE_SPHERE(POINT(`lng`, `lat`), POINT(%f, %f))) AS `distance`,
            MATCH(`title`, `description`) AGAINST(%s IN BOOLEAN MODE) AS `match`',
            $lng,
            $lat,
            ($desc === NULL) ? $this->db->escape('') : $this->db->escape($desc)
        );

        $this->db->select($select);
        $this->db->where('lang', 0);
        if ($desc !== NULL) {
            $this->db->where(
                sprintf('MATCH(`title`, `description`) AGAINST(%s IN BOOLEAN MODE) > 0.001', $this->db->escape($desc)),
                NULL,
                FALSE
            );
        }
        $this->db->where('lng != 0 AND lng != 0');
        $this->db->having('distance <', $distance);
        $this->db->order_by('distance', 'ASC');
        $this->db->limit($limit);

        $query = $this->db->get('store');

        //exit(var_dump($this->db->last_query()));

        return $query->result_array();
    }

    public function select_attractions_by_lat_lng_distance($lat, $lng, $desc = NULL, int $distance = 3000, int $limit = 10) {
        $select = sprintf(
            '`url`, `title`, `description`, `location`,
            `lat`, `lng`,
            `phone`, `image_1`,
            ROUND(ST_DISTANCE_SPHERE(POINT(`lng`, `lat`), POINT(%f, %f))) AS `distance`,
            MATCH(`title`, `description`) AGAINST(%s IN BOOLEAN MODE) AS `match`',
            $lng,
            $lat,
            ($desc === NULL) ? $this->db->escape('') : $this->db->escape($desc)
        );

        $this->db->select($select);
        $this->db->where('lang', 0);
        if ($desc !== NULL) {
            $this->db->where(
                sprintf('MATCH(`title`, `description`) AGAINST(%s IN BOOLEAN MODE) > 0.001', $this->db->escape($desc)),
                NULL,
                FALSE
            );
        }
        $this->db->where('lng != 0 AND lng != 0');
        $this->db->having('distance <', $distance);
        $this->db->order_by('distance', 'ASC');
        $this->db->limit($limit);

        $query = $this->db->get('attractions');

        //exit(var_dump($this->db->last_query()));

        return $query->result_array();
    }

    public function select_green_store_by_lat_lng_distance($lat, $lng, $desc = NULL, int $distance = 3000, int $limit = 10) {
        $select = sprintf(
            '`title`, `description`, `location`, `address`,
            `lat`, `lng`,
            `phone`, `office_hours`, `promo`, `image_1`, `image_2`, `image_3`,
            ROUND(ST_DISTANCE_SPHERE(POINT(`lng`, `lat`), POINT(%f, %f))) AS `distance`,
            `tag`,
            MATCH(`title`, `description`, `tag`) AGAINST(%s IN BOOLEAN MODE) AS `match`',
            $lng,
            $lat,
            ($desc === NULL) ? $this->db->escape('') : $this->db->escape($desc)
        );

        $this->db->select($select);
        if ($desc !== NULL) {
            $this->db->where(
                sprintf('MATCH(`title`, `description`, `tag`) AGAINST(%s IN BOOLEAN MODE) > 0.001', $this->db->escape($desc)),
                NULL,
                FALSE
            );
        }
        $this->db->where('lng != 0 AND lng != 0');
        $this->db->having('distance <', $distance);
        $this->db->order_by('distance', 'ASC');
        $this->db->limit($limit);

        $query = $this->db->get('green_store');

        //exit(var_dump($this->db->last_query()));

        return $query->result_array();
    }

    public function insert_row_power(array $power) {
        if ( ! is_array($power)) {
            return FALSE;
        }

        $result = $this->db->insert('power', $power);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function replace_power(array $power) {
        if ( ! is_array($power)) {
            return FALSE;
        }

        $result = $this->db->replace('power', $power);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insert_power(array $power_array) {
        $count = count($attraction);
        echo 'Insert: ' . $count . PHP_EOL;
        if ($count == 0) {
            return FALSE;
        }

        $result = $this->db->insert_batch('power', $attraction);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insert_attractions(array $attraction_array) {
        $count = count($attraction_array);
        echo 'Insert: ' . $count . "\n";
        if ($count == 0) {
            return FALSE;
        }

        $result = $this->db->insert_batch('store', $attraction_array);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function replace_attractions(array $attractions) {
        if ( ! is_array($attractions)) {
            return FALSE;
        }

        $result = $this->db->replace('attractions', $attractions);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function replace_store(array $store) {
        if ( ! is_array($store)) {
            return FALSE;
        }

        $result = $this->db->replace('store', $store);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insert_store(array $store_array) {
        $count = count($store_array);
        echo 'Insert: ' . $count . "\n";
        if ($count == 0) {
            return FALSE;
        }

        $result = $this->db->insert_batch('store', $store_array);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function replace_green_store(array $green_store) {
        if ( ! is_array($green_store)) {
            return FALSE;
        }

        $result = $this->db->replace('green_store', $green_store);
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
