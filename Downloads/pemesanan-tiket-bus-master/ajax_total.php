<?php
	include "config/koneksi.php";

	$id_kelas = $_GET["id_kelas"];
	$penumpang = $_GET["penumpang"];

	$query = "SELECT * FROM bus WHERE id_bus = '$id_kelas'";
	$sql = mysqli_query($conn,$query)or die(mysqli_error());
	$row = mysqli_fetch_array($sql);

	$total = $row["harga"] * $penumpang;

	echo $total;
	
?>