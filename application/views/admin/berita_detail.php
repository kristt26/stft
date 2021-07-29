

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Berita<small></small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Berita</a></li>
              <li class="breadcrumb-item active"><a href="#">Lihat berita</a></li>
              <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card">
            <div class="card-header alert-dark">
                <h2 class="card-title"></h2>
                

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <div class="container">
                    <h4 style="font-family:helvetica;"><?= $berita[0]['judul']; ?></h4>
                    <hr>
                    <p style="position:absolute; right:40px;"><b><?= $berita[0]['tanggal']; ?></b></p>
                        <br><br>
                        <?= $berita[0]['isi_berita']; ?><br>
                        <img width="50%;" src="<?= site_url('assets/img/berita/') . $berita[0]['gambar']; ?>" alt="">
                </div>
            </div>
              <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
              <!-- /.card-footer-->
        </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->