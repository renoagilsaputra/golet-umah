<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_User extends CI_Model {
                        
    public function getRumahHeader() {
        $sql = "SELECT * FROM rumah ORDER by waktu DESC LIMIT 4";
        return $this->db->query($sql)->result_array();
    }                
                            
    public function getPerumahan() {
        return $this->db->get('perumahan')->result_array();
    }       
    
    public function getRumah() {
        $sql = "SELECT *, rumah.gambar as gbr_rumah FROM rumah
        LEFT JOIN perumahan ON rumah.id_perumahan = perumahan.id_perumahan
        LEFT JOIN user ON perumahan.id_user = user.id_user";
        return $this->db->query($sql)->result_array();
    }

    public function cariRumah($keyword) {
        $sql = "SELECT *, rumah.gambar as gbr_rumah FROM rumah
        LEFT JOIN perumahan ON rumah.id_perumahan = perumahan.id_perumahan
        LEFT JOIN user ON perumahan.id_user = user.id_user
        WHERE
            nama_rumah LIKE '%$keyword%'
            OR
            tipe LIKE '%$keyword%'
            OR
            ukuran LIKE '%$keyword%'
            OR
            harga LIKE '%%$keyword'
            OR
            nama_perumahan LIKE '%$keyword%'";
        return $this->db->query($sql)->result_array();
    }    

    public function getRumahP($slug) {
        $sql = "SELECT *, rumah.gambar as gbr_rumah FROM rumah
        LEFT JOIN perumahan ON rumah.id_perumahan = perumahan.id_perumahan
        LEFT JOIN user ON perumahan.id_user = user.id_user
        WHERE slug = '$slug'
        ";
        return $this->db->query($sql)->result_array();
    }

    public function cariRumahP($keyword, $slug) {
        $sql = "SELECT *, rumah.gambar as gbr_rumah FROM rumah
        LEFT JOIN perumahan ON rumah.id_perumahan = perumahan.id_perumahan
        LEFT JOIN user ON perumahan.id_user = user.id_user
        WHERE
            nama_rumah LIKE '%$keyword%'
            OR
            tipe LIKE '%$keyword%'
            OR
            ukuran LIKE '%$keyword%'
            OR
            harga LIKE '%%$keyword'
            OR
            nama_perumahan LIKE '%$keyword%'
            AND
            slug = '$slug'
            ";
        return $this->db->query($sql)->result_array();
    }
    
    public function getPerumahanP($slug) {
        $sql = "SELECT * FROM perumahan
            LEFT JOIN user ON perumahan.id_user = user.id_user
            WHERE slug = '$slug'";
        return $this->db->query($sql)->row_array();
    }

    public function getUser() {
        return $this->db->get('user')->result_array();
    }

    public function addActivity($data) {
        $this->db->insert('activity_log', $data);
    }

}
                        
/* End of file M_User.php */
    
                        