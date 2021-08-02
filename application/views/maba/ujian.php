<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="font-family:Arial;">Soal Tes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div> -->
  <!-- /.container-fluid -->
  <!-- </section> -->



  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">




        <!--        
        <a href="<?= site_url('admin/soal_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a> -->
        <br><br>
        <div class="card">
          <div class="card-header">
            <h3 class="card-title" style="font-weight: bolder; font-size: 28px">Ujian</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <b>
              <p>Kode Calon Mahasiswa: <?= $NoTes['kd_maba']; ?> </p>
            </b>
            <b>
              <p>Nama: <?= $NoTes['nama']; ?> </p>
            </b>
            <b>
              <p>Tahun Ajaran: <?= $maba['tahun_ajaran']; ?> </p>
            </b>
            <b>
              <p>Gelombang Penerimaan: <?= $maba['gelombang']; ?> </p>
            </b>
            <br>
            <table id="example1" class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Ujian</th>
                  <th>Tanggal Ujian</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>

                <?php $no = 1; ?>

                <!-- <?php if ($jadwal == null) { ?> -->

                <!-- <?php echo "Anda belum melakukan registrasi";
                      } else { ?> -->

                <?php foreach ($jadwal as $jd) : 
                $waktumulai = new DateTime($jd['tanggal'] . " ". $jd['jam_mulai']);
                $waktuselesai = new DateTime($jd['tanggal'] . " ". $jd['jam_selesai']);
                $status = $waktumulai < $tanggalsistem && $waktuselesai > $tanggalsistem;
                  $gelombang = $jd['kd_gelombang'];
                  $ta = $jd['kd_tahun_ajaran'];
                  $kd_maba = $user['kd_maba'];
                  $kd_ujian = $jd['kd_ujian'];
                  $db = $this->db->query("SELECT
                    *
                  FROM
                    `jawaban`
                    LEFT JOIN `validasi_soal_tes` ON `validasi_soal_tes`.`kd_soal_valid` =
                      `jawaban`.`kd_soal_valid`
                    LEFT JOIN `soal_tes` ON
                      `soal_tes`.`kd_soal_tes` = `validasi_soal_tes`.`kd_soal_tes`
                    LEFT JOIN `ujian` ON `soal_tes`.`kd_ujian` = `ujian`.`kd_ujian`
                    LEFT JOIN `jadwal` ON `jadwal`.`kd_ujian` = `ujian`.`kd_ujian`
                  WHERE jadwal.kd_gelombang = '$gelombang' AND jadwal.kd_tahun_ajaran = '$ta' AND jawaban.kd_maba = '$kd_maba' AND ujian.kd_ujian = '$kd_ujian'")->result_array();
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $jd['nama_ujian'] ?></td>
                    <td><?= $jd['tanggal'] ?></td>
                    <td><?= $jd['jam_mulai'] ?></td>
                    <td><?= $jd['jam_selesai'] ?></td>
                    <td class="text-center">
                      <?php if ($db == null) { ?>
                        <a href="<?= site_url('maba/mulai_ujian/') . $jd['kd_ujian'] . '/' . $NoTes['kd_maba'] . '/' .$jd['kd_gelombang']. '/' .$jd['kd_tahun_ajaran'] ; ?>" class="btn btn-<?= ($waktumulai < $tanggalsistem && $waktuselesai > $tanggalsistem) ? 'primary' : 'secondary' ?> btn-sm <?= ($waktumulai < $tanggalsistem && $waktuselesai > $tanggalsistem) ? '' : 'disabled' ?>"><i class="fas fa-edit"></i> <?= ($waktumulai < $tanggalsistem && $waktuselesai > $tanggalsistem) ? 'Mulai Ujian' : ($waktuselesai < $tanggalsistem ? 'Ujian Telah Lewat' : 'Belum di Mulai') ?></a>
                      <?php } else { ?>
                        <button class="btn btn-success btn-sm disabled"><i class="fas fa-check"></i> Ujian telah diikuti</button>
                      <?php } ?>

                    </td>
                  </tr>
                <?php endforeach; ?>

                <!-- <?php } ?> -->

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