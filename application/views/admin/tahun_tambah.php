
<div class="content-wrapper">
       <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Tahun Ajaran</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Tahun Ajaran</a></li>
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
                                
                                <div class="form-group <?php echo form_error('kd_tahun_ajaran') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Tahun" name="kd_tahun_ajaran" value="T-<?php echo sprintf("%03s", $kd_tahun) ?>" readonly>
                                    <?php echo form_error('kd_tahun_ajaran'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-8"> -->
                             
                                
                                <div class="form-group">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="text" class="form-control" placeholder="" name="" value="<?= 'Tahun Terakhir yang ditambahkan ' . $tahunTerakhir['tahun_ajaran']; ?>" readonly>
                                </div>
                            <!-- </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-sm-8"> -->
                                <div class="form-group <?php echo form_error('tahun_ajaran') ? 'has-error' : null ?>">
                                    <label for="nama_tahun_ajaran">Tahun Ajaran</label>
                                    <input type="text" class="form-control" placeholder="Masukan Data Tahun..." name="tahun_ajaran" autocomplete="off"  value="<?php echo set_value('tahun_ajaran'); ?>" >
                                    <?php echo form_error('tahun_ajaran'); ?>
                                </div>
                            <!-- </div>
                        </div> -->
                        
                            
                        <br>
                        
                        
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/tahun_ajaran_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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



