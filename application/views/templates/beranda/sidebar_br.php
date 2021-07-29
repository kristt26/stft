<!--== Car List Area Start ==-->
<section id="car-list-area" class="section-padding" style="margin-top: 1cm; margin-bottom: 150px">
    <div class="container">
        <div class="row">
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 mb-5 mt-3">
                <div class="sidebar-content-wrap">
                    <!-- Single Sidebar Start -->
                    <div class="single-sidebar">
                        <h3>penilaian dosen</h3>

                        <div class="sidebar-body">
                            <ul class="recent-tips">
                                <li class="single-recent-tips">
                                    <div class="recent-tip-thum">
                                        <a href="#"><img src="<?= site_url('lain/front-end2/') ?>assets/img/we-do/ebook.jpg" alt="JSOFT"></a>
                                    </div>
                                    <div class="recent-tip-body">
                                        <h4><a <?= $this->uri->segment(1) == 'mhs' && $this->uri->segment(2) == 'ta_kti' ? 'class="text-warning"' : null ?> href="#">Matakuliah</a></h4>
                                        <span class="date">Total: </span>
                                    </div>
                                </li>
                                <li class="single-recent-tips">
                                    <div class="recent-tip-thum">
                                        <a href="#"><img src="<?= site_url('lain/front-end2/') ?>assets/img/we-do/kp.jpg" alt="JSOFT"></a>
                                    </div>
                                    <div class="recent-tip-body">
                                        <h4><a <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="text-warning"' : null ?> href="#"> Tentang</a></h4>
                                        <!-- <span class="date">Total: </span> -->
                                    </div>
                                </li>
                                <!-- <li class="single-recent-tips">
                                    <div class="recent-tip-thum">
                                        <a href="<?= site_url('mhs/kukerta') ?>"><img src="<?= site_url('lain/front-end2/') ?>assets/img/we-do/kukerta.jpg" alt="JSOFT"></a>
                                    </div>
                                    <div class="recent-tip-body">
                                        <h4><a <?= $this->uri->segment(1) == 'mhs' && $this->uri->segment(2) == 'kukerta' ? 'class="text-warning"' : null ?> href="<?= site_url('mhs/kukerta') ?>"> Laporan Kukerta</a></h4>
                                        <span class="date">Total: </span>
                                    </div>
                                </li> -->
                                <li class="single-recent-tips">
                                    <div class="recent-tip-thum">
                                        <a href="#"><img src="<?= site_url('lain/front-end2/') ?>assets/img/we-do/ebook.jpg" alt="JSOFT"></a>
                                        <!-- <i class="fa fa-sign-out"></i> -->
                                        
                                    </div>
                                    <div class="recent-tip-body">
                                        <h4><a <?= $this->uri->segment(1) == '' && $this->uri->segment(2) == '' ? 'class="text-warning"' : null ?> href="<?= site_url('auth/logout') ?>">Logout</a></h4>
                                        <!-- <span class="date">Total: </span> -->
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar End -->
                </div>
            </div>
            <!-- Sidebar Area End -->