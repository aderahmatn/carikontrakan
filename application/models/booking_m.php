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
    public $nama_pemesan;
    public $kode_booking;
    public $nama_rekening_pengirim;
    public $no_rekening_pengirim;
    public $tgl_bayar;
    public $rekening_tujuan;

    public function rules()
    {
        return [
            [
                'field' => 'ftanggal_masuk',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'fnama_pemesan',
                'label' => 'Nama Pemesan',
                'rules' => 'required'
            ],
        ];
    }
    public function rules_konfrimasi()
    {
        return [
            [
                'field' => 'fnama_rekening',
                'label' => 'Nama rekening pegirim',
                'rules' => 'required'
            ],
            [
                'field' => 'fno_rekening',
                'label' => 'No rekening pegirim',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'ftanggal_bayar',
                'label' => 'Tanggal bayar',
                'rules' => 'required'
            ],
            [
                'field' => 'frekening_tujuan',
                'label' => 'Rekening tujuan',
                'rules' => 'required'
            ],
        ];
    }

    public function add($post)
    {
        $post = $this->input->post();
        $this->id_pesanan = uniqid('p');
        $this->id_user = $post['fid_user'];
        $this->id_kontrakan = $post['fid_kontrakan'];
        $this->tgl_masuk = $post['ftanggal_masuk'];
        $this->tgl_pesanan = $post['ftanggal_pesanan'];
        $this->kode_booking = $post['fkode_booking'];
        $this->status_pemesanan = 'menunggu pembayaran';
        $this->nama_pemesan = $post['fnama_pemesan'];
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
    public function get_by_kode($kode)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.id_user = pesanan.id_user', 'left');
        $this->db->join('kontrakan', 'kontrakan.id_kontrakan = pesanan.id_kontrakan', 'left');
        $this->db->from($this->_table);
        $this->db->where('kode_booking', $kode);
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
    public function konfirmasi_pembayaran($post, $file)
    {
        $post = $this->input->post();
        $this->db->set('nama_rekening_pengirim', $post['fnama_rekening']);
        $this->db->set('no_rekening_pengirim', $post['fno_rekening']);
        $this->db->set('tgl_bayar', $post['ftanggal_bayar']);
        $this->db->set('rekening_tujuan', $post['frekening_tujuan']);
        $this->db->set('bukti_bayar', $file);
        $this->db->set('status_pemesanan', 'menunggu konfirmasi');
        $this->db->set('note', 'pembayaran berhasil, sedang menunggu konfrimasi.');
        $this->db->where('kode_booking', $post['fkode_booking']);
        $this->db->update($this->_table);
    }
    public function update_status($id, $status, $note = null)
    {
        $this->db->set('status_pemesanan', $status);
        $this->db->set('note', str_replace('%20', ' ', $note));
        $this->db->where('id_pesanan', $id);
        $this->db->update($this->_table);
    }

    function get_kode_booking()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(kode_booking,4)) AS kd_max FROM pesanan WHERE DATE(tgl_pesanan)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }
}

/* End of file booking_m.php */
