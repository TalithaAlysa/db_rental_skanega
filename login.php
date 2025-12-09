<?php
include 'koneksi.php';
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE email='$email' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_assoc($query);

    $_SESSION['email'] = $data['email'];
    $_SESSION['status'] = "login";

    header("location:admin/index_admin.php");
}else{
    header("location:index.php?pesan=gagal");
}
?>