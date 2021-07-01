<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('admin_m');
    }


    public function Login()
    {
        check_already_login_user();
        $this->load->view('auth/user/login');
    }
    public function Loginadmin()
    {
        check_already_login_user();
        $this->load->view('auth/admin/login');
    }
    public function Register()
    {
        check_already_login_user();
        $user  = $this->user_m;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules());
        if ($validation->run() == FALSE) {
            $this->load->view('auth/user/register');
        } else {
            $post = $this->input->post(null, TRUE);
            $user->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Akun berhasil didaftarkan, Silahkan Login!');
                redirect('auth/login', 'refresh');
            }
        }
    }
    public function process_login()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->user_m->login($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'id_user' => $row->id_user,
                'nama_user' => $row->nama_user,
                'no_handphone' => $row->handphone,
                'email' => $row->email,
                'status' => 'login'
            );
            $this->session->set_userdata($params);
            redirect('beranda', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'email / password salah!');
            redirect('auth/login', 'refresh');
        }
    }
    public function process_login_admin()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->admin_m->login($post);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $params = array(
                'id_admin' => $row->id_admin,
                'nama_admin' => $row->nama_admin,
                'email' => $row->email,
                'status' => 'login_admin'
            );
            $this->session->set_userdata($params);
            redirect('dashboard', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'email / password salah!');
            redirect('auth/loginadmin', 'refresh');
        }
    }
    public function logout_admin()
    {
        $params = array(
            'id_admin',
            'nama_admin',
            'email',
            'status',
        );
        $this->session->unset_userdata($params);
        redirect('auth/loginadmin', 'refresh');
    }
    public function logout()
    {
        $params = array(
            'id_user',
            'nama_user',
            'email',
            'no_handphone',
        );
        $this->session->unset_userdata($params);
        redirect('auth/login', 'refresh');
    }
}

/* End of file Auth.php */
