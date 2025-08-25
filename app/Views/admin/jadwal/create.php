<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4"><?= esc($title) ?></h2>

    <!-- Alert Error -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <!-- Form Tambah Jadwal -->
    <form action="<?= base_url('admin/jadwal/store') ?>" method="post" class="form-klien">
        <!-- Pilih Klien -->
        <div class="mb-3">
            <label for="id_klien">Klien</label>
            <select name="id_klien" id="id_klien" class="form-select" required>
                <option value="">-- Pilih Klien --</option>
                <?php foreach($klien as $k): ?>
                    <option value="<?= $k['id_klien'] ?>"><?= esc($k['nama_klien']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Pilih Paket -->
        <div class="mb-3">
            <label for="id_paket">Paket</label>
            <select name="id_paket" id="id_paket" class="form-select" required>
                <option value="">-- Pilih Paket --</option>
                <?php foreach($paket as $p): ?>
                    <option value="<?= $p['id_paket'] ?>"><?= esc($p['nama_paket']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tanggal Acara -->
        <div class="mb-3">
            <label for="tanggal_acara">Tanggal Acara</label>
            <input type="date" name="tanggal_acara" id="tanggal_acara" class="form-control" required>
        </div>

        <!-- Waktu Mulai -->
        <div class="mb-3">
            <label for="waktu_mulai">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" required>
        </div>

        <!-- Waktu Selesai -->
        <div class="mb-3">
            <label for="waktu_selesai">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" required>
        </div>

        <!-- Lokasi -->
        <div class="mb-3">
            <label for="lokasi_acara">Lokasi</label>
            <input type="text" name="lokasi_acara" id="lokasi_acara" class="form-control" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status_acara">Status</label>
            <select name="status_acara" id="status_acara" class="form-select" required>
                <option value="Terjadwal">Terjadwal</option>
                <option value="Selesai">Selesai</option>
                <option value="Dibatalkan">Dibatalkan</option>
            </select>
        </div>

        <!-- Tombol Simpan & Kembali -->
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-simpan">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>