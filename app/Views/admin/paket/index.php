<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Kelola Paket</h3>
  <a href="<?= base_url('admin/paket/create') ?>" class="btn btn-primary">
    <i class="bi bi-plus-circle"></i> Tambah Paket
  </a>
</div>

<!-- Form Pencarian -->
<form method="get" action="<?= base_url('admin/paket') ?>" class="mb-3">
  <div class="input-group">
    <input type="text" name="keyword" class="form-control" 
           placeholder="Cari paket..." 
           value="<?= esc($keyword) ?>">
    <button class="btn btn-outline-secondary" type="submit">
      <i class="bi bi-search"></i> Cari
    </button>
  </div>
</form>

<?php if(session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Nama Paket</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($paket)): ?>
      <?php $no=1; foreach($paket as $p): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= esc($p['nama_paket']) ?></td>
          <td><?= esc($p['deskripsi']) ?></td>
          <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
          <td>
            <a href="<?= base_url('admin/paket/edit/'.$p['id_paket']) ?>" class="btn btn-sm btn-warning">
              <i class="bi bi-pencil"></i>
            </a>
            <a href="<?= base_url('admin/paket/delete/'.$p['id_paket']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus paket ini?')">
              <i class="bi bi-trash"></i>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5" class="text-center">Belum ada data paket.</td>
      </tr>
    <?php endif; ?>
  </tbody>
</table>

<?= $this->endSection() ?>