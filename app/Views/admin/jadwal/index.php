<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2><?= esc($title) ?></h2>

    <!-- Alert sukses / error -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Baris pencarian + tombol tambah -->
    <div class="d-flex justify-content-between align-items-center my-3">
        <!-- Form pencarian di kiri -->
        <form method="get" action="<?= base_url('admin/jadwal') ?>" class="d-flex" style="gap:10px; max-width:400px;">
            <input type="text" name="keyword" class="form-control" placeholder="Cari klien, paket, atau lokasi..." value="<?= esc($keyword ?? '') ?>">
            <button type="submit" class="btn btn-cari">Cari</button>
        </form>

        <!-- Tombol tambah jadwal di kanan -->
        <a href="<?= base_url('admin/jadwal/create') ?>" class="btn btn-tambah">
            <i class="fas fa-plus"></i> Tambah Jadwal
        </a>
    </div>

    <!-- Tabel jadwal -->
    <table class="table-klien">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($jadwal)): ?>
                <?php $no = 1; foreach($jadwal as $j): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= esc($j['nama_klien']) ?></td>
                        <td><?= esc($j['nama_paket']) ?></td>
                        <td><?= esc($j['tanggal_acara']) ?></td>
                        <td><?= esc($j['waktu_mulai']) ?> - <?= esc($j['waktu_selesai']) ?></td>
                        <td><?= esc($j['lokasi_acara']) ?></td>
                        <td><?= esc($j['status_acara']) ?></td>
                        <td class="text-center aksi">
                            <a href="<?= base_url('admin/jadwal/edit/'.$j['id_jadwal']) ?>" class="btn btn-sm btn-edit me-1">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="<?= base_url('admin/jadwal/delete/'.$j['id_jadwal']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus jadwal ini?')">
                                <button type="submit" class="btn btn-sm btn-hapus">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Belum ada jadwal.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>