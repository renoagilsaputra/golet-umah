<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_Pemilik extends CI_Model {



    public function getPerumahan($user) {
        $sql = "SELECT * FROM perumahan WHERE id_user = '$user'";
        return $this->db->query($sql)->result_array();
    }

    public function getPerumahanByID($id) {
        return $this->db->get_where('perumahan', ['id_perumahan' => $id])->row_array();
    }

    public function addPerumahan($data) {
        $this->db->insert('perumahan', $data);
    }

    public function delPerumahan($id) {
        $this->db->where('id_perumahan', $id);
        $this->db->delete('perumahan');
    }

    public function editPerumahan($id, $data) {
        $this->db->where('id_perumahan', $id);
        $this->db->update('perumahan', $data);
    }

    public function getRumah($user) {
        $sql = "SELECT * FROM rumah
            LEFT JOIN perumahan ON rumah.id_perumahan = perumahan.id_perumahan
            WHERE id_user = '$user'";
        return $this->db->query($sql)->result_array();
    }

    public function getRumahByID($id) {
        return $this->db->get_where('rumah', ['id_rumah' => $id])->row_array();
    }

    public function addRumah($data) {
        $this->db->insert('rumah', $data);
    }

    public function delRumah($id) {
        $this->db->where('id_rumah', $id);
        $this->db->delete('rumah');
    }

    public function editRumah($id, $data) {
        $this->db->where('id_rumah', $id);
        $this->db->update('rumah', $data);
    }

    public function getUser() {
        return $this->db->get('user')->result_array();
    }

    public function getUserByID($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }
                        
}
                        
/* End of file M_Pemilik.php */
    
                        