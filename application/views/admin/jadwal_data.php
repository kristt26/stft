<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
<div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Jadwal</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Jadwal</a></li>
              <li class="breadcrumb-item active">Data Jadwal</li>
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

        <!-- <div class="flash-save-jadwal" data-flashjadwal="<?= $this->session->flashdata('success'); ?>"></div> -->
        
        <!-- <div class="flash-ubah-jadwal" data-ubhjadwal="<?= $this->session->flashdata('success'); ?>"></div> -->
        
          
       
        <a href="<?= site_url('admin/jadwal_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Tambah Data</a>
        <br><br> 
        <?php foreach($jadwal as $sJoin => $data) : ?> 
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Jadwal <?= $sJoin; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>No</th>
                  <th>Ujian</th> 
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Tanggal</th>
                  <!-- <th>Gelombang</th> -->
                  <!-- <th>Calon Mahasiswa Baru</th> -->
                  <th>Tahun Ajaran</th>
                  <th>Aksi</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($data as $jl) : ?>
                <tr  class="text-center">
                  <td><?= $no++; ?></td>
                  <td class="text-left"><?= $jl['nama_ujian']; ?></td>
                  <td><?= $jl['jam_mulai']; ?></td>
                  <td><?= $jl['jam_selesai']; ?></td>
                  <td><?= tgl_indo($jl['tanggal']) ?></td>
                  <!-- <td><?= $jl['gelombang']; ?></td> -->
                  <!-- <td><?= $jl['nama']; ?></td> -->
                  <td><?= $jl['tahun_ajaran']; ?></td>
                  <td class="text-center">
                    <a onclick="hapusJadwal('<?= $jl['kd_jadwal']; ?>');" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 
                    <a href="<?= site_url('admin/jadwal_ubah/') . $jl['kd_jadwal']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> 
                  </td>
                </tr>
                <?php endforeach; ?>
                
              
                </tbody>
               
              </table>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <?php endforeach; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  