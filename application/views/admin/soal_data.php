<div class="content-wrapper">
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Soal</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Soal</a></li>
                        <li class="breadcrumb-item active">Data Soal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <a href="<?= site_url('admin/soal_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i
                        class="fa fa-plus"></i> Tambah Data</a>
                <br><br>
                <?php foreach($SoalJoin as $sJoin => $data) : ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ujian <?= $sJoin; ?></h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th style="width:10px;">No</th>
                                    <th>Soal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach($data as $soal) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td class="text-center"><?= $soal['soal']; ?></td>
                                    <td class="text-center">
                                        <a onclick="hapusSoal('<?= $soal['kd_soal_tes']; ?>');" href="#"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>

                                        <a href="<?=base_url('admin/soal_ubah/').$soal['kd_soal_tes']?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>


                                    </td>
                                </tr>
                                <?php endforeach; ?>


                            </tbody>

                        </table>

                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>