<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Beranda_model');
  }

  public function index()
  {
    $data['berita_terakhir'] = $this->db->query("SELECT * FROM berita ORDER BY kd_berita DESC LIMIT 1")->result_array();
    $data['berita'] = $this->db->get('berita')->result_array();
    $this->load->view('templates/beranda/header');
    $this->load->view('templates/beranda/topbar');
    $this->load->view('beranda/beranda', $data);
    $this->load->view('templates/beranda/footer');
  }
  public function profile()
  {
    $data = [
      'dosen' => $this->Beranda_model->getDosen()
    ];
    $this->load->view('templates/beranda/header');
    $this->load->view('templates/beranda/topbar');
    $this->load->view('beranda/profile', $data);
    $this->load->view('templates/beranda/footer');
  }
}
