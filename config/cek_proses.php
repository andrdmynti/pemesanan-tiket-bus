<?php
	
	include 'koneksi.php';

	$invoice  = $_POST['kode'];

	$query 	  = "SELECT * FROM pesanan WHERE kode = '$invoice'";
	$sql 	  = mysqli_query($conn,$query);
	$data 	  = mysqli_num_rows($query);
	
	if ($data['konfirm'] = '1') {
		echo "Pesanan Anda Telah dikonfirmasi oleh Admin. Selanjutnya, silahkan anda transfer biaya perjalanan Anda ke sesuai dengan yang tersedia pada <a href='index.php?halaman=info_pembayaran'>Info Pembayaran</a>";
	}
	else {
		echo "Pesanan Anda Belum Dikonfirmasi oleh Admin. Silahkan cek lagi beberapa saat kemudian.";
	}


?>