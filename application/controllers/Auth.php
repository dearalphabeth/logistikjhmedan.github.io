<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index(){
        $this->load->view('login_view');
    }

    public function register() {
    $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Print form validation errors for debugging
        echo validation_errors();
        redirect('register');
    } else {
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $role = $this->input->post('role');

        $data = array(
            'username' => $username,
            'password' => $password,
            'role' => $role
        );

        if ($this->User_model->register($data)) {
            redirect('auth');
        } else {
            echo "Error registering user.";
        }
    }
}


    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login_view');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->User_model->login($username);

            if ($user && password_verify($password, $user->password)) {
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('role', $user->role);

                if ($user->role == 'Admin Logistik') {
                    redirect('DbLogistik');
                } else if ($user->role == 'Staff Medis') {
                    redirect('staff');
                }
            } else {
                echo "Username dan Password Invalid!";
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}

