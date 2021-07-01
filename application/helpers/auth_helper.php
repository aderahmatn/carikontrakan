<?php

function check_already_login_user()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if ($user_session) {
        redirect('beranda', 'refresh');
    }
}

function check_not_login_user()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('id_user');
    if (!$user_session) {
        $CI->session->set_flashdata('error', 'Silahkan Login terlebih dahulu!');
        redirect('auth/login', 'refresh');
    }
}
function check_not_login_admin()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('status');
    if ($user_session != 'login_admin') {
        $CI->session->set_flashdata('error', 'Silahkan Login terlebih dahulu!');
        redirect('auth/loginAdmin', 'refresh');
    }
}

function check_role_user()
{
    $CI = &get_instance();
    $user_session = $CI->session->userdata('status');
    if ($user_session != 'login_user') {
        $CI->session->set_flashdata('error', 'Hak akses terbatas!');
        redirect('beranda', 'refresh');
    }
}
