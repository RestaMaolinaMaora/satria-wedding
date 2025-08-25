<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3 class="mb-3">Tambah Paket</h3>

    <form action="<?= base_url('admin/paket/store') ?>" method="post">
        <div class="mb-3">
            <label for="nama_paket" class="form-label">Nama Paket</label>
            <input type="text" name="nama_paket" id="nama_paket" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-simpan">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="<?= base_url('admin/paket') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>