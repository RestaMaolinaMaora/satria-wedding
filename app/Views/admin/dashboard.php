<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h4 class="mb-4">Admin</h4>

<!-- Info Cards -->
<div class="row">
  <div class="col-md-4">
    <div class="info-card">
      <h6 class="title">Total Klien</h6>
      <div class="info-content">
        <i class="fas fa-users icon"></i>
        <span class="value"><?= $totalKlien ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="info-card">
      <h6 class="title">Acara Bulan Ini</h6>
      <div class="info-content">
        <i class="fas fa-calendar-alt icon"></i>
        <span class="value"><?= $acaraBulanIni ?></span>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="info-card">
      <h6 class="title">Paket Terlaris</h6>
      <div class="info-content">
        <i class="fas fa-star icon"></i>
        <span class="value"><?= $paketTerlaris ?></span>
      </div>
    </div>
  </div>
</div>

<!-- Kalender + Jadwal dalam satu row -->
<div class="row mt-4">
  <!-- Kalender Dinamis -->
  <div class="col-md-6 mb-4">
    <div class="calendar-box p-3">
      <?= $calendar ?>
    </div> 
</div>

  <!-- Jadwal Terdekat -->
  <div class="col-md-6 mb-4">
    <div class="schedule-box p-3">
      <h6>Jadwal Terdekat</h6>
      <table class="table">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Klien</th>
            <th>Paket</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($jadwalTerdekat)): ?>
            <?php foreach ($jadwalTerdekat as $row): ?>
              <tr>
                <td><?= date('d/m/Y', strtotime($row['tanggal_acara'])) ?></td>
                <td>
                  <?= date('H:i', strtotime($row['waktu_mulai'])) ?>
                  -
                  <?= date('H:i', strtotime($row['waktu_selesai'])) ?>
                </td>
                <td><?= esc($row['nama_klien']) ?></td>
                <td><?= esc($row['nama_paket']) ?></td>
                <td>
                  <?php if ($row['status_acara'] === 'Selesai'): ?>
                    <span class="badge bg-success">Selesai</span>
                  <?php elseif ($row['status_acara'] === 'Dibatalkan'): ?>
                    <span class="badge bg-danger">Dibatalkan</span>
                  <?php else: ?>
                    <span class="badge bg-warning"><?= esc($row['status_acara']) ?></span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="5" class="text-center">Tidak ada jadwal terdekat</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection() ?>