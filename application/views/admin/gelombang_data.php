<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

      <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Gelombang</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Gelombang</a></li>
              <li class="breadcrumb-item active">Data Gelombang</li>
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

        <!-- <div class="flash-save-gel" data-flashtmbhgel="<?= $this->session->flashdata('flash'); ?>"></div> -->
        
        <!-- <div class="flash-ubah-gel" data-ubhGel="<?= $this->session->flashdata('flash'); ?>"></div> -->
        
          
       
        <a href="<?= site_url('admin/gelombang_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
        <br><br>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Gelombang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Gelombang</th>
                  <th>Aksi</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($gelombang as $gl) : ?> 
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center"><?= $gl['gelombang']; ?></td>
                  <td class="text-center">
                    <a onclick="hapusGelombang('<?= $gl['kd_gelombang']; ?>');" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 

                    <a href="<?= site_url('admin/gelombang_ubah/') . $gl['kd_gelombang']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 


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

  