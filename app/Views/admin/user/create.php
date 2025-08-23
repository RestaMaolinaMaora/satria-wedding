<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4"><?= $title ?></h3>

    <form action="<?= site_url('admin/user/store') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama_user" class="form-label">Nama User</label>
            <input type="text" name="nama_user" id="nama_user" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="bi bi-save"></i> Simpan
        </button>
        <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </form>
</div>

<?= $this->endSection() ?>