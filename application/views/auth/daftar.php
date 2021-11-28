<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
    img.tengah {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100px;
    }
    </style>
</head>

<body class="hold-transition register-page">
    <div class="flash-login" data-login="<?=$this->session->flashdata('pesan');?>"></div>
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url() ?>assets/index2.html">
                <h3 style="font-family:helvetica;">Penerimaan Mahasiswa Baru STFT</h3>
            </a>
        </div>
        <!-- <?= $this->session->flashdata('message');?> -->

        <div class="card" style="border-radius:40px;">
            <div class="card-body register-card-body">
                <img src="<?= base_url('assets/img/logo/logo.jpeg') ?>" alt="" class="tengah">
                <p class="login-box-msg">Silahkan buat akun anda</p>

                <?= form_open_multipart('auth/registrasi');?>
                <div class="input-group mb-3  <?php echo form_error('kd_maba') ? 'has-error' : null ?>">
                    <input type="hidden" class="form-control" placeholder="kode" name="kd_maba"
                        value="CM-<?php echo sprintf("%03s", $kd_maba) .'-'. $kodeTahun ?>" readonly>
                    <div class="input-group-append">
                        <!-- <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div> -->
                        <?php echo form_error('id_login'); ?>
                    </div>
                </div>
                <div class="form-group <?php echo form_error('nama') ? 'has-error' : null ?>">
                    <input type="text" class="form-control" placeholder="Masukan Nama . . ." name="nama"
                        autocomplete="off">
                    <?php echo form_error('nama'); ?>
                </div>
                <div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
                    <input type="text" class="form-control" placeholder="Masukan Username . . ." name="username"
                        autocomplete="off">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-group <?php echo form_error('password') ? 'has-error' : null ?>">
                    <input type="text" class="form-control" placeholder="Masukan Password . . ." name="password"
                        autocomplete="off">
                    <?php echo form_error('password'); ?>
                </div>

                <br>

                <button type="submit" class="btn btn-success btn-block">Daftar</button>

                <?= form_close(); 
                session_unset();
                session_destroy();
                ?>


                sudah punya akun? <a href="<?= site_url('auth'); ?>" class="text-center">Silahkan Login</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?=base_url()?>assets/dist/sweetalert2.all.min.js"></script>
    <script>
    var flashLogin = $('.flash-login').data('login');
    if (flashLogin) {
        Swal.fire({
            title: 'Info',
            text: flashLogin,
            icon: 'success',
        });
    }
    </script>
</body>

</html>