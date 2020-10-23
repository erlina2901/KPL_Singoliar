<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('rupiah');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (($this->session->userdata('login')) == true) {
            if (($this->session->userdata('role_id') == 1)) {
                redirect('admin');
            } else {
                $data['title'] = 'Home';
                //menampilkan semua data pengguna
                $this->db->select('id, name, email, image, no_hp, role_id');
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                //menampilkan semua data alat
                $data['alat'] = $this->Alat_model->getAlatLimit();
                $this->load->view('templates/header', $data);
                $this->load->view('member/index', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }
    }

    public function profile()
    {

        if (($this->session->userdata('login')) == true) {
            if (($this->session->userdata('role_id') == 1)) {
                redirect('admin');
            } else {

                $data['title'] = 'Profile';
                $this->db->select('id, name, email, image, role_id, no_hp, date_created');
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

                $this->load->model('Penyewaan_model');
                $data['sewa1'] = $this->Penyewaan_model->getPenyewaanUser($data['user']['id']);

                $this->load->view('templates/header', $data);
                $this->load->view('member/profile', $data);
                $this->load->view('templates/footer');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect('auth');
        }
    }

    public function edit_profile()
    {
        $this->check_login();

        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $name = $this->input->post('name');
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
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger pb-1 mb-4" role="alert">' . $error . '</div>');
                    redirect('member/profile');
                }
            }

            $this->db->where('email', $email);
            $this->db->set('name', $name);
            $this->db->set('no_hp', $no_hp);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile anda telah diperbarui!</div>');
            redirect('member/profile');
        }
    }

    public function change_password()
    {
        $this->check_login();

        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $test = $data['user']['password'];
        // echo var_dump($test);
        // die;

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('member/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = md5($this->input->post('current_password'));
            $new_password = md5($this->input->post('new_password1'));
            if ($current_password != $data['user']['password']) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Currrent Password!</div>');
                redirect('member/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New password cannot be the same as currrent password!</div>');
                    redirect('member/change_password');
                } else {
                    $new_password_ = $new_password;

                    $this->db->set('password', $new_password_);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed!</div>');
                    redirect('member/change_password');
                }
            }
        }
    }

    private function check_login()
    {
        if (!$this->session->userdata("login")) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Silakan login terlebih dahulu! </div>');
            redirect(base_url("auth"));
            //kalo member mencoba masuk
        } else if (($this->session->userdata('role_id')) != 2) {
            redirect('admin');
        }
    }

}
