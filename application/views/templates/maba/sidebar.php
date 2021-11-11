 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="#" class="brand-link">
         <!-- <img src="<?=base_url();?>assets/img/logo/logo.jpeg" alt="AdminLTE Logo" class="brand-image img-circle"> -->
         <i class="fas fa-graduation-cap"></i>
         <span class="brand-text font-weight-bold">STFT Jayapura</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="<?=base_url();?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">

                 <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                 <li class="nav-item">
                     <a <?=$this->uri->segment(1) == 'maba' && $this->uri->segment(2) == '' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"'?>
                         href="<?=site_url('maba');?>">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a <?=$this->uri->segment(1) == 'maba' && $this->uri->segment(2) == 'biodata' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"'?>
                         href="<?=site_url('maba/biodata');?>">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Biodata
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a <?=$this->uri->segment(1) == 'maba' && $this->uri->segment(2) == 'daftar' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"'?>
                         href="<?=site_url('maba/daftar');?>">
                         <i class="nav-icon fas fa-home"></i>
                         <p>
                             Daftar
                             <!-- <span class="right badge badge-danger">New</span> -->
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a <?=$this->uri->segment(1) == 'maba' && $this->uri->segment(2) == 'ujian' || $this->uri->segment(2) == 'mulai_ujian' || $this->uri->segment(2) == 'belum_daftar' ? 'class="nav-link active" style="background-color:orange;"' : 'class="nav-link"'?>
                         href="<?=site_url('maba/ujian');?>">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             Ujian
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