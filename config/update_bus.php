<?php

	include 'koneksi.php';
	
	$id_bus	= $_POST['id_bus'];
	$kelas	= $_POST['kelas'];
	$harga	= $_POST['harga'];

	$update 	= "UPDATE bus SET kelas='$kelas', harga='$harga' WHERE id_bus='$id_bus'";
	$updatebus	= mysqli_query($conn, $update)or die(mysqli_error());

if ($updatebus)
    {
    	echo "<strong><center>Data Berhasil Diubah";
    	echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?halaman=manajemen_bus">';
    }
else {
    	//echo "<strong><center>Data Gagal Diubah";
    	//echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../index.php?halaman=edit_info">';
    	print"
    		<script>
    			alert(\"Data Gagal Diubah!\");
    			history.back(-1);
    		</script>";
    }
?>