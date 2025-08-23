<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h3>Edit Paket</h3>

<form action="<?= base_url('admin/paket/update/'.$paket['id_paket']) ?>" method="post">
  <div class="mb-3">
    <label for="nama_paket" class="form-label">Nama Paket</label>
    <input type="text" name="nama_paket" id="nama_paket" value="<?= esc($paket['nama_paket']) ?>" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required><?= esc($paket['deskripsi']) ?></textarea>
  </div>

  <div class="mb-3">
    <label for="harga" class="form-label">Harga</label>
    <input type="number" name="harga" id="harga" value="<?= esc($paket['harga']) ?>" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?= base_url('admin/paket') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>