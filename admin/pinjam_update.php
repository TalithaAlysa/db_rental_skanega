<?php
include '../koneksi.php';

$id               = $_POST['id'];
$user_id          = $_POST['user_id'];
$kendaraan_nomor  = $_POST['kendaraan_nomor'];
$tgl_pinjam       = $_POST['tgl_pinjam'];
$tgl_kembali      = $_POST['tgl_kembali'];
$pinjam_status    = $_POST['pinjam_status'];

mysqli_query($koneksi, "UPDATE pinjam SET
    user_id='$user_id',
    kendaraan_nomor='$kendaraan_nomor',
    tgl_pinjam='$tgl_pinjam',
    tgl_kembali='$tgl_kembali',
    pinjam_status='$pinjam_status'
    WHERE pinjam_id='$id'
");

echo "<script>
        alert('Data peminjaman berhasil diperbarui');
        window.location.href='pinjam.php';
      </script>";
?>
