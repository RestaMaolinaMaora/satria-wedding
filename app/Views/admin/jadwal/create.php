<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mt-4"><?= esc($title) ?></h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/jadwal/store') ?>" method="post">
    <div class="mb-3">
        <label for="id_klien" class="form-label">Klien</label>
        <select name="id_klien" id="id_klien" class="form-control" required>
            <option value="">-- Pilih Klien --</option>
            <?php foreach($klien as $k): ?>
                <option value="<?= $k['id_klien'] ?>"><?= esc($k['nama_klien']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_paket" class="form-label">Paket</label>
        <select name="id_paket" id="id_paket" class="form-control" required>
            <option value="">-- Pilih Paket --</option>
            <?php foreach($paket as $p): ?>
                <option value="<?= $p['id_paket'] ?>"><?= esc($p['nama_paket']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
        <input type="date" name="tanggal_acara" id="tanggal_acara" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="lokasi_acara" class="form-label">Lokasi</label>
        <input type="text" name="lokasi_acara" id="lokasi_acara" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status_acara" class="form-label">Status</label>
        <select name="status_acara" id="status_acara" class="form-control" required>
            <option value="Terjadwal">Terjadwal</option>
            <option value="Selesai">Selesai</option>
            <option value="Dibatalkan">Dibatalkan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('admin/jadwal') ?>" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>