<div class="content-wrapper">
    <div class="content-header bg-white mb-2">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Ujian</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Ujian</a></li>
                        <li class="breadcrumb-item active">Data Ujian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <a href="<?= site_url('admin/ujian_tambah'); ?>" class="btn btn-primary btn-sm pull-right"><i
                        class="fa fa-plus"></i> Tambah Data</a>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Ujian</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Ujian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no= 1; ?>
                                <?php foreach($ujian as $uj) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $uj['nama_ujian']; ?></td>
                                    <td class="text-center">
                                        <a onclick="hapusUjian('<?= $uj['kd_ujian']; ?>');" href="#"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                        <a href="<?= site_url('admin/ujian_ubah/') . $uj['kd_ujian']; ?>"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>