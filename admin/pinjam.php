<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Peminjaman</h4>
        </div>
        <div class="panel-body">
            <a href="pinjam_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nama User</th>
                    <th>Nomor Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>

                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,
                        "SELECT pinjam.*, user.user_nama 
                         FROM pinjam
                         JOIN user ON user.user_id = pinjam.user_id"
                    );

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['tgl_pinjam']; ?></td>
                        <td><?php echo $d['tgl_kembali']; ?></td>

                        <td>
                        <?php 
                            if($d['pinjam_status'] == "Dipinjam"){
                                echo "<div class='label label-warning'>Dipinjam</div>";
                            } else if($d['pinjam_status'] == "Selesai"){
                                echo "<div class='label label-success'>Selesai</div>";
                            }
                        ?>
                        </td>

                        <td>
                            <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" 
                               class="btn btn-sm btn-info">Edit</a>

                            <a href="pinjam_hapus.php?id=<?php echo $d['pinjam_id']; ?>" 
                               onclick="return confirm('Yakin ingin menghapus?')" 
                               class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>

                <?php 
                    } 
                ?>
            </table>
        </div>
    </div>
</div>
