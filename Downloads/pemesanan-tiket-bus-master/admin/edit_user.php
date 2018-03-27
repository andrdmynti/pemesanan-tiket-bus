<?php

error_reporting(0);

include '../config/koneksi.php';

$id_user = $_GET['id_user'];

$edit    = "SELECT id_user, username, password FROM user WHERE id_user = '$id_user'";
$hasil   = mysqli_query($conn, $edit)or die(mysql_error());
$data    = mysqli_fetch_array($hasil);

?>

<div class="col-md-10">
    <h3>
        <div align="center">Edit Info User</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="../config/update_user.php" method="POST">
        <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
        <div class="form-group">
            <label class="control-label col-sm-4" for="username">Username :</label>
            <div class="col-sm-6">
                <input type="username" class="form-control" name="username" value="<?php echo $data['username']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="password">Password :</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>">
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