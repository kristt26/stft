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
        <!-- <div class="row">
        <div class="col-12"> -->




        <br><br>
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">Kode Calon Mahasiswa : <?=$maba['kd_maba'];?> <br><br>
                    Nama : <?=$maba['nama'];?><br><br>
                    Asal Keuskupan : <?=$maba['nama_keuskupan'];?>
                </h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">

                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ujian</th>
                            <th>Status Ujian</th>
                            <th>Nilai</th>
                            <th width="10%">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        <?php foreach ($jadwal as $jd): ?>
                        <?php
$this->db->select('hasil_ujian.*, (SELECT standar_kelulusan.nilai FROM standar_kelulusan WHERE standar_kelulusan.kd_ujian=hasil_ujian.kd_ujian) AS standar');
$this->db->from('hasil_ujian');
$this->db->where('kd_maba', $maba['kd_daftar']);
$this->db->where('kd_ujian', $jd['kd_ujian']);
$db = $this->db->get()->row_array();
?>

                        <tr>
                            <td><?=$no++;?></td>

                            <td><?=$jd['nama_ujian'];?></td>
                            <td class=" text-center">
                                <!-- Jika null (jika tidak ada) -->
                                <?php if ($db == null) {?>
                                <a href="<?=site_url('admin/periksa_ujian/') . $jd['kd_ujian'] . '/' . $maba['kd_maba'] . '/' . $maba['kd_daftar'];?>"
                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Periksa</a> </p>
                                <?php } else {?>

                                <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Sudah
                                    diperiksa</button>
                                <?php }?>
                            </td>

                            <td><?= $db==null ? 0 : $db['nilai']?></td>
                            <td
                                class="<?=$db == null ? '' : ($db['nilai'] >= $db['standar'] ? 'bg-success' : 'bg-danger')?>">
                                <?=$db == null ? 'Belum di periksa' : ($db['nilai'] >= $db['standar'] ? 'Lulus' : 'Tidak Lulus')?>
                            </td>


                        </tr>
                        <?php endforeach;?>


                    </tbody>

                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- </div> -->
        <!-- /.col -->
        <!-- </div> -->
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->