<?php

	include 'koneksi.php';

	$id_user  		= $_POST['id_user'];
	$username 		= $_POST['username'];
	$password	 	= md5($_POST['password']);


	$update 	= "UPDATE user SET username='$username', password='$password' WHERE id_user='$id_user'";
	$updateuser	= mysqli_query($conn, $update)or die(mysqli_error());

	if ($updateuser)
    	{
    		echo "<strong><center>Data Berhasil Diubah";
    		echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?halaman=manajemen_user">';
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