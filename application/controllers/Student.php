<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
    public function view() {
        if ($this->session->userdata('role') != 'mahasiswa') {
            redirect('login');
        }
        $data['students'] = $this->db->get('students')->result();
        $this->load->view('mahasiswa/view', $data);
    }
}