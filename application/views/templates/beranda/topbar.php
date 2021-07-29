 <!-- MENU BAR -->
 <nav class="navbar navbar-expand-lg position-absolute">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <div class="row">
                    <div class="col-lg-5">
                         <img src="<?= base_url('assets/img/logo/temp/logotopbar.png') ?>" alt="" class="tengah">
                    </div>
                    <div class="col-lg-7">
                          STFT Fajar Timur
                    </div>
                </div>
            
              <!-- <i class="fa fa-line-chart"></i> -->
              
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?= site_url('beranda') ?>" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('auth/registrasi') ?>" class="nav-link">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('auth') ?>" class="nav-link contact">login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>