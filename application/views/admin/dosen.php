<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
<div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Dosen</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dosen</a></li>
              <li class="breadcrumb-item active">Data Dosen</li>
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

        <!-- <div class="flash-save-berita" data-flashberita="<?= $this->session->flashdata('flash'); ?>"></div> -->
        
        <a href="<?= site_url('admin/dosen_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
        <br><br>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Dosen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIDN</th>
                  <th>Nama</th>
                  <!-- <th>Berita</th>  -->
                  <th>Foto</th> 
                  <th>Aksi</th> 
                </tr>
                </thead>
                <tbody>
                <?php foreach($dosen as $key=> $dsn) : ?>
                <tr class="text-center">
                  <td><?= $key+1; ?></td>
                  <td><?= $dsn['nidn']; ?></td>
                  <td><?= $dsn['nama']; ?></td>
                  <td> <img width="100" height="100" src="<?= site_url('assets/img/dosen/') . $dsn['foto']; ?> " alt=""> </td>
                  <td class="text-center">
                    <a href="<?= site_url('admin/dosen_hapus/') . $dsn['id']; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 

                    <a href="<?= site_url('admin/dosen_ubah/') . $dsn['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
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

  