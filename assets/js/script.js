//swall tambah keuskupan
const flashGelombang = $('.flash-tambah-gelombang').data('flashgel');

if (flashGelombang) {

    Swal.fire({
        title: 'Data Keuskupan',
        text: flashGelombang,
        icon: 'success',
    });
}




//hapus data keuskupan
function hapusKeuskupan(kd_keuskupan) {
    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data keuskupan akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus data!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url:
                    "http://localhost/stft/admin/hapus_keuskupan/" +
                    kd_keuskupan,
                dataType: "json",
                success: function (obj) {
                    swal
                        .fire({
                            title: "Data Keuskupan",
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




//swall ubah keuskupan
const flashUbahKeuskupan = $('.flash-ubah-gelombang').data('flashubhgel');

if (flashUbahKeuskupan) {

    Swal.fire({
        title: 'Data Keuskupan',
        text: flashUbahKeuskupan,
        icon: 'success',
    });
}










    // UJIAN

    //swall tambah ujian
// const flashUjian = $('.flash-tambah-ujian').data('flashujian');

// if(flashUjian) {


//      Swal.fire({     
//         title: 'Data Ujian',
//         text:   flashUjian,
//         icon: 'success',         
//     });
// }

// flashujian

// flash-tambah-ujian




//hapus data ujian
// function hapusUjian(kd_ujian) {
// Swal.fire({
//     title: 'Apakah anda yakin?',
//     text: "Data ujian akan dihapus",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Hapus data!'
//   }).then((result) => {
//     if (result.value) {
//         $.ajax({
//             url:
//                 "http://localhost/stft/admin/hapus_ujian/" +
//                 kd_ujian,
//             dataType: "json",
//             success: function (obj) {
//                     swal
//                         .fire({
//                             title: "Data ujian",
//                             text: obj.message,
//                             icon: "success",
//                         })
//                         .then(function () {
//                             location.reload();
//                         });
//                 //window.location.assign("http://localhost/si_maba/admin/gelombang");
//             },
//         });
//     }
//   })



// }




//swall ubah Ujian
// const flashUbahUjian = $('.flash-tambah-gelombang').data('flashgel');

// if(flashUbahUjian) {

//      Swal.fire({     
//         title: 'Data Ujian',
//         text:   flashUbahUjian,
//         icon: 'success',         
//     });
// }




// Tahun
//swall tambah tahun


