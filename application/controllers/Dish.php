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
            'image' => $dishesh['img']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
}