<?php
    include 'header_user.php';
    include '../koneksi.php';
?>

<div class="container">

    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;">
            <b>Selamat Datang!</b> Sistem Informasi Rental Kendaraan RPL Skanega</h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Home</h4>
        </div>

        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                <?php
                                    $user = mysqli_query($koneksi,"SELECT * FROM user");
                                    echo mysqli_num_rows($user);
                                ?>
                                </span>
                            </h1>
                            Jumlah User
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-road"></i>
                                <span class="pull-right">
                                <?php
                                    $kendaraan = mysqli_query($koneksi,"SELECT * FROM kendaraan");
                                    echo mysqli_num_rows($kendaraan);
                                ?>
                                </span>
                            </h1>
                            Jumlah Kendaraan
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-plane"></i>
                                <span class="pull-right">
                                <?php
                                    $pinjam_proses = mysqli_query($koneksi,"SELECT * FROM pinjam WHERE pinjam_status='0'");
                                    echo mysqli_num_rows($pinjam_proses);
                                ?>
                                </span>
                            </h1>
                            Kendaraan Sedang Dipinjam
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">
                                <?php
                                    $pinjam_selesai = mysqli_query($koneksi,"SELECT * FROM pinjam WHERE pinjam_status='1'");
                                    echo mysqli_num_rows($pinjam_selesai);
                                ?>
                                </span>
                            </h1>
                            Peminjaman Selesai
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Riwayat Peminjaman Terbaru</h4>
        </div>

        <div class="panel-body">

            <table class="table table-bordered table-striped">

                <tr>
                    <th width="1%">No</th>
                    <th>Nama User</th>
                    <th>Alamat</th>
                    <th>Status Pinjam</th>
                    <th>Nama Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>

                <?php
                    $data = mysqli_query($koneksi,"
                        SELECT pinjam.*, user.user_nama, kendaraan.kendaraan_nama
                        FROM pinjam
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        ORDER BY pinjam_id DESC LIMIT 10
                    ");

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['pinjam_id']; ?></td>
                    <td><?= $d['tgl_pinjam']; ?></td>
                    <td><?= $d['user_nama']; ?></td>
                    <td><?= $d['kendaraan_nama']; ?></td>
                    <td><?= $d['tgl_kembali']; ?></td>

                    <td>
                        <?php
                            if ($d['pinjam_status'] == '0') {
                                echo "<div class='label label-warning'>DIPINJAM</div>";
                            } elseif ($d['pinjam_status'] == '1') {
                                echo "<div class='label label-success'>SELESAI</div>";
                            }
                        ?>
                    </td>
                </tr>

                <?php
                } 
                ?>

            </table>

        </div>
    </div>

</div>