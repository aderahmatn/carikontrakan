<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemilik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pemilik_m');
    }


    public function index()
    {
        $data['pemilik'] = $this->pemilik_m->get_all();
        $this->template->load('shared/admin/index', 'pemilik/index', $data);
    }
    public function create()
    {
        $pemilik  = $this->pemilik_m;
        $validation = $this->form_validation;
        $validation->set_rules($pemilik->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('shared/admin/index', 'pemilik/create');
        } else {
            $post = $this->input->post(null, TRUE);
            $pemilik->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data pemilik berhasil disimpan!');
                redirect('pemilik', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('pemilik');
        $pemilik = $this->pemilik_m;
        $validation = $this->form_validation;
        $validation->set_rules($pemilik->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->pemilik_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'pemilik Berhasil Diupdate!');
                redirect('pemilik', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data pemilik Tidak Diupdate!');
                redirect('pemilik', 'refresh');
            }
        }
        $data['pemilik'] = $this->pemilik_m->get_by_id($id);
        if (!$data['pemilik']) {
            $this->session->set_flashdata('error', 'Data pemilik Tidak ditemukan!');
            redirect('pemilik', 'refresh');
        }
        $this->template->load('shared/admin/index', 'pemilik/edit', $data);
    }
    public function delete($id)
    {
        $this->pemilik_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data pemilik Berhasil Dihapus!');
            redirect('pemilik', 'refresh');
        }
    }
}

/* End of file Pemilik.php */
