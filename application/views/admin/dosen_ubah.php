<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Dosen</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dosen</a></li>
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
                            <?= form_open_multipart('admin/dosen_edit_proses/'.$dosen['id']);?>
                            <div class="form-group <?php echo form_error('nidn') ? 'has-error' : null ?>">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" name="nidn" autocomplete="off"
                                    value="<?= $dosen['nidn']; ?>" required>
                                <?php echo form_error('nidn'); ?>
                            </div> <br>
                            <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" class="form-control" name="nama" autocomplete="off"
                                    value="<?= $dosen['nama']; ?>" required>
                                <?php echo form_error('nama'); ?>
                            </div> <br>
                            <div class="form-group <?php echo form_error('foto') ? 'has-error' : null ?>">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label for="foto" id="ganti">foto</label> <br>
                                        <img width="250" height="200"
                                            src="<?= base_url('assets/img/Dosen/' . $dosen['foto']) ?>" alt="Dosen">
                                    </div>
                                    <div class="col-lg-9">
                                        <label style="margin-left:30px;color:blue;" id="baru" for="foto"></label> <br>
                                        <img style="margin-left:30px; border:none;"
                                            src="<?= base_url('assets/img/logo/gambarbarubg.png') ?>" id="foto_nodin"
                                            width="250" height="200" alt="foto" /> <br>
                                    </div>
                                </div>

                                <input id="preview_foto" type="file" class="form-control" name="foto"
                                    autocomplete="off" style="margin-top:5px;" value="<?= $dosen['foto']; ?>">
                                <small style="color:green;">Perhatian! Biarkan saja jika tidak ingin mengganti foto yang
                                    ada</small>
                                <?php echo form_error('foto'); ?>
                            </div>

                            <br>


                        </div>

                        <div class="card-footer">
                            <a href="<?= site_url('admin/Dosen'); ?>" class="btn btn-danger"><i class="fa fa-times"></i>
                                Batal</a>
                            <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i>
                                Simpan</button>

                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
</div>