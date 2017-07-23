<?php

	include 'koneksi.php';

	$id_bus			= $_POST['id_bus'];
	$id_berangkat	= $_POST['id_berangkat'];
	$nik			= $_POST['nik'];
	$nama 			= $_POST['nama'];
	$alamat			= $_POST['alamat'];
	$tgl_pesan		= date('Y-m-d');
	$tgl_berangkat	= $_POST['tgl_berangkat'];
	$penumpang		= $_POST['penumpang'];
	$total 			= $_POST['total'];
	$invoice 		= mt_rand(1,1000);

	$query 			= "SELECT * FROM kursi WHERE id_bus='$id_bus' AND id_pesan='0'";
	$cek    	    = mysqli_query($conn, $query)or die(mysqli_error($conn));
	$jumlah			= mysqli_num_rows($cek);


	if ($jumlah = 0) {
		print"
			<script>
				alert(\"Kursi Penuh!\");
				history.back(-1);
			</script>";					
	}

	else {
		$insert			= "INSERT INTO pesanan (id_pesan, id_bus, id_berangkat, nik, nama, alamat, tgl_pesan, tgl_berangkat, qty, total, fixed, invoice, konfirm, respons, pembayaran) VALUES ('','$id_bus','$id_berangkat','$nik','$nama','$alamat','$tgl_pesan','$tgl_berangkat','$penumpang','$total','0','$invoice','0','','0')";

		$simpan			= mysqli_query($conn, $insert)or die(mysqli_error($conn));


		$querypesan 			= "SELECT * FROM pesanan WHERE nama='$nama' AND nik='$nik' AND alamat='$alamat' ORDER BY id_pesan DESC LIMIT 1";
		$cekquery				= mysqli_query($conn, $querypesan)or die(mysqli_error($conn));
		$data 					= mysqli_fetch_array($cekquery);
		

		echo "<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL=../index.php?halaman=kursi&&id_pesan=$data[id_pesan]'>";
	}
?>