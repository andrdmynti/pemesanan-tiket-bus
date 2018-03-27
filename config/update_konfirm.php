<?php

	include 'koneksi.php';

    $id_pesan   = $_GET['id_pesan'];

	$update 	= "UPDATE pesanan SET konfirm='1' WHERE id_pesan='$id_pesan'";
	$konfirmasi	= mysqli_query($conn, $update)or die(mysqli_error());

    if ($konfirmasi)
        {
            echo "<strong><center>Pesanan Berhasil Dikonfirmasi";
            //echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=../admin/admin.php?halaman=pesan_masuk">';
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