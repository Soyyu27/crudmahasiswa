<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Layanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Mahasiswa') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Layanan Pengajuan Surat Aktif Kuliah</li>
            </ol>
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul2; ?></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"><a href="<?= base_url() ?>Layanan/tambah" class="btn btn-info mb-2">Tambah Pengajuan Surat</a></div>
                <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Jenis Surat</td>
                                <td>Keperluan Surat</td>
                                <td>Nama Pemohon</td>
                                <td>Penanggung Jawab Surat</td>
                                <td>Bukti</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($layanan as $us) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['jenis_surat']; ?></td>
                                    <td><?= $us['keperluan_surat']; ?></td>
                                    <td><?= $us['penanggungjawab_surat']; ?></td>
                                    <td>
                                        <img src="<?= base_url('assets/img/layanan/') . $us['gambar']; ?>" style="width: 100px;" 
                                        class="img-thumbnail">
                                    </td>
                                    <td>
                                        <a href="<?= base_url('Layanan/hapus/') . $us['id']; ?>" class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('Layanan/edit/') . $us['id']; ?>" class="btn btn-warning">Edit</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>