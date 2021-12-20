<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-primary">Calon Mahasiswa</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"></a></li>
                        <!-- <i class="fas fa-users"></i> -->
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





                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Calon Mahasiswa Baru</h3>
                        <a href="#" onclick="window.print();" class="btn btn-primary btn-sm noprint"
                            style="position:absolute; right:0; margin-right:30px;"><i class="fas fa-print"></i>
                            Cetak</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Keuskupan</th>
                                    <th>Surat Rekomendasi</th>
                                    <!-- <th>Berkas</th> -->
                                    <!-- <th>Aksi</th>  -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach($Calonmaba as $key=>$cm) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $cm['nama']; ?></td>
                                    <td><?= $cm['tempat_lahir']; ?></td>
                                    <td><?= tgl_indo($cm['tanggal_lahir']) ?></td>
                                    <td><?= $cm['jenis_kelamin']; ?></td>
                                    <td><?= $cm['no_hp']; ?></td>
                                    <td><?= $cm['nama_keuskupan']; ?></td>
                                    <td>
                                        <?php if($cm['rekomendasi']==null): ?>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                            data-target="#rekomendasi<?= $key?>">
                                            Upload
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="rekomendasi<?= $key?>" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Upload Surat Rekomendasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?=form_open_multipart('keuskupan/upload');?>
                                                        <div class="form-group">
                                                            <label for="nama">Calon Maba</label>
                                                            <input type="text" class="form-control" id="nama"
                                                                aria-describedby="emailHelp" value="<?= $cm['nama']; ?>"
                                                                disabled>
                                                            <input type="hidden" class="form-control" name="kd_maba"
                                                                value="<?= $cm['kd_maba']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="rekom">Surat Rekomendasi</label>
                                                            <input type="file" class="form-control" name="rekomendasi"
                                                                autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Upload</button>
                                                    </div>
                                                    <?=form_close();?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php else:?>
                                        <a href="<?= base_url('assets/img/berkas/').$cm['rekomendasi']?>"
                                            target="_blank">Surat Rekomendasi</a>
                                        <?php endif;?>
                                    </td>
                                    <!-- <td> <button class="btn btn-primary btn-sm">lihat berkas</button></td> -->
                                    <!-- <td class="text-center">

                    <?php if($cm['status_berkas']=='valid') { ?>
                      <p style="color:green;">valid</p>

                    <?php } elseif($cm['status_berkas']=='tidak valid') { ?>
                      <p style="color:red;">tidak valid</p>

                    <?php } else { ?>
                      <a href="<?= site_url('admin/proses_validasi/') . $cm['kd_maba'] .'/'. 'valid' ?>" class="btn btn-success btn-sm"><i class='fas fa-check'></i> valid</a>
                      <a href="<?= site_url('admin/proses_validasi/') . $cm['kd_maba']  .'/'. 'no' ?>" class="btn btn-danger btn-sm"><i class='fas fa-times'></i> tidak valid</a>
                    <?php } ?>

                  </td> -->
                                </tr>
                                <?php endforeach; ?>


                            </tbody>

                        </table>

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