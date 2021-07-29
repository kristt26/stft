<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?= site_url('lain/front-end2/assets/img/ustj-small.png') ?>" type="image/x-icon" />

    <title>Repostitori Karya Ilmiah USTJ</title>

    <!--=== Bootstrap CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Vegas Min CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/plugins/vegas.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/reset.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/responsive.css" rel="stylesheet">

    <!-- Data Tables Server-Side -->
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/dataTables.material.min.css" rel="stylesheet">
    <link href="<?= site_url('lain/front-end2/') ?>assets/css/material-components-web.min.css" rel="stylesheet">

    <link href="<?= site_url('lain/back-end/') ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    

</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <!-- <img src="<?= site_url('lain/front-end2/') ?>assets/img/preloader.gif" alt="JSOFT"> -->
                <img src="<?= site_url('lain/front-end2/assets/img/ustj-small.png') ?>" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <!-- <i class="fa fa-map-marker"></i> -->
                         STFT Jayapura
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-6 text-center">
                        <!-- <i class="fa fa-clock-o"></i>
                        <label id="jam"></label>:<label id="menit"></label>:<label id="detik"></label> -->
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-right">
                        <?php
                        date_default_timezone_set('Asia/Tokyo');
                        ?>
                        <i class="fa fa-calendar-o"></i> <?= date('d/m/Y') ?>
                    </div>
                    <!--== Single HeaderTop End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4">
                        
                        <!-- <a href="<?= site_url() ?>" class="logo">
                            <img src="<?= site_url('lain/back-end/assets/images/ustj-text-new.png') ?>" alt="JSOFT">
                        </a> -->
                        <h3 class="text-white">Sekolah Tinggi Fajar Timur Kota Jayapura<i class="fa fa-graduation-cap" style="color:yellow;"></i></h3>
                        <!-- <img src="<?= base_url('assets/gambar/mhs/logobaru.png') ?>"> -->
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li><a href="<?= site_url('auth') ?>">login</a></li>
                                <li><a href="#">registrasi</a></li>
                                <!-- <li <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="#">Account</a>
                                    <ul>
                                        <li><a href="#">Akun</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                            <!-- <ul>
                                <li <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="#">Dashboard</a></li>
                                <li <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="#">Kuisioner</a></li>
                                <li <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a href="#">Account</a>
                                    <ul>
                                        <li><a href="#">Akun</a></li>
                                        <li><a href="#">Logout</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->