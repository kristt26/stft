
<div class="content-wrapper">
    
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
                                
                                <div class="form-group <?php echo form_error('kd_keuskupan') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Keuskupan" name="kd_keuskupan" value="K-<?php echo sprintf("%02s", $kd_keuskupan) ?>" readonly>
                                    <?php echo form_error('kd_keuskupan'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-8"> -->
                                <div class="form-group <?php echo form_error('nama_keuskupan') ? 'has-error' : null ?>">
                                    <label for="nama_fasilitas">Nama Keuskupan</label>
                                    <input type="text" class="form-control" placeholder="Masukan Nama Keuskupan..." name="nama_keuskupan" autocomplete="off"  value="<?php echo set_value('nama_keuskupan'); ?>" >
                                    <?php echo form_error('nama_keuskupan'); ?>
                                </div>
                            <!-- </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-sm-8"> -->
                                <div class="form-group <?php echo form_error('alamat') ? 'has-error' : null ?>">
                                    <label for="nama_fasilitas">Alamat</label>
                                    <input type="text" class="form-control" placeholder="Masukan Alamat Keuskupan..." name="alamat"  autocomplete="off" value="<?php echo set_value('alamat'); ?>">
                                    <?php echo form_error('alamat'); ?>
                                </div>
                            <!-- </div>
                        </div> -->
                        <br>
                        
                        
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/keuskupan_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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

