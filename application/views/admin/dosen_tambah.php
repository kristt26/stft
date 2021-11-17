<div class="content-wrapper">
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Berita</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                            <?= form_open_multipart('admin/dosen_tambah');?>
                            <div class="form-group <?php echo form_error('nidn') ? 'has-error' : null ?>">
                                <label for="nidn">NIDN</label>
                                <input type="text" class="form-control" name="nidn" autocomplete="off"
                                    value="<?php echo set_value('nidn'); ?>">
                                <?php echo form_error('nidn'); ?>
                            </div>

                            <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                                <label for="nama">Nama Dosen</label>
                                    <input type="text" class="form-control" name="nama" autocomplete="off"
                                    value="<?php echo set_value('nama'); ?>">
                                <?php echo form_error('nama'); ?>
                            </div>

                            <div class="form-group <?php echo form_error('foto') ? 'has-error' : null ?>">
                                <label for="foto">foto</label> <br><br>
                                <img src="#" id="gambar_nodin" width="250" height="200" alt="foto berita" /> <br><br>
                                <input type="file" id="preview_gambar" class="form-control" name="foto"
                                    autocomplete="off" value="<?php echo set_value('foto'); ?>" required>
                                <?php echo form_error('foto'); ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?= site_url('admin/dosen'); ?>" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Batal</a>
                            <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i>
                                Simpan</button>

                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>