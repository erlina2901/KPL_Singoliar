<?php

class Admin extends CI_Controller
{

    public function index()
    {
        $this->check_login();

        $data['title'] = 'Home';
        $data['name'] = $this->session->userdata('name');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function check_login()
    {
        if (!$this->session->userdata("login")) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect(base_url("auth"));
            //kalo member mencoba masuk
        } else if (($this->session->userdata('role_id')) != 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akses ditolak! Anda bukan admin! </div>');
            redirect('member');
        }
    }

    //--------------------------------------------------------- DASHBOARD -------------------------------------------------------------

    public function dashboard()
    {
        $this->check_login();
        $data["title"] = "Dashboard";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function profile()
    {
        $this->check_login();

        $data['title'] = 'Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function edit_profile()
    {
        $this->check_login();

        $data['title'] = 'Edit Profile';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/profile_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->set('no_hp', $no_hp);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile anda telah diperbarui!</div>');
            redirect('admin/profile');
        }
    }

    public function change_password()
    {
        $this->check_login();

        $data['title'] = 'Change Password';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['admin']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('admin/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('admin/change_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    redirect('admin/change_password');
                }
            }
        }
    }

    //------------------------------------------------------- USER ---------------------------------------------------------------


    public function user()
    {
        $this->check_login();
        $data["title"] = "User";
        $this->db->select('id, name, image, email, role_id, date_created');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo var_dump($data['admin']);
        // die;
        $this->load->model('User_model');
        $data['user'] = $this->User_model->getUser();
        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addUser()
    {
        $this->check_login();

        $data['title'] = 'Tambah User';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['level'] = $this->User_model->getUserRole();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('role_id', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/user_tambah', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $password = md5($this->input->post('password'));
            $role_id = $this->input->post('role_id');
            $is_active = 1;
            $date_created = time();

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/user');
                }
            }

            $data = [
                'name' => $name,
                'email' => $email,
                'no_hp' => $no_hp,
                'password' => $password,
                'role_id' => $role_id,
                'is_active' => $is_active,
                'date_created' => $date_created,
            ];

            $this->User_model->input_data($data, 'user');
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">User berhasil ditambah.</div>');
            redirect('admin/user');
        }
    }

    public function userEdit($id)
    {
        $this->check_login();
        $data["title"] = "Edit User";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->User_model->getUserById($id);
        $data['level'] = $this->User_model->getUserRole();

        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('role_id', 'Id', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/user_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $role_id = $this->input->post('role_id');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/avatar/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/user');
                }
            }

            $this->User_model->userEdit($id, $name, $email, $no_hp, $role_id);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">User berhasil diubah.</div>');
            redirect('admin/user');
        }
    }


    public function deleteUser($id)
    {
        $this->check_login();
        $where = array('id' => $id);
        $this->User_model->delete_data($where, 'user');
        $this->session->set_flashdata('flashu', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">User berhasil dihapus.</div>');
        // $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">User berhasil dihapus.</div>');
        redirect('admin/user');
    }


//--Absensi---
public function absensi()
    {
        $this->check_login();
        $data["title"] = "Absensi";
        $this->db->select('id, name, image, email, role_id, date_created');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Alat_model');
        $data['row'] = $this->Alat_model->getStaff();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/absensi', $data);
        $this->load->view('admin/partisi/footer');
    }
//--ALat----

    public function alat_berat()
    {
        $this->check_login();
        $data["title"] = "Alat Berat";
        $this->db->select('id, name, image, email, role_id, date_created');
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->helper('rupiah');
        $this->load->model('Alat_model');
        $data['row'] = $this->Alat_model->getAlat();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/alat_berat', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addAlat()
    {
        $this->check_login();

        $data['title'] = 'Tambah Alat';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['level'] = $this->User_model->getUserRole();
        $data['operator'] = $this->Alat_model->getOperator();

        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required|trim');
        $this->form_validation->set_rules('no_pol', 'No. Polisi', 'required|trim');
        $this->form_validation->set_rules('merk', 'Merk', 'required|trim');
        $this->form_validation->set_rules('operator', 'Operator', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/tambah_alat', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $nama_alat = $this->input->post('nama_alat');
            $no_pol = $this->input->post('no_pol');
            $merk = $this->input->post('merk');
            $operator = $this->input->post('operator');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $status = $this->input->post('status');

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/alat_berat');
                }
            }

            $data = [
                'nama_alat' => $nama_alat,
                'no_pol' => $no_pol,
                'merk' => $merk,
                'operator' => $operator,
                'harga' => $harga,
                'deskripsi' => $deskripsi,
                'status' => $status
            ];

            $this->Alat_model->input_data($data, 'alat');
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Alat berhasil ditambah.</div>');
            redirect('admin/alat_berat');
        }
    }


    public function alatEdit($id_alat)
    {
        $this->check_login();
        $data["title"] = "Edit Alat";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['alat'] = $this->Alat_model->getAlatById($id_alat);
        $data['operator'] = $this->Alat_model->getOperator();
        
        $this->form_validation->set_rules('id_alat', 'Id', 'required|trim');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/alat_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id_alat = $this->input->post('id_alat');
            $nama_alat = $this->input->post('nama_alat');
            $no_pol = $this->input->post('no_pol');
            $merk = $this->input->post('merk');
            $operator = $this->input->post('operator');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $status = $this->input->post('status');
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/produk/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-2" role="alert">' . $error . '</div>');
                    redirect('admin/alat_berat');
                }
            }
            $this->Alat_model->alatEdit($id_alat, $nama_alat, $no_pol, $merk, $operator, $harga, $deskripsi, $status);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Alat berhasil diubah.</div>');
            redirect('admin/alat_berat');
        }
    }

    public function deleteAlat($id_alat)
    {
        $this->Alat_model->deleteAlat($id_alat);
        $this->session->set_flashdata('flashp', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Alat berhasil dihapus.</div>');
        redirect('admin/alat_berat');
    }

    

    //---------------------------------------------------------PEMESANAN -------------------------------------------------------------


    public function sewa()
    {
        $this->check_login();

        $data["title"] = "Penyewaan";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->helper('rupiah');
        $this->load->model('Penyewaan_model');
        $data['row'] = $this->Penyewaan_model->getSewa();

        $this->load->view('admin/partisi/header', $data);
        $this->load->view('admin/partisi/navbar', $data);
        $this->load->view('admin/partisi/sidebar', $data);
        $this->load->view('admin/sewa', $data);
        $this->load->view('admin/partisi/footer');
    }

    public function addSewa()
    {
        $this->check_login();

        $data['title'] = 'Tambah Penyewaan';
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['nama_alat'] = $this->Penyewaan_model->getAlat();
        $data['nama_penyewa'] = $this->Penyewaan_model->getPenyewa();
        

        // $this->form_validation->set_rules('id_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('nama_penyewa', 'Nama Penyewa', 'required');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('totaljam_sewa', 'Total Jam Sewa', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/penyewaan_tambah', $data);
            $this->load->view('admin/partisi/footer');
        } else {

            $id_sewa = $this->input->post('id_sewa');
            $id_alat = $this->input->post('id_alat');
            $nama_penyewa = $this->input->post('nama_penyewa');
            $jumlah = $this->input->post('jumlah');
            $totaljam_sewa = $this->input->post('totaljam_sewa');
            $total_harga = $this->input->post('total_harga');
            $alamat = $this->input->post('alamat');
            $tanggal_sewa  = time();
            $status_sewa = 1;

            $data['item'] = $this->Alat_model->getALatById($id_alat);
        }

        if ($this->input->post('jumlah')) {

            $data = [
                'id_sewa' => $id_sewa,
                'id_alat' => $id_alat,
                'nama_penyewa' => $nama_penyewa,
                'jumlah' => $jumlah,
                'totaljam_sewa' => $totaljam_sewa,
                'total_harga' => $data['item']['harga'] * $jumlah,
                'alamat' => $alamat,
                'tanggal_sewa' => $tanggal_sewa,
                'status_sewa' => $status_sewa
            ];

            $this->Penyewaan_model->input_data($data, 'sewa');
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Penyewaan berhasil ditambah.</div>');
            redirect('admin/sewa');
        }
    }


    public function deleteSewa($id_sewa)
    {
        $this->check_login();

        $where = array('id_sewa' => $id);
        $this->Penyewaan_model->delete_data($id_sewa);
        $this->session->set_flashdata('flash', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Penyewaan berhasil dihapus.</div>');
        redirect('admin/sewa');
    }

    public function sewaEdit($id_sewa)
    {
        $this->check_login();
        $data["title"] = "Edit Penyewaan";
        $data['admin'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['sewa'] = $this->Penyewaan_model->getSewaById($id_sewa);
        $data['nama_alat'] = $this->Penyewaan_model->getAlat();

        $this->form_validation->set_rules('id_sewa', 'Id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/partisi/header', $data);
            $this->load->view('admin/partisi/navbar', $data);
            $this->load->view('admin/partisi/sidebar', $data);
            $this->load->view('admin/penyewaan_edit', $data);
            $this->load->view('admin/partisi/footer');
        } else {
            $id_sewa = $this->input->post('id_sewa');
            $id_alat = $this->input->post('id_alat');
            $nama_penyewa = $this->input->post('nama_penyewa');
            $jumlah = $this->input->post('jumlah');
            $totaljam_sewa = $this->input->post('totaljam_sewa');
            $total_harga = $this->input->post('total_harga');
            $tanggal_pakai = date_format(date_create($this->input->post('tanggal_pakai')), 'Y-m-d');
            $tanggal_selesai = date_format(date_create($this->input->post('tanggal_selesai')), 'Y-m-d');
            $alamat = $this->input->post('alamat');
            $tanggal_sewa = $this->input->post('tanggal_sewa');
            $status_sewa = $this->input->post('status_sewa');
            $this->Penyewaan_model->sewaEdit($id_sewa, $id_alat, $nama_penyewa, $jumlah, $totaljam_sewa, $total_harga, $tanggal_pakai, $tanggal_selesai, $alamat, $tanggal_sewa, $status_sewa);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Penyewaan berhasil diubah.</div>');
            redirect('admin/sewa');
        }
    }

    public function selesaiSewa($id_sewa)
    {
        $this->check_login();

        $data["title"] = "selesai Penyewaan";
        $data = $this->Penyewaan_model->getSewaById($id_sewa);
        if ($data['status_sewa'] == 1) {
            $this->Penyewaan_model->selesaiSewa($id_sewa);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Transaksi penyewaan telah selesai.</div>');
        }
        redirect('admin/sewa');
    }
}
