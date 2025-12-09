<?php
include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah User Baru</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="user_aksi.php">

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">AKTIF</option>
                            <option value="2">NON AKTIF</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>
            </div>
        </div>
    </div>
</div>
