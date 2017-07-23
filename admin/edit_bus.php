<?php

include '../config/koneksi.php';

$id_bus  = $_GET['id_bus'];

$edit    = "SELECT id_bus, kelas, harga FROM bus WHERE id_bus = '$id_bus'";
$hasil   = mysqli_query($conn, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info Bus</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="../config/update_bus.php" method="POST">
        <input type="hidden" name="id_bus" value="<?php echo $id_bus ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="kelas">Kelas :</label>
            <div class="col-sm-6">
                <input type="kelas" class="form-control" name="kelas" value="<?php echo $data['kelas']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="harga">Harga :</label>
            <div class="col-sm-6">
                <input type="harga" class="form-control" name="harga" value="<?php echo $data['harga']; ?>">
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