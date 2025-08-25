<?= $this->extend('admin/layout/main') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h3 class="mb-4"><?= $title ?></h3>

    <form action="<?= site_url('admin/user/store') ?>" method="post">
        <?= csrf_field() ?>

        <!-- Nama User -->
        <div class="mb-3">
            <label for="nama_user" class="form-label">Nama User</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control" required>
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="mb-3 position-relative">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            <span class="toggle-password" onclick="togglePassword()" style="position:absolute; top:50%; right:10px; transform:translateY(-50%); cursor:pointer;">
                <i class="bi bi-eye"></i>
            </span>
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-between">
            <a href="<?= site_url('admin/user') ?>" class="btn btn-cancel">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-simpan">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
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