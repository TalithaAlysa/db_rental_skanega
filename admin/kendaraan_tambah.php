<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-6 col-md-offset-3">

        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah Data Kendaraan</h4>
            </div>

            <div class="panel-body">

                <form method="POST" action="kendaraan_aksi.php">

                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="kendaraan_nomor" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" name="kendaraan_nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                    <label>Jenis Kendaraan</label>
                    <select name="kendaraan_tipe" class="form-control" required>
                        <option value="">-- Pilih Jenis --</option>
                        <option value="Motor">Motor</option>
                        <option value="Mobil">Mobil</option>
                    </select>
                </div>


                    <div class="form-group">
                        <label>Harga Perhari</label>
                        <input type="number" name="kendaraan_harga_perhari" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">READY</option>
                            <option value="2">DIPINJAM</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>


            </div>
        </div>

    </div>
</div>
