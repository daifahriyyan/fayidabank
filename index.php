<?php
include 'function.php';
    // $data = [
    //     [
    //         "tanggal"   => 28,
    //         "nasabah"   => "Ryan",
    //         "produk"    => "tab. kids",
    //         "transaksi" => "Setoran Tunai",
    //         "debet"     => 1000000,
    //         "kredit"    => 0,
    //         "admin"     => 2500
    //     ],
    //     [
    //         "tanggal"   => 28,
    //         "nasabah"   => "Valen",
    //         "produk"    => "tab. mahasiswa",
    //         "transaksi" => "Penarikan Tunai",
    //         "debet"     => 0,
    //         "kredit"    => 2000000,
    //         "admin"     => 0
    //     ],
    //     [
    //         "tanggal"   => 28,
    //         "nasabah"   => "Da'i",
    //         "produk"    => "tab. ummat",
    //         "transaksi" => "Setoran Awal",
    //         "debet"     => 2000000,
    //         "kredit"    => 0,
    //         "admin"     => 20000
    //     ]
    //     ];
        
    $i = 1;


    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h1 class="text-center">Masukkan Transaksi</h1>
        <div class="card">
            <!-- Menampilkan Pesan Sukses dan Error -->
            <?php 
                if($error){
            ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>        
            <?php
                    header("refresh:3;url=index.php");
                }

            if($sukses){
            ?>
            <div class="alert alert-success" role="alert">
                <?= $sukses ?>
            </div>
            <?php
                    header("refresh:3;url=index.php");
                }
            ?>
            <!--  -->
            <div class="card-header bg-primary text-white">Create / Edit Data</div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-1 col-form-label">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $tanggal; ?>" placeholder="Tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>" placeholder="Nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="produk" class="col-sm-1 col-form-label">Produk</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="produk" id="produk">
                                <option value=""></option>
                                <option value="Tab.Mudharabah FIB" <?= ($produk == "Tab.Mudharabah FIB")?  "selected" : ''; ?>>Tab.Mudharabah FIB</option>
                                <option value="FIB Invest" <?= ($produk == "FIB Invest")? "selected" : ''; ?>>FIB Invest</option>
                                <option value="Tab.Kids" <?= ($produk == "Tab.Kids")? "selected" : ''; ?>>Tab.Kids</option>
                                <option value="Tab.Mahasiswa" <?= ($produk == "Tab.Mahasiswa")? "selected" : ''; ?>>Tab.Mahasiswa</option>
                                <option value="Tab.Ummat" <?= ($produk == "Tab.Ummat")? "selected" : ''; ?>>Tab.Ummat</option>
                                <option value="Deposito FIB" <?= ($produk == "Deposito FIB")? "selected" : ''; ?>>Deposito FIB</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="transaksi" class="col-sm-1 col-form-label">Transaksi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="transaksi" id="transaksi">
                                <option value="Setoran Awal" <?= ($transaksi == "Setoran Awal")?  "selected" : ''; ?>>Setoran Awal</option>
                                <option value="Setoran Tunai" <?= ($transaksi == "Setoran Tunai")? "selected" : ''; ?>>Setoran Tunai</option>
                                <option value="Penarikan Tunai" <?= ($transaksi == "Penarikan Tunai")? "selected" : ''; ?>>Penarikan Tunai</option>
                                <option value="Transfer ke BNS" <?= ($transaksi == "Transfer ke BNS")? "selected" : ''; ?>>Transfer ke BNS</option>
                                <option value="Transfer ke Al-Adnan" <?= ($transaksi == "Transfer ke Al-Adnan")? "selected" : ''; ?>>Transfer ke Al-Adnan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="debet" class="col-sm-1 col-form-label">Debet</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="debet" name="debet" value="<?= $debet; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kredit" class="col-sm-1 col-form-label">Kredit</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="kredit" name="kredit" value="<?= $kredit; ?>" placeholder="kredit">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="admin" class="col-sm-1 col-form-label">Admin</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="admin" name="admin" value="<?= $admin; ?>" placeholder="admin">
                        </div>
                    </div>
                    <div class="mt-3 col-12">
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

        <h1 class="text-center">Masukkan Data Nasabah</h1>
            <div class="card">
            <!-- Menampilkan Pesan Sukses dan Error -->
            <?php 
                if($errorNasabah){
            ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $errorNasabah ?>
                    </div>        
            <?php
                }

            if($suksesNasabah){
            ?>
            <div class="alert alert-success" role="alert">
                <?= $suksesNasabah ?>
            </div>
            <?php
                }
            ?>
            <!--  -->
                <div class="card-header bg-primary text-white">Create / Edit Data</div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-1 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>" placeholder="Nama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="produk" class="col-sm-1 col-form-label">Produk</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="produk" id="produk">
                                    <option value=""></option>
                                    <option value="Tab.Mudharabah FIB" <?= ($produk == "Tab.Mudharabah FIB")?  "selected" : ''; ?>>Tab.Mudharabah FIB</option>
                                    <option value="FIB Invest" <?= ($produk == "FIB Invest")? "selected" : ''; ?>>FIB Invest</option>
                                    <option value="Tab.Kids" <?= ($produk == "Tab.Kids")? "selected" : ''; ?>>Tab.Kids</option>
                                    <option value="Tab.Mahasiswa" <?= ($produk == "Tab.Mahasiswa")? "selected" : ''; ?>>Tab.Mahasiswa</option>
                                    <option value="Tab.Ummat" <?= ($produk == "Tab.Ummat")? "selected" : ''; ?>>Tab.Ummat</option>
                                    <option value="Deposito FIB" <?= ($produk == "Deposito FIB")? "selected" : ''; ?>>Deposito FIB</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nomer" class="col-sm-1 col-form-label">Nomer</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="nomer" name="nomer" value="<?= $nomer; ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="asal" class="col-sm-1 col-form-label">Asal</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="asal" name="asal" value="<?= $asal; ?>">
                            </div>
                        </div>
                        <div class="mt-3 col-12">
                            <input type="submit" name="akun" value="Simpan" class="btn btn-primary" />
                        </div>
                    </form>
                </div>
            </div>
</div>
</body>
</html>