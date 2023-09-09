<?php 

$server = "localhost";
$user   = "root";
$pass   = "";
$db     = "fayida";

$koneksi= mysqli_connect($server, $user, $pass, $db);

// Pengambilan Action
if(isset($_GET['op'])){
    $op = $_GET['op'];
} else {
    $op = '';
};


$tanggal    = null;
$nama       = '';
$produk     = '';
$transaksi  = '';
$debet      = null;
$kredit     = null;
$admin      = null;
$asal       ='';

$sukses = '';
$error  = '';

$suksesNasabah = '';
$errorNasabah  = '';

if($op == 'edit'){
    $id     = $_GET['id'];
    $query  = "SELECT * FROM transaksi WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    $data   = mysqli_fetch_array($result);
    $tanggal= $data['tanggal'];
    $nama   = $data['nama'];
    $produk = $data['produk'];
    $transaksi= $data['transaksi'];
    $debet  = $data['debet'];
    $kredit = $data['kredit'];
    $admin  = $data['admin'];

    if($tanggal ==''){
        $error = 'Data Tidak ditemukan';
    }
};

if($op == 'delete'){
    $id     = $_GET['id'];
    $query  = "DELETE FROM transaksi WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if($result){
        $sukses = 'Data Berhasil Dihapus';
    } else {
        $error  = 'Data Gagal Dihapus';
    }
};


// Insert & Update Data
if(isset($_POST["simpan"])){
    $tanggal    = $_POST["tanggal"];
    $nama       = $_POST["nama"];
    $produk     = $_POST["produk"];
    $transaksi  = $_POST["transaksi"];
    $debet      = $_POST["debet"];
    $kredit     = $_POST["kredit"];
    $admin      = $_POST["admin"];

    
    // if ($nama && $produk && $transaksi ) {
    //     $query  = "INSERT INTO transaksi( tanggal, nama, produk, transaksi, debet, kredit, admin) VALUES ('$tanggal', '$nama', '$produk', '$transaksi', '$debet', '$kredit', '$admin')";

    //     $result = mysqli_query($koneksi, $query);
    //     if($result){
    //         $sukses = "Data Berhasil Ditambahkan";
    //     }else{
    //         $error  = "Data gagal ditambahkan";
    //     }
    // } else {
    //     $error  = "Masukkan Semua Data";
    // };

    
    if ($tanggal && $nama && $produk && $transaksi) {
        if($op == 'edit'){
            $query = "UPDATE transaksi SET tanggal = $tanggal, nama = '$nama', produk = '$produk', transaksi = '$transaksi', debet = '$debet', kredit = '$kredit', admin = '$admin' WHERE id = '$id'";
            $result= mysqli_query($koneksi, $query);
            if($result){
                $sukses = "Data Berhasil diupdate";
            } else {
                $error  = "Data Gagal diupdate";
            }
        } else {
            $query  = "INSERT INTO transaksi( tanggal, nama, produk, transaksi, debet, kredit, admin) VALUES ('$tanggal', '$nama', '$produk', '$transaksi', '$debet', '$kredit', '$admin')";

            $result = mysqli_query($koneksi, $query);
            if($result){
                $sukses = "Data Berhasil Ditambahkan";
            }else{
                $error  = "Data gagal ditambahkan";
            }
        }
    }else{
        $error = "Masukkan semua data";
    }

};

// Function
function noRek($produk){
    if ($produk === "Tab.Kids"){
        $noRek = "21111-100-00000";
    } elseif ($produk === "Tab.Mahasiswa"){
        $noRek = "21112-100-00000";
    } elseif ($produk === "Tab.Ummat"){
        $noRek = "21113-100-00000";
    } elseif ($produk === "Tab.Mudharabah FIB"){
        $noRek = "1114 - 200-00000";
    } elseif ($produk === "FIB Invest"){
        $noRek = "1201-100-050423";
    } elseif ($produk === "Deposito FIB"){
        $noRek = "22111-100-080323";
    } else {
        $noRek = 'tidak ada';
    }

    return $noRek;
};

    if(isset($_POST["akun"])){
        $nama       = $_POST["nama"];
        $produk     = $_POST["produk"];
        $nomer      = $_POST["nomer"];
        $asal       = $_POST["asal"];
        
    if ($nama && $produk && $nomer && $asal) {
        if($op == 'edit'){
            $query  = "UPDATE nasabah SET nama = '$nama', produk = '$produk', nomer = '$nomer', asal = '$asal' WHERE id = '$id'";
            $result= mysqli_query($koneksi, $query);
            if($result){
                $suksesNasabah = "Data Berhasil diupdate";
            } else {
                $errorNasabah  = "Data Gagal diupdate";
            }
        } else {
            $query  = "INSERT INTO nasabah(nama, produk, nomer, asal) VALUES ('$nama', '$produk', '$nomer', '$asal')";

            $result = mysqli_query($koneksi, $query);
            if($result){
                $suksesNasabah = "Data Berhasil Ditambahkan";
            }else{
                $errorNasabah  = "Data gagal ditambahkan";
            }
        }
    }else{
        $errorNasabah = "Masukkan semua data";
    }

        $result = mysqli_query($koneksi, $query);
    }

?>