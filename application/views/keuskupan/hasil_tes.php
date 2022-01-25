<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-primary">Hasil Tes</h3>
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
                        <h3 class="card-title">Data Hasil Tes</h3>
                        <button onclick="window.print();" class="btn btn-primary btn-sm"
                            style="position:absolute; right:0; margin-right:30px;"><i class="fas fa-print"></i>
                            Cetak</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th rowspan='2'>#</th>
                                    <th rowspan='2'>Kode Calon Maba</th>
                                    <th rowspan='2'>Nama</th>
                                    <th rowspan='2'>Asal Keuskupan</th>
                                    <th class="text-center" colspan='<?= count($ujian)?>'>Ujian</th>
                                    <th rowspan='2'>Nilai</th>
                                    <th rowspan='2'>Keterangan</th>
                                </tr>
                                <tr>
                                    <?php foreach($ujian as $item):?>
                                    <th><?= $item->nama_ujian?></th>
                                    <?php endforeach;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i =1; ?>
                                <?php foreach($Calonmaba as $data) : ?>
                                <tr>
                                    <td class="text-center"><?= $i; ?></td>
                                    <td class="text-center"><?= $data['kd_maba'] ?></td>
                                    <td class="text-center"><?= $data['nama'] ?></td>
                                    <td class="text-center"><?= $data['nama_keuskupan'] ?></td>
                                    <?php foreach($data['jadwal'] as $jadwal):?>
                                    <td><?= $jadwal->nilai?></td>
                                    <?php endforeach;?>
                                    <td class="text-center"><?= round($data['nilai'],1) ?></td>
                                    <td class="text-center">
                                        <?php 

                      $standar =  $this->db->get_where('standar_kelulusan',['kd_ujian' => $data['kd_ujian']])->result_array();

                      foreach ($standar as $key) {
                        
                        if ($key['nilai']>round($data['nilai'],1)) {
                            echo '<text style="color:red;">Tidak Lulus</text>';
                        } else {
                          echo 'Lulus';
                        }
                      }

                      // print'<pre>';
                      // var_dump($standar);

                            // if ($data['nilai']>= 60.0){
                            //     echo "Lulus";
                            // } else {
                            //     echo "Tidak Lulus";
                            // }
                        
                        ?>

                                    </td>
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