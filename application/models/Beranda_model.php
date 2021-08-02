<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda_model extends CI_Model {
    public function getDosen()
    {
        return $this->db->get("dosen")->result_array();
    }

}

/* End of file Beranda_model.php */
