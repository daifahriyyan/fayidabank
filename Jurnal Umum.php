<?php
    include 'function.php';
    $i = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Umum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php include 'navbar.php'; ?>
<div class="container">
    <table class="table table-bordered">
        <h1>Jurnal Umum</h1>
        <tr>
            <th>Tanggal</th>
            <th>Ke</th>
            <th>Keterangan</th>
            <th>No Rekening</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Action</th>
        </tr>
        <?php
            $totalDebet = 0;
            $totalKredit =0;
            $query  = "SELECT * FROM transaksi ORDER BY id ASC";
            $result = mysqli_query($koneksi, $query);
            $i = 1;
            while ($data = mysqli_fetch_array($result)) { 
            $totalDebet += $data['kredit'] + $data['debet'];
            $totalKredit+= $data['kredit'] + $data['debet'];
            $nasabah= $data['nama'];
            $noAkun = "SELECT nomer FROM nasabah WHERE nama = '$nasabah'";
            $noAkun = mysqli_query($koneksi, $noAkun);
            $noAkun = mysqli_fetch_assoc($noAkun);
        ?>
        <tr>
            <td><?= $data['tanggal']; ?></td>
            <td><?= $i++; ?></td>
            <td>Kas</td>
            <td><?= noRek($data['produk']).'-'.$noAkun['nomer']; ?></td>
            <td>Rp. <?= number_format($data['debet']); ?></td>
            <td>Rp. <?= number_format($data['kredit']); ?></td>
            <td scope="row">
                <a href="index.php?op=edit&id=<?= $data['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                <a href="index.php?op=delete&id=<?= $data['id'] ?>" onclick="return confirm('Hapus Data?')"><button class="btn btn-danger">Delete</button></a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><?= $data['transaksi'] .' || '. $data['produk'] .' '. $data['nama']; ?></td>
            <td></td>
            <td>Rp. <?= ($data['kredit'] > 0) ? number_format($data['kredit'] - $data['admin']) : number_format($data['kredit']); ?></td>
            <td>Rp. <?= ($data['debet'] > 0) ? number_format($data['debet'] - $data['admin']) : number_format($data['debet']); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>Pendapatan Administrasi Layanan Bank</td>
            <td></td>
            <td>Rp. 0</td>
            <td>Rp. <?= number_format($data['admin']) ?></td>
        </tr>
        <?php 
        } ;?>
        <tr class="total">
            <td colspan="4">Sub Total</td>
            <td colspan="1">Rp. <?= number_format($totalDebet);?></td>
            <td colspan="1">Rp. <?= number_format($totalKredit);?></td>
        </tr>
    </table>
</div>
    
</body>
</html>