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
                        <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <!-- <th>#</th> -->
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Keuskupan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <td class="text-center"><?=$maba['nama']?></td>
                                    <td class="text-center"><?=$maba['tempat_lahir']?></td>
                                    <td class="text-center"><?=$maba['tanggal_lahir']?></td>
                                    <td class="text-center"><?=$maba['jenis_kelamin']?></td>
                                    <td class="text-center"><?=$maba['no_hp']?></td>
                                    <td class="text-center"><?=$maba['nama_keuskupan']?></td>
                                    <td class="text-center">
                                        <?php if ($maba['status_berkas'] == 'valid') {?>
                                        <span class="badge bg-success">valid</span>

                                        <?php } elseif ($maba['status_berkas'] == 'tidak valid') {?>
                                        <span class="badge bg-danger">tidak valid</span>

                                        <?php } else {?>
                                        <a href="<?=site_url('admin/proses_validasi/') . $maba['kd_maba'] . '/' . 'valid'?>"
                                            class="btn btn-success btn-sm"><i class='fas fa-check'></i> valid</a>
                                        <a href="<?=site_url('admin/proses_validasi/') . $maba['kd_maba'] . '/' . 'no'?>"
                                            class="btn btn-danger btn-sm"><i class='fas fa-times'></i> tidak valid</a>
                                        <?php }?>


                                    </td>
                                </tr>

                            </tbody>

                        </table>
                        <br><br>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <embed type="application/pdf"
                                        src="<?=site_url('assets/img/berkas/') . $maba['kartu_keluarga']?>"
                                        style="width:100%;"></embed>

                                    <button type="button" class="btn btn-primary" id="kk"
                                        data-kartu="<?=$maba['kartu_keluarga']?>" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Lihat Kartu Keluarga</button>
                                    <br><br><br>
                                </div>



                                <div class="col-lg-6">
                                    <embed type="application/pdf"
                                        src="<?=site_url('assets/img/berkas/') . $maba['ktp']?>"
                                        style="width:100%;"></embed>

                                    <button type="button" class="btn btn-primary" id="ktp" data-ktp="<?=$maba['ktp']?>"
                                        data-toggle="modal" data-target=".bd-example-modal-lg">Lihat KTP</button>

                                </div>

                            </div>
                            <!-- row -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <embed type="application/pdf"
                                        src="<?=site_url('assets/img/berkas/') . $maba['ijazah']?>"
                                        style="width:100%;"></embed>

                                    <button type="button" class="btn btn-primary" id="ijazah"
                                        data-ijazah="<?=$maba['ijazah']?>" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Lihat Ijazah</button>
                                </div>

                                <div class="col-lg-6">
                                    <embed type="application/pdf"
                                        src="<?=site_url('assets/img/berkas/') . $maba['surat_baptis']?>"
                                        style="width:100%;"></embed>

                                    <button type="button" class="btn btn-primary" id="surat_baptis"
                                        data-surat_baptis="<?=$maba['surat_baptis']?>" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Lihat Surat Baptis</button>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <embed type="application/pdf"
                                        src="<?=site_url('assets/img/berkas/') . $maba['rekomendasi']?>"
                                        style="width:100%;"></embed>

                                    <button type="button" class="btn btn-primary" id="rekomendasi"
                                        data-rekomendasi="<?=$maba['rekomendasi']?>" data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Lihat Surat Baptis</button>
                                </div>

                            </div>
                        </div>
                        <!-- container-fluid -->

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


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kartu Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <img id="kartuKel" src="" alt="" style="width:100%;">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->



    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <center>
                    <img id="kartuKel" src="" alt="" style="width:80%;"></img>
                </center>

            </div>
        </div>
    </div>





</div>
<!-- /.content-wrapper -->