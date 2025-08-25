<?= $this->extend('admin/layout/main') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <!-- Judul -->
    <div class="mb-2">
        <h3>Kelola User</h3>
    </div>

    <!-- Form pencarian & tombol tambah sejajar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="<?= site_url('admin/user') ?>" method="get" class="d-flex" style="gap:5px; max-width:400px;">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama atau username..." value="<?= esc($keyword ?? '') ?>">
            <button class="btn btn-cari d-flex align-items-center" type="submit" style="gap:5px;">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>
        <a href="<?= site_url('admin/user/create') ?>" class="btn btn-tambah">
            <i class="bi bi-plus-circle"></i> Tambah User
        </a>
    </div>

    <!-- Tabel Data User -->
    <div class="table-responsive">
        <table class="table-klien">
            <thead>
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
                            <td class="text-center aksi d-flex justify-content-center gap-1">
                                <a href="<?= site_url('admin/user/edit/' . $row['id_user']) ?>" class="btn btn-sm btn-edit">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="<?= site_url('admin/user/delete/' . $row['id_user']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                    <button type="submit" class="btn btn-sm btn-hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
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