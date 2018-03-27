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


                $query  = mysqli_query($conn, "SELECT pesanan.id_pesan, pesanan.nama, pesanan.id_bus, pesanan.id_berangkat, pesanan.tgl_pesan, pesanan.nik, pesanan.alamat, pesanan.tgl_berangkat, pesanan.total, pesanan.invoice, pesanan.konfirm, pesanan.respons, pesanan.pembayaran, keberangkatan.tujuan, keberangkatan.jadwal, bus.kelas, bus.harga FROM pesanan, bus, keberangkatan, kursi_pesanan, kursi WHERE pesanan.invoice = '$invoice'")or die(mysqli_error($conn));

                    if(mysqli_num_rows($query) == 0){   
                                
                    }
                    else{

                        echo "<h4>Proses Pesanan Anda</h4>";
                        echo "<br><br>";
                        $data = mysqli_fetch_array($query);

                        //belum dikonfirmasi admin
                        if ($data['konfirm']==0) {
                            echo "Pesanan Anda Belum Di konfirmasi oleh admin, silahkan tunggu beberapa saat lagi";
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
                            
                        ?>
                        <h4>Nama Pemesan : <?php echo $data['nama']; ?></h4>
                        <br><br>
                        <form action="config/update_konfirm.php" method="POST">
                        <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                            <table class="table table-striped-bordered">
                                <tr>
                                    <td width="200">Tanggal Pesan</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['tgl_pesan']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">NIK Pemesan</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['nik']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Alamat</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Tanggal Berangkat</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['tgl_berangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Jam Berangkat</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['jadwal']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Tujuan</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['tujuan']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Kelas</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Harga</td>
                                    <td width="50">:</td>
                                    <td><?php echo $data['harga']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200"></td>
                                    <td><a href="admin.php?halaman=pesan_masuk" class="btn btn-warning">Batal</a></td>
                                    <td><button type="submit" class="btn btn-danger">Konfirmasi</button></td>
                                </tr>
                            </table>
                            </form>
                        <span class='fa fa-print'></span> Cetak Tiket</a>
                        <?php
                        }    
                    }
            ?>
        </center>
    </form>
</div>
