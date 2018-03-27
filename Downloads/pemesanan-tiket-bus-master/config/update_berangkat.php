<?php

	include 'koneksi.php';

	$id_berangkat   = $_POST['id_berangkat'];
    $tujuan         = $_POST['tujuan'];
    $jadwal         = $_POST['jadwal'];
    $rute           = $_POST['rute'];

	$update 	    = "UPDATE keberangkatan SET tujuan='$tujuan', jadwal='$jadwal', rute='$rute' WHERE id_berangkat='$id_berangkat'";
	$updatebrgkt	= mysqli_query($conn, $update)or die(mysqli_error());

    if ($updatebrgkt)
        {
    	   echo "<strong><center>Data Berhasil Diubah";
    	   echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?halaman=manajemen_berangkat">';
        }
    else 
        {
    	   print"
    	       <script>
    	           alert(\"Data Gagal Diubah!\");
    	           history.back(-1);
    	       </script>";
    }
?>