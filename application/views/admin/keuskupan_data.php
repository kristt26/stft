<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Keuskupan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Keuskupan</a></li>
              <li class="breadcrumb-item active">Data Keuskupan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

        <div class="flash-tambah-gelombang" data-flashgel="<?= $this->session->flashdata('flash'); ?>"></div>
        <div class="flash-ubah-gelombang" data-flashubhgel="<?= $this->session->flashdata('flash'); ?>"></div>
          
       
        <a href="<?= site_url('admin/keuskupan_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
        <br><br>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Keuskupan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Keuskupan</th>
                  <th>Alamat</th>
                  <th>Aksi</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($keuskupan as $ks) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $ks['nama_keuskupan']; ?></td>
                  <td><?= $ks['alamat']; ?></td>
                  <td class="text-center">
                    <a onclick="hapusKeuskupan('<?= $ks['kd_keuskupan']; ?>');" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 

                    <a href="<?= site_url('admin/keuskupan_ubah/') . $ks['kd_keuskupan']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 


                  </td>
                </tr>
                <?php endforeach; ?>
                
              
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->