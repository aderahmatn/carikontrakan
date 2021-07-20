<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_admin();
        $this->load->model('admin_m');
    }

    public function index()
    {
        $data['admin'] = $this->admin_m->get_all();
        $this->template->load('shared/admin/index', 'admin/index', $data);
    }
    public function create()
    {
        $admin  = $this->admin_m;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules());
        if ($validation->run() == FALSE) {
            $this->template->load('shared/admin/index', 'admin/create');
        } else {
            $post = $this->input->post(null, TRUE);
            $admin->Add($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data admin berhasil disimpan!');
                redirect('admin', 'refresh');
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin');
        $admin = $this->admin_m;
        $validation = $this->form_validation;
        $validation->set_rules($admin->rules_update());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            $this->admin_m->update($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'admin Berhasil Diupdate!');
                redirect('admin', 'refresh');
            } else {
                $this->session->set_flashdata('warning', 'Data admin Tidak Diupdate!');
                redirect('admin', 'refresh');
            }
        }
        $data['admin'] = $this->admin_m->get_by_id($id);
        if (!$data['admin']) {
            $this->session->set_flashdata('error', 'Data admin Tidak ditemukan!');
            redirect('admin', 'refresh');
        }
        $this->template->load('shared/admin/index', 'admin/edit', $data);
    }
    public function delete($id)
    {
        $this->admin_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data admin Berhasil Dihapus!');
            redirect('admin', 'refresh');
        }
    }
}

/* End of file Admin.php */
