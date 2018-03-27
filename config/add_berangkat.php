<?php

	include 'koneksi.php';

	$tujuan		   	= $_POST["tujuan"];
	$jadwal		  	= $_POST["jadwal"];
	$rute			= $_POST["rute"];

	$insert			= "INSERT INTO keberangkatan VALUES ('','$tujuan','$jadwal','$rute')";

	$simpan			= mysqli_query($conn, $insert)or die(mysqli_error());

?>

<META HTTP-EQUIV="REFRESH" CONTENT = "0; URL=../admin/admin.php?halaman=manajemen_berangkat">