<?php
class User_model extends CI_Model {

    public function get_user_by_email($email) {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function insert_user($data) {
        return $this->db->insert('user', $data);
    }
}