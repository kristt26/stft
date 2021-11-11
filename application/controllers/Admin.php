<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Mylib');
        date_default_timezone_set("Asia/Jayapura");
    }

    public function index()
    {
        $data['jumlahKeuskupan'] = $this->Admin_model->jumlahKeuskupan();
        $data['jumlahUjian'] = $this->Admin_model->jumlahUjian();
        $data['jumlahGelombang'] = $this->Admin_model->jumlahGelombang();
        $data['jumlahBerita'] = $this->Admin_model->jumlahBerita();
        $data['jumlahPeserta'] = $this->Admin_model->jumlahPeserta();
        $data['jumlahJadwal'] = $this->Admin_model->jumlahJadwal();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin/footer');
    }

    public function lihat_berkas($id)
    {
        $data['maba'] = $this->Admin_model->berkas($id);

        // print'<pre>';
        // print_r($dat); die;
        $data['user'] = $this->Maba_model->userLogin();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar', $data);
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/lihat_berkas', $data);
        $this->load->view('templates/admin/footer');
    }

    // Berita
    public function berita()
    {

        $data['berita'] = $this->db->get('berita')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/berita', $data);
        $this->load->view('templates/admin/footer');
    }

    public function berita_tambah()
    {
        $this->form_validation->set_rules('kd_berita', 'Kode Berita', 'required');
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->BeritaOtomatis();
            $nourut = substr($dariDB, 2, 4);

            $idsekarang = $nourut + 1;
            //  print_r($idsekarang); die;
            $data['kd_berita'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/berita_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $gambar = $_FILES['gambar'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/img/berita';
                $config['allowed_types'] = 'jpg|png|gif';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $post = $this->input->post();

            $data = [
                "kd_berita" => $post['kd_berita'],
                "judul" => $post['judul'],
                "isi_berita" => $post['isi_berita'],
                "tanggal" => $post['tanggal'],
                "gambar" => $gambar,
            ];

            $this->db->insert('berita', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/berita');
        }
    }

    public function berita_detail($id)
    {
        $data['berita'] = $this->db->get_where('berita', ['kd_berita' => $id])->result_array();
        $this->load->view('templates/admin/berita_header');
        // $this->load->view('templates/admin/sidebar');
        // $this->load->view('templates/admin/berita_topbar');
        $this->load->view('admin/berita_detail', $data);
        $this->load->view('templates/admin/berita_footer');
    }

    public function berita_ubah($id)
    {
        $data['berita'] = $this->db->get_where('berita', ['kd_berita' => $id])->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/berita_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function berita_edit_proses()
    {
        $kd_berita = $this->input->post('kd_berita');
        $judul = $this->input->post('judul');
        $isi_berita = $this->input->post('isi_berita');
        $tanggal = $this->input->post('tanggal');

        $gambar = $_FILES['gambar']['name'];
        if (!empty($gambar)) {

            $item = $this->db->query("SELECT * FROM berita WHERE kd_berita = '$kd_berita'")->row();
            if ($item->gambar != null) {
                $target_file = './assets/img/berita/' . $item->gambar;
                unlink($target_file);
            }
            $config['upload_path'] = './assets/img/berita';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Foto Berita Gagal di Upload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        } else {

            $data = [
                "kd_berita" => $kd_berita,
                "judul" => $judul,
                "isi_berita" => $isi_berita,
                "tanggal" => $tanggal,

            ];

            $this->db->where('kd_berita', $kd_berita);
            $this->db->update('berita', $data);

            $this->session->set_flashdata('flash', 'Berhasil diubah');
            redirect('admin/berita');
        }

        $data = [
            "kd_berita" => $kd_berita,
            "judul" => $judul,
            "isi_berita" => $isi_berita,
            "tanggal" => $tanggal,
            "gambar" => $gambar,
        ];

        $this->db->where('kd_berita', $kd_berita);
        $this->db->update('berita', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/berita');
    }

    public function hapus_berita($id)
    {

        $item = $this->db->query("SELECT * FROM berita WHERE kd_berita = '$id'")->row();
        $target_file = './assets/img/berita/' . $item->gambar;
        unlink($target_file);

        $finish = $this->db->delete('berita', ['kd_berita' => $id]);
        echo json_encode($finish);
    }

    public function dosen()
    {

        $data['dosen'] = $this->db->get('dosen')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/dosen', $data);
        $this->load->view('templates/admin/footer');
    }

    public function dosen_tambah()
    {
        $this->form_validation->set_rules('nidn', 'NIDN', 'required');
        $this->form_validation->set_rules('nama', 'Nama Dosen', 'required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/dosen_tambah');
            $this->load->view('templates/admin/footer');
        } else {
            $gambar = $_FILES['foto'];
            if ($gambar = '') {
            } else {
                $config['upload_path'] = './assets/img/dosen';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $gambar = $this->upload->data('file_name');
                    $post = $this->input->post();

                    $data = [
                        "nidn" => $post['nidn'],
                        "nama" => $post['nama'],
                        "foto" => $gambar,
                    ];

                    $this->db->insert('dosen', $data);
                    $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
                    redirect('admin/dosen');
                }
            }
        }
    }

    public function dosen_ubah($id)
    {
        $data['dosen'] = $this->db->get_where('dosen', ['id' => $id])->row_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/dosen_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function dosen_edit_proses($id)
    {
        $data = [
            "nidn" => $this->input->post('nidn'),
            "nama" => $this->input->post('nama'),
        ];

        $gambar = $_FILES['foto']['name'];
        if (!empty($gambar)) {
            $item = $this->db->query("SELECT * FROM dosen WHERE id = '$id'")->row();
            if ($item->gambar != null) {
                $target_file = './assets/img/berita/' . $item->gambar;
                unlink($target_file);
            }
            $config['upload_path'] = './assets/img/dosen';
            $config['allowed_types'] = 'jpg|jpeg|png|tiff';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('foto')) {
                echo "Foto Berita Gagal di Upload!";
            } else {
                $data['foto'] = $this->upload->data('file_name');
                $this->db->update('dosen', $data, ['id' => $id]);
            }
        } else {
            $this->db->update('dosen', $data, ['id' => $id]);
            redirect('admin/berita');
        }
        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/dosen');
    }

    public function dosen_hapus($id)
    {
        $item = $this->db->query("SELECT * FROM dosen WHERE id = '$id'")->row_array();
        $target_file = './assets/img/dosen/' . $item->gambar;
        unlink($target_file);
        $this->db->delete('dosen', ['id' => $id]);
        redirect('admin/dosen');
    }

    // Keuskupan

    public function keuskupan_data()
    {
        $data['keuskupan'] = $this->db->get('asal_keuskupan')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/keuskupan_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function keuskupan_tambah()
    {
        $this->form_validation->set_rules('kd_keuskupan', 'Kode Keuskupan', 'required');
        $this->form_validation->set_rules('nama_keuskupan', 'Nama Keuskupan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Keuskupan', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->otomatis();
            $nourut = substr($dariDB, 2, 4);

            $idsekarang = $nourut + 1;
            // print_r($nourut); die;
            $data['kd_keuskupan'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/keuskupan_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_keuskupan" => $post['kd_keuskupan'],
                "nama_keuskupan" => $post['nama_keuskupan'],
                "alamat" => $post['alamat'],
            ];

            $this->db->insert('asal_keuskupan', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/keuskupan_data');
        }
    }

    public function hapus_keuskupan($id)
    {
        $finish = $this->db->delete('asal_keuskupan', ['kd_keuskupan' => $id]);
        echo json_encode($finish);
        // $message = array(
        //     'message'=>'<div class="alert alert-success">
        //     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        //     Data Berhasil dihapus</div>',
        // );
        // $this->session->set_flashdata($message);
        //   redirect('admin/keuskupan_data');
    }

    public function keuskupan_ubah($id)
    {
        $data['keuskupan'] = $this->db->get_where('asal_keuskupan', ['kd_keuskupan' => $id])->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/keuskupan_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function keuskupan_edit_proses()
    {
        $kd_keuskupan = $this->input->post('kd_keuskupan');
        $nama_keuskupan = $this->input->post('nama_keuskupan');
        $alamat = $this->input->post('alamat');

        $data = [
            "kd_keuskupan" => $kd_keuskupan,
            "nama_keuskupan" => $nama_keuskupan,
            "alamat" => $alamat,
        ];

        // print'<pre>';
        // var_dump($data); die;

        $this->db->where('kd_keuskupan', $kd_keuskupan);
        $this->db->update('asal_keuskupan', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/keuskupan_data');
    }

    // Ujian
    public function ujian_data()
    {
        $data['ujian'] = $this->db->get('ujian')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/ujian_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function ujian_tambah()
    {
        $this->form_validation->set_rules('kd_ujian', 'Kode Ujian', 'required');
        $this->form_validation->set_rules('nama_ujian', 'Ujian', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->UjianOtomatis();
            $nourut = substr($dariDB, 2, 4);

            $idsekarang = $nourut + 1;
            //  print_r($idsekarang); die;
            $data['kd_ujian'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/ujian_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_ujian" => $post['kd_ujian'],
                "nama_ujian" => $post['nama_ujian'],
            ];

            $this->db->insert('ujian', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/ujian_data');
        }
    }

    public function ujian_ubah($id)
    {
        $data['ujian'] = $this->db->get_where('ujian', ['kd_ujian' => $id])->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/ujian_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function ujian_edit_proses()
    {
        $kd_ujian = $this->input->post('kd_ujian');
        $nama_ujian = $this->input->post('nama_ujian');

        $data = [
            "kd_ujian" => $kd_ujian,
            "nama_ujian" => $nama_ujian,
        ];

        $this->db->where('kd_ujian', $kd_ujian);
        $this->db->update('ujian', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/ujian_data');
    }

    public function hapus_ujian($id)
    {
        $finish = $this->db->delete('ujian', ['kd_ujian' => $id]);
        echo json_encode($finish);
    }

    // Tahun Ajaran
    public function tahun_ajaran_data()
    {
        $data['tahun_ajaran'] = $this->db->group_by('tahun_ajaran')->get('tahun_ajaran')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/tahun_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tahun_tambah()
    {
        $this->form_validation->set_rules('kd_tahun_ajaran', 'Kode Tahun Ajaran', 'required');
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|is_unique[tahun_ajaran.tahun_ajaran]');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s sudah diinputkan sebelumnya');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $data['tahunTerakhir'] = $this->Admin_model->tahunTerakhir();

            $dariDB = $this->Admin_model->TahunOtomatis();
            $nourut = is_null($dariDB) ? 0 : substr($dariDB, 2, 4);

            $idsekarang = $nourut + 1;
            // print_r($idsekarang); die;
            $data['kd_tahun'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/tahun_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_tahun_ajaran" => $post['kd_tahun_ajaran'],
                "tahun_ajaran" => $post['tahun_ajaran'],
            ];

            $sub_tahun = substr($data['tahun_ajaran'], 5, 4);

            // echo $sub_tahun;

            $thn = [
                "kd_tahun_ajaran" => 'T-' . $sub_tahun . '-1',
                "tahun_ajaran" => $post['tahun_ajaran'],
            ];

            $this->db->insert('tahun_ajaran', $thn);

            // $thn2 = [
            //     "kd_tahun_ajaran" => 'T-' . $sub_tahun . '-2',
            //     "tahun_ajaran" => $post['tahun_ajaran']
            // ];

            // $this->db->insert('tahun_ajaran', $thn2);

            // print'<pre>';
            // var_dump($thn);
            // print'<pre>';
            // var_dump($thn2);

            // die;

            // $this->db->insert('tahun_ajaran',$data);

            //   $tahun =  $this->db->get_where('tahun_ajaran',['kd_tahun_ajaran' => $post['kd_tahun_ajaran']])->row_array();

            //   $sub_tahun = substr($tahun['tahun_ajaran'],5,4);
            // //  echo $sub_tahun;

            // $th = 'T-'.$sub_tahun.'-2';

            //   $intahun = [
            //       "kd_tahun_ajaran" => $th,
            //       "tahun_ajaran" => $post['tahun_ajaran']
            //   ];

            //     $this->db->insert('tahun_ajaran',$intahun);

            //     $this->db->delete('tahun_ajaran',['kd_tahun_ajaran' => $post['kd_tahun_ajaran']]);

            //   print'<pre>';
            //   print_r($intahun); die;

            //   $this->db->where('kd_tahun_ajaran',['kd_tahun_ajaran' => $post['kd_tahun_ajaran']])
            //   $this->db->update('tahun_ajaran',$data);

            //   print'<pre>';
            //   var_dump($tahun); die;

            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/tahun_ajaran_data');
        }
    }

    public function tahun_ubah($id)
    {
        $data['tahun_ajaran'] = $this->db->get_where('tahun_ajaran', ['kd_tahun_ajaran' => $id])->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/tahun_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function tahun_edit_proses()
    {
        $kd_tahun_ajaran = $this->input->post('kd_tahun_ajaran');
        $tahun_ajaran = $this->input->post('tahun_ajaran');

        $data = [
            "kd_tahun_ajaran" => $kd_tahun_ajaran,
            "tahun_ajaran" => $tahun_ajaran,
        ];

        $this->db->where('kd_tahun_ajaran', $kd_tahun_ajaran);
        $this->db->update('tahun_ajaran', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/tahun_ajaran_data');
    }

    public function hapus_tahun($id)
    {
        $finish = $this->db->delete('tahun_ajaran', ['kd_tahun_ajaran' => $id]);
        echo json_encode($finish);
    }

    // Gelombang
    public function gelombang_data()
    {
        $data['gelombang'] = $this->db->get('gelombang')->result_array();
        // $data['gelombang'] = $this->Admin_model->gelombang();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/gelombang_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function gelombang_tambah()
    {
        $this->form_validation->set_rules('kd_gelombang', 'Kode Gelombang', 'required');
        $this->form_validation->set_rules('gelombang', 'Gelombang', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $data['gelombangTerakhir'] = $this->Admin_model->gelombangTerakhir();

            $dariDB = $this->Admin_model->GelombangOtomatis();
            $nourut = substr($dariDB, 2, 4);

            $idsekarang = $nourut + 1;
            //  print_r($idsekarang); die;
            $data['kd_gelombang'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/gelombang_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_gelombang" => $post['kd_gelombang'],
                "gelombang" => $post['gelombang'],
            ];

            $this->db->insert('gelombang', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/gelombang_data');
        }
    }

    public function gelombang_ubah($id)
    {
        $data['gelombang'] = $this->db->get_where('gelombang', ['kd_gelombang' => $id])->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/gelombang_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function gelombang_edit_proses()
    {
        $kd_gelombang = $this->input->post('kd_gelombang');
        $gelombang = $this->input->post('gelombang');

        $data = [
            "kd_gelombang" => $kd_gelombang,
            "gelombang" => $gelombang,
        ];

        $this->db->where('kd_gelombang', $kd_gelombang);
        $this->db->update('gelombang', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/gelombang_data');
    }

    public function hapus_gelombang($id)
    {
        $finish = $this->db->delete('gelombang', ['kd_gelombang' => $id]);
        echo json_encode($finish);
    }

    // Soal tes
    public function soal_data()
    {
        $data['SoalJoin'] = $this->Admin_model->SoalJoin();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/soal_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function validasi_soal_data()
    {
        $data['validasi_soal'] = $this->Admin_model->ValidasiSoalJoin();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/validasi_soal_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function validasi_soal_ubah($id)
    {
        $data['ValidasiSoal'] = $this->Admin_model->SoalValidasiUbah($id);

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/validasi_soal_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function validasi_soal_edit_proses()
    {
        $kd_soal_tes = $this->input->post('kd_soal_tes');
        $soal = $this->input->post('soal');

        //hapus soal yang tidak valid pada tabel validasi soal
        $this->db->delete('validasi_soal_tes', ['kd_soal_tes' => $kd_soal_tes]);

        $data = [
            "kd_soal_tes" => $kd_soal_tes,
            "soal" => $soal,
        ];

        $this->db->where('kd_soal_tes', $kd_soal_tes);
        $this->db->update('soal_tes', $data);
        redirect('admin/validasi_soal_data');
    }

    public function soal_tambah()
    {
        $data['ujian'] = $this->db->get('ujian')->result_array();

        $this->form_validation->set_rules('kd_soal_tes', 'Kode Soal', 'required');
        $this->form_validation->set_rules('soal', 'Soal Tes', 'required');
        $this->form_validation->set_rules('kd_ujian', 'Ujian', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->SoalOtomatis();
            $nourut = is_null($dariDB) ? 0 : substr($dariDB, 3, 4);

            $idsekarang = $nourut + 1;
            //    print_r($nourut); die;
            $data['kd_soal_tes'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/soal_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_soal_tes" => $post['kd_soal_tes'],
                "soal" => $post['soal'],
                "kd_ujian" => $post['kd_ujian'],
            ];

            $this->db->insert('soal_tes', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/soal_data');
        }
    }

    public function soal_ubah($id)
    {
        $data['soal'] = $this->Admin_model->SoalUbahJoin($id);
        $data['ujian'] = $this->db->get('ujian')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/soal_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function soal_edit_proses()
    {
        $kd_soal_tes = $this->input->post('kd_soal_tes');
        $soal = $this->input->post('soal');
        $kd_ujian = $this->input->post('kd_ujian');

        $data = [
            "kd_soal_tes" => $kd_soal_tes,
            "soal" => $soal,
            "kd_ujian" => $kd_ujian,
        ];

        $this->db->where('kd_soal_tes', $kd_soal_tes);
        $this->db->update('soal_tes', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/soal_data');
    }

    public function hapus_soal($id)
    {
        $finish = $this->db->delete('soal_tes', ['kd_soal_tes' => $id]);
        echo json_encode($finish);
    }

    // Standar Kelulusan
    public function standar_kelulusan_data()
    {
        $data['standarKelulusan'] = $this->Admin_model->StandarJoin();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/standar_kelulusan_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function standar_kelulusan_tambah()
    {
        $data['ujian'] = $this->db->get('ujian')->result_array();

        $this->form_validation->set_rules('kd_standar_kelulusan', 'Kode Standar', 'required');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required');
        $this->form_validation->set_rules('kd_ujian', 'Ujian', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        //  $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->StandarOtomatis();
            $nourut = substr($dariDB, 3, 4);

            $idsekarang = $nourut + 1;
            //    print_r($nourut); die;
            $data['kd_standar_kelulusan'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/standar_kelulusan_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();

            $data = [
                "kd_standar_kelulusan" => $post['kd_standar_kelulusan'],
                "kd_ujian" => $post['kd_ujian'],
                "nilai" => $post['nilai'],
            ];

            $this->db->insert('standar_kelulusan', $data);
            $this->session->set_flashdata('flash', 'Berhasil ditambahkan');
            redirect('admin/standar_kelulusan_data');
        }
    }

    public function standar_kelulusan_ubah($id)
    {
        $data['standarKelulusan'] = $this->Admin_model->StandarUbahJoin($id);
        $data['ujian'] = $this->db->get('ujian')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/standar_kelulusan_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function standar_edit_proses()
    {
        $kd_standar_kelulusan = $this->input->post('kd_standar_kelulusan');
        $kd_ujian = $this->input->post('kd_ujian');
        $nilai = $this->input->post('nilai');

        $data = [
            "kd_standar_kelulusan" => $kd_standar_kelulusan,
            "kd_ujian" => $kd_ujian,
            "nilai" => $nilai,
        ];

        $this->db->where('kd_standar_kelulusan', $kd_standar_kelulusan);
        $this->db->update('standar_kelulusan', $data);

        $this->session->set_flashdata('flash', 'Berhasil diubah');
        redirect('admin/standar_kelulusan_data');
    }

    public function hapus_standar($id)
    {
        $finish = $this->db->delete('standar_kelulusan', ['kd_standar_kelulusan' => $id]);
        echo json_encode($finish);
    }

    // Jadwal
    public function jadwal_data()
    {
        $data['jadwal'] = $this->Admin_model->JadwalJoin();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/jadwal_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function jadwal_tambah()
    {
        $data['ujian'] = $this->db->get('ujian')->result_array();
        $data['gelombang'] = $this->db->get('gelombang')->result_array();
        $data['data_diri'] = $this->db->query("SELECT
            *
            FROM
            `data_diri`
            LEFT JOIN `daftar` ON `data_diri`.`kd_maba` = `daftar`.`kd_maba` WHERE status_berkas='valid'")->result_array();
        $data['tahun_ajaran'] = $this->db->get('tahun_ajaran')->result_array();

        $this->form_validation->set_rules('kd_jadwal', 'Kode Jadwal', 'required');
        $this->form_validation->set_rules('kd_ujian', 'Ujian', 'required');
        $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required');
        $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('kd_gelombang', 'Gelombang', 'required');
        // $this->form_validation->set_rules('kd_maba','Kode Calon Maba','required');
        $this->form_validation->set_rules('kd_tahun_ajaran', 'Tahun Ajaran', 'required');

        $this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
        //  $this->form_validation->set_message('is_unique', '%s kode prodi sudah ada');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == false) {

            $dariDB = $this->Admin_model->jadwalOtomatis();
            // $nourut = substr($dariDB, 2, 4);
            $idsekarang = is_null($dariDB) ? 1 : substr($dariDB, 2, 4) + 1;
            //   print_r($nourut); die;
            $data['kd_jadwal'] = $idsekarang;

            $this->load->view('templates/admin/header');
            $this->load->view('templates/admin/sidebar');
            $this->load->view('templates/admin/topbar');
            $this->load->view('admin/jadwal_tambah', $data);
            $this->load->view('templates/admin/footer');
        } else {
            $post = $this->input->post();
            $maba = $this->db->get_where("data_diri", ['kd_tahun_ajaran' => $post['kd_tahun_ajaran'], 'kd_gelombang' => $post['kd_gelombang']])->result_array();
            $data = [
                "kd_jadwal" => $post['kd_jadwal'],
                "kd_ujian" => $post['kd_ujian'],
                "jam_mulai" => $post['jam_mulai'],
                "jam_selesai" => $post['jam_selesai'],
                "tanggal" => $post['tanggal'],
                "kd_gelombang" => $post['kd_gelombang'],
                "kd_tahun_ajaran" => $post['kd_tahun_ajaran'],
            ];
            $result = $this->db->insert('jadwal', $data);
            if ($result) {
                $ujian = $this->db->get_where("ujian", ['kd_ujian' => $post['kd_ujian']])->row_array();
                foreach ($maba as $key => $value) {
                    $this->mylib->rest_kirim($value['no_hp'], "Jadwal Ujian\n" . "Ujian: " . $ujian['nama_ujian'] . "\nTanggal: " . $post['tanggal'] . "\nJam: " . $post['jam_mulai'] . "s/d" . $post['jam_selesai']);
                }
            }
            $this->session->set_flashdata('success', 'Berhasil ditambahkan');
            redirect('admin/jadwal_data', 'refresh');
        }
    }

    public function jadwal_ubah($id)
    {
        $data['jadwal'] = $this->Admin_model->JadwalUbahJoin($id);
        // print'<pre>';
        // var_dump($dat); print'<pre>'; die;
        $data['ujian'] = $this->db->get('ujian')->result_array();
        $data['gelombang'] = $this->db->get('gelombang')->result_array();
        $data['data_diri'] = $this->db->get('data_diri')->result_array();
        $data['tahun_ajaran'] = $this->db->get('tahun_ajaran')->result_array();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/jadwal_ubah', $data);
        $this->load->view('templates/admin/footer');
    }

    public function jadwal_edit_proses()
    {
        $kd_jadwal = $this->input->post('kd_jadwal');
        $kd_ujian = $this->input->post('kd_ujian');
        $jam_mulai = $this->input->post('jam_mulai');
        $jam_selesai = $this->input->post('jam_selesai');
        $tanggal = $this->input->post('tanggal');
        $kd_gelombang = $this->input->post('kd_gelombang');
        $kd_maba = $this->input->post('kd_maba');
        $kd_tahun_ajaran = $this->input->post('kd_tahun_ajaran');

        $data = [
            "kd_jadwal" => $kd_jadwal,
            "kd_ujian" => $kd_ujian,
            "jam_mulai" => $jam_mulai,
            "jam_selesai" => $jam_selesai,
            "tanggal" => $tanggal,
            "kd_gelombang" => trim($kd_gelombang),
            "kd_maba" => $kd_maba,
            "kd_tahun_ajaran" => $kd_tahun_ajaran,
        ];
        // print'<pre>';
        // print_r($data);
        // print'<pre>'; die;
        $this->db->where('kd_jadwal', $kd_jadwal);
        $this->db->update('jadwal', $data);

        $this->session->set_flashdata('success', 'Berhasil diubah');
        redirect('admin/jadwal_data', 'refresh');
    }

    public function hapus_jadwal($id)
    {
        $finish = $this->db->delete('jadwal', ['kd_jadwal' => $id]);
        echo json_encode($finish);
    }

    // Hasil
    public function hasil_data()
    {
        $this->db->select('*');
        $this->db->from('data_diri');
        $this->db->join('daftar', 'daftar.kd_maba=data_diri.kd_maba');
        $this->db->join('jadwal', 'jadwal.kd_maba=data_diri.kd_maba');
        $this->db->join('ujian', 'ujian.kd_ujian=jadwal.kd_ujian');
        $this->db->where('status', "1");

        $data['hasil'] = $this->db->get()->result_array();
        $data['maba'] = $this->db->query("SELECT
            `data_diri`.*,
            `daftar`.*,
            `jawaban`.`kd_jawaban`,
            `jawaban`.`kd_soal_valid`,
            `jawaban`.`jawaban`
            FROM
            `data_diri`
            LEFT JOIN `jawaban` ON `jawaban`.`kd_maba` = `data_diri`.`kd_maba`
            LEFT JOIN `daftar` ON `daftar`.`kd_maba` = `data_diri`.`kd_maba`
            WHERE daftar.status='1'
            GROUP BY data_diri.kd_maba")->result_array();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/hasil_data', $data);
        $this->load->view('templates/admin/footer');
    }

    public function hasil_lihat($kd_daftar)
    {

        //echo $kd_maba; die;
        $data['maba'] = $this->Admin_model->NoUjianHasil($kd_daftar);

        $data['jadwal'] = $this->Admin_model->jadwalUjianHasil($data['maba']);

        // echo $tes['nama'];
        // print'<pre>';
        // var_dump($tes); die;
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/hasil_lihat', $data);
        $this->load->view('templates/admin/footer');
    }

    public function periksa_ujian($id, $kd_maba)
    {

        $data['periksa'] = $this->Admin_model->periksaSoal($id, $kd_maba);
        $data['kd_maba'] = $kd_maba;
        $data['kd_ujian'] = $id;

        $dariDB = $this->Admin_model->hasilUjiankd();
        $nourut = is_null($dariDB) ? 0 : substr($dariDB, 3, 3);
        $idsekarang = $nourut + 1;

        $data['kd_hasil_ujian'] = $idsekarang;

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/periksa_ujian', $data);
        $this->load->view('templates/admin/footer');
    }

    public function input_hasil()
    {
        $post = $this->input->post();
        // $data = [
        //     "kd_hasil_ujian" => $post['kd_hasil_ujian'],
        //     "kd_maba" => $post['kd_maba'],
        //     "kd_ujian" => $post['kd_ujian'],
        //     "nilai" => $post['nilai']
        // ];

        $this->db->insert('hasil_ujian', $post);
        redirect('admin/hasil_lihat/' . $post['kd_maba']);
        // redirect('admin/periksa_ujian/' . $post['kd_ujian'] .'/'. $post['kd_maba'] );

    }

    public function calon_maba()
    {
        //  $data['keuskupan'] = $this->db->get('asal_keuskupan')->result_array();
        $data['CalonMaba'] = $this->Admin_model->Maba();

        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('templates/admin/topbar');
        $this->load->view('admin/calon_maba', $data);
        $this->load->view('templates/admin/footer');
    }

    public function proses_validasi($id = null, $status = null)
    {
        $maba = $this->db->get_where('data_diri', ['kd_maba' => $id])->row_array();
        if ($id != null & $status != null) {
            if ($status == 'no') {

                $data = [
                    "status_berkas" => 'tidak valid',
                ];

                $this->db->where('kd_daftar', $id);
                $result = $this->db->update('daftar', $data);

                if ($result) {
                    $this->mylib->rest_kirim($maba['no_hp'], "Berkas persyaratan pendaftaran Tidak Valid");
                }
                redirect('admin/calon_maba');
            } else {
                $data = [
                    "status_berkas" => $status,
                ];

                $this->db->where('kd_daftar', $id);
                $result = $this->db->update('daftar', $data);
                if ($result) {
                    $this->mylib->rest_kirim($maba['no_hp'], "Berkas persyaratan pendaftaran anda telah di periksa dan Valid");
                }
                redirect('admin/calon_maba');
            }
        }
    }
}