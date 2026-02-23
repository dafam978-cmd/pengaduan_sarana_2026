<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Aspirasi</title>
    <style>
        body { font-family: sans-serif; padding: 20px; line-height: 1.6; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; font-size: 12px; }
        th { background-color: #f2f2f2; }
        .text-center { text-align: center; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h2 style="margin: 0;">REKAPITULASI ASPIRASI SISWA</h2>
        <p style="margin: 5px 0;">Laporan dicetak otomatis pada: <b><?= date('d-m-Y H:i:s') ?></b></p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th>Waktu & Pelapor</th>
                <th>Kategori</th>
                <th>Lokasi & Detail</th>
                <th class="text-center">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($aspirasi as $row): ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td>
                    <b><?= date('d/m/Y H:i', strtotime($row['tgl_input'])) ?></b><br>
                    <small>NIS: <?= $row['nis'] ?></small>
                </td>
                <td><?= $row['ket_kategori'] ?></td>
                <td>
                    <b><?= $row['lokasi'] ?></b><br>
                    <i>"<?= $row['ket'] ?>"</i>
                </td>
                <td class="text-center">
                    <b><?= strtoupper($row['status']) ?></b>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div style="margin-top: 30px; text-align: right;">
        <p>Dicetak oleh: Sistem Eco-Aspirasi</p>
    </div>
</body>
</html>