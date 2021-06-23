<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklansaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_user();
    }


    public function index()
    {
        $this->template->load('shared/admin/index', 'iklansaya/index');
    }
    public function create()
    {
        $this->template->load('shared/admin/index', 'iklansaya/create');
    }
}

/* End of file Iklansaya.php */
