<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniscemilan extends CI_Controller {

	public function index()
	{
		$this->load->model('Store_model');
		$stores= $this->Store_model->getResInfo();
		$data['stores'] = $stores;
		$this->load->view('front/partials/header');
		$this->load->view('front/jeniscemilan',$data);
		$this->load->view('front/partials/footer');
	}

}
