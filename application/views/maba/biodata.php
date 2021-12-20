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
                                    <h5> Masukan Data Diri Anda</h5>
                                    <?=form_open_multipart('maba/biodata');?>


                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                            <input type="hidden" class="form-control" placeholder="KD Soal"
                                                name="kd_maba" value="<?=$kd_maba?>" readonly>

                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?> ">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" placeholder="Masukan Nama..."
                                                name="nama" autocomplete="off">
                                            <?php echo form_error('nama'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('tempat_lahir') ? 'has-error' : null ?> ">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" class="form-control"
                                                placeholder="Masukan Tempat Lahir..." name="tempat_lahir"
                                                autocomplete="off">
                                            <?php echo form_error('tempat_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('tanggal_lahir') ? 'has-error' : null ?> ">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input type="date" class="form-control"
                                                placeholder="Masukan Tanggal Lahir..." name="tanggal_lahir"
                                                autocomplete="off">
                                            <?php echo form_error('tanggal_lahir'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('jenis_kelamin') ? 'has-error' : null ?>">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="">-Pilih-</option>
                                                <option value="laki-laki">Laki-Laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            <?php echo form_error('jenis_kelamin'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group <?php echo form_error('no_hp') ? 'has-error' : null ?>">
                                            <label for="no_hp">No.Hp</label>
                                            <input type="number" class="form-control" placeholder="Masukan nomor HP..."
                                                name="no_hp" autocomplete="off">
                                            <?php echo form_error('no_hp'); ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div
                                            class="form-group <?php echo form_error('kd_keuskupan') ? 'has-error' : null ?>">
                                            <label for="kd_keuskupan">Keuskupan</label>
                                            <select class="form-control" name="kd_keuskupan">
                                                <option value="">-Pilih-</option>
                                                <?php foreach ($keuskupan as $ks): ?>
                                                <option value="<?=$ks['kd_keuskupan'];?>">
                                                    <?=$ks['nama_keuskupan'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <?php echo form_error('kd_keuskupan'); ?>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-8">
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
                                    </div> -->
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
                                <!-- <a href="<?=site_url('maba/biodata');?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                        <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i> Simpan</button> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->





            <br><br>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title" style="font-weight: bolder; font-size: 28px">Upload Berkas</h5>
                    <div class="card-tools">

                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-sm-8">
                            <h5> Upload Berkas Anda</h5>







                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="berkas">KTP</label>
                                    <input type="file" class="form-control" name="ktp" autocomplete="off" required>

                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="berkas">Kartu Keluarga</label>
                                    <input type="file" class="form-control" name="kartu_keluarga" autocomplete="off"
                                        required>

                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="berkas">Surat Baptis</label>
                                    <input type="file" class="form-control" name="surat_baptis" autocomplete="off"
                                        required>

                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="berkas">Ijazah</label>
                                    <input type="file" class="form-control" name="ijazah" autocomplete="off" required>

                                </div>
                            </div>

                            <!-- <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="rekom">Surat Rekomendasi</label>
                                    <input type="file" class="form-control" name="rekomendasi" autocomplete="off"
                                        required>

                                </div>
                            </div> -->


                        </div>




                        <br>
                    </div>

                    <div class="card-footer">
                        <a href="<?=site_url('maba/biodata');?>" class="btn btn-danger"><i class="fa fa-times"></i>
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


</section>
</div>