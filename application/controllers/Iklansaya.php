<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklansaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login_admin();
        $this->load->model('kontrakan_m');
        $this->load->model('pemilik_m');
        $this->load->model('kecamatan_m');
    }


    public function index()
    {
        $data['kontrakan'] = $this->kontrakan_m->get_all();
        $this->template->load('shared/admin/index', 'iklansaya/index', $data);
    }
    public function detail($id = null)
    {
        $data['kontrakan'] = $this->kontrakan_m->get_by_id($id);
        $this->template->load('shared/admin/index', 'iklansaya/detail', $data);
    }
    public function create()
    {
        $kontrakan  = $this->kontrakan_m;
        $validation = $this->form_validation;
        $validation->set_rules($kontrakan->rules());
        if ($validation->run() == FALSE) {
            $data['pemilik'] = $this->pemilik_m->get_all();
            $data['kecamatan'] = $this->kecamatan_m->get_all();
            $this->template->load('shared/admin/index', 'iklansaya/create', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $post = $this->input->post(null, TRUE);
            $config['upload_path']          = './uploads/thumbnail';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2500;
            $config['file_name']            = uniqid('img-');
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('ffoto')) {
                $this->session->set_flashdata('error', 'Foto Thumbnail harap diisi!');
                $data['pemilik'] = $this->pemilik_m->get_all();
                $data['kecamatan'] = $this->kecamatan_m->get_all();
                $this->template->load('shared/admin/index', 'iklansaya/create', $data);
            } else {
                $data = $this->upload->data();
                $file = $data['file_name'];
                $kontrakan->Add($post, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Akun berhasil didaftarkan, Silahkan Login!');
                    redirect('iklansaya', 'refresh');
                }
            }
        }
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('iklansaya');
        $kontrakan = $this->kontrakan_m;
        $validation = $this->form_validation;
        $validation->set_rules($kontrakan->rules());
        if ($this->form_validation->run()) {
            $post = $this->input->post(null, TRUE);
            if ($_FILES['ffoto']['name'] != null) {
                $config['upload_path']          = './uploads/thumbnail';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2500;
                $config['file_name']            = uniqid('img-');
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('ffoto')) {
                    $this->upload->display_errors();
                    $this->session->set_flashdata('error', 'Data kontrakan gagal diupdate!');
                    $data['pemilik'] = $this->pemilik_m->get_all();
                    $data['kecamatan'] = $this->kecamatan_m->get_all();
                    $this->template->load('shared/admin/index', 'iklansaya/index', $data);
                } else {
                    $data = $this->upload->data();
                    $file = $data['file_name'];
                    $this->kontrakan_m->update($post, $file);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Kontrakan Berhasil Diupdate!');
                        redirect('iklansaya', 'refresh');
                    } else {
                        $this->session->set_flashdata('warning', 'Data kontrakan Tidak Diupdate!');
                        redirect('iklansaya', 'refresh');
                    }
                }
            } else {
                $file = $post['ffoto_lama'];
                $this->kontrakan_m->update($post, $file);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'kontrakan Berhasil Diupdate!');
                    redirect('iklansaya', 'refresh');
                } else {
                    $this->session->set_flashdata('warning', 'Data kontrakan Tidak Diupdate!');
                    redirect('iklansaya', 'refresh');
                }
            }
        }
        $data['kontrakan'] = $this->kontrakan_m->get_by_id($id);
        if (!$data['kontrakan']) {
            $this->session->set_flashdata('error', 'Data kontrakan Tidak ditemukan!');
            redirect('iklansaya', 'refresh');
        }
        $data['pemilik'] = $this->pemilik_m->get_all();
        $data['kecamatan'] = $this->kecamatan_m->get_all();
        $this->template->load('shared/admin/index', 'iklansaya/edit', $data);
    }

    public function delete($id)
    {
        $this->kontrakan_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data kontrakan Berhasil Dihapus!');
            redirect('iklansaya', 'refresh');
        }
    }
}

/* End of file Iklansaya.php */
