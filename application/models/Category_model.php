<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category_model extends CI_Model {
    
    public function create_cat($cat) {
        $this->db->insert('res_category', $cat);
    }

    public function getCategory() {
        $cats_result = $this->db->get('res_category')->result_array();
        return $cats_result;
    }

    public function getCat($id) {
        $this->db->where('c_id', $id);
        $cat = $this->db->get('res_category')->row_array();
        return $cat;
    }

    public function countCategory() {
        $query = $this->db->get('res_category');
        return $query->num_rows();
    }

    public function update($id, $cat) {
        $this->db->where('c_id', $id);
        $this->db->update('res_category', $cat);
    }

    public function delete($id) {
        $this->db->where('c_id', $id);
        $this->db->delete('res_category');
    }

}
