<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_admin();
    }


    public function index()
    {
        $this->template->load('shared/admin/index', 'dashboard/index');
    }
}

/* End of file Dashboard.php */
