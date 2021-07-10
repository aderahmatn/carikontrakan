<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Browse extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontrakan_m');
        $this->load->model('kecamatan_m');
    }
    public function index()
    {
        $kecamatan  = $this->kecamatan_m;
        $validation = $this->form_validation;
        $validation->set_rules($kecamatan->rules());
        if ($validation->run() == FALSE) {
            $data['kecamatan'] = $this->kecamatan_m->get_all();
            $data['kontrakan'] = $this->kontrakan_m->get_all();
            $this->template->load('shared/landing/index', 'browse/index', $data);
        } else {
            $id = $this->input->post('fkecamatan');
            $data['kecamatan'] = $this->kecamatan_m->get_all();
            $data['kontrakan'] = $this->kontrakan_m->get_by_kecamatan($id);
            $data['kecamatanDipilih']
                = $this->input->post('fkecamatan');
            if ($data['kontrakan']) {
                $this->template->load('shared/landing/index', 'browse/index', $data);
            } else {
                $this->session->set_flashdata('warning', 'Kontrakan belum tersedia diarea tersebut');
                $data['kecamatan'] = $this->kecamatan_m->get_all();
                $data['kontrakan'] = $this->kontrakan_m->get_all();
                $data['kecamatanDipilih']
                    = $this->input->post('fkecamatan');
                $this->template->load('shared/landing/index', 'browse/index', $data);
            }
        }
    }
}

/* End of file Browse.php */
