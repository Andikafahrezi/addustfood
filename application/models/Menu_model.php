<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Menu_model extends CI_Model {
    
    public function create($formArray) {
        $this->db->insert('dishesh', $formArray);
    }

    public function created($formArray) {
        $this->db->insert('display', $formArray);
    }

    public function getMenu() {
        $result = $this->db->get('dishesh')->result_array();
        return $result;
    }
    public function getMenuu() {
        $result = $this->db->get('display')->result_array();
        return $result;
    }

    public function getSingleDish($id) {
        $this->db->where('d_id', $id);
        $dish = $this->db->get('dishesh')->row_array();
        return $dish;
    }
    public function getSingleDisplay($id) {
        $this->db->where('di_id', $id);
        $dish = $this->db->get('display')->row_array();
        return $dish;
    }

    public function update($id, $formArray) {
        $this->db->where('d_id', $id);
        $this->db->update('dishesh', $formArray);
    } 
    public function update_display($id, $formArray) {
        $this->db->where('di_id', $id);
        $this->db->update('display', $formArray);
    } 

    public function delete($id) {
        $this->db->where('d_id',$id);
        $this->db->delete('dishesh');
    }
    public function delete_display($id) {
        $this->db->where('di_id',$id);
        $this->db->delete('display');
    }

    public function countDish() {
        $query = $this->db->get('dishesh');
        return $query->num_rows();
    }

    public function getDishesh($id) {
        $this->db->where('r_id', $id);
        $dish = $this->db->get('dishesh')->result_array();
        return $dish;
    }
}
