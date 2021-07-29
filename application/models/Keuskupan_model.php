<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuskupan_model extends CI_model{



    public function Maba()
    {
       $this->db->select('*');
       $this->db->from('asal_keuskupan');
       $this->db->join('data_diri','data_diri.kd_keuskupan=asal_keuskupan.kd_keuskupan');
       $this->db->join('hasil_ujian','hasil_ujian.kd_maba=data_diri.kd_maba');
       $this->db->select_avg('nilai');
       $this->db->group_by('hasil_ujian.kd_maba');
      // $this->db->where('kd_standar_kelulusan', $id);
      return $query = $this->db->get()->result_array();  




       print'<pre>';
       var_dump($query); die;

    }
























 }