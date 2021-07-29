<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <div class="content-header bg-white mb-2">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark">Soal Validasi</h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Soal Validasi</a></li>
              <li class="breadcrumb-item active">Data Soal Validasi</li>
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

        <div class="flash-save-soal" data-flashsoal="<?= $this->session->flashdata('flash'); ?>"></div>
        
        <div class="flash-ubah-soal" data-ubhsoal="<?= $this->session->flashdata('flash'); ?>"></div>
        
          
       
      
        <br><br>
        <?php foreach($validasi_soal as $vasol => $data) : ?>  
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data soal valid dan tidak valid Ujian <?= $vasol; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>No</th>
                  <!-- <th>Ujian</th> -->
                  <th>Soal</th>
                  <th>Status</th> 
                  <th>Keterangan</th> 
                  <th>Aksi</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($data as $vsd) : ?>
                <!-- <?php $db= $this->db->get_where('ujian',['kd_ujian' => $vsd['']])->result_array(); ?> -->
                <tr>
                  <td><?= $no++; ?></td>
                  <!-- <td><?= $vsd['nama_ujian']; ?></td> -->
                  <td class="text-center"><?= $vsd['soal']; ?></td>
                  <td class="text-center"><?php 
                  if ($vsd['status_validasi']=="Valid") {
                    echo '<p class="text-success"><b>' . $vsd['status_validasi'] . '</b></p>';
                    } else {
                    echo '<p class="text-danger"><b>' . $vsd['status_validasi'] . '</b></p>';
                    }
                  
                  ?></td>
                  <td class="text-center"><?= $vsd['keterangan']; ?></td>
                  <td class="text-center">

                    <?php 
                    
                        if ($vsd['status_validasi']=="Tidak Valid") {
                            echo "<a href=". site_url('admin/validasi_soal_ubah/') . $vsd['kd_soal_tes'] ." class='btn btn-warning btn-sm'>Ubah <i class='fas fa-edit'></i></a> ";
                        } else {
                            echo"--";
                        }
                    
                    
                    ?>

                    <!-- <a onclick="hapusSoal('<?= $sl['kd_soal_tes']; ?>');" href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> 

                    <a href="<?= site_url('admin/soal_ubah/') . $sl['kd_soal_tes']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>  -->


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

  