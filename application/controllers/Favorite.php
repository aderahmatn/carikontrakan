<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Favorite extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_user();
    }


    public function index()
    {
        $this->template->load('shared/admin/index', 'favorite/index');
    }
}

/* End of file Favorite.php */
