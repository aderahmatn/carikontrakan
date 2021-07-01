<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemilik_m extends CI_Model
{

    private $_table = "owners";

    public $id_owner;
    public $nama_owner;
    public $handphone;
    public $email;
    public $alamat;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_pemilik',
                'label' => 'Nama Pemilik',
                'rules' => 'required'
            ],
            [
                'field' => 'fhandphone',
                'label' => 'No Handphone',
                'rules' => 'required'
            ],
            [
                'field' => 'femail',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'falamat',
                'label' => 'Alamat Pemilik',
                'rules' => 'required'
            ]
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
        return $this->db->get_where($this->_table, ["id_owner" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->id_owner = uniqid('p');
        $this->nama_owner = $post['fnama_pemilik'];
        $this->email = $post['femail'];
        $this->handphone = $post['fhandphone'];
        $this->alamat = $post['falamat'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_owner', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('nama_owner', $post['fnama_pemilik']);
        $this->db->set('email', $post['femail']);
        $this->db->set('handphone', $post['fhandphone']);
        $this->db->set('alamat', $post['falamat']);
        $this->db->where('id_owner', $post['fid_owner']);
        $this->db->update($this->_table);
    }
}

/* End of file pemlik_m.php */
