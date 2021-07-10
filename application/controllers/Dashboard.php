<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_admin();
        $this->load->model('dashboard_m');
    }


    public function index()
    {
        $data['totalKontrakan'] = $this->dashboard_m->totalKontrakan();
        $data['totalPemilik'] = $this->dashboard_m->totalPemilik();
        $data['totalPesanan'] = $this->dashboard_m->totalPesanan();
        $data['totalUser'] = $this->dashboard_m->totalUser();
        $this->template->load('shared/admin/index', 'dashboard/index', $data);
    }
}

/* End of file Dashboard.php */
