<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if( (!$this->session->userdata('id_user')) && ($this->session->userdata('role_id') != 1)) {
            redirect(base_url());
        }

        $this->load->model('M_admin');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['username'] = $this->M_admin->getUser();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/beranda');
        $this->load->view('templates/admin-footer');
    }
    //Perumahan
    public function perumahan() {
        $data['username'] = $this->M_admin->getUser();
        $data['user'] = $this->M_admin->getUserByPemilik();
        $data['perumahan'] = $this->M_admin->getPerumahan();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/perumahan', $data);
        $this->load->view('templates/admin-footer');
    }
    public function perumahan_add() {
        $this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('embCed', 'Embed', 'required|trim');
        $this->form_validation->set_rules('id_user', 'Userid', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('admin/perumahan');
        } else {
            $data = [
                'nama_perumahan' => $this->input->post('nama_perumahan'),
                'alamat' => $this->input->post('alamat'),
                'embed' => $this->input->post('embed'),
                'id_user' => $this->input->post('id_user'),
                'slug' => url_title(strtolower($this->input->post('nama_perumahan'))),
                'waktu' => date('Y-m-d H:i:s'),
            ];
            $this->M_admin->addPerumahan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
            redirect('admin/perumahan');
        }
    }

    public function perumahan_del($id) {
        $this->M_admin->delPerumahan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('admin/perumahan');
    }
    public function perumahan_edit($id) {
        $data['username'] = $this->M_admin->getUser();
        $data['perumahan'] = $this->M_admin->getPerumahanByID($id);
        $data['user'] = $this->M_admin->getUserByPemilik();
       
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/perumahan_edit', $data);
        $this->load->view('templates/admin-footer');
        
    }
    public function perumahan_edit_act() {
        $this->form_validation->set_rules('nama_perumahan', 'Nama Perumahan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('embed', 'Embed', 'required|trim');
        $this->form_validation->set_rules('id_user', 'User ID', 'required|trim');

        $id = $this->input->post('id_perumahan');
        if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/perumahan/edit/'.$id);
            
        } else {
            $data = [
                'nama_perumahan' => $this->input->post('nama_perumahan'),
                'alamat' => $this->input->post('alamat'),
                'embed' => $this->input->post('embed'),
                'slug' => url_title(strtolower($this->input->post('nama_perumahan'))),
                'id_user' => $this->input->post('id_user'),
            ];
            $this->M_admin->editPerumahan($id, $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
            redirect('admin/perumahan');
        }
    }
    //Rumah
    public function rumah() {
        $data['username'] = $this->M_admin->getUser();
        $data['rumah'] = $this->M_admin->getRumah();
        $data['perumahan'] = $this->M_admin->getPerumahan();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/rumah', $data);
        $this->load->view('templates/admin-footer');
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
                redirect('admin/rumah');
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
                $this->M_admin->addRumah($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('admin/rumah');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/rumah');
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
        $data['username'] = $this->M_admin->getUser();
        $data['rumah'] = $this->M_admin->getRumahByID($id);
        $data['perumahan'] = $this->M_admin->getPerumahan();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/rumah_edit', $data);
        $this->load->view('templates/admin-footer');
    }
    public function rumah_edit_act() {
        $this->form_validation->set_rules('nama_rumah', 'Nama Rumah', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe', 'required|trim');
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim');    
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim');   
        $this->form_validation->set_rules('id_perumahan', 'ID Perumahan', 'required|trim');
      
        
        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/rumah/edit/'.$this->input->post('id_rumah'));
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
                redirect('admin/rumah');
            } else {
                $this->_delImageRumah($this->input->post('id_rumah'));
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
                    redirect('admin/rumah');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/rumah/edit/'.$this->input->post('id_rumah'));
                }
            }
        }
    }
    //User
    public function user() {
        $data['username'] = $this->M_admin->getUser();
        $data['user'] = $this->M_admin->getUser();
        $data['role_id'] = $this->M_admin->getRole_id();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/admin-footer');
    }

    public function user_add(){
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
            $this->form_validation->set_rules('telp', 'Telp', 'required');
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');
            // $this->form_validation->set_rules('gambar', 'Gambar', 'required|trim');

            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/user');
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
                        'role_id' => $this->input->post('role_id'),
                        'gambar' => $file['file_name'],
                    ];
                    $this->M_admin->addUser($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/user');
                }
            }
    }

    public function user_del($id) {
        $this->_delImageUser($id);
        $this->M_admin->delUser($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('admin/user');
    }

    public function user_edit($id) {
        $data['username'] = $this->M_admin->getUser();
        $data['user'] = $this->M_admin->getUserByID($id);
        $data['gender'] = ['l','p'];
        $data['role_id'] = $this->M_admin->getRole_id();
        
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/admin-footer');    


    }

    public function user_edit_act() {
            $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
            $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
            
            $this->form_validation->set_rules('role_id', 'Role ID', 'required|trim');
            if(empty($_FILES ['gambar']['name'])) {
                if($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button></div>');
                redirect('admin/user/edit/'.$this->input->post('id_user'));
                } else {

                    $data = [
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'gender' => $this->input->post('gender'),
                        'telp' => $this->input->post('telp'),
                        'role_id' => $this->input->post('role_id'),
                    ];
                    $this->M_admin->editUser($this->input->post('id_user'), $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                    redirect('admin/user');   
                }
            } else {
                $this->_delImageUser($this->input->post('id_user'));
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
                        'role_id' => $this->input->post('role_id'),
                        'gambar' => $file['file_name'],
                    ];
                    
                    $this->M_admin->editUser($this->input->post('id_user'),$data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    
                    redirect('admin/user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal Upload Gambar!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('admin/user/edit/'.$this->input->post('id_user'));
            }
        }
    
            
}

    public function actl() {
        $data['username'] = $this->M_admin->getUser();
        $data['activity'] = $this->M_admin->getActivity();
        $data['pemilik'] = $this->M_admin->getUser();
        $data['rumah'] = $this->M_admin->getRumah();
        $data['perumahan'] = $this->M_admin->getPerumahan();
        $data['user'] = $this->M_admin->getUser();
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/activity_log', $data);
        $this->load->view('templates/admin-footer');
    }

    public function actl_del($id) {
        $this->M_admin->delActivity($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('admin/activity-log');
    }


    public function bukutamu() {
        $data['username'] = $this->M_admin->getUser();
        $data['bukutamu'] = $this->M_admin->getBukutamu();
        
        $this->load->view('templates/admin-header', $data);
        $this->load->view('admin/bukutamu', $data);
        $this->load->view('templates/admin-footer');
    }

    public function bukutamu_del($id) {
        $this->M_admin->delBukutamu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
        redirect('admin/bukutamu');
    }

    public function changepassword($id) {
        $data['username'] = $this->M_admin->getUser();
        $data['user'] = $this->M_admin->getUserByID($id);

        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if($this->form_validation->run() == FALSE) {

            $this->load->view('templates/admin-header', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/admin-footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password1');
            if(!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password Lama Salah!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/user/changepassword/'.$this->input->post('id_user'));
            } else {
                if($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password baru tidak boleh sama dengan Password Lama!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('admin/user/changepassword/'.$this->input->post('id_user'));
                } else {
                    $pass = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $pass);
                    $this->db->where('id_user', $this->input->post('id_user'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/user');
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
        
    /* End of file  admin.php */
        
                            