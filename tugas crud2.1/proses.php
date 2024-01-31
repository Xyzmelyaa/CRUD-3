<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksi'])){
// ambil data dari formulir
if($_POST['aksi']=='add'){
$nama = $_POST['nama_guru'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no = $_POST['no_telepon'];
$email = $_POST['email'];
//format tanggal sesuai dengan format mySQL (YYY-MM-DD)
$tanggal_mysql = date("y-m-d", strtotime($tanggal));
// buat query
$sql = "INSERT INTO daftar (nama_guru, jenis_kelamin, alamat, no_telepon, email) VALUES ('$nama', '$jk', '$alamat', '$no', '$email')";
$query = mysqli_query($db, $sql);
// apakah query simpan berhasil?
if( $query ) {
// kalau berhasil alihkan ke halaman index.php dengan status=sukses 
header('Location: index.php?status=sukses');
} else {
// kalau gagal alihkan ke halaman indek.php dengan status-gagal 
header('Location: index.php?status=gagal');
} 
}else if($_POST['aksi']=='edit'){
$id_guru =$_POST['id_guru'];
$nama = $_POST['nama_guru'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$no = $_POST['no_telepon'];
$email = $_POST['email'];
$tanggal_mysql = date("y-m-d", strtotime($tanggal));
$sql ="UPDATE daftar SET nama_guru='$nama',jenis_kelamin='$jk',alamat='$alamat',no_telepon='$no',email='$email' WHERE id_guru='$id_guru'";
$query = mysqli_query($db, $sql);

if( $query ){
    header('location: index.php?status=sukses');
} else {
    header('location: index.php?status=gagal');
}
}
}
if(isset($_GET['hapus']) ){

    //ambil id dari string
    $id_guru = $_GET['hapus'];

    //buat query hapus
    $sql = "DELETE FROM daftar WHERE id_guru='$id_guru';";
    $query = mysqli_query($db, $sql);

    //apakah query gapus berhasil?
    if( $query ){
        header('location: index.php?status=sukses');
} else {
    header('location: index.php?status=gagal');
}
    }

?>