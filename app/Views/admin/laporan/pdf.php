<h2 style="text-align:center;">Laporan Acara</h2>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Klien</th>
            <th>Paket</th>
            <th>Tanggal</th>
            <th>Waktu Mulai</th>
            <th>Waktu Akhir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($laporan as $row): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_klien'] ?></td>
            <td><?= $row['nama_paket'] ?></td>
            <td><?= $row['tanggal_acara'] ?></td>
            <td><?= $row['waktu_mulai'] ?></td>
            <td><?= $row['waktu_selesai'] ?></td>
            <td><?= $row['status_acara'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>