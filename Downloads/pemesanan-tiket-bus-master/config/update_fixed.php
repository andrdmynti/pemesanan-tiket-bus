<?php
    
    include 'koneksi.php';

    $id_pesan = $_POST['id_pesan'];

    $query    = "UPDATE pesanan SET fixed=1 WHERE id_pesan='$id_pesan'";
    $update   = mysqli_query($conn,$query)or die(mysqli_error($conn));

    if ($update) {
        echo "Anda Telah Mengkonfirmasi Pesanan Anda";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT = "1; URL=index.php?halaman=invoice">';
    }
    else{
            print"
                <script>
                    alert(\"Data Gagal Diubah!\");
                    history.back(-1);
                </script>";
    }



?>