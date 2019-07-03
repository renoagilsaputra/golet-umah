<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_Home extends CI_Model {
    
    public function getRumahInHome() {
        $sql = "SELECT * FROM rumah ORDER by waktu ASC LIMIT 4";
        return $this->db->query($sql)->result_array();
    }

    public function addBukutamu($data) {
        $this->db->insert('bukutamu', $data);
    }
                           
                        
}
                        
/* End of file M_Home.php */
    
                        