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

        $data['Calonmaba'] = $this->Keuskupan_model->Maba();
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



























}