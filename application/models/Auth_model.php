<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_model{

    public function LoginOtomatis()
    {
        $query = $this->db->query("SELECT MAX(kd_maba) as kdmaba from data_diri");
        $hasil = $query->row();
        return $hasil->kdmaba;
   // data_diri
    }












    




 }