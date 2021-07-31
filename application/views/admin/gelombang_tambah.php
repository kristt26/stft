
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
              <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
            <div class="row">
            <div class="col-md-12">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Data</h5>
                        <div class="card-tools">
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                             <form action="" method="post">
                                
                                <div class="form-group <?php echo form_error('kd_gelombang') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Gelombang" name="kd_gelombang" value="G-<?php echo sprintf("%0s", $kd_gelombang) ?>" readonly>
                                    <?php echo form_error('kd_gelombang'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="text" class="form-control" placeholder="" name="" value="<?= 'Gelombang Terakhir yang ditambahkan Gelombang ' . $gelombangTerakhir['gelombang']; ?>" readonly>
                                </div>
                        <!-- <div class="row">
                            <div class="col-sm-8"> -->
                                <div class="form-group <?php echo form_error('gelombang') ? 'has-error' : null ?>">
                                    <label for="nama_fasilitas">Gelombang</label>
                                    <input type="text" class="form-control" placeholder="Masukan Data Gelombang..." name="gelombang" autocomplete="off"  value="<?php echo set_value('gelombang'); ?>" >
                                    <?php echo form_error('gelombang'); ?>
                                </div>
                            <!-- </div>
                        </div> -->
                        
                            
                        <br>
                        
                        
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/gelombang_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i> Simpan</button>
                        
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card --> 
    </section>
</div>
