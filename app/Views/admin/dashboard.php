<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<h2 class="fw-bold mb-4">Dashboard Admin</h2>
<p class="text-muted">Selamat datang, <?= session()->get('nama_user'); ?> 👋</p>

<div class="row g-4">
  <div class="col-md-3">
    <div class="card shadow-sm text-center">
      <div class="card-body">
        <i class="bi bi-people-fill text-primary" style="font-size:2rem;"></i>
        <h5>Total Klien</h5>
        <p class="display-6 fw-bold text-primary">120</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center">
      <div class="card-body">
        <i class="bi bi-box-seam-fill text-success" style="font-size:2rem;"></i>
        <h5>Paket</h5>
        <p class="display-6 fw-bold text-success">8</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center">
      <div class="card-body">
        <i class="bi bi-calendar-event-fill text-warning" style="font-size:2rem;"></i>
        <h5>Jadwal Acara</h5>
        <p class="display-6 fw-bold text-warning">15</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card shadow-sm text-center">
      <div class="card-body">
        <i class="bi bi-person-gear text-danger" style="font-size:2rem;"></i>
        <h5>User Admin</h5>
        <p class="display-6 fw-bold text-danger">3</p>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>