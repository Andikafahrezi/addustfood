<?php

defined('BASEPATH') OR exit ('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_product() {
        $query = $this->db->get('display');
        return $query->result_array();
    }
}
?>