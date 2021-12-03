<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper gambar">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Beranda <small></small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php foreach($berita_terakhir as $bt) :?>
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Card title</h5> -->

                            <div class="container">
                                <h4 style="font-family:helvetica;"><?= $bt['judul']; ?></h4>
                                <hr>
                                <p style="position:absolute; right:40px;"><b><?= $bt['tanggal']; ?></b></p>
                                <br><br>
                                <?= $bt['isi_berita']; ?><br>
                                <br>
                                <img src="<?= site_url('assets/img/berita/') . $bt['gambar']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>


                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-4">
                    <?php foreach($berita as $bt) :?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title m-0">Berita lainnya</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title"><?= $bt['judul']; ?></h6>

                            <br><br>
                            <?= tgl_indo($bt['tanggal']) ?>
                            <br><br>

                            <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                            <a href="#" class="btn btn-primary">Lihat berita</a>
                        </div>
                    </div>
                    <?php endforeach; ?>


                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->