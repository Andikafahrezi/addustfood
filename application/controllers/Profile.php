<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct(){
        parent::__construct();

        $user = $this->session->userdata('user');
            if(empty($user)) {
                $this->session->set_flashdata('msg', 'Your session has been expired');
                redirect(base_url().'login/');
            }
            
        $this->load->model('User_model');
    }

    public function index() {
        $loggedUser = $this->session->userdata('user');
        $id = $loggedUser['user_id'];
        $user = $this->User_model->getUser($id);
        $data['user'] = $user;
        $this->load->view('front/partials/header');
        $this->load->view('front/profile', $data);
        $this->load->view('front/partials/footer');
    }

    public function edit($id) {
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url().'profile');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('username', 'Username','trim|required');
        $this->form_validation->set_rules('firstname', 'First Name','trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name','trim|required');
        $this->form_validation->set_rules('email', 'Email','trim|required');
        $this->form_validation->set_rules('phone', 'Phone','trim|required');
        $this->form_validation->set_rules('address', 'Address','trim|required');

        if($this->form_validation->run() == true) { 

            $formArray['username'] = $this->input->post('username');
            $formArray['f_name'] = $this->input->post('firstname');
            $formArray['l_name'] = $this->input->post('lastname');
            $formArray['email'] = $this->input->post('email');
            $formArray['phone'] = $this->input->post('phone');
            $formArray['address'] = $this->input->post('address');


            $this->User_model->update($id,$formArray);

            $this->session->set_flashdata('success', 'User updated successfully');
            redirect(base_url(). 'profile/index');


        } else {
            $data['user'] = $user; 
            $this->load->view('front/partials/header');
            $this->load->view('front/profile', $data);
            $this->load->view('front/partials/footer');
        }
    }
 
    public function editPassword($id) {
        $user = $this->User_model->getUser($id);

        if(empty($user)) {
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url().'profile');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="invalid-feedback">','</p>');
        $this->form_validation->set_rules('cPassword', 'Current password','trim|required');
        $this->form_validation->set_rules('nPassword', 'New password','trim|required');
        $this->form_validation->set_rules('nRPassword', 'New password','trim|required');

        if($this->form_validation->run() == true) { 
            $cPassword = $this->input->post('cPassword');
            $nPassword = $this->input->post('nPassword');
            $nRPassword = $this->input->post('nRPassword');
            if(password_verify($cPassword, $user['password']) == true) {
                if($nPassword != $nRPassword) {
                    $this->session->set_flashdata('pwd_error', 'password not match');
                    redirect(base_url(). 'profile/index');
                }else {
                    $formArray['password'] = password_hash($this->input->post('nPassword'), PASSWORD_DEFAULT);

                    $this->User_model->update($id,$formArray);
                    $this->session->set_flashdata('pwd_success', 'Password updated successfully');
                    redirect(base_url(). 'profile/index');
                }
            }else {
                $this->session->set_flashdata('pwd_error', 'Your old password is incorrect');
                redirect(base_url(). 'profile/index');
            }
        }else {
            $data['user'] = $user; 
            $this->load->view('front/partials/header');
            $this->load->view('front/profile', $data);
            $this->load->view('front/partials/footer');
        }
    }
}