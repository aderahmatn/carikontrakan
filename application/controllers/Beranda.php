<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    public function index()
    {
        $this->template->load('shared/landing/index', 'beranda/index');
    }
}

/* End of file Tes.php */
