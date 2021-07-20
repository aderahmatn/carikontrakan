<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontrakan_m');
        $this->load->model('booking_m');
    }
    public function kontrakan($id = null)
    {
        $data['kontrakan'] = $this->kontrakan_m->get_by_id($id);
        $data['kode_booking'] = $this->booking_m->get_kode_booking($id);
        $this->template->load('shared/landing/index', 'booking/index', $data);
    }
    public function submit_pesanan($id, $kode)
    {
        $booking  = $this->booking_m;
        $validation = $this->form_validation;
        $validation->set_rules($booking->rules());
        if ($validation->run() == FALSE) {
            $data['kontrakan'] = $this->kontrakan_m->get_by_id($id);
            $data['kode_booking'] = $this->booking_m->get_kode_booking($id);
            $this->template->load('shared/landing/index', 'booking/index', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $booking->Add($post);
            if ($this->db->affected_rows() > 0) {
                $data['kode'] = $kode;
                $data['kontrakan'] = $this->kontrakan_m->get_by_id($id);
                $this->template->load('shared/landing/index', 'booking/pembayaran', $data);
            }
        }
    }
    public function pembayaran($kode)
    {
        $booking  = $this->booking_m;
        $validation = $this->form_validation;
        $validation->set_rules($booking->rules_konfrimasi());
        if ($validation->run() == FALSE) {
            $data['pesanan'] = $this->booking_m->get_by_kode($kode);
            $data['kode'] = $kode;
            $this->template->load('shared/landing/index', 'booking/konfirmasi', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $post = $this->input->post(null, TRUE);
            $config['upload_path']          = './uploads/bukti_bayar';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2500;
            $config['file_name']            = uniqid('img-');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ffoto')) {
                $this->session->set_flashdata('error', 'Bukti bayar harap diisi!');
                $data['kode'] = $kode;
                $this->template->load('shared/landing/index', 'booking/konfirmasi', $data);
            } else {
                $data = $this->upload->data();
                $file = $data['file_name'];
                $booking->konfirmasi_pembayaran($post, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'konfirmasi pembayaran berhasil');
                    redirect('beranda', 'refresh');
                }
            }
        }
    }
    public function list()
    {
        check_not_login_admin();
        $data['pesanan'] = $this->booking_m->get_all();
        $this->template->load('shared/admin/index', 'booking/list', $data);
    }
    public function mylist($id)
    {
        check_not_login_user();
        $data['pesanan'] = $this->booking_m->get_by_user($id);
        $this->template->load('shared/landing/index', 'booking/mylist', $data);
    }
    public function update($id, $status, $note,  $idKontrakan, $sisa)
    {
        check_not_login_admin();
        if (!isset($id)) redirect('booking/list');
        if ($id && $status) {
            $this->kontrakan_m->update_kamar($idKontrakan, $sisa);
            $this->booking_m->update_status($id, $status, $note);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Pesanan Berhasil Diupdate!');
                redirect('booking/list', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Pesanan Tidak Diupdate!');
                redirect('booking/list', 'refresh');
            }
        }
    }
    public function detail($id)
    {
        check_not_login_admin();
        $data['pesanan'] = $this->booking_m->get_by_id($id);
        $this->template->load('shared/admin/index', 'booking/detail', $data);
    }
    public function detail_pesanan($id)
    {
        check_not_login_user();
        $data['pesanan'] = $this->booking_m->get_by_id($id);
        $this->template->load('shared/landing/index', 'booking/detailpesanan', $data);
    }
}

/* End of file Booking.php */
