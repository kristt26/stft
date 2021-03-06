<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
    img.tengah {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100px;
    }


    .gambar {
        background: url(assets/img/logo/sativa.png);

    }
    </style>


</head>

<body class="hold-transition login-page gambar">
    <div class="login-box">
        <div class="login-logo">
        </div>
        <div class="card">
            <div class="flash-login" data-login="<?=$this->session->flashdata('pesan');?>"></div>
            <div class="card-body login-card-body">
                <img src="<?=base_url('assets/img/logo/logo.jpeg')?>" alt="" class="tengah">
                <p class="login-box-msg">Masukan username dan password</p>

                <form action="<?=site_url('auth/proses')?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">


                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>

                    </div>
                </form>
                <?php
session_unset();
session_destroy();
?>



                <p class="mb-1">
                    <a href="forgot-password.html"></a>
                </p>
                <p class="mb-0">
                    belum punya akun? <a href="<?=site_url('auth/registrasi')?>" class="text-center">Daftar dahulu</a>
                    <br>
                    kembali ke <a href="<?=site_url('beranda')?>" class="text-center">Beranda</a>
                </p>
            </div>
        </div>
    </div>
    <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?=base_url()?>assets/dist/sweetalert2.all.min.js"></script>
    <script>
    var flashLogin = $('.flash-login').data('login');
    // var flashLogin = $('.flash-login');
    // var a = 2;

    if (flashLogin) {
        Swal.fire({
            title: 'Info',
            text: flashLogin,
            icon: 'error',
        });
    }
    </script>

</body>

</html>