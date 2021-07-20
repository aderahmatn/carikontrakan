<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_m extends CI_Model
{

    private $_table = "admins";

    public $id_admin;
    public $nama_admin;
    public $email;
    public $password;
    public $is_owner;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_admin',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required|valid_email|is_unique[admins.email]'
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
                'field' => 'fnama_admin',
                'label' => 'Nama Lengkap',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required|valid_email'
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
        $this->nama_admin = $post['fnama_admin'];
        $this->email = $post['femail'];
        $this->is_owner = 0;
        $this->password = md5($post['fpassword']);
        $this->db->insert($this->_table, $this);
    }
    public function add_is_owner()
    {
        $post = $this->input->post();
        $this->nama_admin = $post['fnama_pemilik'];
        $this->email = $post['femail'];
        $this->is_owner = 1;
        $this->password = md5($post['fpassword']);
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('nama_admin', $post['fnama_admin']);
        $this->db->set('email', $post['femail']);
        $this->db->where('id_admin', $post['fid_admin']);
        $this->db->update($this->_table);
    }
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from($this->_table);
        $this->db->join('owners', 'owners.email = admins.email', 'left');
        $this->db->where('admins.email', $post['femail']);
        $this->db->where('password', md5($post['fpassword']));
        $query = $this->db->get();
        return $query;
    }
}

/* End of file user_m.php */
