<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Orders extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)) {
            $this->session->set_flashdata('msg', 'Your session has been expired');
            redirect(base_url().'admin/login/index');
        }
        $this->load->helper('date');
        $this->load->model('Order_model');
        $this->load->model('User_model');
    }

    public function index() {
        $order = $this->Order_model->getAllOrders();
        $data['orders'] = $order;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/orders/list', $data);
        $this->load->view('admin/partials/footer');
    }

    public function processOrder($id) {
        $order = $this->Order_model->getOrderByUser($id);
        $data['order'] = $order;
        $this->load->view('admin/partials/header');
        $this->load->view('admin/orders/processOrder', $data);
        $this->load->view('admin/partials/footer');
    }

    public function updateOrder($id) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('status','Status', 'trim|required');

        if($this->form_validation->run() == true) {

            $order['status'] = $this->input->post('status');
            $orderData['success-date'] = date('Y-m-d H:i:s', now());
            $this->Order_model->update($id, $order);
            
            $this->session->set_flashdata('success', 'Order processed successfully');
            redirect(base_url().'admin/orders/index');

        } else {
            $order = $this->Order_model->getAllOrders();
            $data['orders'] = $order;
        }
    }

    public function deleteOrder($id) {
        $order = $this->Order_model->getAllOrders();
        $data['orders'] = $order;


        if(empty($order)) {
            $this->session->set_flashdata('error', 'Order not found');
            redirect(base_url().'admin/orders/index');
        }

        $this->Order_model->deleteOrder($id);

        $this->session->set_flashdata('success', 'Order deleted successfully');
        redirect(base_url().'admin/orders/index');
    }

    public function insert_data()
    {
        // Validasi input
        $this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke form dengan pesan error
            $this->session->set_flashdata('error', 'Field payment mode wajib diisi.');
            redirect(base_url('front/checkout'));
        } else {
            // Ambil data dari form
            $payment_mode = $this->input->post('payment_mode');

            // Data yang akan disimpan ke database
            $data = [
                'payment_mode' => $payment_mode,
            ];

            // Simpan ke database melalui model
            if ($this->Your_model->insert_data($data)) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menyimpan data.');
            }
            redirect(base_url('front/checkout'));
        }
    }
    
}