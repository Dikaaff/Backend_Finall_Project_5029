<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('register');
    }

    public function create() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');

        if ($password !== $confirm_password) {
            $this->session->set_flashdata('error', 'Password dan Konfirmasi Password tidak cocok');
            redirect('register');
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'email' => $email,
            'password' => $hashed_password
        ];

        if ($this->User_model->insert_user($data)) {
            $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
            redirect('login');
        } else {
            $this->session->set_flashdata('error', 'Terjadi kesalahan, silakan coba lagi');
            redirect('register');
        }
    }
}