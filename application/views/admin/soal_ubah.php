
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Soal</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Soal</a></li>
              <li class="breadcrumb-item active">Soal Ubah</li>
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
                        <h5 class="card-title">Ubah Data</h5>
                        <div class="card-tools">
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                            <?php foreach($soal as $sl) : ?>
                             <form action="<?= site_url('admin/soal_edit_proses'); ?>" method="post">
                                
                                <div class="form-group <?php echo form_error('kd_soal_tes') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Soal" name="kd_soal_tes" value="<?= $sl['kd_soal_tes']; ?>" readonly>
                                    <?php echo form_error('kd_soal_tes'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group <?php echo form_error('soal') ? 'has-error' : null ?>">
                            <label for="soal">Soal</label>
                            <input type="text" class="form-control" placeholder="Masukan Data Soal..." name="soal" autocomplete="off"  value="<?= $sl['soal']; ?>" >
                            <?php echo form_error('soal'); ?>
                        </div>
                        <div class="form-group <?php echo form_error('kd_ujian') ? 'has-error' : null ?>">
                            <label for="kd_ujian">Ujian</label>
                            <select name="kd_ujian" class="form-control" value="<?php echo set_value('kd_ujian'); ?>">
                                <option value="<?= $sl['kd_ujian']; ?>"><?= $sl['nama_ujian']; ?></option>
                                <?php foreach($ujian as $uj) : ?>
                                <?php if ($sl['kd_ujian']==$uj['kd_ujian']) {
                                    continue;
                                } ?>
							    <option value="<?= $uj['kd_ujian']; ?>"><?= $uj['nama_ujian']; ?></option>
							    <?php endforeach; ?>
                            </select>
                            <?php echo form_error('kd_ujian'); ?>
                        </div>
                        <br> 
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/soal_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i> Simpan</button>
                        
                        </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card --> 
    </section>
</div>

