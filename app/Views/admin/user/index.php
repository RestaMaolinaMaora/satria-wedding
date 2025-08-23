<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-4"><?= $title ?></h3>

    <!-- Form Pencarian -->
    <form action="<?= site_url('admin/user') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" 
                   name="keyword" 
                   class="form-control" 
                   placeholder="Cari nama atau username..." 
                   value="<?= esc($keyword) ?>">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
            <a href="<?= site_url('admin/user') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-clockwise"></i> Reset
            </a>
        </div>
    </form>

    <!-- Tombol Tambah User -->
    <div class="mb-3">
        <a href="<?= site_url('admin/user/create') ?>" class="btn btn-success">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>

    <!-- Tabel Data User -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th width="50">#</th>
                    <th>Nama User</th>
                    <th>Username</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($admin)) : ?>
                    <?php $no = 1; foreach ($admin as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['nama_user']) ?></td>
                            <td><?= esc($row['username']) ?></td>
                            <td>
                                <a href="<?= site_url('admin/user/edit/' . $row['id_user']) ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="<?= site_url('admin/user/delete/' . $row['id_user']) ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin ingin menghapus user ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data user.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>