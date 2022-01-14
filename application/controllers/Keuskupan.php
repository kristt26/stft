<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keuskupan extends CI_Controller { 


    public function index()
    {
        $this->load->view('templates/keuskupan/header');
        $this->load->view('templates/keuskupan/sidebar');
        $this->load->view('templates/keuskupan/topbar');
        $this->load->view('keuskupan/index');
        $this->load->view('templates/keuskupan/footer');
    }




    public function laporan_maba()
    {

        $data['Calonmaba'] = $this->Keuskupan_model->datamaba();
        $this->load->view('templates/keuskupan/header');
        $this->load->view('templates/keuskupan/sidebar');
        $this->load->view('templates/keuskupan/topbar');
        $this->load->view('keuskupan/laporan_maba',$data); 
        $this->load->view('templates/keuskupan/footer'); 
    }



    public function hasil_tes()
    {

        $data['Calonmaba'] = $this->Keuskupan_model->hasil();  
        $this->load->view('templates/keuskupan/header');
        $this->load->view('templates/keuskupan/sidebar');
        $this->load->view('templates/keuskupan/topbar');
        $this->load->view('keuskupan/hasil_tes',$data);
        $this->load->view('templates/keuskupan/footer');
    }

    public function upload()
    {
        $kd_maba = $this->input->post('kd_maba');
        $rekomendasi = $_FILES['rekomendasi'];
            if ($rekomendasi = '') {
            } else {
                $config['upload_path'] = './assets/img/berkas';
                $config['max_size'] = 10000;
                $config['allowed_types'] = 'jpg|png|pdf|jpeg|doc|docx';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('rekomendasi')) {
                    echo "Upload rekomendasi Gagal";
                    die();
                } else {
                    $rekomendasi = $this->upload->data('file_name');
                }
            }
        $result = $this->db->update('data_diri', ['rekomendasi'=>$rekomendasi],['kd_maba'=>$kd_maba]);
        redirect('keuskupan/laporan_maba');
    }



























}