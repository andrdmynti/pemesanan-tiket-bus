<?php
    error_reporting(0);    
?>
<div class="col-md-12">
    <h3 class="page-header">
        <div align="center">Cek Proses</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-4">Kode Pemesanan :</label>
            <div class="col-sm-7">
                <input name="invoice" class="form-control" placeholder="Kode Pemesanan">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-7" align="right">
                <button type="submit" class="btn btn-danger" value="pencarian" name="cari">Cek Proses</button>
            </div>
        </div>
        <br><br><br>
        <center>
            <?php
                
                include 'config/koneksi.php';
                if(isset($_POST['cari'])){
                    $invoice = $_POST['invoice'];
                }


                $query  = mysqli_query($conn, "SELECT * FROM pesanan WHERE invoice='$invoice'")or die(mysqli_error($conn));

                    if(mysqli_num_rows($query) == 0){   
                                
                    }
                    else{

                        echo "<h4>Proses Pesanan Anda</h4>";
                        echo "<br><br>";
                        $data = mysqli_fetch_array($query);

                        //belum dikonfirmasi admin
                        if ($data['konfirm']==0) {
                            echo "Pesanan Anda Belum Di konrimasi oleh admin, silahkan tunggu beberapa saat lagi";
                        }
                        //Sudah dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['respons']==''){
                            echo "Pesanan Anda sudah dikonfirmasi oleh Admin. Untuk Selanjutnya, Silahkan transfer ke rekening yang ada pada <a href='index.php?halaman=info_pembayaran'>Informasi Pembayaran</a>";
                        }
                        //pembayaran belum dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==0){
                            echo "Transaksi Pembayaran Anda Belum di konfirmasi oleh admin";
                        }
                        //cetak tiket
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==1){
                            echo "<span class='fa fa-print'></span> Cetak Tiket</a>";
                        }    
                    }
            ?>
        </center>
    </form>
</div>
