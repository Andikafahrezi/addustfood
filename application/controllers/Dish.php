<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dish extends CI_Controller {

    function __construct(){
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }


    public function list($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getDishesh($id);

        $this->load->model('Store_model');
        $res = $this->Store_model->getStore($id);
        
        $data['dishesh'] = $dishesh;
        $data['res'] = $res;
        $this->load->view('front/partials/header');
        $this->load->view('front/dish', $data);
        $this->load->view('front/partials/footer');
    }

    public function addToCart($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getSingleDish($id);
        $data = array (
            'id'    => $dishesh['d_id'],
            'r_id'  => $dishesh['r_id'],
            'qty'   =>1,
            'price' => $dishesh['price'],
            'name' => $dishesh['name'],
            'payment_mode' => $dishesh['payment_mode'],
            'image' => $dishesh['img']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
    public function dish($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->Menu_model->getSingleDish($id);
        $data = array (
            'id'    => $dishesh['d_id'],
            'r_id'  => $dishesh['r_id'],
            'qty'   =>1,
            'price' => $dishesh['price'],
            'name' => $dishesh['name'],
            'payment_mode' => $dishesh['payment_mode'],
            'image' => $dishesh['img']
        );
        $this->cart->insert($data);
    }
    public function addToCartt($id) {
        $this->load->model('Menu_model');
        $display = $this->Menu_model->getSingleDish($id);
        $data = array (
            'id'    => $display['di_id'],
            'qty'   =>1,
            'price' => $display['price'],
            'name' => $display['name'],
            'payment_mode' => $dishesh['payment_mode'],
            'image' => $display['image']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
}