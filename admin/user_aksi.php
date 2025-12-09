<?php
include '../koneksi.php';

$nama     = $_POST['nama'];
$username = $_POST['username'];
$status   = $_POST['status'];
$alamat   = $_POST['alamat'];

mysqli_query($koneksi, "INSERT INTO user (user_nama, username, user_status, user_alamat) 
VALUES ('$nama', '$username', '$status', '$alamat')");

echo "<script> alert('User berhasil ditambahkan'); window.location.href='user.php';</script>";
?>
