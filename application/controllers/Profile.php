<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_user();
    }

    public function index()
    {
        $this->template->load('shared/admin/index', 'profile/index');
    }
}

/* End of file Profile.php */
