<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kontrakan_m extends CI_Model
{
    private $_table = "kontrakan";

    public $id_kontrakan;
    public $nama_kontrakan;
    public $kategori;
    public $deskripsi;
    public $id_admin;
    public $kamar_tersedia;
    public $thumbnail;
    public $lat;
    public $lon;
    public $jalan;
    public $kecamatan;
    public $deskripsi_alamat;

    public function rules()
    {
        return [
            [
                'field' => 'fnama_kontrakan',
                'label' => 'Nama Kontrakan',
                'rules' => 'required'
            ],
            [
                'field' => 'fkategori',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'fdeskripsi',
                'label' => 'Deskripsi Kontrakan',
                'rules' => 'required'
            ],
            [
                'field' => 'fkamar_tersedia',
                'label' => 'Kamar Tersedia',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'fharga',
                'label' => 'Harga Per Bulan',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'flat',
                'label' => 'lokasi',
                'rules' => 'required'
            ],
            [
                'field' => 'flon',
                'label' => 'lokasi',
                'rules' => 'required'
            ],
            [
                'field' => 'fjalan',
                'label' => 'Nama jalan',
                'rules' => 'required'
            ],
            [
                'field' => 'fkecamatan',
                'label' => 'Nama kecamatan',
                'rules' => 'required'
            ],
            [
                'field' => 'fdeskripsi_alamat',
                'label' => 'Deskripsi alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'fpemilik',
                'label' => 'Pemilik kontrakan',
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
        return $this->db->get_where($this->_table, ["id_kontrakan" => $id])->row();
    }
    public function add($post, $file)
    {
        $post = $this->input->post();
        $this->id_kontrakan = uniqid('k');
        $this->id_admin = $this->session->userdata('id_user');
        $this->nama_kontrakan = $post['fnama_kontrakan'];
        $this->kategori = $post['fkategori'];
        $this->id_owner = $post['fpemilik'];
        $this->deskripsi = $post['fdeskripsi'];
        $this->kamar_tersedia = $post['fkamar_tersedia'];
        $this->harga = $post['fharga'];
        $this->lat = $post['flat'];
        $this->lon = $post['flon'];
        $this->thumbnail = $file;
        $this->jalan = $post['fjalan'];
        $this->kecamatan = $post['fkecamatan'];
        $this->deskripsi_alamat = $post['fdeskripsi_alamat'];
        $this->db->insert($this->_table, $this);
    }
    public function Delete($id)
    {
        $this->db->where('id_kontrakan', $id);
        $this->db->delete($this->_table);
    }
    public function update($post, $file)
    {
        $post = $this->input->post();
        $this->db->set('nama_kontrakan', $post['fnama_kontrakan']);
        $this->db->set('kategori', $post['fkategori']);
        $this->db->set('deskripsi', $post['fdeskripsi']);
        $this->db->set('kamar_tersedia', $post['fkamar_tersedia']);
        $this->db->set('harga', $post['fharga']);
        $this->db->set('lat', $post['flat']);
        $this->db->set('lon', $post['flon']);
        $this->db->set('jalan', $post['fjalan']);
        $this->db->set('kecamatan', $post['fkecamatan']);
        $this->db->set('id_owner', $post['fpemilik']);
        $this->db->set('deskripsi_alamat', $post['fdeskripsi_alamat']);
        $this->db->set('thumbnail', $file);
        $this->db->where('id_kontrakan', $post['fid_kontrakan']);
        $this->db->update($this->_table);
    }
}

/* End of file kontrakan_m.php */
