<?php
defined('BASEPATH') or exit('No direct script access allowed');

class report_m extends CI_Model
{

    public function rules()
    {
        return [
            [
                'field' => 'ftgl_awal',
                'label' => 'Tanggal Awal',
                'rules' => 'required'
            ],
            [
                'field' => 'ftgl_akhir',
                'label' => 'Tanggal Akhir',
                'rules' => 'required'
            ],
            [
                'field' => 'fpemilik',
                'label' => 'Pemilik',
                'rules' => 'required'
            ],
            [
                'field' => 'fstatus',
                'label' => 'Status pemesanan',
                'rules' => 'required'
            ],
        ];
    }
    public function get_by_range($tgl1, $tgl2, $pemilik, $status)
    {
        $this->db->select('*');
        $this->db->where('pesanan.tgl_pesanan >=', $tgl1);
        $this->db->where('pesanan.tgl_pesanan <=', $tgl2);
        $this->db->from('pesanan');
        if ($status != 'all') {
            $this->db->where('pesanan.status_pemesanan =', $status);
        }
        $this->db->join('users', 'users.id_user = pesanan.id_user');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan');
        $this->db->join('owners', 'owners.id_owner = kontrakan.id_owner');
        if ($pemilik != 'all') {
            $this->db->where('kontrakan.id_owner =', $pemilik);
        }
        $this->db->order_by('pesanan.tgl_pesanan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_total($tgl1, $tgl2, $pemilik, $status)
    {
        $this->db->select_sum('kontrakan.harga');
        $this->db->where('pesanan.tgl_pesanan >=', $tgl1);
        $this->db->where('pesanan.tgl_pesanan <=', $tgl2);
        $this->db->from('pesanan');
        if ($status != 'all') {
            $this->db->where('pesanan.status_pemesanan =', $status);
        }
        $this->db->join('users', 'users.id_user = pesanan.id_user');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan');
        $this->db->join('owners', 'owners.id_owner = kontrakan.id_owner');
        if ($pemilik != 'all') {
            $this->db->where('kontrakan.id_owner =', $pemilik);
        }
        $this->db->order_by('pesanan.tgl_pesanan', 'asc');
        $query = $this->db->get();
        $row = $query->row();
        return $row->harga;
    }
}

/* End of file report_m.php */
