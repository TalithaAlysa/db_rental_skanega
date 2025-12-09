<?php
include '../koneksi.php';

$id       = $_POST['id'];
$nama     = $_POST['nama'];
$username = $_POST['username'];
$status   = $_POST['status'];
$alamat   = $_POST['alamat'];

mysqli_query($koneksi, "UPDATE user SET 
    user_nama='$nama',
    username='$username',
    user_status='$status',
    user_alamat='$alamat'
    WHERE user_id='$id'
");

echo "<script>
        alert('Data telah Diubah');
        window.location.href='user.php';
      </script>";
?>
