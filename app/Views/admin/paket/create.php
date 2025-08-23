<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h3>Tambah Paket</h3>

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

  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="<?= base_url('admin/paket') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>