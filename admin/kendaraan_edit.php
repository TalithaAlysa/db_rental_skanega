<?php
    include 'header.php';
?>

<div class="container">
    <br/><br/><br/>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Kendaraan</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"SELECT * FROM kendaraan WHERE kendaraan_nomor='$id'");
                $d = mysqli_fetch_array($data);
                ?>

                <form method="POST" action="kendaraan_update.php">

                    <input type="hidden" name="kendaraan_nomor" value="<?php echo $d['kendaraan_nomor']; ?>">

                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" name="kendaraan_nama" class="form-control" 
                            value="<?php echo $d['kendaraan_nama']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <input type="text" name="kendaraan_tipe" class="form-control" 
                            value="<?php echo $d['kendaraan_tipe']; ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Harga Perhari</label>
                        <input type="text" name="kendaraan_harga_perhari" class="form-control" 
                            value="<?php echo $d['kendaraan_harga_perhari']; ?>" required>
                    </div>

                    <div class="form-group alert alert-info">
                        <label>Status</label>
                        <select class="form-control" name="kendaraan_status" required>
                            <option value="1" <?php if($d['kendaraan_status']=="1"){echo "selected";} ?>>READY</option>
                            <option value="2" <?php if($d['kendaraan_status']=="2"){echo "selected";} ?>>DIPINJAM</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>

            </div>
        </div>
    </div>
</div>
