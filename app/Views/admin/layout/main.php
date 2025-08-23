<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Admin Panel' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
  <!-- CSS kustom -->
  <link href="<?= base_url('assets/css/dashboard.css') ?>" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="logo text-center py-4">
        <img src="<?= base_url('assets/logo/logo-satria.png') ?>" alt="Logo" class="logo-img mb-2">
      </div>
      <ul class="nav flex-column mt-4">
        <li><a href="/admin" class="nav-link"><i class="bi bi-house-door"></i> Dashboard</a></li>
        <li><a href="/admin/klien" class="nav-link"><i class="bi bi-people"></i> Kelola data klien</a></li>
        <li><a href="/admin/jadwal" class="nav-link"><i class="bi bi-calendar-event"></i> Kelola jadwal</a></li>
        <li><a href="/admin/paket" class="nav-link"><i class="bi bi-box-seam"></i> Kelola paket</a></li>
        <li><a href="/admin/user" class="nav-link"><i class="bi bi-person"></i> Kelola user</a></li>
        <li><a href="/admin/laporan" class="nav-link"><i class="bi bi-folder"></i> Laporan</a></li>
        <li class="mt-auto"><a href="/logout" class="nav-link logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
      </ul>
    </div>

    <!-- Content -->
    <div class="main-content flex-grow-1">
      <!-- Topbar -->
      <div class="topbar d-flex justify-content-end align-items-center px-4 py-2">
        <i class="bi bi-bell me-3"></i>
        <span><i class="bi bi-person-circle"></i> Admin</span>
      </div>

      <!-- Page Content -->
      <div class="p-4">
        <?= $this->renderSection('content') ?>
      </div>
    </div>
  </div>

  <!-- JS Bootstrap biar komponen jalan -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>