 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="<?= base_url(); ?>assets/img/logo/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle"> -->
      <i style="color:lightblue;" class="fas fa-graduation-cap"></i>
      <span class="brand-text font-weight-bold">STFT Fajar Timur</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin'); ?>" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'keuskupan_data' || $this->uri->segment(2) == 'keuskupan_tambah' || $this->uri->segment(2) == 'keuskupan_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/keuskupan_data'); ?>" >
              <i class="nav-icon fas fa-home"></i>
              <p>
                Keuskupan
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'dosen' || $this->uri->segment(2) == 'dosen_tambah' || $this->uri->segment(2) == 'dosen_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/dosen'); ?>" >
              <i class="nav-icon fas fa-user"></i>
              <p>
                Dosen
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'ujian_data' || $this->uri->segment(2) == 'ujian_tambah' || $this->uri->segment(2) == 'ujian_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/ujian_data'); ?>" >
              <i class="nav-icon fas fa-book"></i>
              <p>
                Ujian
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'tahun_ajaran_data' || $this->uri->segment(2) == 'tahun_ubah' || $this->uri->segment(2) == 'tahun_tambah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/tahun_ajaran_data'); ?>" >
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Tahun Ajaran
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'gelombang_data' || $this->uri->segment(2) == 'gelombang_tambah' || $this->uri->segment(2) == 'gelombang_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/gelombang_data'); ?>" >
              <i class="nav-icon fas fa-bullseye"></i>
              <p>
                Gelombang
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'soal_data' || $this->uri->segment(2) == 'soal_tambah' || $this->uri->segment(2) == 'soal_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/soal_data'); ?>" >
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Soal
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'validasi_soal_data' ||  $this->uri->segment(2) == 'validasi_soal_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/validasi_soal_data'); ?>" >
              <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Soal Validasi
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'standar_kelulusan_data' || $this->uri->segment(2) == 'standar_kelulusan_tambah' || $this->uri->segment(2) == 'standar_kelulusan_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/standar_kelulusan_data'); ?>" >
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Standar Kelulusan
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'berita' || $this->uri->segment(2) == 'berita_tambah' || $this->uri->segment(2) == 'berita_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/berita'); ?>" >
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Berita
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'calon_maba' || $this->uri->segment(2) == 'lihat_berkas' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/calon_maba'); ?>" >
              <i class="nav-icon fas fa-users"></i>
              <p>
                Calon Mahasiswa
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'jadwal_data' || $this->uri->segment(2) == 'jadwal_tambah' || $this->uri->segment(2) == 'jadwal_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/jadwal_data'); ?>" >
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Jadwal
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'hasil_data' || $this->uri->segment(2) == 'periksa_ujian' || $this->uri->segment(2) == 'hasil_lihat' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('admin/hasil_data'); ?>" >
              <i class="nav-icon fas fa-desktop"></i>
              <p>
                Hasil Tes
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          
          

          

          

          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  