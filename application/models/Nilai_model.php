<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {
    public function get_all() {
        return $this->db->get('nilai')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('nilai', ['id' => $id])->row();
    }

    public function save($data) {
        return $this->db->insert('nilai', $data);
    }

    public function update($id, $data) {
        return $this->db->update('nilai', $data, ['id' => $id]);
    }

    public function delete($id) {
        return $this->db->delete('nilai', ['id' => $id]);
    }
}