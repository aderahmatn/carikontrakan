<?php
defined('BASEPATH') or exit('No direct script access allowed');

class booking_m extends CI_Model
{
    private $_table = "pesanan";

    public $id_pesanan;
    public $id_user;
    public $id_kontrakan;
    public $tgl_masuk;
    public $tgl_pesanan;
    public $bukti_bayar;

    public function rules()
    {
        return [
            [
                'field' => 'ftanggal_masuk',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
        ];
    }

    public function add($post, $file)
    {
        $post = $this->input->post();
        $this->id_pesanan = uniqid('p');
        $this->id_user = $post['fid_user'];
        $this->id_kontrakan = $post['fid_kontrakan'];
        $this->tgl_masuk = $post['ftanggal_masuk'];
        $this->tgl_pesanan = $post['ftanggal_pesanan'];
        $this->status_pemesanan = 'menunggu konfirmasi';
        $this->bukti_bayar = $file;
        $this->db->insert($this->_table, $this);
    }
    public function get_all()
    {
        $this->db->select('*');
        $this->db->join('users', 'users.id_user = pesanan.id_user', 'left');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan', 'left');

        $this->db->from($this->_table);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.id_user = pesanan.id_user', 'left');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan', 'left');
        $this->db->from($this->_table);
        $this->db->where('id_pesanan', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_by_user($id)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.id_user = pesanan.id_user', 'left');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan', 'left');
        $this->db->from($this->_table);
        $this->db->where('pesanan.id_user', $id);
        $query = $this->db->get();
        return $query->result();
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
    public function update_status($id, $status, $note = null)
    {
        $this->db->set('status_pemesanan', $status);
        $this->db->set('note', str_replace('%20', ' ', $note));
        $this->db->where('id_pesanan', $id);
        $this->db->update($this->_table);
    }
}

/* End of file booking_m.php */
