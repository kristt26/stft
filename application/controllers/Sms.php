<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Sms extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Mylib');
    }


    public function index()
    {
        // $inbox = 1;
        $inbox = $this->mylib->rest_read();
        echo json_encode($inbox);
    }

    public function kirim($set, $kode, $hp)
    {

        switch (strtolower($set)) {
            case 'hasil':
                $standar = $this->db->query("SELECT
                    `standar_kelulusan`.*,
                    `ujian`.`nama_ujian`
                FROM
                    `standar_kelulusan`
                    LEFT JOIN `ujian` ON `ujian`.`kd_ujian` = `standar_kelulusan`.`kd_ujian`")->result_array();
                $hasil = $this->db->get_where('hasil_ujian', ['kd_maba' => $kode])->result_array();
                $pesan = "";
                $nilai = 0;
                foreach ($hasil as $key2 => $value2) {
                    $nilai += $value2['nilai'];
                }
                $pesan = count($hasil)==0 ? 'Anda belum mengikuti Ujian' : ($nilai/count($hasil)>=60 ? 'Anda lulus dengan hasil ujian: '.$nilai/count($hasil) : "Anda tidak lulus dengan hasil ujian: ".$nilai/count($hasil));
                $this->mylib->rest_kirim($hp, $pesan);
                break;
            case 'berkas':
                $maba = $this->db->get_where('daftar', ['kd_daftar' => $kode])->row_array();
                if(is_null($maba['status_berkas'])){
                    $pesan = "Status berkas anda belum di proses";
                }else{
                    $pesan = "Status Berkas Anda: ". $maba['status_berkas'];
                }
                $this->mylib->rest_kirim($hp, $pesan);
                break;

            default:
                
                $pesan = "Format yang anda masukkan salah!!!\n\n1.<hasil><spasi><NO PENDAFTARAN>: Hasil Test\n2. <berkas><spasi><NO PENDAFTARAN>: Status Berkas";
                $this->mylib->rest_kirim($hp, $pesan);
                break;
        }
    }
}

/* End of file Sms.php */