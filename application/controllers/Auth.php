<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect(base_url());
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            if($user) {
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                    ];

                    $this->session->set_userdata($data);

                    if($user['role_id'] == 1) {
                        redirect('admin');
                    } else if($user['role_id'] == 2) {
                        redirect('pemilik');
                    } else if($user['role_id'] == 3) {
                        redirect('user');
                    }


                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Username tidak terdaftar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url());
            }
        }
    }

    public function register_user() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');
        

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/home_header');
            $this->load->view('auth/register_user');
            $this->load->view('templates/home_footer'); 
        } else {
            $config = [
                'file_name' => date('d-m-Y').'-user',
                'upload_path' => './assets/img/uploaded/user/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'gender' => $this->input->post('gender'),
                    'telp' => $this->input->post('telp'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 3,
                    'gambar' => $file['file_name'],
                ];
                $this->M_Auth->registerUser($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil, Silahkan Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('register/user');
            }
        }
        
    }

    public function register_pemilik() {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Ulangi Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/home_header');
            $this->load->view('auth/register_pemilik');
            $this->load->view('templates/home_footer');
        } else {
            $config = [
                'file_name' => date('d-m-Y').'-user',
                'upload_path' => './assets/img/uploaded/user/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload', $config);

            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'gender' => $this->input->post('gender'),
                    'telp' => $this->input->post('telp'),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'role_id' => 2,
                    'gambar' => $file['file_name'],
                ];
                $this->M_Auth->registerUser($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil, Silahkan Login!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect(base_url());
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('register/user');
            }
        }
    }

    public function logout() {
        
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda telah Logout<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect(base_url());
    }
        
}
        
    /* End of file  auth.php */
        
                            