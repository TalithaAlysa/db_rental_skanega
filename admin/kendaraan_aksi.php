<?php
include '../koneksi.php';

$nomor   = $_POST['kendaraan_nomor'];
$nama    = $_POST['kendaraan_nama'];
$tipe    = $_POST['kendaraan_tipe'];
$harga   = $_POST['kendaraan_harga_perhari'];
$status  = $_POST['kendaraan_status'];

mysqli_query($koneksi, "INSERT INTO kendaraan 
(kendaraan_nomor, kendaraan_nama, kendaraan_tipe, kendaraan_harga_perhari, kendaraan_status) 
VALUES 
('$nomor', '$nama', '$tipe', '$harga', '$status')");

echo "<script>
        alert('Data kendaraan berhasil ditambahkan');
        window.location.href='kendaraan.php';
      </script>";
?>
