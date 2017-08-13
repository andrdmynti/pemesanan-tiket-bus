<!DOCTYPE html>

<html lang="en">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/css/shop-homepage.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<title>Cetak Tiket</title>

<body onload="window.print()">
    <div class="panel panel-default"">
        <div class="panel-body">
            <div class="row-table-bordered">
                <div class="col-md-2">
                    <img src="images/logo.png" class="img-responsive pull-left" style="max-height:150px;display:inline">
                </div>
                <br>
                <div class="col-md-8">
                    <font size="6"><b><p class="text-center">P.O. Sumber Alam Pondok Ungu</p></font>
                    <font size="3"><b><p class="text-center">Jl. Sultan Agung Raya KM. 27 No. 24, Bekasi Barat, Bekasi.</p></font>
                    <b><p class="text-center">Phone : (021) 889-586-31</p></b>
                </div>
                <br>
                <style type="text/css">
                  hr.style2 {
                    border-top: 3px double #8c8b8b;
                    }
                </style>
            </div>
        </div>
        <hr class="style2">
        <?php
            include 'config/koneksi.php';

            $id_pesan = $_GET['id_pesan'];

            $query  = mysqli_query($conn, "SELECT pesanan.id_pesan, pesanan.nama, pesanan.id_bus, pesanan.id_berangkat, pesanan.tgl_pesan, pesanan.nik, pesanan.alamat, pesanan.tgl_berangkat, pesanan.qty, pesanan.total, pesanan.invoice, pesanan.konfirm, pesanan.respons, pesanan.pembayaran, keberangkatan.tujuan, keberangkatan.jadwal, bus.kelas, bus.harga, kursi_pesanan.id_pesan, kursi_pesanan.kode_kursi FROM pesanan, bus, keberangkatan, kursi_pesanan, kursi WHERE pesanan.id_pesan = '$id_pesan'")or die(mysqli_error($conn));
            
            $data = mysqli_fetch_array($query);
        ?>
        <div class="row">
            <div class="col-md-12">
                <h3><center><b>Tiket</b></center></h3>
                <br><br>
            </div>
            <div class="col-md-12">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-8">
                    <form action="" method="POST">
                        <input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
                        <h5><b>Kode Pemesan : <?php echo $data['invoice']; ?></b></h5>
                        <h5><b>Nama Pemesan : <?php echo $data['nama']; ?></b></h5>
                        <br><br>
                        <table class="table table-striped-bordered" align="center">
                            <tr>
                                <td>NIK Pemesan</td>
                                <td>:</td>
                                <td><?php echo $data['nik']; ?></td>
                                <td></td>
                                <td></td>
                                <td>Alamat Pemesan</td>
                                <td>:</td>
                                <td><?php echo $data['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berangkat</td>
                                <td>:</td>
                                <td><?php echo $data['tgl_berangkat']; ?></td>
                                <td></td>
                                <td></td>
                                <td>Jam Berangkat</td>
                                <td>:</td>
                                <td><?php echo $data['jadwal']; ?></td>
                            </tr>
                            <tr>
                                <td>Tujuan</td>
                                <td>:</td>
                                <td><?php echo $data['tujuan']; ?></td>
                                <td></td>
                                <td></td>
                                <td>Kelas</td>
                                <td>:</td>
                                <td><?php echo $data['kelas']; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td><?php echo $data['harga']; ?></td>
                                <td></td>
                                <td></td>
                                <td>Jumlah Penumpang</td>
                                <td>:</td>
                                <td><?php echo $data['qty']; ?></td>
                            </tr>
                            <tr>
                                <td>Kode kursi</td>
                                <td>:</td>
                                <td><?php echo $data['kode_kursi']; ?></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>:</td>
                                <td><?php echo $data['total']; ?></td>
                            </tr>
                        </table>       
                    </form>
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </div>
</body>