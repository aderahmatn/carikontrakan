<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kecamatan_m extends CI_Model
{

    private $_table = "kecamatan";

    public $id_kecamata;
    public $kecamatan;


    public function rules()
    {
        return [
            [
                'field' => 'fkecamatan',
                'label' => 'Kecamatan',
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
        return $this->db->get_where($this->_table, ["id_kecamatan" => $id])->row();
    }
    public function add($post)
    {
        $post = $this->input->post();
        $this->id_kecamatan = uniqid('p');
        $this->nama_owner = $post['fnama_pemilik'];
        $this->email = $post['femail'];
        $this->handphone = $post['fhandphone'];
        $this->alamat = $post['falamat'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete($this->_table);
    }
    public function update($post)
    {
        $post = $this->input->post();
        $this->db->set('nama_owner', $post['fnama_pemilik']);
        $this->db->set('email', $post['femail']);
        $this->db->set('handphone', $post['fhandphone']);
        $this->db->set('alamat', $post['falamat']);
        $this->db->where('id_kecamatan', $post['fid_owner']);
        $this->db->update($this->_table);
    }
}

/* End of file pemlik_m.php */
