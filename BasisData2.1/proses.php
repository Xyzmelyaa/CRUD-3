<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum? 
if(isset($_POST['aksi'])){
// ambil data dari formulir
if($_POST['aksi']=='add'){
$nama = $_POST['nama'];
$tgl = $_POST['tanggal_lahir'];
$jk = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kode = $_POST['kode_pos'];
$no = $_POST['no_tel'];
$email = $_POST['email'];
$sekolah = $_POST['sekolah_asal'];
// Format tanggal sesuai dengan format MySQL (YYYY-MM-DD)
$tanggal_mysql = date("Y-m-d", strtotime($tanggal));
// buat query
$sql = "INSERT INTO pendaftaran1 (nama,tanggal_lahir,jenis_kelamin,agama,alamat,desa,kecamatan,kota,provinsi,kode_pos,no_tel,email,sekolah_asal) VALUE ('$nama', '$tgl', '$jk', '$agama', '$alamat', '$desa', '$kecamatan', '$kota', '$provinsi', '$kode', '$no', '$email', '$sekolah')";
$query = mysqli_query($db, $sql);
// apakah query simpan berhasil?
if( $query) {

header('Location: index.php?status=sukses');
} else {
// kalau gagal alihkan ke halaman indek.php dengan status=gagal 
header('Location: index.php?status=gagal');
}

}else if($_POST['aksi']=='edit'){
$id_pendaftaran =$_POST['id_pendaftaran'];
$nama = $_POST['nama'];
$tgl = $_POST['tanggal_lahir'];
$jk = $_POST['jenis_kelamin'];
$agama = $_POST['agama'];
$alamat = $_POST['alamat'];
$desa = $_POST['desa'];
$kecamatan = $_POST['kecamatan'];
$kota = $_POST['kota'];
$provinsi = $_POST['provinsi'];
$kode = $_POST['kode_pos'];
$no = $_POST['no_tel'];
$email = $_POST['email'];
$sekolah = $_POST['sekolah_asal'];
$tanggal_mysql = date("Y-m-d", strtotime($tanggal));
$sql = "UPDATE pendaftaran1 SET nama='$nama',tanggal_lahir='$tgl', jenis_kelamin='$jk', agama='$agama', alamat='$alamat',desa='$desa',kecamatan='$kecamatan',kota='$kota',provinsi='$provinsi',kode_pos='$kode',no_tel='$no',email='$email', sekolah_asal='$sekolah' WHERE id_pendaftaran='$id_pendaftaran'";
$query = mysqli_query($db, $sql);
if( $query){
    header('Location: index.php?status=sukses');
    } else {
    header('Location: index.php?status=gagal');    
    }
}
}

    if(isset($_GET['hapus'])){
        $id_pendaftaran=$_GET['hapus'];
    // ambil id dari query string $id_pendaftaran = $_GET['hapus'];
    // buat query hapus
    $sql = "DELETE FROM pendaftaran1 WHERE id_pendaftaran='$id_pendaftaran';";
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if($query){
    header('Location: index.php?status=sukses');
    } else {
    header('Location : index.php?status=gagal');
    }
}
?>