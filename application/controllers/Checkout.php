<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Checkout extends CI_Controller {

    function __construct() {
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Your session has been expired');
                redirect(base_url().'login/');
            }
        
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->library('cart');
        $this->load->model('Order_model');
        $this->load->model('User_model');
        $this->controller = 'checkout';
    }

    public function index() {
       $loggedUser = $this->session->userdata('user');
       $u_id = $loggedUser['user_id'];
       $user = $this->User_model->getUser($u_id);

        if($this->cart->total_items() <= 0) {
            redirect(base_url().'restaurant');
        }
            $submit = $this->input->post('placeholder');
            $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
            $this->form_validation->set_rules('address', 'Address','trim|required');

            if($this->form_validation->run() == true) { 
                $formArray['address'] = $this->input->post('address');
                
                //insert data into customer table and get last inserted custid
                $this->User_model->update($u_id,$formArray);
                $order = $this->placeOrder($u_id);
                if($order) {
                    $this->session->set_flashdata('success_msg', 'Thank You! Your order has been placed successfully!');
                       redirect(base_url().'orders');
                } else {
                     $data['error_msg'] = "Order submission failed, please try again.";
                }
            }

        $data['user'] = $user;
        $data['cartItems'] = $this->cart->contents();
        $this->load->view('front/partials/header');
        $this->load->view('front/checkout',$data);
        $this->load->view('front/partials/footer');
    }

    public function placeOrder($u_Id) {  
        $cartItems = $this->cart->contents();
        $i = 0;
        foreach($cartItems as $item) {
            $orderData[$i]['u_id'] = $u_Id;
            $orderData[$i]['d_id'] = $item['id'];
            $orderData[$i]['r_id'] = $item['r_id'];
            $orderData[$i]['d_name'] = $item['name'];
            $orderData[$i]['quantity'] = $item['qty'];
            $orderData[$i]['price'] = $item['subtotal'];
            $orderData[$i]['date'] = date('Y-m-d H:i:s', now());
            $orderData[$i]['success-date'] = date('Y-m-d H:i:s', now());
            $i++;
        }

        if(!empty($orderData)) {                
        $insertOrder = $this->Order_model->insertOrder($orderData);
            if($insertOrder) {
                $this->cart->destroy();
                //return order id
                return $insertOrder;
            }
        }   
    return false;
    }
}