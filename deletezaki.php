<?php
include 'koneksizaki.php';
// menyimpan data id kedalam variabel
$id_mahasiswa   = $_GET['id_mahasiswa'];
// query SQL untuk insert data
$query="DELETE from mahasiswa1 where id_mahasiswa='$id_mahasiswa'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman indexzaki.php
header("location:mahasiswazaki.php");
?>