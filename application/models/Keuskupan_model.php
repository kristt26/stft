<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuskupan_model extends CI_model{



    public function hasil()
    {
      $id = $this->session->userdata('id');
      return $query = $this->db->query("SELECT
         `daftar`.*,
         (select AVG(nilai) FROM hasil_ujian WHERE hasil_ujian.kd_maba=daftar.kd_daftar) AS nilai,
         (select kd_ujian FROM hasil_ujian WHERE hasil_ujian.kd_maba=daftar.kd_daftar) AS kd_ujian,
         `data_diri`.`nama`,
         `asal_keuskupan`.`nama_keuskupan`
      FROM
         `daftar`
         LEFT JOIN `data_diri` ON `data_diri`.`kd_maba` = `daftar`.`kd_maba`
         INNER JOIN `asal_keuskupan` ON `data_diri`.`kd_keuskupan` =
      `asal_keuskupan`.`kd_keuskupan`
      WHERE `asal_keuskupan`.`kd_keuskupan`='$id'
      GROUP BY daftar.kd_maba order by tanggal_daftar desc")->result_array();  




       print'<pre>';
       var_dump($query); die;

    }
    
    public function maba()
    {
       
       
       $this->db->select('*');
       $this->db->from('asal_keuskupan');
       $this->db->join('data_diri','data_diri.kd_keuskupan=asal_keuskupan.kd_keuskupan');
       $this->db->join('hasil_ujian','hasil_ujian.kd_maba=data_diri.kd_maba');
       $this->db->select_avg('nilai');
       $this->db->group_by('hasil_ujian.kd_maba');
      return $query = $this->db->get()->result_array();  

       print'<pre>';
       var_dump($query); die;

    }
























 }