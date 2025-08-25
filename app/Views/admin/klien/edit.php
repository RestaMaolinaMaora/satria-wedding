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
                <!-- Header form memakai class form-header -->
                <div class="card-header form-header">
                    <h5 class="mb-0">Edit Data Klien</h5>
                </div>
                <div class="card-body">
                    <!-- Form memakai class form-klien -->
                    <form action="/admin/klien/update/<?= $klien['id_klien']; ?>" method="post" class="form-klien">
                        <?= csrf_field() ?>
                        <input type="hidden" name="id_klien" value="<?= $klien['id_klien']; ?>">

                        <div class="mb-3">
                            <label for="nama_klien">Nama Klien</label>
                            <input type="text" name="nama_klien" id="nama_klien" class="form-control" 
                                   value="<?= esc($klien['nama_klien']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" 
                                   value="<?= esc($klien['email']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="no_telepon">No Telepon</label>
                            <input type="text" name="no_telepon" id="no_telepon" class="form-control" 
                                   value="<?= esc($klien['no_telepon']); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= esc($klien['alamat']); ?></textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/admin/klien" class="btn btn-secondary">Batal</a>
                            <!-- Tombol Update pakai class btn-simpan -->
                            <button type="submit" class="btn btn-simpan">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>