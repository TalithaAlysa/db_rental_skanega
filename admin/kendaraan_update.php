<?php
include '../koneksi.php';

$id     = $_POST['kendaraan_nomor'];
$nama   = $_POST['kendaraan_nama'];
$tipe   = $_POST['kendaraan_tipe'];
$harga  = $_POST['kendaraan_harga_perhari'];
$status = $_POST['kendaraan_status'];

mysqli_query($koneksi, "UPDATE kendaraan SET 
    kendaraan_nama='$nama',
    kendaraan_tipe='$tipe',
    kendaraan_harga_perhari='$harga',
    kendaraan_status='$status'
    WHERE kendaraan_nomor='$id'
");

echo "<script>alert('Data berhasil diperbarui'); window.location.href='kendaraan.php'</script>";
?>