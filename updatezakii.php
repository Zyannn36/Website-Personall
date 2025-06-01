<?php
include 'koneksizaki.php';
// menyimpan data kedalam variabel
$id_mahasiswa   = $_POST['id_mahasiswa'];
$nim            = $_POST['nim'];
$nama           = $_POST['nama'];
$jurusan        = $_POST['jurusan'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];
$hoby			= $_POST['hoby'];
// query SQL untuk insert data
$query="UPDATE mahasiswa1 SET nim='$nim',nama='$nama',jurusan='$jurusan',jenis_kelamin='$jenis_kelamin',alamat='$alamat',hoby='$hoby' where id_mahasiswa='$id_mahasiswa'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.html");
?>