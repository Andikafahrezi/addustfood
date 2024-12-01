<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Orders extends CI_Controller {
    function __construct(){
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Your session has been expired');
                redirect(base_url().'login/');
            }
        $this->load->model('Order_model');
        $this->load->model('Store_model');
        $this->load->model('Menu_model');
    }
    public function index() {
        $user = $this->session->userdata('user');
        $order = $this->Order_model->getUserOrder($user['user_id']);
        $data['orders'] = $order;
        $this->load->view('front/partials/header');
        $this->load->view('front/orders', $data);
        $this->load->view('front/partials/footer');
    }

    public function deleteOrder($id) {
        $order = $this->Order_model->getOrder($id);

        if(empty($order)) {
            $this->session->set_flashdata('error_msg', 'Order not found');
            redirect(base_url().'orders');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success_msg', 'Your order cancelled successfully');
        redirect(base_url().'orders');

    }


    public function invoice($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;
        $u_id = $order['u_id'];
        $r_id = $order['r_id'];
        $d_id = $order['d_id'];
        $payment_mode = $order['payment_mode'];
        $res = $this->Store_model->getStore($r_id);
        $data['res'] = $res;   
        $dish = $this->Menu_model->getSingleDish($d_id);
        $data['dish'] = $dish;
    
        $user = $this->session->userdata('user');
        if($u_id == $user['user_id']) {
            if($order['status'] == 'closed') {
                $this->load->view('front/invoice', $data);
            } else {
                $this->session->set_flashdata('error_msg', 'your order is not yet complete');
                redirect(base_url().'orders');
            }
        } else {
            $this->session->set_flashdata('error_msg', 'you are accessing wrong order data');
            redirect(base_url().'orders');
        }        
    }
    public function update_payment_mode()
{
    // Load library dan model yang diperlukan
    $this->load->library('form_validation');
    $this->load->model('Order_model');

    // Validasi input
    $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kembali ke halaman form
        $this->session->set_flashdata('error', 'Payment mode is required.');
        redirect('admin/orders');
    } else {
        // Ambil data dari form
        $payment_mode = $this->input->post('payment_mode');
        if ($payment_mode) {
            echo "Payment Mode: " . $payment_mode; // Debug
        }

        // Data yang akan ditambahkan
        $data = [
            'payment_mode' => $payment_mode,
        ];

        // Masukkan data ke database
        if ($this->Order_model->insert_payment_mode($data)) {
            $this->session->set_flashdata('success', 'Payment mode updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update payment mode.');
        }

        redirect('orders');
    }
}

}