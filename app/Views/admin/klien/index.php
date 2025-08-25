<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Judul -->
    <h2>Kelola Data Klien</h2>

    <!-- Baris pencarian + tombol tambah -->
    <div class="d-flex justify-content-between align-items-center my-3">
        <!-- Form Pencarian di kiri -->
        <form method="get" class="d-flex" style="gap:10px; max-width:400px;">
            <input type="text" name="keyword" class="form-control" placeholder="Cari klien..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-cari">Cari</button>
        </form>

        <!-- Tombol Tambah Data Klien di kanan -->
        <a href="<?= base_url('admin/klien/create') ?>" class="btn btn-tambah">
            <i class="fas fa-plus"></i> Tambah Data Klien
        </a>
    </div>

    <!-- Tabel Data Klien -->
    <table class="table-klien">
        <thead>
            <tr>
                <th>Id Klien</th>
                <th>Nama Klien</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($klien)): ?>
                <?php foreach($klien as $row): ?>
                    <tr>
                        <td><?= $row['id_klien'] ?></td>
                        <td><?= esc($row['nama_klien']) ?></td>
                        <td><?= esc($row['email']) ?></td>
                        <td><?= esc($row['no_telepon']) ?></td>
                        <td><?= esc($row['alamat']) ?></td>
                        <td class="text-center aksi">
                            <a href="<?= base_url('admin/klien/edit/'.$row['id_klien']) ?>" class="btn btn-sm btn-edit me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?= base_url('admin/klien/delete/'.$row['id_klien']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                <button type="submit" class="btn btn-sm btn-hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Belum ada data klien</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>