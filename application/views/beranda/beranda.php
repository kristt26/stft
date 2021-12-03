<section class="blog section-padding">
    <br><br><br>
    <div class="container">
        <center>
            <h4>Berita</h4>
            <div class="row">
                <div class="col-lg-6">

                    <?php foreach($berita_terakhir as $data) : ?>
                    <div class="card" style="width: 42rem;  border-radius: 10px;">
                        <img style="height:300px;" class="card-img-top"
                            src="<?= base_url('assets/img/berita/') . $data['gambar'] ?>" alt="Card image cap">
                        <a href="#"><?= $data['judul'] ?></a>
                        <p class="card-text"><small><?= tgl_indo($data['tanggal']); ?></small></p>
                        <div class="card-body text-left">
                            <?= $data['isi_berita'] ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-6">
                    <?php foreach($berita as $data) : ?>
                    <div class="card mb-3" style="width: 15rem; border-radius: 10px;">
                        <img class="card-img-top" src="<?= base_url('assets/img/berita/') . $data['gambar'] ?>"
                            alt="Card image cap">
                        <div class="card-footer">
                            <a href="#" class="text-justify"><?= $data['judul'] ?></a>
                            <p class="card-text"><small><?= tgl_indo($data['tanggal']); ?></small></p>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </center>
    </div>