<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? 'Admin Panel' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
      <h4 class="mb-4">Admin Panel</h4>
      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a href="/admin" class="nav-link text-white"><i class="bi bi-house-door"></i> Dashboard</a>
        </li>
        <li class="nav-item mb-2">
          <a href="/admin/klien" class="nav-link text-white"><i class="bi bi-people"></i> Data Klien</a>
        </li>
        <li class="nav-item mb-2">
          <a href="/admin/paket" class="nav-link text-white"><i class="bi bi-box-seam"></i> Data Paket</a>
        </li>
        <li class="nav-item mb-2">
          <a href="/admin/jadwal" class="nav-link text-white"><i class="bi bi-calendar-event"></i> Jadwal Acara</a>
        </li>
        <li class="nav-item mt-4">
          <a href="/logout" class="btn btn-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </div>

    <!-- Content -->
    <div class="flex-grow-1 p-4">
      <?= $this->renderSection('content') ?>
    </div>
  </div>
</body>
</html>