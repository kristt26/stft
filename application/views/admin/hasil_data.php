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




                <!--
        <a href="<?=site_url('admin/soal_tambah');?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a> -->
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Peserta Ujian</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th rowspan='2'>No</th>
                                    <th rowspan='2'>Kode Pendaftaran</th>
                                    <th rowspan='2'>Kode Calon Mahasiswa Baru</th>
                                    <th rowspan='2'>Nama</th>
                                    <th class="text-center" colspan='<?= count($ujian)?>'>Ujian</th>
                                    <th rowspan='2'>Rata-rata</th>
                                    <th rowspan='2'>Keterangan</th>
                                    <th rowspan='2'>Aksi</th>
                                </tr>
                                <tr>
                                    <?php foreach($ujian as $item):?>
                                    <th><?= $item->nama_ujian?></th>
                                    <?php endforeach;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;?>
                                <?php foreach ($maba as $mb): ?>

                                <tr>
                                    <td><?=$no++;?></td>

                                    <td><?=$mb['kd_daftar'];?></td>
                                    <td><?=$mb['kd_maba'];?></td>
                                    <?php $db = $this->db->get_where('data_diri', ['kd_maba' => $mb['kd_maba']])->result_array();?>
                                    <td><?=$db[0]['nama'];?></td>
                                    <?php foreach($mb['jadwal'] as $jadwal):?>
                                    <td><?= $jadwal->nilai?></td>
                                    <?php endforeach;?>
                                    <td><?=$mb['total_nilai'];?></td>
                                    <td><?=$mb['total_nilai']== null ? '':($mb['total_nilai']>60 ? 'Lulus' : ('Tidak Lulus'));?>
                                    </td>
                                    <td>
                                        <a href="<?=site_url('admin/hasil_lihat/') . $mb['kd_daftar'];?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Lihat Hasil
                                            Ujian</a>
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