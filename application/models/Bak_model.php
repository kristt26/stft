<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bak_model extends CI_model{ 



    public function SoalJoin()
        {
            $this->db->select('*');
            $this->db->from('ujian');
            $this->db->join('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
          //  $this->db->from('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
          //  $this->db->join('validasi_soal_tes','validasi_soal_tes.kd_soal_tes=soal_tes.kd_soal_tes');
           $query = $this->db->get()->result_array();

           $GroupsoalValid = [];
           foreach ($query as $data) {
               
                $GroupsoalValid[$data['nama_ujian']][] = array(
                    "kd_soal_tes" => $data['kd_soal_tes'],
                    "soal" => $data['soal'],
                    //"status_validasi" => $data['status_validasi'],
                 //   "keterangan" => $data['keterangan']
                );
    
           }

           return $GroupsoalValid;

           print'<pre>';
           var_dump($GroupsoalValid); die;



        //     print'<pre>';
        // var_dump($q);
        // die;

        }


    public function JumlahValidasi()
    {
        $soal = $this->db->get('soal_tes')->result_array();
        foreach ($soal as $sl) {
            $soalValidasi = $this->db->get_where('validasi_soal_tes',['kd_soal_tes' => $sl['kd_soal_tes']])->result_array();
            
             
        
        } 
    }





    public function HasilTes()
    {
        $this->db->select('*');
        $this->db->from('data_diri');
        $this->db->join('hasil_ujian','hasil_ujian.kd_maba=data_diri.kd_maba');
        $this->db->join('ujian','ujian.kd_ujian=hasil_ujian.kd_ujian');
        $this->db->join('asal_keuskupan','asal_keuskupan.kd_keuskupan=data_diri.kd_keuskupan');
       // $this->db->where();
    //    $this->db->join('ujian','ujian.kd_ujian=jawaban.kd_ujian');
        return $this->db->get()->result_array();

        // print'<pre>';
        // var_dump($query); 
        
        
        // die;

    }





    public function ValidasiSoalId() 
    {
        $query = $this->db->query("SELECT MAX(kd_soal_valid) as kdvalid from validasi_soal_tes");
        $hasil = $query->row();
        return $hasil->kdvalid;
    }






}