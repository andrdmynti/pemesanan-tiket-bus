<?php

	include "koneksi.php";

	$username  = $_POST["username"];
	// encrypt password dengan md5 password
	$password  = md5($_POST["password"]);

	$query     ="SELECT * FROM user WHERE username='$username' AND password='$password'";

	$login     = mysqli_query($conn,$query)or die(mysqli_error($conn));
	$jlhrecord = mysqli_num_rows($login);

	$data      = mysqli_fetch_array($login,MYSQLI_BOTH);

	$username  = $data['username'];
	$level     = $data['level'];

	if ($jlhrecord > 0){

		// jika Username dan password ada didalam database daftarkan session
		session_start();
		$_SESSION['username']  = $username;
		$_SESSION['level']     = $level;
		$_SESSION['id']        = session_id();
		
		header('location: ../admin/admin.php'); 

	}
	else{
		// echo $data;
		//header("location:index.php");
		print"
			<script>
				alert(\"Username atau Password Anda Salah!\");
				history.back(-1);
			</script>";
	} 
?>