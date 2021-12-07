<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Calon Mahasiswa</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Calon Mahasiswa</a></li>
                        <li class="breadcrumb-item active">Data Calon Mahasiswa</li>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Tahun/Gelombang</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Keuskupan</th>
                                    <th>Berkas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($CalonMaba as $cm): ?>
                                <tr class="text-center">
                                    <td><?=$no++;?></td>
                                    <td><?=$cm['tahun_ajaran'].' - '.$cm['gelombang'];?></td>
                                    <td><?=$cm['nama'];?></td>
                                    <td><?=$cm['tempat_lahir'];?></td>
                                    <td><?=tgl_indo($cm['tanggal_lahir'])?></td>
                                    <td><?=$cm['jenis_kelamin'];?></td>
                                    <td><?=$cm['no_hp'];?></td>
                                    <td><?=$cm['nama_keuskupan'];?></td>
                                    <td> <a href="<?=site_url('admin/lihat_berkas/') . $cm['kd_daftar']?>"
                                            class="btn btn-primary btn-sm">lihat berkas</a></td>
                                    <td class="text-center">

                                        <?php if ($cm['status_berkas'] == 'valid') {?>
                                        <span class="badge bg-success">valid</span>

                                        <?php } elseif ($cm['status_berkas'] == 'tidak valid') {?>
                                        <span class="badge bg-danger">tidak valid</span>

                                        <?php } else {?>
                                        <a href="<?=site_url('admin/proses_validasi/') . $cm['kd_daftar'] . '/' . 'valid'?>"
                                            class="btn btn-success btn-sm"><i class='fas fa-check'></i> valid</a>
                                        <a href="<?=site_url('admin/proses_validasi/') . $cm['kd_daftar'] . '/' . 'no'?>"
                                            class="btn btn-danger btn-sm"><i class='fas fa-times'></i> tidak valid</a>
                                        <?php }?>

                                    </td>
                                </tr>
                                <?php endforeach;?>


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