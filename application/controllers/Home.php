<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if( ($this->session->userdata('id_user')) && ($this->session->userdata('role_id') == 1)) {
            redirect(base_url('admin'));
        } else if(($this->session->userdata('id_user')) && ($this->session->userdata('role_id') == 2)) {
            redirect(base_url('pemilik'));
        } else if (($this->session->userdata('id_user')) && ($this->session->userdata('role_id') == 3)) {
            redirect(base_url('user'));
        }
        $this->load->model('M_Home');
        $this->load->model('M_User');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['rumah'] = $this->M_Home->getRumahInHome();
        $data['header'] = $this->M_User->getRumahHeader();
        $this->load->view('templates/home_header');
        $this->load->view('home', $data);
        $this->load->view('templates/home_footer');    
    }

    public function about() {
        $this->load->view('templates/home_header');
        $this->load->view('about');
        $this->load->view('templates/home_footer');    
    }


    public function contact() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');
        
        if($this->form_validation->run() == FALSE) {
           
            $this->load->view('templates/home_header');
            $this->load->view('contact');
            $this->load->view('templates/home_footer');    
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pesan' => $this->input->post('pesan'),
                'waktu' => date('Y-m-d H:i:s'),
            ];

            $this->M_Home->addBukutamu($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
            redirect('contact');
        }
    }
   
}
        
    /* End of file  Home.php */
        
                            