<?php

	include 'koneksi.php';	

	$id_berangkat 	= $_GET['id_berangkat'];

	$hapus	= "DELETE FROM keberangkatan WHERE id_berangkat='$id_berangkat'";
	$query 	= mysqli_query($conn, $hapus);

	//echo "Data Telah Terhapus";
	echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../admin/admin.php?halaman=manajemen_berangkat'>";
	//echo "<meta http-equiv='refresh' content='0; url=../admin/index.php?halaman=info'>";

?>