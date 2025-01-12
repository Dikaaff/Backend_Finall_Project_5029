<?php
class Mahasiswa_model extends CI_Model {

    public function get_all_mahasiswa() {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function get_mahasiswa_by_id($id) {
        return $this->db->get_where('mahasiswa', ['id' => $id])->row_array();
    }

    public function insert_mahasiswa($data) {
        return $this->db->insert('mahasiswa', $data);
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('mahasiswa', $data);
    }

    public function delete_mahasiswa($id) {
        $this->db->where('id', $id);
        return $this->db->delete('mahasiswa');
    }
}