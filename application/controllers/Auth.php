<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {


    public function index()
    {
		// 
        $this->load->view('auth/login'); 
    }


    public function proses()
    {
    
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('data_diri', ['username' => $username])->row_array();
        if($password == 'admin' && $username =='admin') {
            
            $array = array(
                'akses' => 'admin'
            );
            $this->session->set_userdata( $array );
           $this->session->set_flashdata('flash', 'Login Berhasil');
            redirect('admin');
        } elseif ($password == 'bak' && $username =='bak') {
            $array = array(
                'akses' => 'bak'
            );
            $this->session->set_userdata( $array );
            redirect('bak');
        }
        elseif ($password == 'keuskupan' && $username == 'keuskupan') {
           $this->session->set_flashdata('flash', 'Login Berhasil');
            redirect('keuskupan');
            
        }  elseif ($password == $user['password'] && $username == $user['username']){
            $this->session->set_userdata($user);
            redirect('maba');

        } else {
            $this->session->set_flashdata('pesan', 'Username tidak ditemukan');
            redirect('auth');
        }

        // if($password == $user['password']) {
        //     if()
        //     redirect('dosen');
        // } else {
        //     redirect('auth');
        // }

    }



    public function registrasi()
    {
        $data['keuskupan'] = $this->db->get('asal_keuskupan')->result_array();

       // $this->form_validation->set_rules('kd_login','Kode Maba','required');
        $this->form_validation->set_rules('nama','Nama Pengguna','required');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        // $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
        // $this->form_validation->set_rules('no_hp','No HP','required');
        // $this->form_validation->set_rules('kd_keuskupan','Keuskupan','required');
        // $this->form_validation->set_rules('berkas','Berkas','required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if($this->form_validation->run()==FALSE ) {

            $data['kodeTahun'] = $this->Maba_model->kodeTahun();

            $dariDB = $this->Auth_model->LoginOtomatis();
            $nourut = is_null($dariDB) ? 0 : substr($dariDB, 3, 4);
            
            error_reporting(0);
            $idsekarang = $nourut + 1;
          //  print_r($nourut); die;
            $data['kd_maba'] = $idsekarang;

            $this->load->view('auth/daftar',$data); 
            
        } else {
            $post = $this->input->post();

            $data = [
                "kd_maba" => $post['kd_maba'],
                "nama" => $post['nama'],
                "username" => $post['username'],
                "password" => $post['password'],
             //   "level" => 'mahasiswa'
                // "jenis_kelamin" => $post['jenis_kelamin'],
                // "no_hp" => $post['no_hp'],
                // "kd_keuskupan" => $post['kd_keuskupan'],
            ];

            // print'<pre>';
            // print_r($data); die;

            $this->db->insert('data_diri',$data);
            $message = array(
                'message'=>'<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            Anda Telah Berhasil Mendaftar</div>',
            );
            $this->session->set_flashdata($message);
            redirect('auth/registrasi');

        }
        
    }








    public function logout()
    {
        session_unset();
    	session_destroy();
        redirect('auth');
    }





















 }
