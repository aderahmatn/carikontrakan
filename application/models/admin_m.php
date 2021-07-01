<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_m extends CI_Model
{

    private $_table = "admins";

    public $id_admin;
    public $nama_admin;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_user',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[users.email]'
            ],
            [
                'field' => 'fhandphone',
                'label' => 'No Handphone',
                'rules' => 'required'
            ],
            [
                'field' => 'fpassword',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'fconf_password',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[fpassword]'
            ],
        ];
    }
    public function rules_update()
    {
        return [
            [
                'field' => 'fnama_user',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ],
            [
                'field' => 'fhandphone',
                'label' => 'No Handphone',
                'rules' => 'required'
            ],
        ];
    }

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        return $this->db->get_where($this->_table, ["id_admin" => $id])->row();
    }
    public function add()
    {
        $post = $this->input->post();
        $this->nama_user = $post['fnama_user'];
        $this->email = $post['femail'];
        $this->handphone = $post['fhandphone'];
        $this->password = md5($post['fpassword']);
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('nama_user', $post['fnama_user']);
        $this->db->set('email', $post['femail']);
        $this->db->set('hanphone', $post['fhandphone']);
        $this->db->where('id_user', $post['fid_user']);
        $this->db->update($this->_table);
    }
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->where('email', $post['femail']);
        $this->db->where('password', md5($post['fpassword']));
        $query = $this->db->get();
        return $query;
    }
}

/* End of file user_m.php */
