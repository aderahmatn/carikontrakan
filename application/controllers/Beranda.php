<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kontrakan_m');
        $this->load->model('kecamatan_m');
    }


    public function index()
    {
        $data['kontrakan'] = $this->kontrakan_m->get_all();
        $data['kecamatan'] = $this->kecamatan_m->get_all();
        $this->template->load('shared/landing/index', 'beranda/index', $data);
    }
}

/* End of file Tes.php */
