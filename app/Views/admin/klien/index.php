<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Kelola Data Klien</h2>
        <a href="/admin/klien/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data Klien
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
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
                    <td>
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
<?= $this->endSection() ?>