<?= $this->extend('admin/layout/main') ?>
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

    <!-- Form pencarian -->
    <form method="get" action="<?= base_url('admin/jadwal') ?>" class="mb-3 d-flex">
        <input type="text" name="keyword" class="form-control me-2" 
               placeholder="Cari klien, paket, atau lokasi..." value="<?= esc($keyword) ?>">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Tombol tambah jadwal -->
    <a href="<?= base_url('admin/jadwal/create') ?>" class="btn btn-success mb-3">
        + Tambah Jadwal
    </a>

    <!-- Tabel jadwal -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Paket</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
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
                        <td>
                            <a href="<?= base_url('admin/jadwal/edit/'.$j['id_jadwal']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('admin/jadwal/delete/'.$j['id_jadwal']) ?>" class="btn btn-danger btn-sm" 
                               onclick="return confirm('Yakin hapus jadwal ini?')">Hapus</a>
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