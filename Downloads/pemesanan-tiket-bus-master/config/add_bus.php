<?php

	include 'koneksi.php';

	$kelas   		= $_POST["kelas"];
	$harga			= $_POST["harga"];

	$insert			= "INSERT INTO bus VALUES ('','$kelas','$harga','')";

	$simpan			= mysqli_query($conn, $insert)or die(mysqli_error());

?>

<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin.php?halaman=manajemen_bus">