<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class M_Auth extends CI_Model {
                        
    public function registerUser($data) {
        $this->db->insert('user', $data);
    }
                        
                            
                        
}
                        
/* End of file M_Auth.php */
    
                        