<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller 
{
    public function index($order_id)
{
    // Ambil data dari tabel user_order dengan kolom o_id
    $order = $this->db->get_where('user_orders', ['o_id' => $order_id])->row();

    if (!$order) {
        show_error('Order tidak ditemukan!', 404);
    }

    $data = [
        'order' => $order,
    ];

    $this->load->view('front/invoice', $data);
}

}
