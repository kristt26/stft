<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Jadwal</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
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

                                        <div
                                            class="form-group <?php echo form_error('kd_jadwal') ? 'has-error' : null ?>">
                                            <!-- <label for="kd_keuskupan">KD Keuskupan</label> -->
                                            <input type="hidden" class="form-control" placeholder="KD Soal"
                                                name="kd_jadwal" value="J-<?php echo sprintf("%02s", $kd_jadwal) ?>"
                                                readonly>
                                            <?php echo form_error('kd_jadwal'); ?>
                                        </div>
                                </div>
                            </div>

                            <div class="form-group <?php echo form_error('kd_ujian') ? 'has-error' : null ?>">
                                <label for="kd_ujian">Ujian</label>
                                <select name="kd_ujian" id="" class="form-control"
                                    value="<?php echo set_value('kd_ujian'); ?>">
                                    <option value="">-Pilih-</option>
                                    <?php foreach($ujian as $uj) : ?>
                                    <option value="<?= $uj['kd_ujian']; ?>"><?= $uj['nama_ujian']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('kd_ujian'); ?>
                            </div>
                            <div class="form-group <?php echo form_error('jam_mulai') ? 'has-error' : null ?>">
                                <label for="jam_mulai">Jam Milai</label>
                                <input type="time" class="form-control" name="jam_mulai" autocomplete="off"
                                    value="<?php echo set_value('jam_mulai'); ?>">
                                <?php echo form_error('jam_mulai'); ?>
                            </div>
                            <div class="form-group <?php echo form_error('jam_selesai') ? 'has-error' : null ?>">
                                <label for="jam_selesai">Jam Selesai</label>
                                <input type="time" class="form-control" name="jam_selesai" autocomplete="off"
                                    value="<?php echo set_value('jam_selesai'); ?>">
                                <?php echo form_error('jam_selesai'); ?>
                            </div>
                            <div class="form-group <?php echo form_error('tanggal') ? 'has-error' : null ?>">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" placeholder="Masukan Tanggal Ujian..."
                                    name="tanggal" autocomplete="off" value="<?php echo set_value('tanggal'); ?>">
                                <?php echo form_error('tanggal'); ?>
                            </div>
                            <br>
                            <div class="form-group <?php echo form_error('kd_gelombang') ? 'has-error' : null ?>">
                                <label for="kd_gelombang">Gelombang</label>
                                <select name="kd_gelombang" class="form-control"
                                    value="<?php echo set_value('kd_gelombang'); ?>">
                                    <option value="">-Pilih-</option>
                                    <?php foreach($gelombang as $gl) : ?>
                                    <option value="<?= $gl['kd_gelombang']; ?>"><?= $gl['gelombang']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('kd_gelombang'); ?>
                            </div>
                            <!-- <div class="form-group <?php echo form_error('kd_maba') ? 'has-error' : null ?>">
                            <label for="kd_maba">Calon Mahasiswa Baru</label>
                            <select name="kd_maba" class="form-control">
                                <option value="">-Pilih-</option>
                            <?php foreach($data_diri as $di) : ?>
                                <option value="<?= $di['kd_maba']; ?>"><?= $di['kd_maba']; ?> - <?= $di['nama']; ?></option>
                            <?php endforeach; ?>
                            </select>
                            <?php echo form_error('kd_maba'); ?>
                        </div> -->
                            <div class="form-group <?php echo form_error('kd_tahun_ajaran') ? 'has-error' : null ?>">
                                <label for="kd_tahun_ajaran">Tahun Ajaran</label>
                                <select name="kd_tahun_ajaran" class="form-control"
                                    value="<?php echo set_value('kd_tahun_ajaran'); ?>">
                                    <option value="">-Pilih-</option>
                                    <?php foreach($tahun_ajaran as $ta) : ?>
                                    <option value="<?= $ta['kd_tahun_ajaran']; ?>">
                                        <?= substr($ta['kd_tahun_ajaran'],7,1) =='1' ? $ta['tahun_ajaran'] .'-Ganjil':$ta['tahun_ajaran']. '-Genap' ?>
                                    </option>
                                    <?php endforeach; ?>

                                </select>
                                <?php echo form_error('kd_tahun_ajaran'); ?>
                            </div>
                        </div>

                        <div class="card-footer">
                            <a href="<?= site_url('admin/jadwal_data'); ?>" class="btn btn-danger"><i
                                    class="fa fa-times"></i> Batal</a>
                            <button type="submit" class="btn btn-primary" id="kirim"><i class="fa fa-save"></i>
                                Simpan</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
</div>