<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if( (!$this->session->userdata('id_user')) && ($this->session->userdata('role_id') != 3)) {
            redirect(base_url());
        }

        $this->load->model('M_User');
        $this->load->model('M_admin');
        $this->load->model('M_Pemilik');
        
    }

    public function index() {
        $data['header'] = $this->M_User->getRumahHeader();
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['username'] = $this->M_User->getUser();

        $data['rumah'] = $this->M_User->getRumah();
        if($this->input->post('keyword')) {
            $data['rumah'] = $this->M_User->cariRumah($this->input->post('keyword'));
        }

        $this->load->view('templates/user-header', $data);
        $this->load->view('templates/user-sidebar', $data);
        $this->load->view('user/beranda', $data);
        $this->load->view('templates/user-footer');
    }

    public function perumahan() {
        $data['header'] = $this->M_User->getRumahHeader();
        $data['username'] = $this->M_User->getUser();
        $slug = $this->uri->segment(3);
        
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['perum'] = $this->M_User->getPerumahanP($slug);
        
        
        $data['rumah'] = $this->M_User->getRumahP($slug);
        if($this->input->post('keyword')) {
            $data['rumah'] = $this->M_User->cariRumah($this->input->post('keyword'), $slug);
        }

        $this->load->view('templates/user-header', $data);
        $this->load->view('templates/user-sidebar', $data);
        $this->load->view('user/perumahan', $data);
        $this->load->view('templates/user-footer');
    }

    public function send_transaksi() {
        $id_permilik = $this->uri->segment(4);
        $id_rumah = $this->uri->segment(5);
        $id_perumahan = $this->uri->segment(6);
        $id_user = $this->uri->segment(7);
        
        $pemilik = $this->db->get_where('user', ['id_user' => $id_permilik])->row_array();
        $rumah = $this->db->get_where('rumah', ['id_rumah' => $id_rumah])->row_array();
        $perumahan = $this->db->get_where('perumahan', ['id_perumahan' => $id_perumahan])->row_array();
        $user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();

        $data = [
          'id_pemilik' => $id_permilik,
          'id_rumah' => $id_rumah,
          'id_perumahan' => $id_perumahan,
          'id_user' => $id_user,
          'waktu' => date('Y-m-d H:i:s'),
        ];

        $this->M_User->addActivity($data);

        
        redirect('https://api.whatsapp.com/send?phone='.$pemilik['telp'].'&text=[GOLET-UMAH]%0ANama%20Rumah%20:%20'.$rumah['nama_rumah'].'%0ATipe%20:%20'.$rumah['tipe'].'%0AUkuran%20:%20'.$rumah['ukuran'].'%0AHarga%20:%20'.'Rp '.number_format($rumah['harga'],0,",",".").'%0APerumahan:%20:%20'.$perumahan['nama_perumahan'].'%0APembeli%20:%20'.$user['nama']);
        
    }

    public function contact() {
        $data['username'] = $this->M_User->getUser();
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/user-header', $data);
            $this->load->view('user/contact', $data);
            $this->load->view('templates/user-footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'pesan' => $this->input->post('pesan'),
                'waktu' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert('bukutamu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');

            redirect('user/contact');
        }   
    }

    public function profile() {
        $data['username'] = $this->M_User->getUser();
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/user-header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/user-footer');
    }

    public function profile_edit($id) {
        $data['username'] = $this->M_User->getUser();
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['gender'] = ['l','p'];
        $data['user'] = $this->M_Pemilik->getUserByID($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/user-header', $data);
            $this->load->view('user/profile_edit', $data);
            $this->load->view('templates/user-footer');
        } else {
            if(empty($_FILES['gambar']['name'])) {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                    'username' => $this->input->post('username'),
                    'gender' => $this->input->post('gender'),
                    'telp' => $this->input->post('telp'),
                    
                ];

                $this->M_admin->editUser($id, $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');

                redirect('user/profile');

            } else {
                $this->_delImageUser($id);
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
                    
                        'gambar' => $file['file_name'],
                    ];
                    
                    $this->M_admin->editUser($id,$data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    
                    redirect('user/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('user/profile/edit/'.$id);
            }
        }
        }

    }


    public function changepassword($id) {
        $data['username'] = $this->M_admin->getUser();
        $data['perumahan'] = $this->M_User->getPerumahan();
        $data['user'] = $this->M_admin->getUserByID($id);
    
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if($this->form_validation->run() == FALSE) {
    
            $this->load->view('templates/user-header', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/user-footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password1');
            if(!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('user/changepassword/'.$this->input->post('id_user'));
            } else {
                if($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('user/changepassword/'.$this->input->post('id_user'));
                } else {
                    $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('id_user', $this->input->post('id_user'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('user/profile');
                }
            }
        }
    }


    private function _delImageUser($id) {
        $img = $this->M_admin->getUserByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./assets/img/uploaded/user/$filename.*"));
    }
        
}
        
    /* End of file  User.php */
        