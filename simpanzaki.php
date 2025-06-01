<?php
include 'koneksizaki.php';
// menyimpan data kedalam variabel
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$id_mahasiswa	= $_POST['id_mahasiswa'];
$jurusan        = $_POST['jurusan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$hoby			= $_POST['hoby'];
// query SQL untuk insert data
$query="INSERT INTO mahasiswa1 SET nim='$nim',nama='$nama',id_mahasiswa='$id_mahasiswa',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin',alamat='$alamat',hoby='$hoby'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:indexzaki.php");
?>