<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mt-4"><?= esc($title) ?></h2>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="<?= base_url('admin/jadwal/update/'.$jadwal['id_jadwal']) ?>" method="post">
    <div class="mb-3">
        <label for="id_klien" class="form-label">Klien</label>
        <select name="id_klien" id="id_klien" class="form-control" required>
            <?php foreach($klien as $k): ?>
                <option value="<?= $k['id_klien'] ?>" <?= $jadwal['id_klien'] == $k['id_klien'] ? 'selected' : '' ?>>
                    <?= esc($k['nama_klien']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_paket" class="form-label">Paket</label>
        <select name="id_paket" id="id_paket" class="form-control" required>
            <?php foreach($paket as $p): ?>
                <option value="<?= $p['id_paket'] ?>" <?= $jadwal['id_paket'] == $p['id_paket'] ? 'selected' : '' ?>>
                    <?= esc($p['nama_paket']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
        <input type="date" name="tanggal_acara" id="tanggal_acara" value="<?= $jadwal['tanggal_acara'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
        <input type="time" name="waktu_mulai" id="waktu_mulai" value="<?= $jadwal['waktu_mulai'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
        <input type="time" name="waktu_selesai" id="waktu_selesai" value="<?= $jadwal['waktu_selesai'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="lokasi_acara" class="form-label">Lokasi</label>
        <input type="text" name="lokasi_acara" id="lokasi_acara" value="<?= $jadwal['lokasi_acara'] ?>" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="status_acara" class="form-label">Status</label>
        <select name="status_acara" id="status_acara" class="form-control" required>
            <option value="Terjadwal" <?= $jadwal['status_acara']=='Terjadwal' ? 'selected' : '' ?>>Terjadwal</option>
            <option value="Selesai" <?= $jadwal['status_acara']=='Selesai' ? 'selected' : '' ?>>Selesai</option>
            <option value="Dibatalkan" <?= $jadwal['status_acara']=='Dibatalkan' ? 'selected' : '' ?>>Dibatalkan</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>