<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <br/><br/><br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Data Peminjaman</h4>
            </div>
            <div class="panel-body">

                <?php
                $id = $_GET['id'];

                $data = mysqli_query($koneksi,"
                    SELECT pinjam.*, user.user_nama 
                    FROM pinjam 
                    JOIN user ON user.user_id = pinjam.user_id
                    WHERE pinjam.pinjam_id='$id'
                ");

                $d = mysqli_fetch_array($data);
                ?>

                <form method="POST" action="pinjam_update.php">

                    <input type="hidden" name="id" value="<?= $d['pinjam_id']; ?>">

                    <div class="form-group">
                        <label>Nama User</label>
                        <select name="user_id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            <?php
                                $user = mysqli_query($koneksi, "SELECT * FROM user WHERE user_status='1'");
                                while ($u = mysqli_fetch_array($user)) {
                                    $selected = ($u['user_id'] == $d['user_id']) ? "selected" : "";
                                    echo "<option value='".$u['user_id']."' $selected>".$u['user_nama']."</option>";
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
                                    $selected = ($k['kendaraan_nomor'] == $d['kendaraan_nomor']) ? "selected" : "";
                                    echo "<option value='".$k['kendaraan_nomor']."' $selected>".$k['kendaraan_nomor']."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control" value="<?= $d['tgl_pinjam']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control" value="<?= $d['tgl_kembali']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="pinjam_status" class="form-control" required>
                            <option value="Dipinjam" <?= $d['pinjam_status']=="Dipinjam" ? "selected" : "" ?>>Dipinjam</option>
                            <option value="Selesai" <?= $d['pinjam_status']=="Selesai" ? "selected" : "" ?>>Selesai</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>

            </div>
        </div>
    </div>
</div>
