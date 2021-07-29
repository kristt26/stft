
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        
            <div class="row">
            <div class="col-md-12">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Ubah soal tidak valid</h5>
                        <div class="card-tools">
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8">
                            <?php foreach($ValidasiSoal as $sl) : ?>
                             <form action="<?= site_url('admin/validasi_soal_edit_proses'); ?>" method="post">
                                
                                <div class="form-group <?php echo form_error('kd_soal_valid') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Soal" name="kd_soal_tes" value="<?= $sl['kd_soal_tes']; ?>" readonly>
                                    <?php echo form_error('kd_soal_tes'); ?>
                                </div>
                            </div>
                        </div>
                        <label for="keterangan">Keterangan Status</label>
                        <div class="form-group <?php echo form_error('keterangan') ? 'has-error' : null ?>">
                        
                  
                        <textarea name="keterangan" id="" cols="143" rows="6" disabled><?= $sl['keterangan']; ?></textarea>
                            <?php echo form_error('keterangan'); ?>
                        </div>

                        <div class="form-group <?php echo form_error('soal') ? 'has-error' : null ?>">
                            <label for="soal">Soal</label>
                            <input type="text" class="form-control" placeholder="Masukan Data Soal" name="soal" autocomplete="off"  value="<?= $sl['soal']; ?>" >
                            <?php echo form_error('soal'); ?>
                        </div>
                
                        <br> 
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/validasi_soal_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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

