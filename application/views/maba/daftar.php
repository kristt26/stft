<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <br><br>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title" style="font-weight: bolder; font-size: 28px">Daftar</h5>
                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-8">
                                    <h5> Silahkan lakukan pendaftaran</h5>
                                    <?=form_open_multipart('maba/daftar');?>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('kd_daftar') ? 'has-error' : null ?> ">
                                            <label for="nama">Kode Pendaftaran</label>
                                            <input type="text" class="form-control" value="<?=$kd_daftar;?>"
                                                autocomplete="off" disabled>
                                            <input type="hidden" class="form-control" name="kd_daftar"
                                                value="<?=$kd_daftar;?>" autocomplete="off">
                                            <?php echo form_error('kd_daftar'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('kd_tahun_ajaran') ? 'has-error' : null ?>">
                                            <label for="kd_tahun_ajaran">Tahun Ajaran</label>
                                            <select name="kd_tahun_ajaran" class="form-control"
                                                value="<?php echo set_value('kd_tahun_ajaran'); ?>">
                                                <option value="">-Pilih-</option>
                                                <?php foreach ($tahun_ajaran as $ta): ?>
                                                <option value="<?=$ta['kd_tahun_ajaran'];?>">
                                                    <?=substr($ta['kd_tahun_ajaran'], 7, 1) == '1' ? $ta['tahun_ajaran'] . '-Ganjil' : $ta['tahun_ajaran'] . '-Genap'?>
                                                </option>
                                                <?php endforeach;?>

                                            </select>
                                            <?php echo form_error('kd_tahun_ajaran'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('kd_gelombang') ? 'has-error' : null ?>">
                                            <label for="kd_gelombang">Gelombang</label>
                                            <select name="kd_gelombang" class="form-control"
                                                value="<?php echo set_value('kd_gelombang'); ?>">
                                                <option value="">-Pilih-</option>
                                                <?php foreach ($gelombang as $gl): ?>
                                                <option value="<?=$gl['kd_gelombang'];?>"><?=$gl['gelombang'];?>
                                                </option>
                                                <?php endforeach;?>
                                            </select>
                                            <?php echo form_error('kd_gelombang'); ?>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-8">
                              <div class="form-group">
                                  <label for="berkas">Berkas</label>
                                  <input type="file" class="form-control" name="berkas" autocomplete="off" required >

                              </div>
                             </div> -->


                                </div>




                                <br>
                            </div>

                            <div class="card-footer">
                                <a href="<?=site_url('maba/biodata');?>" class="btn btn-danger"><i
                                        class="fa fa-times"></i>
                                    Batal</a>
                                <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i>
                                    Simpan</button>

                                <?=form_close();?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->





            <br><br>
        </div>
</div>
<!-- /.card -->


</section>
</div>