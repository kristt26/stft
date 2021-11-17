<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maba_model extends CI_model
{

    public function SoalTes($kd_ujian)
    {
        $this->db->select('*');
        $this->db->from('soal_tes');
        $this->db->join('validasi_soal_tes', 'validasi_soal_tes.kd_soal_tes=soal_tes.kd_soal_tes');
        $this->db->where('kd_ujian', $kd_ujian);
        $this->db->where('keterangan', 'Soal Valid');
        return $this->db->get()->result_array();

    }

    public function kdOtomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_maba) as kdmaba from data_diri");
        $hasil = $query->row();
        return $hasil->kdmaba;
    }

    public function getMabaById()
    {
        $kd_maba = $this->session->userdata('kd_maba');
        return $this->db->query("SELECT
            `data_diri`.*,
            `tahun_ajaran`.`tahun_ajaran`,
            `gelombang`.`gelombang`
        FROM
            `data_diri`
            LEFT JOIN `tahun_ajaran` ON `tahun_ajaran`.`kd_tahun_ajaran` =
            `data_diri`.`kd_tahun_ajaran`
            LEFT JOIN `gelombang` ON `gelombang`.`kd_gelombang` =
            `data_diri`.`kd_gelombang` WHERE kd_maba='$kd_maba'")->row_array();
    }

    public function NoTes()
    {
        $user = $this->session->userdata('kd_maba');
        $this->db->select('*');
        $this->db->from('data_diri');
        $this->db->join('daftar', 'data_diri.kd_maba=daftar.kd_maba');
        $this->db->join('tahun_ajaran', 'tahun_ajaran.kd_tahun_ajaran=daftar.kd_tahun_ajaran');
        $this->db->join('gelombang', 'gelombang.kd_gelombang=daftar.kd_gelombang');
        $this->db->where(['data_diri.kd_maba' => $user, 'daftar.status' => '1']);
        //  $this->db->where('keterangan', 'Soal Valid');
        return $this->db->get()->row_array();

    }

    public function userLogin()
    {
        $user = $this->session->userdata('kd_maba');
        $this->db->select('*');
        $this->db->from('data_diri');
        // $this->db->join('data_diri','data_diri.id_login=login_.id_login');
        $this->db->where('kd_maba', $user);
        return $this->db->get()->row_array();
    }

    public function kondisiRegistrasi()
    {
        $user = $this->session->userdata('kd_maba');
        $this->db->from('data_diri');
        $this->db->where('kd_maba', $user);
        return $result = $this->db->get()->row_array();

        //   return $result;

        // if($result['status_berkas']==null) {
        //        echo 'kosong';
        // } else {
        //     echo'ADAADADA';
        // }

        //    print'<pre>';
        //    var_dump($result); die;

    }

    public function kodeTahun()
    {
        $this->db->from('tahun_ajaran');
        $this->db->order_by("tahun_ajaran", "desc");
        $tahun = $this->db->get()->row_array();

        $tah = substr($tahun['tahun_ajaran'], 7);
        return $tah;
    }
}