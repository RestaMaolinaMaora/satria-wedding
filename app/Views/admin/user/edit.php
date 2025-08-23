<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container">
  <h3 class="mb-3">Edit User</h3>
  <form action="/admin/user/update/<?= $admin['id_user'] ?>" method="post" class="w-50">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama_user" class="form-control" 
             value="<?= $admin['nama_user'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" 
             value="<?= $admin['username'] ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password (baru)</label>
      <input type="password" name="password" class="form-control">
      <small class="text-muted">Kosongkan jika tidak ingin ganti password</small>
    </div>
    <button type="submit" class="btn btn-warning">
      <i class="bi bi-pencil"></i> Update
    </button>
    <a href="/admin/user" class="btn btn-secondary">Kembali</a>
  </form>
</div>
<?= $this->endSection() ?>