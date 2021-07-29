<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  
      <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <!-- <div class="row mb-2" style="background-color:blue;">
          <div class="col-sm-6" style="background-color:red;"> -->
            <h1 class="text-center" style="font-family:comic sans MS;">Validasi Soal
            <i class="fas fas fa-check-circle"></i></h1>
            
          <!-- </div> -->
          <!-- <div class="col-sm-6"> -->
            <!-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol> -->
          <!-- </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

        <div class="flash-save-soal" data-flashsoal="<?= $this->session->flashdata('flash'); ?>"></div>
        
        <div class="flash-ubah-soal" data-ubhsoal="<?= $this->session->flashdata('flash'); ?>"></div>
        
          


       <?php $kd_soal_valid = 'SV-'.sprintf("%02s", $kd_soal_valid);  ?>
        <?= $this->session->flashdata('message');?>
        <br><br>
        <?php foreach($soal as $vasol => $data) : ?>  
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Soal <?= $vasol; ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-center">
                <tr>
                  <th>#</th>
                  <!-- <th>Ujian</th>  -->
                  <th>Soal</th>
                  <th>Status</th> 
                </tr>
                </thead>
                <tbody>
                  <?php $no= 1; ?>
                <?php foreach($data as $sl) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <!-- <td><?= $sl['nama_ujian']; ?></td>  -->
                  <td><?= $sl['soal']; ?></td>
                  <td class="text-center">
                  <?php $db = $this->db->get_where('validasi_soal_tes',['kd_soal_tes' => $sl['kd_soal_tes']])->result_array(); 

                  

                  //Jika tidak Null (Jika ADA)
                  if($db!=null) {
                    if ($db[0]['status_validasi']=="Valid") {
                        echo '<p class="text-success">' . $db[0]['status_validasi'] . '</p>';
                    } else {
                      echo '<p class="text-danger">' . $db[0]['status_validasi'] . '</p>';
                    }
                    // if ($db[0]['status_validasi']=="Valid") {
                    //     echo "<button class='btn btn-success btn-sm'>".$db[0]['status_validasi']."</button>";
                    // } else {
                    //   echo "<button class='btn btn-danger btn-sm'>".$db[0]['status_validasi']."</button>";
                    // }
                    // echo $db[0]['status_validasi'];
                  } else {
                    echo "<a href='".site_url('bak/proses_validasi/') . $sl['kd_soal_tes'] . '/' . $kd_soal_valid . "' class='btn btn-success btn-sm' style='font-family:Arial;'><i class='fas fa-check'></i> Valid</a> 

                    <a href='#' id='validasi' data-toggle='modal' data-target='#modal-default' class='btn btn-danger btn-sm' data-vl='". $sl['kd_soal_tes'] . "'><i class='fas fa-times'></i> Tidak Valid</a>";
                      
                  }  
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
          <?php endforeach; ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Keterangan Soal Tidak Valid</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= site_url('bak/proses_validasi') ?>" method="post">
            <div class="modal-body" id="modal-validasi">
              <input type="hidden" id="kd_soal_tes" name="kd_soal_tes">
              <input type="hidden"  name="kd_soal_valid" value="<?= $kd_soal_valid ?>">
              Jelaskan Perihal Soal Tidak Valid?
                  
              <textarea name="keterangan" id="" cols="60" rows="10"></textarea>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submin" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  