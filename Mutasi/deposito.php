<?php  
    include '../function.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mutasi || Tab.Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
        <?php include '../navbar.php';
        $Akun  = "SELECT * FROM nasabah WHERE produk = 'Deposito FIB'";
        $rAkun = mysqli_query($koneksi, $Akun);
        while ($dAkun = mysqli_fetch_assoc($rAkun)){
        ?>
    <div class="mt-3 card">
        <div class="card-header text-white bg-success">
            <span>No. Rekening = <?= noRek('Deposito FIB') . $dAkun['nomer'] ?> ||</span>
            <span>Nama = <?= $dAkun['nama'] ?> ||</span>
            <span>Alamat = <?= $dAkun['asal'] ?></span>
        </div>
        <div class="card-body">
        <div class="container">
            <table class="table table-bordered">
                <h1>Klad Kas</h1>
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                    <th>Action</th>
                </tr>
                <?php
                    $totalDebet = 0;
                    $totalKredit= 0;
                    $nama       = $dAkun['nama'];
                    $query      = "SELECT * FROM transaksi WHERE nama = '$nama' && produk = 'Deposito FIB' ORDER BY id ASC";
                    $result     = mysqli_query($koneksi, $query);
                    while ($data = mysqli_fetch_array($result)) { 
                        $totalDebet += ($data['admin'] > 0) ? $data['debet'] - $data['admin'] - $data['kredit'] : $data['debet'] - $data['kredit'];
                        $totalKredit+= $data['kredit'] + $data['admin'];
                        $nasabah= $data['nama'];
                        $noAkun = "SELECT nomer FROM nasabah WHERE nama = '$nasabah'";
                        $noAkun = mysqli_query($koneksi, $noAkun);
                        $noAkun = mysqli_fetch_assoc($noAkun);
                ?>
                <tr>
                    <td><?= $data['tanggal']; ?></td>
                    <td><?= $data['transaksi']; ?></td>
                    <td>Rp. <?= ($data['kredit'] > 0) ? number_format($data['kredit'] - $data['admin']) : number_format($data['kredit']); ?></td>
                    <td>Rp. <?= ($data['debet'] > 0) ? number_format($data['debet'] - $data['admin']) : number_format($data['debet']); ?></td>
                    <td>Rp. <?= number_format($totalDebet); ?></td>
                    <td scope="row">
                        <a href="index.php?op=edit&id=<?= $data['id'] ?>"><button class="btn btn-warning">Edit</button></a>
                        <a href="index.php?op=delete&id=<?= $data['id'] ?>" onclick="return confirm('Hapus Data?')"><button class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
            <?php } ;?>
            </table>
        </div>
        </div>
    </div>
    <?php };?>
</body>
</html>