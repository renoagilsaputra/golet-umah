<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_admin extends CI_Model {
    //Perumahan
    public function getPerumahan() {
        return $this->db->get('perumahan')->result_array();
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

    //Rumah
    public function getRumah() {
        return $this->db->get('rumah')->result_array();
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
    //User
    public function getUser() {
        return $this->db->get('user')->result_array();
    }
    public function getUserByPemilik() {
        $sql = "SELECT * FROM user WHERE role_id = 1 OR role_id = 2";
        return $this->db->query($sql)->result_array();
    }
    public function getUserByID($id) {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function addUser($data) {
        $this->db->insert('user', $data);
    }

    public function editUser($id, $data) {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function delUser($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    //Role ID
    public function getRole_id() {
        return $this->db->get('role_id')->result_array();
    }
    //Activity Log
    public function getActivity() {
        $this->db->order_by('waktu', 'DESC');
        return $this->db->get('activity_log')->result_array();
    }
    public function delActivity($id) {
        $this->db->where('id_al', $id);
        $this->db->delete('activity_log');
    }     
    //Bukutamu
    public function getBukutamu() {
        $sql = "SELECT * FROM bukutamu ORDER by waktu DESC";
        return $this->db->query($sql)->result_array();
    }

    public function delBukutamu($id) {
        $this->db->where('id_bukutamu', $id);
        $this->db->delete('bukutamu');
    }
}
                        
/* End of file m_admin.php */
    
                        