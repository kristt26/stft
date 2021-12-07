<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Hasil Tes</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Hasil tes</a></li>
                        <li class="breadcrumb-item active">Data Hasil tes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <!-- <?= $periksa['kd_maba'] ?> -->


                <!-- <a class="btn btn-success" href="#" class="btn- btn-success">kembali</a> -->

                <br><br>
                <div class="card">
                    <div class="card-header bg-info">

                        <!-- jika jawaban tidak null -->
                        <?php if($periksa==null) { ?>

                        <?php echo "<h3 class='text-center text-danger'>Soal belum dijawab</h3>"; } 
              else {  ?>
                        <h3 class="card-title">
                            <p>Kode Calon Mahasiswa: <?= $periksa[0]['kd_maba']; ?></p>
                            <p>Nama: <?= $periksa[0]['nama']; ?></p>
                            <!-- <p>Jenis Kelamin:  <?= $periksa[0]['jenis_kelamin']; ?> </p>  -->
                            <p>Ujian: <?= $periksa[0]['nama_ujian']; ?> </p>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">






                        <?php $no=1; ?>
                        <?php foreach($periksa as $pr) : ?>
                        <p><?= $no++ . '. '; ?><?= $pr['soal']; ?></p>
                        <p style="margin-top:-15px; margin-left:20px;">Jawaban : <?= $pr['jawaban']; ?></p>
                        <?php endforeach; ?>
                        <form action="<?= site_url('admin/input_hasil') ?>" method="post">
                            <input type="hidden" name="kd_hasil_ujian"
                                value="HU-<?php echo sprintf("%03s", $kd_hasil_ujian) ?>">
                            <input type="hidden" name="kd_maba" value="<?= $kd_maba; ?>">
                            <input type="hidden" name="kd_ujian" value="<?= $kd_ujian; ?>">
                            <input type="hidden" name="kd_daftar" value="<?= $kd_daftar; ?>">
                            <!-- <input type="text" name="nilai" required> <button type="submit" class="btn btn-primary btn-flat">Nilai</button> -->
                            <hr>
                            <div class="input-group">
                                <input type="text" name="nilai" placeholder="Input nilai..." required>
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Nilai</button>
                                </span>
                            </div>
                        </form>

                        <?php } ?>
                        <!-- akhir looping jika jawaban tidak null -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->