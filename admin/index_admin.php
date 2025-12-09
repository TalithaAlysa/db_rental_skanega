<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="alert alert-info text-center">
        <h4 style="margin-bottom: 0px;"><b>Selamat Datang!</b> Sistem Informasi Rental Kendaraan RPL Skanega</h4>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>
        <div class="panel-body">
            <div class="row">

                <!-- Jumlah User -->
                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-user"></i>
                                <span class="pull-right">
                                    <?php
                                        $user = mysqli_query($koneksi, "SELECT * FROM user");
                                        echo mysqli_num_rows($user);
                                    ?>
                                </span>
                            </h1>
                            Jumlah User
                        </div>
                    </div>
                </div>

                <!-- Jumlah Kendaraan -->
                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-road"></i>
                                <span class="pull-right">
                                    <?php
                                        $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                        echo mysqli_num_rows($kendaraan);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Kendaraan
                        </div>
                    </div>
                </div>

                <!-- Kendaraan Sedang Dipinjam -->
                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-time"></i>
                                <span class="pull-right">
                                    <?php
                                        $dipinjam = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_status='Dipinjam'");
                                        echo mysqli_num_rows($dipinjam);
                                    ?>
                                </span>
                            </h1>
                            Kendaraan Sedang Dipinjam
                        </div>
                    </div>
                </div>

                <!-- Peminjaman Selesai -->
                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-ok-circle"></i>
                                <span class="pull-right">
                                    <?php
                                        $selesai = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_status='Selesai'");
                                        echo mysqli_num_rows($selesai);
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

    <!-- Riwayat Peminjaman Terbaru -->
    <div class="panel">
        <div class="panel-heading">
            <h4>Riwayat Peminjaman Terbaru</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Nama User</th>
                        <th>Alamat</th>
                        <th>Nama Kendaraan</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = mysqli_query($koneksi, "
                        SELECT pinjam.*, user.user_nama, user.user_alamat, kendaraan.kendaraan_nama
                        FROM pinjam
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        ORDER BY pinjam.pinjam_id DESC
                        LIMIT 10
                    ");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($d['user_nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($d['user_alamat']) . "</td>";
                        echo "<td>" . htmlspecialchars($d['kendaraan_nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($d['tgl_pinjam']) . "</td>";
                        echo "<td>" . htmlspecialchars($d['tgl_kembali']) . "</td>";
                        echo "<td>";
                        if ($d['pinjam_status'] == "Selesai") {
                            echo "<span class='label label-success'>Selesai</span>";
                        } elseif ($d['pinjam_status'] == "Dipinjam") {
                            echo "<span class='label label-warning'>Dipinjam</span>";
                        } else {
                            echo "<span class='label label-default'>" . htmlspecialchars($d['pinjam_status']) . "</span>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
