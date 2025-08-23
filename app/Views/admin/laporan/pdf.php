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
            <td><?= $row['paket'] ?></td>
            <td><?= $row['tanggal'] ?></td>
            <td><?= $row['waktu_mulai'] ?></td>
            <td><?= $row['waktu_akhir'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>