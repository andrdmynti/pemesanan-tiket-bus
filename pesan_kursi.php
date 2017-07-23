<?php
	
	include 'config/koneksi.php';

	$id_pesan  	= $_POST['id_pesan'];
	$kode_kursi = $_POST['kode_kursi'];


	$cek		= "SELECT * FROM kursi_pesanan WHERE id_pesan='$id_pesan'";
	$cekkursi	= mysqli_query($conn, $cek);
	$jumlah		= mysqli_num_rows($cekkursi);

	$lihat		= "SELECT * FROM pesanan WHERE id_pesan='$id_pesan'";
	$cekqty		= mysqli_query($conn, $lihat);
	$qty		= mysqli_fetch_array($cekqty);


	if ($jumlah < $qty['qty']) {

		$insert		 = "INSERT INTO kursi_pesanan (id_kursi, id_pesan, kode_kursi) VALUES ('','$id_pesan','$kode_kursi')";
		$simpan		 = mysqli_query($conn, $insert)or die(mysqli_error($conn));
		
		$updatekursi = "UPDATE kursi SET id_pesan='$id_pesan' WHERE kode_kursi='$kode_kursi'";
		$update		 = mysqli_query($conn, $updatekursi)or die(mysqli_error($conn));
		
		if ($update)
		    {
			   echo "sukses";
		    }
		else 
		    {
				echo "gagal";
			}
		
		$update 	 = "UPDATE pesanan SET fixed='1' WHERE id_pesan='$id_pesan'";
		$updatepesan = mysqli_query($conn, $update)or die(mysqli_error());

			

	}
	else {
		echo "full";
	}

?>