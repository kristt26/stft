<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

      <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <!-- <div class="row mb-2" style="background-color:blue;">
          <div class="col-sm-6" style="background-color:red;"> -->
            <h1 class="text-center" style="font-family:comic sans MS;">Laporan
            <i class="fas fas fa-print"></i></h1>
            
          <!-- </div> -->
          <!-- <div class="col-sm-6"> -->
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol> -->
          <!-- </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

    
        
          
       
        <!-- <?= $this->session->flashdata('message');?>
        <br><br> -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Hasil Tes Peserta</h3>
              <a href="#" onclick="window.print();" class="btn btn-primary btn-sm noprint" style="position:absolute; right:0; margin-right:30px;"><i class="fas fa-print"></i> Cetak</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>#</th>
                  <th>No.Tes</th> 
                  <th>Peserta</th>
                  <th>Asal Keuskupan</th>
                  <th>Ujian</th>
                  <th>Nilai</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($hasilTes as $ht) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $ht['kd_maba'] ?></td>
                  <td><?= $ht['nama']; ?></td>
                  <td><?= $ht['nama_keuskupan']; ?></td>
                  <td><?= $ht['nama_ujian']; ?></td>
                  <td><?= $ht['nilai']; ?></td>
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



  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= site_url('bak/proses_validasi') ?>" method="post">
            <div class="modal-body" id="modal-validasi">
              <input type="hidden" id="kd_soal_tes" name="kd_soal_tes">
              Jelaskan perihal Soal Tidak Valid?
                  
              <textarea name="keterangan" id="" cols="60" rows="10"></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submin" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  