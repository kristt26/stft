</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- PAGE <?= base_url() ?>assets/plugins -->
<!-- jQuery Mapael -->
<script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?= base_url() ?>assets/dist/js/pages/dashboard2.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>


<script src="<?= base_url() ?>assets/dist/sweetalert2.all.min.js" ></script>
<script src="<?= base_url() ?>assets/js/script.js" ></script>

<script>




$(document).on("click", "#kk", function(){
      var kartu = $(this).data('kartu');
   //   console.log(kartu)

    
      document.getElementById("kartuKel").src= "http://localhost/stft/assets/img/berkas/" + kartu

    })


$(document).on("click", "#ktp", function(){
      var ktp = $(this).data('ktp');
   //   console.log(kartu)

    
      document.getElementById("kartuKel").src= "http://localhost/stft/assets/img/berkas/" + ktp

    })




$(document).on("click", "#ijazah", function(){
      var ijazah = $(this).data('ijazah');
   //   console.log(kartu)

    
      document.getElementById("kartuKel").src= "http://localhost/stft/assets/img/berkas/" + ijazah

    })




$(document).on("click", "#surat_baptis", function(){
      var surat_baptis = $(this).data('surat_baptis');
   //   console.log(kartu)

    
      document.getElementById("kartuKel").src= "http://localhost/stft/assets/img/berkas/" + surat_baptis

    })







function bacaGambar(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
 
      reader.onload = function (e) {
          $('#gambar_nodin').attr('src', e.target.result);
      }
 
      reader.readAsDataURL(input.files[0]);
   }
}


$("#preview_gambar").change(function(){
   bacaGambar(this);
   document.getElementById("ganti").style.color = "red";
   $("#ganti").html("Gambar lama") 
   $("#baru").html("Gambar baru")
});




  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(function () {
    // Summernote
    $('.textarea').summernote()
  })


 
// Ujian
//swall tambah ujian
const flashUjian = $('.flash-tambah-ujian').data('flashujian');

if(flashUjian) {
    

     Swal.fire({     
        title: 'Data Ujian',
        text:   flashUjian,
        icon: 'success',         
    });
}


//swall ubah Ujian
const flashUbahUjian = $('.flash-ubah-ujian').data('ubhujian');

if(flashUbahUjian) {

     Swal.fire({     
        title: 'Data Ujian',
        text:   flashUbahUjian,
        icon: 'success',         
    });
}



//hapus data ujian
function hapusUjian(kd_ujian) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data ujian akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_ujian/" +
                kd_ujian,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Data ujian",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })



}






// Tahun
const flashTahun = $('.flash-tambah-tahun').data('flashthn');

if(flashTahun) {

    Swal.fire({     
        title: 'Data Tahun Ajaran',
        text:   flashTahun,
        icon: 'success',         
    });
}

// ubah tahun
const flashUbahTahun = $('.flash-ubah-tahun').data('ubhThn');

if(flashUbahTahun) {

    Swal.fire({     
        title: 'Data Tahun Ajaran',
        text:   flashUbahTahun,
        icon: 'success',         
    });
}


//hapus data tahun ajaran
function hapusTahun(kd_tahun) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Tahun Ajaran akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_tahun/" +
                kd_tahun,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Data Tahun Ajaran",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })



}


// Gelombang
const flashGel = $('.flash-save-gel').data('flashtmbhgel');

if(flashGel) {

    Swal.fire({     
        title: 'Data Gelombang',
        text:   flashGel,
        icon: 'success',         
    });
}


// ubah gelombang
const flashUbahGl = $('.flash-ubah-gel').data('ubhGel');

if(flashUbahGl) {

    Swal.fire({     
        title: 'Data Gelombang',
        text:   flashUbahGl,
        icon: 'success',         
    });
}



//hapus data Gelombang
function hapusGelombang(kd_gelombang) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Gelombang akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_gelombang/" +
                kd_gelombang,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Data Gelombang",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })



}





// Soal Tes
const flashSoal = $('.flash-save-soal').data('flashsoal');

if(flashSoal) {

    Swal.fire({     
        title: 'Data Soal',
        text:   flashSoal,
        icon: 'success',         
    });
}


// ubah soal tes
const flashUbahSoal = $('.flash-ubah-soal').data('ubhsoal');

if(flashUbahSoal) {

    Swal.fire({     
        title: 'Data Soal',
        text:   flashUbahSoal,
        icon: 'success',         
    });
}




//hapus data Soal
function hapusSoal(kd_soal) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Soal akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_soal/" +
                kd_soal,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Data Soal",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })



}




// Stadar Kelulusan
//swall tambah Standar Kelulusan
const flashStandar = $('.flash-save-standar').data('flashstandar');

if(flashStandar) {
    

     Swal.fire({     
        title: 'Data Standar Kelulusan',
        text:   flashStandar,
        icon: 'success',         
    });
}


//hapus data Stantar Kelulusan
function hapusStandar(kd_standar) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Standar Kelulusan akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_standar/" +
                kd_standar,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Data Standar Kelulusan",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })

}


// Berita
//hapus data berita
function hapusBerita(kd_berita) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Berita akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_berita/" +
                kd_berita,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Berita",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })


}

// simpan berita
const flashBerita = $('.flash-save-berita').data('flashberita');

if(flashBerita) {
    

     Swal.fire({     
        title: 'Data Berita',
        text:   flashBerita,
        icon: 'success',         
    });
}



// Jadwal
//swall tambah jadwal
const flashJadwal = $('.flash-save-jadwal').data('flashjadwal');

if(flashJadwal) {
    

     Swal.fire({     
        title: 'Data Jadwal',
        text:   flashJadwal,
        icon: 'success',         
    });
}


//hapus data berita
function hapusJadwal(kd_jadwal) {
Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data Jadwal akan dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus data!'
  }).then((result) => {
    if (result.value) {
        $.ajax({
            url:
                "http://localhost/stft/admin/hapus_jadwal/" +
                kd_jadwal,
            dataType: "json",
            success: function (obj) {
                    swal
                        .fire({
                            title: "Jadwal",
                            text: "Berhasil dihapus",
                            icon: "success",
                        })
                        .then(function () {
                            location.reload();
                        });
                //window.location.assign("http://localhost/si_maba/admin/gelombang");
            },
        });
    }
  })


}



// ubah soal tes
// const flashJadwal = $('.flash-ubah-jadwal').data('ubhjadwal');

// if(flashJadwal) {

//     Swal.fire({     
//         title: 'Data Jadwal',
//         text:   flashJadwal,
//         icon: 'success',         
//     });
// }











</script>

</body>
</html>