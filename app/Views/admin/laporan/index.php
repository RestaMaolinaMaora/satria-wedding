<?= $this->extend('admin/layout/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h4 class="mb-3">Laporan</h4>

    <!-- Filter -->
    <form method="get" class="row mb-4">
        <div class="col-md-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="<?= esc($_GET['start_date'] ?? '') ?>">
        </div>
        <div class="col-md-3">
            <label>Tanggal Akhir</label>
            <input type="date" name="end_date" class="form-control" value="<?= esc($_GET['end_date'] ?? '') ?>">
        </div>
        <div class="col-md-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option <?= (!isset($_GET['status']) || $_GET['status']=='Semua Status')?'selected':'' ?>>Semua Status</option>
                <option <?= (($_GET['status'] ?? '')=='On Progress')?'selected':'' ?>>On Progress</option>
                <option <?= (($_GET['status'] ?? '')=='Selesai')?'selected':'' ?>>Selesai</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Info Card -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center p-3 bg-light">
                <h5>Total Acara</h5>
                <h3><?= $totalAcara ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3 bg-light">
                <h5>Total Klien</h5>
                <h3><?= $totalKlien ?></h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center p-3 bg-light">
                <h5>Acara Selesai</h5>
                <h3><?= round($persentaseSelesai, 1) ?>%</h3>
            </div>
        </div>
    </div>

    <!-- Export -->
    <div class="mb-3">
        <a href="<?= base_url('admin/laporan/exportPdf') ?>" class="btn btn-danger">Export PDF</a>
        <a href="<?= base_url('admin/laporan/exportExcel') ?>" class="btn btn-success">Export Excel</a>
    </div>

    <!-- Tabel -->
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Klien</th>
                <th>Paket</th>
                <th>Tanggal Acara</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Lokasi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($laporan)): ?>
                <?php $no = 1; foreach($laporan as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_klien'] ?></td>
                    <td><?= $row['nama_paket'] ?></td>
                    <td><?= $row['tanggal_acara'] ?></td>
                    <td><?= $row['waktu_mulai'] ?></td>
                    <td><?= $row['waktu_selesai'] ?></td>
                    <td><?= $row['lokasi_acara'] ?></td>
                    <td>
                        <?php if($row['status_acara']=='On Progress'): ?>
                            <span class="badge bg-warning text-dark">On Progress</span>
                        <?php else: ?>
                            <span class="badge bg-success">Selesai</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>