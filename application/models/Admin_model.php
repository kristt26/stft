<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model{


    // keuskupan

    public function otomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_keuskupan) as kdkeuskupan from asal_keuskupan");
        $hasil = $query->row();
        return $hasil->kdkeuskupan;
    }


    public function jumlahKeuskupan()
    {
        $query = $this->db->get('asal_keuskupan');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }



    public function jumlahUjian()
    {
        $query = $this->db->get('ujian');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function jumlahGelombang()
    {
        $query = $this->db->get('gelombang');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function jumlahBerita()
    {
        $query = $this->db->get('berita');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function jumlahPeserta()
    {
        $query = $this->db->get('data_diri');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }



    public function jumlahJadwal()
    {
        $query = $this->db->get('jadwal');
        if($query->num_rows()>0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }





    // UJian

    public function UjianOtomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_ujian) as kdujian from ujian");
        $hasil = $query->row();
        return $hasil->kdujian;
    }


    // Tahun Ajaran
    public function TahunOtomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_tahun_ajaran) as kdtahun from tahun_ajaran");
        $hasil = $query->row();
        return $hasil->kdtahun;
    }



    // Gelombang
    public function GelombangOtomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_gelombang) as kdgelombang from gelombang");
        $hasil = $query->row();
        return $hasil->kdgelombang;
    }



     // Soal Tes
     public function SoalOtomatis()
     {
         $query = $this->db->query("SELECT MAX(kd_soal_tes) as kdsoal from soal_tes");
         $hasil = $query->row();
         return $hasil->kdsoal;
     }




    //  public function gelombang()
    //  {
    //      $this->db->select('*');
    //      $this->db->from('gelombang');
        
    //      $query = $this->db->get()->result_array();

    //      print'<pre>';
    //      var_dump($query); die;

    //  }






     public function SoalJoin()
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
      //  $this->db->group_by('ujian.kd_ujian');
       $query = $this->db->get()->result_array();

        $GroupUjian = [];
        foreach ($query as $data) {
            
            $GroupUjian[$data['nama_ujian']][] = array(
                 "kd_soal_tes" => $data['kd_soal_tes'],
                 "soal" => $data['soal']


            );

        }

        return $GroupUjian;


        // foreach ($GroupUjian as $group => $data) {
            
        //     echo '<br>'. $group.'<br>';
        //     foreach ($data as $soal) {
                
        //         echo $soal['soal'].'<br>';
        //     }
        // }

        // print'<pre>';
        // var_dump($GroupUjian);
        // die;




     }

     public function ValidasiSoalJoin()
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
      //  $this->db->from('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
        $this->db->join('validasi_soal_tes','validasi_soal_tes.kd_soal_tes=soal_tes.kd_soal_tes');
       $query = $this->db->get()->result_array();


       $GroupsoalValid = [];
       foreach ($query as $data) {
           
            $GroupsoalValid[$data['nama_ujian']][] = array(
                "kd_soal_tes" => $data['kd_soal_tes'],
                "soal" => $data['soal'],
                "status_validasi" => $data['status_validasi'],
                "keterangan" => $data['keterangan']
            );

       }

       return $GroupsoalValid;

    //    print'<pre>';
    //    print_r($GroupsoalValid);
    //    print'<pre>';
    //    var_dump($query); die;
     }


     //tabel status validasi pada admin
     public function SoalUbahJoin($id) 
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
        $this->db->where('kd_soal_tes', $id);
        return $this->db->get()->result_array();   
     }

     public function SoalValidasiUbah($id)
     {
        $this->db->select('*');
        $this->db->from('soal_tes');
        $this->db->join('validasi_soal_tes','validasi_soal_tes.kd_soal_tes=soal_tes.kd_soal_tes');
        $this->db->where('soal_tes.kd_soal_tes', $id);
       return $this->db->get()->result_array();
       
      //  return $this->db->get_where('soal_tes',['kd_soal_tes' => $id])->result_array();
        
     }




    //  Standar kelulusan
     public function StandarJoin()
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('standar_kelulusan','standar_kelulusan.kd_ujian=ujian.kd_ujian');
        return $this->db->get()->result_array();   
     }

     
     public function StandarOtomatis()
     {
         $query = $this->db->query("SELECT MAX(kd_standar_kelulusan) as kdstandar from standar_kelulusan");
         $hasil = $query->row();
         return $hasil->kdstandar;
     }


     public function StandarUbahJoin($id)
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('standar_kelulusan','standar_kelulusan.kd_ujian=ujian.kd_ujian');
        $this->db->where('kd_standar_kelulusan', $id);
        return $this->db->get()->result_array();   
     }

 

    //  Berita
    public function BeritaOtomatis()
     {
         $query = $this->db->query("SELECT MAX(kd_berita) as kdberita from berita");
         $hasil = $query->row();
         return $hasil->kdberita;
     }



    //  Jadwal
    public function JadwalOtomatis()
     {
         $query = $this->db->query("SELECT MAX(kd_jadwal) as kdjadwal from jadwal");
         $hasil = $query->row();
         return $hasil->kdjadwal;
     }



     public function JadwalJoin()
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('jadwal','jadwal.kd_ujian=ujian.kd_ujian');
        $this->db->join('gelombang','gelombang.kd_gelombang=jadwal.kd_gelombang');
        $this->db->join('tahun_ajaran','tahun_ajaran.kd_tahun_ajaran=jadwal.kd_tahun_ajaran');
        $query = $this->db->get()->result_array(); 
        
        
        $arr = [];
        foreach ($query as $data) {
            
            $arr[$data['gelombang']][] = [
                "nama_ujian" => $data['nama_ujian'],
                "jam_mulai" => $data['jam_mulai'],
                "jam_selesai" => $data['jam_selesai'],
                "tanggal" => $data['tanggal'],
                "gelombang" => $data['gelombang'],
                // "nama" => $data['nama'],
                "tahun_ajaran" => $data['tahun_ajaran'],
                "kd_jadwal" => $data['kd_jadwal']
            ];

        }


        return $arr;

        // print'<pre>';
        //  var_dump($arr);
        // die;

     }



     //tabel status validasi pada admin
     public function JadwalUbahJoin($id)
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('jadwal','jadwal.kd_ujian=ujian.kd_ujian');
        $this->db->join('gelombang','gelombang.kd_gelombang=jadwal.kd_gelombang');
        // $this->db->join('data_diri','data_diri.kd_maba=jadwal.kd_maba');
        $this->db->join('tahun_ajaran','tahun_ajaran.kd_tahun_ajaran=jadwal.kd_tahun_ajaran');
        $this->db->where('kd_jadwal',$id);
        return $this->db->get()->result_array();   
     }



     public function jadwalUjianHasil($maba)
     {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('jadwal','jadwal.kd_ujian=ujian.kd_ujian');
        $this->db->where('kd_gelombang',$maba['kd_gelombang']);
        $this->db->where('kd_tahun_ajaran',$maba['kd_tahun_ajaran']);
        return $this->db->get()->result_array(); 
        // $this->db->join('gelombang','gelombang.kd_gelombang=jadwal.kd_gelombang');
        // $this->db->join('data_diri','data_diri.kd_maba=jadwal.kd_maba');
        // $this->db->join('tahun_ajaran','tahun_ajaran.kd_tahun_ajaran=jadwal.kd_tahun_ajaran');
     }


     public function NoUjianHasil($kd_maba)
     {
         $this->db->select('*');
         $this->db->from('asal_keuskupan');
         $this->db->join('data_diri','data_diri.kd_keuskupan=asal_keuskupan.kd_keuskupan');
         $this->db->where('kd_maba',$kd_maba);
         return $this->db->get()->row_array();



        //  print'<pre>';
        //  var_dump($query); die;
     }


     public function periksaSoal($id,$kd_maba)
     {
    //     $this->db->from('ujian');
    //     $this->db->join('soal_tes','soal_tes.kd_ujian=ujian.kd_ujian');
    //     $this->db->join('validasi_soal_tes','validasi_soal_tes.kd_soal_tes=soal_tes.kd_soal_tes');
    //     $this->db->join('jawaban','jawaban.kd_soal_valid=validasi_soal_tes.kd_soal_valid');
    //     $this->db->join('data_diri','data_diri.kd_maba=jawaban.kd_maba');
    //    // $this->db->join('jadwal','jadwal.kd_ujian=ujian.kd_ujian');
    //     $this->db->where('soal_tes.kd_ujian',$id);
    //     $this->db->where('data_diri.kd_maba',$kd_maba);
      return $this->db->query("SELECT
        `ujian`.*,
        `soal_tes`.`kd_soal_tes`,
        `soal_tes`.`soal`,
        `validasi_soal_tes`.`kd_soal_valid`,
        `validasi_soal_tes`.`status_validasi`,
        `validasi_soal_tes`.`keterangan`,
        `jawaban`.`kd_jawaban`,
        `jawaban`.`jawaban`,
        `data_diri`.*
        FROM
        `ujian`
        LEFT JOIN `soal_tes` ON `soal_tes`.`kd_ujian` = `ujian`.`kd_ujian`
        LEFT JOIN `validasi_soal_tes` ON `validasi_soal_tes`.`kd_soal_tes` =
            `soal_tes`.`kd_soal_tes`
        LEFT JOIN `jawaban` ON `validasi_soal_tes`.`kd_soal_valid` =
            `jawaban`.`kd_soal_valid`
        LEFT JOIN `data_diri` ON `data_diri`.`kd_maba` = `jawaban`.`kd_maba` WHERE ujian.kd_ujian='$id' AND jawaban.kd_maba='$kd_maba'")->result_array(); 

        // print'<pre>';
        // var_dump($query); die;
     }


     public function hasilUjiankd()
    {
        $query = $this->db->query("SELECT MAX(kd_hasil_ujian) as kdhasil from hasil_ujian");
        $hasil = $query->row();
        return $hasil->kdhasil;
    }




  





     public function calonMaba()
     {
         $jadwal = $this->db->get('jadwal')->result_array();

        foreach ($jadwal as $key) {
            $this->db->select('*');
            $this->db->from('data_diri');
           // $this->db->join('jadwal','jadwal.kd_ujian=ujian.kd_ujian');
            $this->db->where('kd_maba',$key['kd_maba']);
          //  $this->db->where('kd_maba',$key['kd_maba']);
          //  $this->db->group_by('kd_maba');
           return $maba = $this->db->get()->result_array(); 
            // print'<pre>';
            // var_dump($maba);

        }

      //  die;
     }




     public function Maba()
     {
        $this->db->select('*');
        $this->db->from('asal_keuskupan');
        $this->db->join('data_diri','data_diri.kd_keuskupan=asal_keuskupan.kd_keuskupan');
       // $this->db->where('kd_standar_kelulusan', $id);
        return $this->db->get()->result_array();  
     }


     public function tahunTerakhir()
     {
        $tahun = $this->db->query("SELECT * FROM tahun_ajaran ORDER BY kd_tahun_ajaran DESC LIMIT 1")->row_array();
        return $tahun;
     }


     public function gelombangTerakhir()
     {
        $gelombang = $this->db->query("SELECT * FROM gelombang ORDER BY kd_gelombang DESC LIMIT 1")->row_array();
        return $gelombang;
     }



     public function berkas($id)
     {
        $this->db->select('*');
        $this->db->from('asal_keuskupan');
        $this->db->join('data_diri','data_diri.kd_keuskupan=asal_keuskupan.kd_keuskupan');
        $this->db->where('kd_maba',$id);
         $result = $this->db->get()->row_array();

        return $result;

     }



    











 }