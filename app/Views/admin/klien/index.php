<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="page-title">Kelola Data Klien</h2>
        <a href="/admin/klien/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data Klien
        </a>
    </div>

    <!-- Form Pencarian -->
    <form action="<?= base_url('admin/klien'); ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" 
                   placeholder="Cari klien..." value="<?= esc($keyword ?? '') ?>">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Cari
            </button>
            <?php if (!empty($keyword)): ?>
                <a href="<?= base_url('admin/klien'); ?>" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Reset
                </a>
            <?php endif; ?>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>Id Klien</th>
                    <th>Nama Klien</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($klien)): ?>
                    <?php foreach ($klien as $k): ?>
                    <tr>
                        <td><?= esc($k['id_klien']) ?></td>
                        <td><?= esc($k['nama_klien']) ?></td>
                        <td><?= esc($k['email']) ?></td>
                        <td><?= esc($k['no_telepon']) ?></td>
                        <td><?= esc($k['alamat']) ?></td>
                        <td class="text-center">
                            <a href="/admin/klien/edit/<?= $k['id_klien'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/admin/klien/delete/<?= $k['id_klien'] ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin hapus data?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data klien</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>