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
        <div class="col-md-12">
            <?php
                
                include 'config/koneksi.php';
                
                if(isset($_POST['cari'])){
                    $invoice = $_POST['invoice'];
                }


                $query  = mysqli_query($conn, "SELECT pesanan.id_pesan, pesanan.nama, pesanan.id_bus, pesanan.id_berangkat, pesanan.tgl_pesan, pesanan.nik, pesanan.alamat, pesanan.tgl_berangkat, pesanan.qty, pesanan.total, pesanan.invoice, pesanan.konfirm, pesanan.respons, pesanan.pembayaran, keberangkatan.tujuan, keberangkatan.jadwal, bus.kelas, bus.harga FROM pesanan, bus, keberangkatan, kursi_pesanan, kursi WHERE pesanan.invoice = '$invoice'")or die(mysqli_error($conn));

                    if(mysqli_num_rows($query) == 0){   
                                
                    }
                    else{

                        echo "<h4><center>Proses Pesanan Anda</center></h4>";
                        echo "<br><br>";
                        $data = mysqli_fetch_array($query);

                        //belum dikonfirmasi admin
                        if ($data['konfirm']==0) {
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan</td>
                                                <td>:</td>
                                                <td><?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan</td>
                                                <td>:</td>
                                                <td><?php echo $data['nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Status Pesanan</td>
                                                <td>:</td>
                                                <td>Pesanan Anda Belum Di konfirmasi oleh admin, silahkan tunggu beberapa saat lagi</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                            <br>
                        <?php

                        }
                        //Sudah dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['respons']==''){
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        <?php
                            echo "Pesanan Anda sudah dikonfirmasi oleh Admin. Untuk Selanjutnya, Silahkan transfer ke rekening yang ada pada <a href='index.php?halaman=info_pembayaran'>Informasi Pembayaran</a>";
                        }
                        //pembayaran belum dikonfirmasi admin
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==0){
                        ?>
                            <form action="" method="POST">
                                <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                                <div class="panel panel-default">
                                    <div class="panel-body text-left" style="background-color: #E5E4E2">
                                        <table>
                                            <tr>
                                                <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                            </tr>
                                            <tr>
                                                <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        <?php
                            echo "Transaksi Pembayaran Anda Belum di konfirmasi oleh admin";
                        }
                        //cetak tiket
                        elseif ($data['konfirm']==1 AND $data['pembayaran']==1){
                            
                        ?>
                        <h5>Pesanan dan pembayaran anda sudah dikonfirmasi dengan detail sebagai berikut : </h5>
                        <br>
                        <form action="" method="POST">
                            <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                            <div class="panel panel-default">
                                <div class="panel-body text-left" style="background-color: #E5E4E2">
                                    <table>
                                        <tr>
                                            <td align="left">Kode Pemesanan&nbsp;&nbsp;:&nbsp;<?php echo $data['invoice']; ?></td>
                                        </tr>
                                        <tr>
                                            <td align="left">Nama Pemesan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data['nama']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                            <br>
                            <table class="table table-striped-bordered" align="center">
                                <tr>
                                    <td>NIK Pemesan</td>
                                    <td>:</td>
                                    <td><?php echo $data['nik']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?php echo $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Penumpang</td>
                                    <td>:</td>
                                    <td><?php echo $data['qty']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Berangkat</td>
                                    <td>:</td>
                                    <td><?php echo $data['tgl_berangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jam Berangkat</td>
                                    <td>:</td>
                                    <td><?php echo $data['jadwal']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td>:</td>
                                    <td><?php echo $data['tujuan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?php echo $data['kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td><?php echo Rp. $data['harga']; ?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td><?php echo Rp. $data['total']; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <?php
                                        echo '<td><a href="cetak_tiket.php?print=1&&id_pesan='.$data['id_pesan'].'" target ="_blank" role="button" class="btn btn-success pull-right" style="margin-right:10px;margin-bottom:10px;width:100px"><span class="fa fa-print"></span>Cetak Tiket</a></td>';
                                    ?>
                                </tr>
                            </table>
                            </form>
                        <?php
                        }    
                    }
            ?>
        </div>
    </form>
</div>
