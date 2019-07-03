<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Pemilik extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if( (!$this->session->userdata('id_user')) && ($this->session->userdata('role_id') != 2)) {
            redirect(base_url());
        }

        $this->load->model('M_Pemilik');
        $this->load->model('M_admin');
    }


    public function index(){
        $data['username'] = $this->M_Pemilik->getUser();
        $this->load->view('templates/pemilik_header', $data);
        $this->load->view('pemilik/beranda');
        $this->load->view('templates/pemilik_footer');
    }

    public function perumahan() {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['perumahan'] = $this->M_Pemilik->getPerumahan($this->session->userdata('id_user'));
        $this->load->view('templates/pemilik_header', $data);
        $this->load->view('pemilik/perumahan', $data);
        $this->load->view('templates/pemilik_footer');
    }
    
    public function perumahan_add() {
        $this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('embed', 'Embed', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('pemilik/perumahan');
        } else {
            $data = [
                'nama_perumahan' => $this->input->post('nama_perumahan'),
                'alamat' => $this->input->post('alamat'),
                'embed' => $this->input->post('embed'),
                'id_user' => $this->input->post('id_user'),
                'slug' => url_title(strtolower($this->input->post('nama_perumahan'))),
                'waktu' => date('Y-m-d H:i:s'),
            ];
            $this->M_Pemilik->addPerumahan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
            redirect('pemilik/perumahan');
        }
    }


    public function perumahan_del($id) {
        $this->M_Pemilik->delPerumahan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('pemilik/perumahan');
    }

    public function perumahan_edit($id) {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['perumahan'] = $this->M_Pemilik->getPerumahanByID($id);
        
        $this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('embed', 'Embed', 'required|trim');
        

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/pemilik_header', $data);
            $this->load->view('pemilik/perumahan_edit', $data);
            $this->load->view('templates/pemilik_footer');
        } else {
            $data = [
                'nama_perumahan' => $this->input->post('nama_perumahan'),
                'alamat' => $this->input->post('alamat'),
                'embed' => $this->input->post('embed'),
                'slug' => url_title(strtolower($this->input->post('nama_perumahan'))),
                'id_user' => $this->input->post('id_user'),
            ];
            $this->M_Pemilik->editPerumahan($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
            redirect('pemilik/perumahan');
        }      
    }
   

    public function rumah() {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['perumahan'] = $this->M_Pemilik->getPerumahan($this->session->userdata('id_user'));
        $data['rumah'] = $this->M_Pemilik->getRumah($this->session->userdata('id_user'));
        $this->load->view('templates/pemilik_header', $data);
        $this->load->view('pemilik/rumah', $data);
        $this->load->view('templates/pemilik_footer');
    }

    public function rumah_add() {
        $this->form_validation->set_rules('nama_rumah', 'Nama Rumah', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');
        
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');
       
        $this->form_validation->set_rules('id_perumahan', 'ID Perumahan', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('pemilik/rumah');
        } else {
            $config = [
                'file_name' => date('d-m-Y').'-rumah',
                'upload_path' => './assets/img/uploaded/rumah/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_size' => 2048,
            ];

            $this->load->library('upload', $config);
            if($this->upload->do_upload('gambar')) {
                $file = $this->upload->data();
                $data = [
                    'nama_rumah' => $this->input->post('nama_rumah'),
                    'tipe' => $this->input->post('tipe'),
                    'ukuran' => $this->input->post('ukuran'),
                    'keterangan' => $this->input->post('keterangan'),
                    'harga' => $this->input->post('harga'),
                    'gambar' => $file['file_name'],
                    'id_perumahan' => $this->input->post('id_perumahan'),
                    'waktu' => date('Y-m-d H:i:s'),
                ];
                $this->M_Pemilik->addRumah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('pemilik/rumah');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('pemilik/rumah');
            }
        }
    }


    public function rumah_del($id) {
        $this->_delImageRumah($id);
        $this->M_admin->delRumah($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('admin/rumah');
    }
    public function rumah_edit($id) {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['rumah'] = $this->M_Pemilik->getRumahByID($id);
        $data['perumahan'] = $this->M_Pemilik->getPerumahan($this->session->userdata('id_user'));


        $this->form_validation->set_rules('nama_rumah', 'Nama Rumah', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');    
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');   
        $this->form_validation->set_rules('id_perumahan', 'ID Perumahan', 'required|trim');

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/pemilik_header', $data);
            $this->load->view('pemilik/rumah_edit', $data);
            $this->load->view('templates/pemilik_footer');
        } else {
            if(empty($_FILES['gambar']['name'])) {
                $data = [
                    'nama_rumah' => $this->input->post('nama_rumah'),
                    'tipe' => $this->input->post('tipe'),
                    'ukuran' => $this->input->post('ukuran'),
                    'keterangan' => $this->input->post('keterangan'),
                    'harga' => $this->input->post('harga'),
                    'id_perumahan' => $this->input->post('id_perumahan'),
                ];
                $this->M_admin->editRumah($this->input->post('id_rumah'), $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('pemilik/rumah');
            } else {
                $this->_delImageRumah($id);
                $config = [
                    'file_name' => date('d-m-Y').'-rumah',
                    'upload_path' => './assets/img/uploaded/rumah/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_size' => 2048,
                ];
    
                $this->load->library('upload', $config);
                if($this->upload->do_upload('gambar')) {
                    $file = $this->upload->data();
                    $data = [
                        'nama_rumah' => $this->input->post('nama_rumah'),
                        'tipe' => $this->input->post('tipe'),
                        'ukuran' => $this->input->post('ukuran'),
                        'keterangan' => $this->input->post('keterangan'),
                        'harga' => $this->input->post('harga'),
                        'gambar' => $file['file_name'],
                        'id_perumahan' => $this->input->post('id_perumahan'),
                    ];
                    
                    $this->M_admin->editRumah($this->input->post('id_rumah'), $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('pemilik/rumah');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('pemilik/rumah/edit/'.$this->input->post('id_rumah'));
                }
        }
        
    }
}
   public function bukutamu() {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('pesan', 'Pesan', 'required|trim');

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/pemilik_header', $data);
            $this->load->view('pemilik/bukutamu', $data);
            $this->load->view('templates/pemilik_footer');
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

            redirect('pemilik/bukutamu');
        }

   }

    public function user() {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['perumahan'] = $this->M_Pemilik->getPerumahan($this->session->userdata('id_user'));
        $data['user'] = $this->M_Pemilik->getUserByID($this->session->userdata('id_user'));
        $data['role_id'] = $this->db->get('role_id')->result_array();
        $this->load->view('templates/pemilik_header', $data);
        $this->load->view('pemilik/user', $data);
        $this->load->view('templates/pemilik_footer');
    }

    public function user_edit($id) {
        $data['username'] = $this->M_Pemilik->getUser();
        $data['user'] = $this->M_Pemilik->getUserByID($id);
        $data['gender'] = ['l','p'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('telp', 'Telp', 'required|trim');

        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/pemilik_header', $data);
            $this->load->view('pemilik/user_edit', $data);
            $this->load->view('templates/pemilik_footer');

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

                redirect('pemilik/user');

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
                    
                    redirect('pemilik/user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('pemilik/user/edit/'.$id);
            }
        }

    }
}

public function changepassword($id) {
    $data['username'] = $this->M_admin->getUser();
    $data['user'] = $this->M_admin->getUserByID($id);

    $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    if($this->form_validation->run() == FALSE) {

        $this->load->view('templates/pemilik_header', $data);
        $this->load->view('pemilik/changepassword', $data);
        $this->load->view('templates/pemilik_footer');
    } else {
        $password_lama = $this->input->post('password_lama');
        $password_baru = $this->input->post('password1');
        if(!password_verify($password_lama, $data['user']['password'])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('pemilik/user/changepassword/'.$this->input->post('id_user'));
        } else {
            if($password_lama == $password_baru) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('pemilik/user/changepassword/'.$this->input->post('id_user'));
            } else {
                $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                $this->db->set('password', $pass);
                $this->db->where('id_user', $this->input->post('id_user'));
                $this->db->update('user');
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('pemilik/user');
            }
        }
    }
}

    //Delete Image
    private function _delImageRumah($id) {
        $img = $this->M_admin->getRumahByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./assets/img/uploaded/rumah/$filename.*"));
    }

    private function _delImageUser($id) {
        $img = $this->M_admin->getUserByID($id);
        $filename = explode('.', $img['gambar'])[0];
        return array_map('unlink', glob(FCPATH."./assets/img/uploaded/user/$filename.*"));
    }
    
}
        
    /* End of file  pemilik.php */
        
                            