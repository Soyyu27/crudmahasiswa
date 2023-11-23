<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Layanan_model');
    }
    public function index()
    {
        $data['judul2']= "Halaman Layanan Pengajuan Surat AKtif Kuliah ";
        $data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan'] = $this->Layanan_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("Layanan/vw_layanan", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul']="Halaman Tambah Pengajuan Surat Aktif Kuliah";
        $data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan'] = $this->Layanan_model->get();
        $this->form_validation->set_rules('jenis_surat','Jenis Surat','required',[
            'required'=> 'Jenis Surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('keperluan_surat','Keperluan Surat','required',[
            'required'=> 'Keperluan Surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('penanggungjawab_surat','Penanggung Jawab Surat','required',[
            'required'=> 'Penanggung Jawab Surat Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", $data);
            $this->load->view("layanan/vw_tambah_layanan", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data=[
                'jenis_surat' => $this->input->post('jenis_surat'),
                'keperluan_surat' => $this->input->post('keperluan_surat'),
                'penanggungjawab_surat' => $this->input->post('penanggungjawab_surat'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            $ext = pathinfo($upload_image, PATHINFO_EXTENSION);
            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']='2048';
                $config['upload_path'] = './assets/img/tak/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')){
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Layanan_model->insert($data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Pengajuan Berhasil Ditambah!</div>');
            redirect('Layanan');
        }
    }
    public function hapus($id)
    {
        $this->Layanan_model->delete($id);
        $error = $this->db->error();
        if($error['code']!=0){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class="icon
            fas fa-info-circle"></i>Data Layanan tidak dapat dihapus (sudah berelasi)!</div>');
        } else{
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"><i
            class="icon fas fa-check-circle"></i>Data Pengajuan Surat Aktif Kuliah Berhasil Dihapus!</div>');
        }
        redirect('Layanan');
    }
    public function edit($id)
    {
        $data['judul']="Halaman Edit Pengajuan Surat Aktif Kuliah";
        $data['user']= $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['layanan'] = $this->Layanan_model->get();
        $data['layanan'] = $this->Layanan_model->getById($id);
        $this->form_validation->set_rules('jenis_surat','Jenis Surat','required',[
            'required'=> 'Jenis Surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('keperluan_surat','Keperluan Surat','required',[
            'required'=> 'Keterangan Surat Wajib di isi'
        ]);
        $this->form_validation->set_rules('penanggungjawab_surat','Penanggung Jawab Surat','required',[
            'required'=> 'Penanggung Jawab Surat Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", $data);
            $this->load->view("layanan/vw_ubah_layanan", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data=[
                'jenis_surat' => $this->input->post('jenis_surat'),
                'keperluan_surat' => $this->input->post('keperluan_surat'),
                'penanggungjawab_surat' => $this->input->post('penanggungjawab_surat'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image){
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']='2048';
                $config['upload_path'] = './assets/img/tak/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')){
                    $old_image = $data['prodi']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/layanan/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Layanan_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            Data Pengajuan Surat Aktif Kuliah Berhasil Diubah!</div>');
            redirect('Layanan');
        }
    }
}