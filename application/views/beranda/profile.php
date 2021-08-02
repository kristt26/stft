<!-- BLOG -->
<section class="blog section-padding">
    <div class="container">
        <br><br>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">STFT FAJAR TIMUR </h3>
            </div>
            <div class="card-body">
                <img src="<?= base_url("assets/img/logo/profile.jpeg");?>" width="100%">
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">STRUKTUR ORGANISASI</h3>
            </div>
            <div class="card-body">
                <img src="<?= base_url("assets/img/logo/str.png");?>" width="100%">
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">DATA DOSEN</h3>
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th style="width: 20%;">NIDN</th>
                    <th style="width: 45%;">Nama Dosen</th>
                    <th style="width: 30%;">Foto</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($dosen as $key => $value):?>
                    <tr>
                      <td><?= $key +1;?></td>
                      <td><?= $value['nidn'];?></td>
                      <td><?= $value['nama'];?></td>
                      <td><img src="<?= base_url("assets/img/dosen/").$value['foto']?>" alt="" style="width: 50%;"></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">FASILITAS</h3>
            </div>
            <div class="card-body">
                <img src="<?= base_url("assets/img/logo/perpus.jpeg");?>" width="100%">
            </div>
        </div>