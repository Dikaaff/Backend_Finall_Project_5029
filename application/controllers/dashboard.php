<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_all_mahasiswa();
        $this->load->view('dashboard', $data);
    }

    public function add() {
        $this->load->view('add_mahasiswa');
    }

    public function save() {
        $data = [
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'kelas' => $this->input->post('kelas'),
            'matakuliah' => $this->input->post('matakuliah'),
            'nilai' => $this->input->post('nilai')
        ];

        $this->Mahasiswa_model->insert_mahasiswa($data);
        redirect('dashboard');
    }

    public function edit($id) {
        $data['mahasiswa'] = $this->Mahasiswa_model->get_mahasiswa_by_id($id);
        $this->load->view('edit_mahasiswa', $data);
    }

    public function update($id) {
        $data = [
            'nama' => $this->input->post('nama'),
            'jurusan' => $this->input->post('jurusan'),
            'kelas' => $this->input->post('kelas'),
            'matakuliah' => $this->input->post('matakuliah'),
            'nilai' => $this->input->post('nilai')
        ];

        $this->Mahasiswa_model->update_mahasiswa($id, $data);
        redirect('dashboard');
    }

    public function delete($id) {
        $this->Mahasiswa_model->delete_mahasiswa($id);
        redirect('dashboard');
    }
}