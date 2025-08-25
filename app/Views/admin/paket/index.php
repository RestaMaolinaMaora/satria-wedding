<?= $this->extend('admin/layout/main') ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Judul -->
    <h2 class="mb-3">Kelola Paket</h2>

    <!-- Baris pencarian + tombol tambah sejajar -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Form Pencarian -->
        <form method="get" action="<?= base_url('admin/paket') ?>" class="d-flex" style="gap:10px; flex-grow:1; max-width:400px;">
            <input type="text" name="keyword" class="form-control" placeholder="Cari paket..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-cari">Cari</button>
        </form>

        <!-- Tombol Tambah Paket -->
        <a href="<?= base_url('admin/paket/create') ?>" class="btn btn-tambah ms-2">
            <i class="fas fa-plus"></i> Tambah Paket
        </a>
    </div>

    <!-- Alert sukses -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <!-- Tabel Paket -->
    <table class="table-klien">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
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
                        <td class="text-center aksi">
                            <a href="<?= base_url('admin/paket/edit/'.$p['id_paket']) ?>" class="btn btn-sm btn-edit me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?= base_url('admin/paket/delete/'.$p['id_paket']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus paket ini?')">
                                <button type="submit" class="btn btn-sm btn-hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
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
</div>

<?= $this->endSection() ?>