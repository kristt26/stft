<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maba extends CI_Controller
{

  
  public function __construct()
  {
    parent::__construct();
    $this->load->library('Mylib');
    
    date_default_timezone_set("Asia/Jayapura");
  }
  




  public function index()
  {

    // $user = $this->session->userdata('id_login');
    // print_r($user); die;
    $data['user'] = $this->Maba_model->userLogin();
    $this->load->view('templates/maba/header');
    $this->load->view('templates/maba/sidebar', $data);
    $this->load->view('templates/maba/topbar');
    $this->load->view('maba/index');
    $this->load->view('templates/maba/footer');
  }



  public function daftar()
  {
    $data['tahun_ajaran'] = $this->db->get('tahun_ajaran')->result_array();
    $data['gelombang'] = $this->db->get('gelombang')->result_array();
    // $this->form_validation->set_rules('kd_login','Kode Maba','required');
    $this->form_validation->set_rules('kd_maba', 'Kode Maba', 'required');
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('no_hp', 'No HP', 'required');
    $this->form_validation->set_rules('kd_keuskupan', 'Keuskupan', 'required');
    $this->form_validation->set_rules('kd_gelombang', 'Gelombang', 'required');
    $this->form_validation->set_rules('kd_tahun_ajaran', 'Tahun Ajaran', 'required');
    // $this->form_validation->set_rules('berkas','Berkas','required');

    $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
    $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

    if ($this->form_validation->run() == FALSE) {

      $user = $this->session->userdata('kd_maba');
      //  $nama = $this->session->userdata('nama');
      //  print_r($user); die;
      $data['kd_maba'] = $user;
      // $data['user'] = $nama;

      // $dariDB = $this->Maba_model->kdOtomatis();
      // $nourut = substr($dariDB, 3, 4);
      // $idsekarang = $nourut + 1;
      // $data['kd_maba'] = $idsekarang;

      $data['kodeTahun'] = $this->Maba_model->kodeTahun();

      $data['keuskupan'] = $this->db->get('asal_keuskupan')->result_array();
      $user = $this->session->userdata('kd_maba');
      $data['kondisiRegistrasi'] = $this->Maba_model->kondisiRegistrasi();
      // print'<pre>';
      // print_r($user); die;
      //   $data['user'] = $this->Maba_model->userLogin();
      $this->load->view('templates/maba/header');
      $this->load->view('templates/maba/sidebar', $data);
      $this->load->view('templates/maba/topbar');
      $this->load->view('maba/daftar', $data);
      $this->load->view('templates/maba/footer');
    } else {


      $ktp = $_FILES['ktp'];
      if ($ktp = '') {
      } else {
        $config['upload_path'] = './assets/img/berkas';
        $config['max_size']= 5000;
        // $config['allowed_types'] = 'jpg|png|pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ktp')) {
          echo "Upload ktp Gagal";
          die();
        } else {
          $ktp = $this->upload->data('file_name');
        }
      }


      $kartu_keluarga = $_FILES['kartu_keluarga'];
      if ($kartu_keluarga = '') {
      } else {
        $config['upload_path'] = './assets/img/berkas';
        $config['max_size']= 5000;
        // $config['allowed_types'] = 'jpg|png|pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('kartu_keluarga')) {
          echo "Upload kartu_keluarga Gagal";
          die();
        } else {
          $kartu_keluarga = $this->upload->data('file_name');
        }
      }


      $surat_baptis = $_FILES['surat_baptis'];
      if ($surat_baptis = '') {
      } else {
        $config['upload_path'] = './assets/img/berkas';
        $config['max_size']= 5000;
        // $config['allowed_types'] = 'jpg|png|pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('surat_baptis')) {
          echo "Upload surat_baptis Gagal";
          die();
        } else {
          $surat_baptis = $this->upload->data('file_name');
        }
      }


      $ijazah = $_FILES['ijazah'];
      if ($ijazah = '') {
      } else {
        $config['upload_path'] = './assets/img/berkas';
        $config['max_size']= 5000;
        // $config['allowed_types'] = 'jpg|png|pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('ijazah')) {
          echo "Upload ijazah Gagal";
          die();
        } else {
          $ijazah = $this->upload->data('file_name');
        }
      }


      $post = $this->input->post();

      //  print'<pre>';
      //  print_r($post); die;



      $data = [
        "kd_maba" => $post['kd_maba'],
        //  "id_login" => $post['id_login'],
        "nama" => $post['nama'],
        "tempat_lahir" => $post['tempat_lahir'],
        "tanggal_lahir" => $post['tanggal_lahir'],
        "jenis_kelamin" => $post['jenis_kelamin'],
        "no_hp" => $post['no_hp'],
        "kd_keuskupan" => $post['kd_keuskupan'],
        "ktp" => $ktp,
        "kartu_keluarga" => $kartu_keluarga,
        "surat_baptis" => $surat_baptis,
        "ijazah" => $ijazah,
        "kd_gelombang" => $post['kd_gelombang'],
        "kd_tahun_ajaran" => $post['kd_tahun_ajaran'],
      ];

      //  print'<pre>';
      //  print_r($data); die;
      $this->db->where('kd_maba', $post['kd_maba']);
      $result = $this->db->update('data_diri', $data);
      if($result){
        $this->mylib->rest_kirim($data['no_hp'], "No. Pendaftaran Anda: ".$data['kd_maba']);
      }
      redirect('maba/daftar');
    }
  }











  public function ujian()
  {
    //  $user = $this->session->userdata('kd_maba');
    //   print_r($user); die;
    $user = $this->session->userdata('kd_maba');
    $data['user'] = $this->Maba_model->userLogin();

    $this->db->select('*');
    $this->db->from('data_diri');
    //  $this->db->join('data_diri','data_diri.id_login=login_.id_login');
    // $this->db->join('jadwal','jadwal.kd_maba=data_diri.kd_maba');
    $this->db->where('kd_maba', $user);
    $query = $this->db->get()->result_array();
    $data['jam'] = date("h:i:s");

    //jika status berkas valid maka tampilkan jadwal ujian
    // error_reporting(0);
    if ($query != null) {
      if ($query[0]['status_berkas'] == 'valid') {
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('jadwal', 'jadwal.kd_ujian=ujian.kd_ujian');
        $this->db->join('soal_tes', 'soal_tes.kd_ujian=ujian.kd_ujian');
        // $this->db->join('data_diri', 'data_diri.kd_maba=jadwal.kd_maba');
        // $this->db->where('jadwal.kd_maba', $query[0]['kd_maba']);
        $this->db->group_by('jadwal.kd_ujian');
        $data['jadwal'] = $this->db->get()->result_array();
        //  $jadwal = $this->db->get_where('jadwal',['kd_maba'=> $query[0]['kd_maba']])->result_array();
        $data['NoTes'] = $this->Maba_model->Notes();
        $data['maba'] = $this->Maba_model->getMabaById();
        $this->load->view('templates/maba/header');
        $this->load->view('templates/maba/sidebar', $data);
        $this->load->view('templates/maba/topbar');
        $this->load->view('maba/ujian', $data);
        $this->load->view('templates/maba/footer');
      } else {

        $data['belum'] = 'Anda Telah Mendaftar, Login Lagi untuk melihat nomor tes anda Jika berkas anda valid';
        $this->load->view('templates/maba/header');
        $this->load->view('templates/maba/sidebar', $data);
        $this->load->view('templates/maba/topbar');
        $this->load->view('maba/belum_validasi', $data);
        $this->load->view('templates/maba/footer');
      }
    } else {
      // $data['noNull'] = 'Anda belum mendaftar dan upload berkas';

      $this->load->view('templates/maba/header');
      $this->load->view('templates/maba/sidebar', $data);
      $this->load->view('templates/maba/topbar');
      $this->load->view('maba/belum_daftar');
      $this->load->view('templates/maba/footer');
    }
  }




  public function mulai_ujian($kd_ujian, $kd_maba, $kd_gelombang, $kd_tahun_ajaran)
  {
    $data['user'] = $this->Maba_model->userLogin();
    $data['soal'] = $this->Maba_model->SoalTes($kd_ujian);
    $data['namaUjian'] = $this->db->get_where('ujian', ['kd_ujian' => $kd_ujian])->result_array();
    $data['kd_maba'] = $kd_maba;
    $data['kd_ujian'] = $kd_ujian;
    $jadwal = $this->db->get_where("jadwal", ['kd_gelombang'=>$kd_gelombang, 'kd_tahun_ajaran'=>$kd_tahun_ajaran])->row_array();
    $data['tanggal'] = $jadwal['tanggal']. 'T' .$jadwal['jam_selesai'];

    $this->load->view('templates/maba/header');
    $this->load->view('templates/maba/sidebar', $data);
    $this->load->view('templates/maba/topbar');
    $this->load->view('maba/mulai_ujian', $data);
    $this->load->view('templates/maba/footer');
  }





  public function hasil()
  {

    $post = $this->input->post();
    // $data[$post['jawaban']] =[ 
    //   $post['jawaban']
    // ];



    // JADI, PAKAI INI UNTUK INSERT DATA
    for ($i = 0; $i < count($post['kd_soal_valid']); $i++) {



      for ($i = 0; $i < count($post['jawaban']); $i++) {

        //  echo $post['kd_soal_tes'][$i] .'<br>';
        $ger = array(
          "jawaban" => $post['jawaban'][$i],
          "kd_soal_valid" => $post['kd_soal_valid'][$i],
          "kd_maba" => $post['kd_maba']


        );

        $this->db->insert('jawaban', $ger);
      }
    }

    redirect('maba/ujian');
    // JADI, FIX

    //        die;



    //       // foreach ($post['jawaban'] as $jw) {
    //       //  // echo $jw . '<br>';
    //       //   // $de = explode(";",$jw);

    //       //   // print'<pre>';
    //       //   // var_dump($de);
    //       // }

    //       // $seb = implode(";",$post['jawaban']);
    //       // $sigi = explode(";",$seb);

    //       //  print'<pre>';
    //       // var_dump($post); 

    //       // foreach ($post as $key => $value) {
    //       //  // echo $value[0];
    //       //  for ($i=0; $i <count($value) ; $i++) { 
    //       //    echo $value[$i]. '<br>';
    //       //  }



    //       // }

    //       // die;



    //       // $this->db->insert_batch('jawaban', $post['jawaban']);
    //       // redirect('maba/ujian');
    //       // print'<pre>';
    //       // var_dump($post['kd_soal_tes']); die;






    //       //$this->db->insert_bat

    //       $datas = [
    //         // "kd_soal_valid" => $post['kd_soal_tes'],
    //        // "jawaban" => $post['jawaban'],
    //        "kd_soal_valid" => $post['kd_soal_tes'],
    //       // "kd_maba" => $post['kd_maba']

    //       ];
    //       $yy = [];
    //       foreach ($datas as $data => $dat) {
    //       //  echo $data . '<br>';
    //         foreach ($dat as $dtt => $dt) {
    //       //    echo $dt . '<br>';
    //           $yy[] = [
    //             "kd_soal_valid" => $dt,
    //           ];
    //         }
    //       }




    //       // print'<pre>';
    //       // var_dump($yy); die;



    //       $datax = [
    //         "jawaban" => $post['jawaban'],
    //       //  "kd_soal_valid" => $post['kd_soal_valid'],
    //        // "kd_soal_valid" => $post['kd_soal_tes'],

    //       ];


    //       //  $this->db->insert_batch('jawaban', $datax);
    //       // redirect('maba/ujian');





    //       $xy = [];
    //       foreach ($datax as $datx => $dax) {
    //     //    echo $datx . '<br>';
    //         foreach ($dax as $dtx => $dx) {
    //      //     echo $dx . '<br>';
    //           $xy[] = [
    //            // "kd_soal_valid" => $dx,
    //             "jawaban" => $dx
    //           ];
    //         }
    //       }



    //       // foreach ($yy as $key => $valid) {
    //       //  echo $valid['kd_soal_valid'] ;
    //       //   foreach ($xy as $key => $jawaban) {
    //       //    // echo $valid['kd_soal_valid'] . '<br>';
    //       //     echo $jawaban['jawaban'] . '<br>';
    //       //   }
    //       // }

    //       // print'<pre>';
    //       // var_dump($yy);
    //       // print'<pre>';
    //       // var_dump($xy);
    //       // die;



    //       $ar1 = [];
    //       // TES-------------------------------------------------------------------------------------
    //       foreach ($yy as $dey => $salut) {
    //         // $value['jawaban'].'<br>' ;
    //         foreach ($xy as $key => $value) {
    //           $ar1[$value['jawaban']] = array(
    //             "kd_soal_valid" => $salut['kd_soal_valid'],
    //             "jawaban" => $value['jawaban'],
    //             "kd_maba" => $post['kd_maba']
    //             //"jawban" => $post['jawaban']
    //           );
    //         }

    //       }

    //       $ar2 = [];
    //       foreach ($yy as $dey => $salut) {
    //         // $value['jawaban'].'<br>' ;
    //         foreach ($xy as $key => $value) {
    //           $ar2[$salut['kd_soal_valid']] = array(
    //             "kd_soal_valid" => $salut['kd_soal_valid'],
    //             "jawaban" => $value['jawaban'],
    //             "kd_maba" => $post['kd_maba'],
    //             //"jawban" => $post['jawaban']
    //           );
    //         }

    //       }



    //       // $gas = array_merge_recursive(
    //       //   $ar2,
    //       //   $post['jawaban']
    //       // );


    //       // print'<pre>';
    //       // var_dump($gas); 

    //       $jar = [];

    //       foreach ($ar2 as $key => $value) {
    //         $jar['kd_soal_valid'][] = array(

    //            "kd_soal_valid" => $value['kd_soal_valid'],
    //            "kd_maba" => $post['kd_maba']

    //           ) ;

    //         // print'<pre>';
    //         // var_dump($jar);
    //       }

    //       $angkut = [];
    //       foreach ($post['jawaban'] as $asli) {
    //      // foreach ($ar2 as $key => $value) {
    //           // $zz = array_unique($post['jawaban']);
    //           // var_dump($zz);
    //           echo $asli . '<br>';
    //         // echo $key . ': ';
    //         // $angkut[] = array(

    //         //   "kd_soal_valid" => $value['kd_soal_valid'],
    //         //   "jawaban" => $asli
    //         // );
    //       //  $angkut["kd_soal_valid"] = $value['kd_soal_valid'];

    //       $angkut['jawaban'][] = array(

    //         "jawaban" => $asli

    //        ) ;
    //      //   $angkut["jawaban"][] = $asli;
    //         // foreach ($value as $bix => $galon) {

    //         // }

    //         // print'<pre>';
    //         // var_dump($angkut);
    //     //  }


    //     //  $this->db->insert('jawaban', $angkut["jawaban"]);
    //     //   redirect('maba/ujian');

    //     }  

    //     $hajar = array_merge_recursive(
    //       $jar,
    //       $angkut
    //     );


    //   //   $seb = implode(";",$hajar);
    //   // //  $sigi = explode(";",$seb);
    //   //   print'<pre>';
    //   //   print_r($seb);


    //   foreach ($jar as $key => $value) {
    //     foreach ($value as $sips => $bikin) {
    //         // $seb = implode(";",$bikin);
    //      //echo $bikin['kd_soal_valid'] . '<br>';
    //    // array_push($bikin,$angkut);

    //     // $this->db->insert('jawaban', $bikin);
    //   //    $this->db->select('*');
    //   //    $this->db->from('jawaban');
    //   //    $this->db->where('kd_maba',$bikin['kd_maba']);
    //   //    $this->db->where('kd_soal_valid',$bikin['kd_soal_valid']);
    //   // $abs[] =   $db = $this->db->get()->result_array();


    //      // redirect('maba/ujian');
    //     // print'<pre>';
    //     // print_r($seb);


    //     }

    //   }

    //   // print'<pre>';
    //   // var_dump($abs) ; die;

    //   foreach ($post['jawaban'] as $jak) {

    //     $fong[] = [
    //       "jawaban" => $jak
    //     ];
    //     //echo $jak.'<br>';
    //   }



    //   // print'<pre>';
    //   // var_dump($fong);

    //   // die;


    //   // foreach ($abs as $key => $value) {
    //   //   foreach ($value as $fax => $firngs) {
    //   //     foreach ($fong as $key => $vals) {
    //   //      // echo $value['jawaban'] . '<br>';
    //   //      $this->db->where('kd_jawaban',$firngs['kd_jawaban']);
    //   //     $this->db->where('kd_maba',$firngs['kd_maba']);
    //   //     $this->db->where('kd_soal_valid',$firngs['kd_soal_valid']);
    //   //  //   $this->db->where('semester',$semester);
    //   //     $this->db->update_batch('jawaban',$vals['jawaban']);

    //   //     }

    //   //   }

    //   // }

    //   // redirect('maba/ujian');

    //   // print'<pre>';
    //   // var_dump($abs);


    //   // die;

    //   // PAKAI ARRAY PUSH UNTUK TAMBAH JAWABAN KE KODE SOAL
    //   // array_push($jar,44);
    //     // print'<pre>';
    //     // var_dump($jar); die;




    //    // die;
    //   // $this->db->insert_batch('jawaban', $hajar);
    //   //     redirect('maba/ujian');
    // error_reporting(0);
    //   foreach ($hajar as $key => $value) {
    //     // pakai ini insert
    //   // $this->db->insert_batch('jawaban', $value);
    //   //     redirect('maba/ujian');
    //      foreach ($value as $dex => $king) {
    //      //  echo $king['jawaban'] . '<br>';

    //      $seb = implode(";",$king);
    //       $sigi = explode(";",$seb);
    //        print'<pre>';
    //      //  print_r($seb);
    //        print_r($sigi);
    //      $data = [

    //        //$king['kd_soal_valid'],
    //         "jawaban" => $king['jawaban']

    //      ];


    //       // $this->db->where('kd_maba', $king['kd_maba']);
    //       // $this->db->where('kd_soal_valid', $king['kd_soal_valid']);




    //       //   $this->db->update('jawaban', $data);
    //       // redirect('maba/ujian');

    //      // }

    //     //   print'<pre>';
    //     //  var_dump($data);
    //      } 



    //     // foreach ($value as $vall => $margin) {
    //     //   //   $this->db->insert('jawaban', $margin);
    //     //   // redirect('maba/ujian');      


    //     // }
    //     // $this->db->insert_batch('jawaban', $value);
    //     //   redirect('maba/ujian');
    //   //  foreach ($value as $gas => $pixar) {

    //   //  }
    //   } 


    // //  foreach ($angkut as $key => $value) {
    // //    foreach ($value as $dos => $jas) {

    // //     $zigs = [
    // //       "jawaban" => $jas['jawaban']
    // //     ];

    // //     // print'<pre>';
    // //     // var_dump($zigs);
    // //       $this->db->where('jawaban', null);
    // //        $this->db->update('jawaban', $zigs);
    // //       redirect('maba/ujian');
    // //    }
    // //  }










    //     // print'<pre>';
    //     // var_dump($hajar);



    //     // die;



    //       // foreach ($gas as $key => $value) {
    //       //   echo $key . '<br>';
    //       // }


    //       // $fix = [];
    //       // foreach ($ar2 as $key => $gaskan) {
    //       //   echo $key . '<br>';

    //       //   $db= $this->db->get_where('soal_tes',['kd_soal_tes'=>$gaskan['kd_soal_valid']])->result_array();
    //       //  // $db[] = $gaskan['kd_soal_valid'];
    //       //   // $db['kd_soal_valid'] = $gaskan['kd_soal_valid'];
    //       //   // $db['jawaban'] = $gaskan['jawaban'];

    //       //   print'<pre>';
    //       //   var_dump($db);
    //       //  // echo $gaskan['kd_soal_valid'] . '<br>';
    //       //   // $fix[$gaskan['kd_soal_valid']][] = array(
    //       //   //     // $key => array(
    //       //   //     //   $gaskan['jawaban']
    //       //   //     // )
    //       //   //   // "Kd_soal_valid" => $gaskan['kd_soal_valid']
    //       //   //    "jawaban" => $gaskan['jawaban']


    //       //  // );

    //       //   // foreach ($fix as $key => $thing) {

    //       //   // }

    //       // //   function findDuplicates($count) {
    //       // //     return $count > 1;
    //       // // }

    //       // // $duplicates = array_filter(array_count_values($gaskan), "findDuplicates");
    //       // //   print'<pre>';
    //       // //   var_dump($duplicates);


    //       // } 






    //       // print'<pre>';
    //       // var_dump($fix); 

    //     //  die;



    //       // foreach ($yy as $dey => $salut) {
    //       //   // $value['jawaban'].'<br>' ;
    //       //   foreach ($xy as $key => $value) {
    //       //     $ar1[$salut['kd_soal_valid']] = array(
    //       //       "kd_soal_valid" => $salut['kd_soal_valid'],
    //       //       "jawaban" => $value['jawaban'],
    //       //       "kd_maba" => $post['kd_maba'],
    //       //       //"jawban" => $post['jawaban']
    //       //     );
    //       //   }

    //       // }


    //       // foreach ($ar1 as $key => $value) {
    //       //  // echo $value['kd_soal_valid'];
    //       //       $tes = array_unique($value);
    //       //       print'<pre>';
    //       // var_dump($value); die;
    //       // }





    //         // BIKIN LAGI DI $TESAR
    //       // Untuk insert array batch
    //       $tesar = [];
    //       foreach ($ar2 as $arrax => $rax) {
    //         $tesar[] = $rax;
    //         // echo $rax['kd_soal_tes'] . '<br>';
    //         // echo $rax['jawaban'] . '<br>';
    //       }

    //       // foreach ($yy as $dey => $salut) {
    //       //   $ar1[] = $salut['kd_soal_tes'] .'<br>';
    //       // }

    //       // $mer = array_merge(
    //       //   $ar2,
    //       //   $ar1
    //       // );
    //    //  $this->db->insert_batch('jawaban', $tesar);

    //       foreach ($tesar as $key => $value) {
    //         //foreach ($post['jawaban'] as $gog) {
    //           for ($i=0; $i <count($post['jawaban']) ; $i++) { 
    //              $dava =array(

    //              "jawaban" => $post['jawaban'][$i]

    //             );

    //             print'<pre>';
    //             var_dump($dava);


    //       // $this->db->where('kd_jawaban',$firngs['kd_jawaban']);
    //       $this->db->where('kd_maba',$value['kd_maba']);
    //       $this->db->where('kd_soal_valid',$value['kd_soal_valid']);
    //       $this->db->update('jawaban',$dava);
    //           }
    //           # code...

    //         // $dava = [
    //         //   "jawaban" => $post['jawaban']
    //         // ];


    //       // print'<pre>';
    //       // var_dump($dava);

    //      //  echo $value['kd_soal_valid'];
    // //        $this->db->where('kd_jawaban',$firngs['kd_jawaban']);
    // //       $this->db->where('kd_maba',$value['kd_maba']);
    // //       $this->db->where('kd_soal_valid',$value['kd_soal_valid']);
    // //       $this->db->update('jawaban',$gog);
    // //  //   }

    //       }
    //      redirect('maba/ujian');

    //       // SELESAI --------------------------------------------


    //       // foreach ($tesar as $tes => $value) {
    //       //   echo $value['kd_soal_valid'] . '<br>';
    //       // }


    //     //   function findDuplicates($tesar) {
    //     //     return $tesar > 1;
    //     // }

    //     // $duplicates = array_filter(array_count_values(24), "findDuplicates");
    //     //   print'<pre>';
    //     //   var_dump($duplicates); 




    //       print'<pre>';
    //       var_dump($tesar); die;
    //       die;


    //       // SEMENTARA ----------------------------------------------------------------------------------------------
    //       // bisa insert (tapi jumlahnya masih berganda, harus hilangkan duplikat)
    //       foreach ($xy as $key => $value) {
    //            foreach ($value as $sieb => $zehn) {
    //              foreach ($yy as $yey => $yalue) {
    //                foreach ($yalue as $yiel => $yehne) {
    //                 //  echo $yalue['kd_soal_valid'];
    //               // $unik = array_unique($value);
    //               // print'<pre>';
    //               // print_r($unik);

    //               //  echo $value['jawaban'] . '<br>';
    //                 // ubah array jadi string (implode)
    //               $de = implode($value);
    //               $dix = implode($yalue);
    //               $artes[] = [
    //                 "kd_soal_tes" => $dix,
    //               //  "jawaban" => $de
    //               ];

    //               }
    //             }
    //            } 

    //       } 
    //       foreach ($artes as $arts => $art) {
    //         $tes = array_unique($art);
    //           print'<pre>';
    //           var_dump($tes);
    //         foreach ($art as $ar => $a) {
    //           //echo $art['kd_soal_valid'] .'<br>';

    //         }
    //       }



    //     // $tes = array_unique($artes);
    //     // print_r($tes);



    //       print'<pre>';
    //      print_r($artes); die;





    //       // $merge = array_merge_recursive(
    //       // $yy[0],
    //       // $xy[0]
    //       // );
    //       // $de = explode(";",$yy);
    //     //   print'<pre>';
    //     //  print_r($artes); die;
    //      $this->db->insert_batch('jawaban', $artes);
    //     //  $this->db->where('kd_jawaban',$xy);
    //     //  $this->db->update('jawaban', $yy);
    //     //  $this->db->insert_batch('jawaban', $yy);
    //     //  $arr = [];
    //     //  foreach ($datax as $datx => $dax) {
    //     //   echo $datx . '<br>';
    //     //   foreach ($dax as $dtx => $dx) {
    //     //     echo $dx . '<br>';
    //     //     $xy[] = [
    //     //       "kd_soal_valid" => $dx,
    //     //     ];
    //     //     $query = $this->db->get_where('jawaban',['kd_soal_valid' => $dx])->result_array();

    //     //     foreach ($query as $key => $value) {
    //     //      // echo $key;
    //     //       $arr [] = [
    //     //              $value['kd_jawaban']

    //     //       ];
    //     //       // $this->db->where('kd_jawaban',$value['kd_jawaban']);
    //     //       // $this->db->update_batch('jawaban',$arr);
    //     //     }

    //     //     $dd = $value['kd_jawaban'];
    //     //   } 

    //     // // $this->db->update('jawaban', $yy,   );
    //     //   // $this->db->where('kd_jawaban',$value['kd_jawaban']);
    //     //   //  $this->db->update_batch('jawaban',$yy);
    //     //   print'<pre>';
    //     //    var_dump($yy); die;
    //     // }

    //       redirect('maba/ujian');


  }

  public function waktu($kd_ujian)
  {
 
// mencari mktime untuk tanggal 1 Januari 2011 00:00:00 WIB
    $selisih1 =  mktime(0, 0, 0, 1, 1, 2011);
    
    // mencari mktime untuk current time
    $selisih2 = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y"));
    
    // mencari selisih detik antara kedua waktu
    $delta = $selisih1 - $selisih2;
    
    // proses mencari jumlah hari
    $a = floor($delta / 86400);
    
    // proses mencari jumlah jam
    $sisa = $delta % 86400;
    $b  = floor($sisa / 3600);
    
    // proses mencari jumlah menit
    $sisa = $sisa % 3600;
    $c = floor($sisa / 60);
    
    // proses mencari jumlah detik
    $sisa = $sisa % 60;
    $d = floor($sisa / 1);
    
    echo "Waktu saat ini: ".date("d-m-Y H:i:s")."<br>";
    echo "Masih: ".$a." hari ".$b." jam ".$c." menit ".$d." detik lagi, menuju tahun baru 1 Januari 2011";
  }
}
