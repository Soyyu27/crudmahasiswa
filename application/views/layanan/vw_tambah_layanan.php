<div id="layoutSidenav_content">
    <div class="container-fluid">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Layanan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= base_url('Profil') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="<?= base_url('Layanan') ?>">Layanan</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
            <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header justify-content-center">
                            Form Tambah Pengajuan Surat Aktif Kuliah
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="jenis_surat">Jenis Surat</label>
                                    <input type="text" name="jenis_surat" class="form-control" 
                                    value="<?= set_value('jenis_surat') ?>" id="jenis_surat" placeholder="Jenis Surat">
                                    <?= form_error('jenis_surat', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keperluan_surat">Keperluan Surat</label>
                                    <input type="text" name="keperluan_surat" class="form-control" value="<?= set_value('keperluan_surat') ?>"
                                    id="keperluan_surat" placeholder="Keperluan Surat">
                                    <?= form_error('keperluan_surat', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pemohon</label>
                                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>"
                                    id="nama" placeholder="Nama Pemohon">
                                    <?= form_error('nama', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="penanggungjawab_surat">Penanggung Jawab Surat</label>
                                    <input type="text" name="penanggungjawab_surat" class="form-control"
                                    value="<?= set_value('penanggungjawab_surat') ?>" id="penanggungjawab_surat" placeholder="Penanggung Jawab Surat">
                                    <?= form_error('penanggungjawab_surat', '<small class="text-danger p1-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                        <label for="gambar" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <a href="<?= base_url('Layanan') ?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Surat</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>