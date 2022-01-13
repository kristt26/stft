<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bak extends CI_Controller {



    public function index()
    {
        $this->load->view('templates/bak/header');
        $this->load->view('templates/bak/sidebar');
        $this->load->view('templates/bak/topbar');
        $this->load->view('bak/index');
        $this->load->view('templates/bak/footer');
    }


    public function validasi_soal() 
    {
            $data['soal'] = $this->Bak_model->SoalJoin();
            $DBvalidasi = $this->Bak_model->ValidasiSoalId();
            $noValid = substr($DBvalidasi, 3, 4);
            $kd_soal_valid = (int)$noValid + 1;
            $data['kd_soal_valid'] = $kd_soal_valid;

            $dariDB = $this->Admin_model->SoalOtomatis();
            $nourut = substr($dariDB, 3, 4);
            
            
            $idsekarang = $nourut + 1;
            $data['kd_soal_tes'] = $idsekarang;
            
            $this->load->view('templates/bak/header');
            $this->load->view('templates/bak/sidebar'); 
            $this->load->view('templates/bak/topbar');
            $this->load->view('bak/validasi_soal',$data);
            $this->load->view('templates/bak/footer');
    }


    public function validasi_soal_ubah($id)
    {
            
            $this->load->view('templates/bak/header');
            $this->load->view('templates/bak/sidebar');
            $this->load->view('templates/bak/topbar');
            $this->load->view('bak/validasi_soal',$data);
            $this->load->view('templates/bak/footer');
       
    }



    public function proses_validasi($id=null,$kd_soal_valid=null)
    {
      
        if ($id!=null & $kd_soal_valid!=null ) {
            $data = [
                "kd_soal_tes" => $id,
                "kd_soal_valid" => $kd_soal_valid,
                "status_validasi" => "Valid",
                "keterangan" => "Soal Valid"
            ];
            
            $this->db->insert('validasi_soal_tes',$data);
            $message = array(
                'message'=>'<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Soal telah dinyatakan Valid <i class="fas fa-check"></i></div>',
            );
            $this->session->set_flashdata($message);
            redirect('bak/validasi_soal');
        
        } else {
            $post = $this->input->post();
            $data = [
                "kd_soal_tes" => $post['kd_soal_tes'],
                "status_validasi" => "Tidak Valid",
                "keterangan" => $post['keterangan'],
                "kd_soal_valid" => $post['kd_soal_valid']
            ];
            $this->db->insert('validasi_soal_tes',$data);
            $message = array(
                'message'=>'<div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Soal Tidak Valid  <i class="fas fa-times"></i></div>',
            );
            $this->session->set_flashdata($message);
            redirect('bak/validasi_soal');
        }
        
            

        
    }






    public function laporan_data()
    {
        $data['hasilTes'] = $this->Bak_model->HasilTes();
        $this->load->view('templates/bak/header');
        $this->load->view('templates/bak/sidebar');
        $this->load->view('templates/bak/topbar');
        $this->load->view('bak/laporan_data',$data);
        $this->load->view('templates/bak/footer');
    }















 }