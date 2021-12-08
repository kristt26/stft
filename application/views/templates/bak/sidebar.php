 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <!-- <img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
         <i class="fas fa-graduation-cap"></i>
         <span class="brand-text font-weight-bold">STFT Jayapura</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">BAK</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item">
                     <a <?= $this->uri->segment(1) == 'bak' && $this->uri->segment(2) == '' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?>
                         href="<?= site_url('bak'); ?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <!-- <li class="nav-item">
            <a <?= $this->uri->segment(1) == 'bak' && $this->uri->segment(2) == 'validasi_soal' | $this->uri->segment(2) == 'validasi_soal_ubah' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?> href="<?= site_url('bak/validasi_soal'); ?>" >
              <i class="nav-icon fas fa-check-circle"></i>
              <p>
                Validasi Soal Tes
              </p>
            </a>
          </li> -->



                 <li class="nav-item">
                     <a <?= $this->uri->segment(1) == 'bak' && $this->uri->segment(2) == 'laporan_data' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"' ?>
                         href="<?= site_url('bak/laporan_data') ?>">
                         <i class="nav-icon fas fa-print"></i>
                         <p>
                             Laporan
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