
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Ujian</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ujian</a></li>
              <li class="breadcrumb-item active">Ubah Data</li>
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
                            <?php foreach($ujian as $uj) : ?>
                             <form action="<?= site_url('admin/ujian_edit_proses') ?>" method="post">
                                
                                <div class="form-group <?php echo form_error('kd_ujian') ? 'has-error' : null ?>">
                                    <input type="hidden" class="form-control" placeholder="KD Ujian" name="kd_ujian" value="<?= $uj['kd_ujian']; ?>" readonly>
                                    <?php echo form_error('kd_ujian'); ?>
                                </div>
                            </div>
                        </div>
                        
                                <div class="form-group <?php echo form_error('nama_ujian') ? 'has-error' : null ?>">
                                    <label for="nama_ujian">UJian</label>
                                    <input type="text" class="form-control" placeholder="Masukan Data Ujian..." name="nama_ujian" autocomplete="off"  value="<?= $uj['nama_ujian']; ?>" >
                                    <?php echo form_error('nama_ujian'); ?>
                                </div>
                
                        
                         
                        <br>
                        
                        
                    </div>
                       
                    <div class="card-footer"> 
                        <a href="<?= site_url('admin/ujian_data'); ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
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

