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
                foreach ($standar as $key1 => $value1) {
                    $cek = false;
                    foreach ($hasil as $key2 => $value2) {
                        if ($value1['kd_ujian'] == $value2['kd_ujian']) {
                            $cek = true;
                            if ($value1['nilai'] <= $value2['nilai']) {
                                $pesan =  $pesan . $value1['nama_ujian'] . " : Lulus\n";
                            } else {
                                $pesan =  $pesan.$value1['nama_ujian'] . " : Tidak Lulus\n";
                            }
                        }
                    }
                    if($cek==false){
                        $pesan = $pesan.$value1['nama_ujian'] . " : Belum Mengikuti Ujian\n";
                    }
                }
                $this->mylib->rest_kirim($hp, $pesan);
                break;
            case 'berkas':
                $maba = $this->db->get_where('data_diri', ['kd_maba' => $kode])->row_array();
                $pesan = "Status Berkas Anda: ". $maba['status_berkas'];
                $this->mylib->rest_kirim($hp, $pesan);
                break;

            default:
                
                $pesan = "Format yang anda masukkan salah!!!\n\n<hasil><spasi><NO PENDAFTARAN>: Hasil Test\<berkas><spasi><NO PENDAFTARAN>: Status Berkas";
                $this->mylib->rest_kirim($hp, $pesan);
                break;
        }
    }
}

/* End of file Sms.php */
