<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('auth_model', 'auth_model');
    }

    public function error_404() {
        $data['title'] = '404';
        $data['menu'] = "404";
        $data['view'] = 'front/error_404';
        $this->renderPartial($data);
    }
    
    public function index() {
        // if ($this->session->has_userdata('is_admin_login')) {
        //     redirect('backend/dashboard');
        // } else {
        //     redirect('login');
        // }
    }

    //for admin login
    public function login() {
        if ($this->session->has_userdata('is_admin_login')) {
            redirect('backend/dashboard');
        }

        $data['title'] = "Login";
        if ($this->input->post('btnsubmit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() != FALSE) {
                $data = array(
                    'email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                );
                $result = $this->user->admin_login($data);
                if ($result == TRUE) {
                    $admin_data = array(
                        'admin_id' => $result['user_id'],
                        'name' => $result['name'],
                        'email' => $result['email'],
                        'is_admin_login' => TRUE,
                        'user_type' => $result['user_role'],
                    );
                    $this->session->set_userdata($admin_data);
                    redirect(base_url('backend/dashboard'), 'refresh');
                } else {
                    $data['msg'] = $this->getNotification('invalidLogin');
                }
            }
        }
        $this->load->view('backend/auth/login', $data);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

}
// end class
?>