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
                    <div class="card-header bg-warning">
                        <h3 class="card-title">Ujian <?php foreach ($namaUjian as $nu) {
                                            echo $nu['nama_ujian'];
                                          } ?></h3>
                        <div class="card-tools" onload="ajax()">
                            <div id="hasil" style="color:red"></div>
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <div class="card-body">
                        <?php $no = 1; ?>
                        <form action="<?= site_url('maba/hasil'); ?>" method="post">
                            <input type="hidden" name="kd_maba" value="<?= $kd_maba ?>">
                            <input type="hidden" name="kd_daftar" value="<?= $kd_daftar ?>">
                            <?php foreach ($soal as $sl) : ?>
                            <p><?= $no++ . ').  ' . $sl['soal']; ?></p>
                            <textarea name="jawaban[]" id="" cols="130" rows="5"></textarea>
                            <!-- <input type="text" name="jawaban[]"> -->
                            <input type="hidden" name="kd_soal_valid[]" value="<?= $sl['kd_soal_valid']; ?>">

                            <hr>


                            <?php endforeach; ?>
                            <button type="submit" class="btn btn-primary">Selesai</button>

                        </form>

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

<script type="text/javascript">
// Mengatur waktu akhir perhitungan mundur
var countDownDate = new Date("<?= $tanggal?>").getTime();

// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

    // Untuk mendapatkan tanggal dan waktu hari ini
    var now = new Date().getTime();

    // Temukan jarak antara sekarang dan tanggal hitung mundur
    var distance = countDownDate - now;

    // Perhitungan waktu untuk hari, jam, menit dan detik
    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Keluarkan hasil dalam elemen dengan id = "demo"
    document.getElementById("hasil").innerHTML = (hours > 0 ? (hours + " Jam ") : '') +
        (minutes > 0 ? (minutes + " menit ") : '') + seconds + " Detik";

    // Jika hitungan mundur selesai, tulis beberapa teks 
    if (distance < 300000 && distance > 299000) {
        Swal.fire({
            title: 'Peringatan',
            text: "Waktu akan segera berakhir segera simpan hasil pekerjaan anda",
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
        });
    }
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("hasil").innerHTML = "EXPIRED";
    }
}, 1000);
</script>