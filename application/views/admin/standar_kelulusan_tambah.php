
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Standar Kelulusan</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Standar Kelulusan</a></li>
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
                                
                                <div class="form-group <?php echo form_error('kd_standar_kelulusan') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Standar" name="kd_standar_kelulusan" value="SK-<?php echo sprintf("%01s", $kd_standar_kelulusan) ?>" readonly>
                                    <?php echo form_error('kd_standar_kelulusan'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group <?php echo form_error('kd_ujian') ? 'has-error' : null ?>">
                            <label for="kd_ujian">Ujian</label>
                            <select name="kd_ujian" class="form-control" value="<?php echo set_value('kd_ujian'); ?>">
                                <option value="">-PILIH-</option>
                                <?php foreach($ujian as $uj) : ?>
							    <option value="<?= $uj['kd_ujian']; ?>"><?= $uj['nama_ujian']; ?></option>
							    <?php endforeach; ?>
                            </select>
                            <?php echo form_error('kd_ujian'); ?>
                        </div>
                        
                        <div class="form-group <?php echo form_error('kd_ujian') ? 'has-error' : null ?>">
                            <label for="nilai">Nilai</label>
                            <input type="text" class="form-control" placeholder="Masukan Standar Kelulusan..." name="nilai" autocomplete="off"  value="<?php echo set_value('nilai'); ?>" >
                            <?php echo form_error('nilai'); ?>
                        </div>
                        
                        <br> 
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/standar_kelulusan_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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

