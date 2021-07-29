
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Berita</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Berita</a></li>
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
                            <?= form_open_multipart('admin/berita_tambah');?>
                                
                                <div class="form-group <?php echo form_error('kd_berita') ? 'has-error' : null ?>">
                                    <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                    <input type="hidden" class="form-control" placeholder="KD Gelombang" name="kd_berita" value="B-<?php echo sprintf("%03s", $kd_berita) ?>" readonly>
                                    <?php echo form_error('kd_berita'); ?>
                                </div>
                            </div>
                        </div>

                            <div class="form-group <?php echo form_error('judul') ? 'has-error' : null ?>">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" autocomplete="off"  value="<?php echo set_value('judul'); ?>">
                                <?php echo form_error('judul'); ?>
                             </div>
                        
                            <div class="form-group <?php echo form_error('isi_berita') ? 'has-error' : null ?>">
                                <label for="isi_berita">Isi berita</label>
                                <textarea class="textarea" name="isi_berita" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                <?php echo form_error('isi_berita'); ?>
                            </div>

                            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : null ?>">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" autocomplete="off"  value="<?php echo set_value('tanggal'); ?>" >
                                <?php echo form_error('tanggal'); ?>
                             </div>

                             <div class="form-group <?php echo form_error('gambar') ? 'has-error' : null ?>">
                                <label for="gambar">Gambar</label> <br><br>
                                <img src="#" id="gambar_nodin" width="250" height="200" alt="foto berita" /> <br><br>
                                <input type="file" id="preview_gambar" class="form-control" name="gambar" autocomplete="off"  value="<?php echo set_value('gambar'); ?>" required >
                                <?php echo form_error('gambar'); ?>
                             </div>
                    
        
                        
                        
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/berita'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i> Simpan</button>
                        
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /.card --> 
    </section>
</div>

