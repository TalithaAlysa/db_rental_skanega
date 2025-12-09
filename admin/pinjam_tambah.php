<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Data Peminjaman</h4>
            </div>
            <div class="panel-body">

                <form method="POST" action="pinjam_aksi.php">

                    <div class="form-group">
                        <label>Nama User</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            <?php
                                $user = mysqli_query($koneksi, "SELECT * FROM user WHERE user_status='1'");
                                while ($u = mysqli_fetch_array($user)) {
                                    echo "<option value='".$u['user_id']."'>".$u['user_nama']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <select name="kendaraan_nomor" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            <?php
                                $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                while ($k = mysqli_fetch_array($kendaraan)) {
                                    echo "<option value='".$k['kendaraan_nomor']."'>".$k['kendaraan_nomor']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Status Peminjaman</label>
                        <select name="pinjam_status" class="form-control" required>
                            <option value="Dipinjam">Dipinjam</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>

            </div>
        </div>
    </div>
</div>
