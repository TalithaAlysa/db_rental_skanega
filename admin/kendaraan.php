<?php
    include 'header.php';

?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Kendaraan</h4>
        </div>
        <div class="panel-body">
            <a href="kendaraan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Harga Perhari</th>
                    <th>Status</th>
                    <th>Opsi</th>
                    
                </tr>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"select * from kendaraan");
                    $no = 1;
                    while ($d=mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['kendaraan_tipe']; ?></td>
                        <td><?php echo $d['kendaraan_harga_perhari']; ?></td>
                        <td>
                            <?php 
                                if ($d['kendaraan_status'] == "1") {
                                    echo "<span class='label label-success'>READY</span>";
                                } else if($d['kendaraan_status']=="2"){
                                    echo "<span class='label label-danger'>DIPINJAM</span>";
                                }
                            ?>
                        </td>

                        <td>
                            <a href="kendaraan_edit.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-info Edit">Edit</a>
                            <a href="kendaraan_hapus.php?id=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>