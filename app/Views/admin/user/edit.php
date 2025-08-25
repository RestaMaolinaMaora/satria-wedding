<?= $this->extend('admin/layout/main') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <!-- Header form -->
                <div class="card-header form-header">
                    <h5 class="mb-0">Edit User</h5>
                </div>
                <div class="card-body">
                    <form action="/admin/user/update/<?= $admin['id_user'] ?>" method="post" class="form-klien">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nama_user">Nama User</label>
                            <input type="text" name="nama_user" id="nama_user" class="form-control" value="<?= esc($admin['nama_user']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= esc($admin['username']) ?>" required>
                        </div>

                        <div class="mb-3 position-relative">
                            <label for="password">Password (baru)</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin ganti password</small>
                            <span class="toggle-password" onclick="togglePassword()" style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                                <i class="bi bi-eye"></i>
                            </span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="/admin/user" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-simpan">
                                <i class="bi bi-pencil"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.querySelector('.toggle-password i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    }
}
</script>
<?= $this->endSection() ?>