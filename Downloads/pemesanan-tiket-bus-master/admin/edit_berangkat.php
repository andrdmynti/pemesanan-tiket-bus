<?php

include '../config/koneksi.php';

$id_berangkat  = $_GET['id_berangkat'];

$edit    = "SELECT id_berangkat, tujuan, jadwal, rute FROM keberangkatan WHERE id_berangkat = '$id_berangkat'";
$hasil   = mysqli_query($conn, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Jadwal Keberangkatan</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="../config/update_berangkat.php" method="POST">
        <input type="hidden" name="id_berangkat" value="<?php echo $id_berangkat ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="tujuan">Tujuan :</label>
            <div class="col-sm-6">
                <input type="tujuan" class="form-control" name="tujuan" value="<?php echo $data['tujuan']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="jadwal">Jam :</label>
            <div class="col-sm-6">
                <input type="jadwal" class="form-control" name="jadwal" value="<?php echo $data['jadwal']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="rute">Rute :</label>
            <div class="col-sm-6">
                <input type="rute" class="form-control" name="rute" value="<?php echo $data['rute']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger">Update</button>
            </div>
        </div>
    </form>
</div>