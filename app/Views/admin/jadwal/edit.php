<?= $this->extend('admin/layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/klien.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h2 class="mt-4"><?= esc($title) ?></h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/jadwal/update/'.$jadwal['id_jadwal']) ?>" method="post" class="form-klien">
    <div class="mb-3">
        <label for="id_klien">Klien</label>
        <select name="id_klien" id="id_klien" class="form-select" required>
            <?php foreach($klien as $k): ?>
                <option value="<?= $k['id_klien'] ?>" <?= $jadwal['id_klien'] == $k['id_klien'] ? 'selected' : '' ?>>
                    <?= esc($k['nama_klien']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_paket">Paket</label>
        <select name="id_paket" id="id_paket" class="form-select" required>
            <?php foreach($paket as $p): ?>
                <option value="<?= $p['id_paket'] ?>" <?= $jadwal['id_paket'] == $p['id_paket'] ? 'selected' : '' ?>>
                    <?= esc($p['nama_paket']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal_acara">Tanggal Acara</label>
        <input type="date" name="tanggal_acara" id="tanggal_acara" value="<?= $jadwal['tanggal_acara'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_mulai">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" value="<?= $jadwal['waktu_mulai'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_selesai">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" value="<?= $jadwal['waktu_selesai'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="lokasi_acara">Lokasi</label>
        <input type="text" name="lokasi_acara" id="lokasi_acara" value="<?= $jadwal['lokasi_acara'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status_acara">Status</label>
        <select name="status_acara" id="status_acara" class="form-select" required>
            <option value="Terjadwal" <?= $jadwal['status_acara']=='Terjadwal' ? 'selected' : '' ?>>Terjadwal</option>
            <option value="Selesai" <?= $jadwal['status_acara']=='Selesai' ? 'selected' : '' ?>>Selesai</option>
            <option value="Dibatalkan" <?= $jadwal['status_acara']=='Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
        </select>
    </div>

    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-simpan">
            <i class="fas fa-save"></i> Update
        </button>
        <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</form>

<?= $this->endSection() ?>