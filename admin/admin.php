<?php
	include '../config/koneksi.php';

	session_start();

	if(isset($_GET['halaman'])) $halaman = $_GET['halaman']; 
	    else $halaman = "index";

	$id_admin=session_id();
	$id_login= $_SESSION['id'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin PO. Sumber Alam Pondok Ungu</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/sb-admin.css">
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top" rol="navigation" style="background: #DC143C">
			<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" style="color: #f9ecf2">Halaman Admin PO. Sumber Alam</a>
			</div>

			<!-- MENU -->
			<ul class="nav navbar-nav navbar-right">
			    <li>
			        <a href="../config/proses_logout.php" style="color: #f9ecf2"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
			    </li>
			    <li>
			    	<a href=""></a>
			    </li>
			    <li>
			    	<a href=""></a>
			    </li>
			</ul>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav side-nav" style="background: #DC143C">
					<li>
						<a href="admin.php?halaman=awal" style="color: #FFFFFF"><span class="glyphicon glyphicon-home">&nbsp;</span>Beranda</a>
					</li>
					<li>
						<a href="admin.php?halaman=pesan_masuk" style="color: #FFFFFF"><span class="glyphicon glyphicon-download-alt">&nbsp;</span>Pemesanan Masuk</a>
					</li>
					<li>
						<a href="admin.php?halaman=bukti_bayar" style="color: #FFFFFF"><span class="glyphicon glyphicon-download-alt">&nbsp;</span>Pembayaran Masuk</a>
					</li>
					<li>
						<a href="javascript:;" data-toggle="collapse" data-target="#demo" style="color: #FFFFFF"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Manajemen &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-triangle-bottom"></span></a>
						<ul id="demo" class="collapse">
							<li>
								<a href="admin.php?halaman=manajemen_user" style="color: #FFFFFF">User</a>
							</li>
							<li>
								<a href="admin.php?halaman=manajemen_bus" style="color: #FFFFFF">Bus</a>
							</li>
							<li>
								<a href="admin.php?halaman=manajemen_berangkat" style="color: #FFFFFF">Keberangkatan</a>
							</li>
							<li>
								<a href="admin.php?halaman=manajemen_pembayaran" style="color: #FFFFFF">Pembayaran</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="admin.php?halaman=laporan" style="color: #FFFFFF"><span class="glyphicon glyphicon-file">&nbsp;</span>Laporan</a>
					</li>
				</ul>
			</div>
		</nav>

		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="col-md-2">
					
				</div>
				<div class="col-md-10">
					<?php
						// jika id session tidak ditemukan, maka diarahkan ke halaman login admin
						if (!isset($_SESSION['id']))
						{   
						        header('location:index.php');
						}

						//menu navigasi admin
						if ($halaman=='awal')
							include 'awal.php';
						elseif ($halaman=='pesan_masuk')
							include 'pesanan_masuk.php';
						elseif ($halaman=='bukti_bayar')
							include 'pembayaran_masuk.php';
						elseif ($halaman=='manajemen_user')
							include 'info_user.php';
						elseif ($halaman=='manajemen_trayek')
							include 'info_trayek.php';
						elseif ($halaman=='manajemen_bus')
							include 'info_bus.php';
						elseif ($halaman=='manajemen_berangkat')
							include 'info_keberangkatan.php';
						elseif ($halaman=='manajemen_pembayaran')
							include 'info_pembayaran.php';
						elseif ($halaman=='konfirmasi')
							include 'konfirmasi.php';
						elseif ($halaman=='laporan')
							include 'laporan.php';

						//halaman edit
						elseif ($halaman=='edit_user')
							include 'edit_user.php';
						elseif ($halaman=='edit_info')
							include 'edit_info.php';
						elseif ($halaman=='edit_bus')
							include 'edit_bus.php';
						elseif ($halaman=='edit_berangkat')
							include 'edit_berangkat.php';
						elseif ($halaman=='edit_pembayaran')
							include 'edit_pembayaran.php';
						

					?>
				</div>
			</div>
		</div>

	</div>
	
	<!-- jQuery -->
	<script src="../bootstrap/js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>

	<!-- Morris Charts JavaScript -->
	<script src="../bootstrap/js/plugins/morris/raphael.min.js"></script>
	<script src="../bootstrap/js/plugins/morris/morris.min.js"></script>
	<script src="../bootstrap/js/plugins/morris/morris-data.js"></script>
</body>
</html>