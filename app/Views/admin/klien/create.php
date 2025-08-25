<?= $this->extend('admin/layout/main') ?>
<!-- Tambahan CSS khusus klien -->
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <!-- Header form memakai class form-header dari klien.css -->
                <div class="card-header form-header">
                    <h5 class="mb-0">Tambah Data Klien</h5>
                </div>
                <div class="card-body">
                    <!-- Form memakai class form-klien -->
                    <form action="/admin/klien/store" method="post" class="form-klien">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label for="nama_klien">Nama Klien</label>
                            <input type="text" name="nama_klien" id="nama_klien" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/admin/klien" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-simpan">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>