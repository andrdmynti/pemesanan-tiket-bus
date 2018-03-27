<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: white}

th {
    background-color: #f2375d;
    color: white;
}

	
</style>
<?php

	include 'config/koneksi.php';

	$id_pesan	= $_POST['id_pesan'];

	$edit   = "SELECT nama, nik, invoice, total FROM pesanan WHERE id_pesan = '$id_pesan'";
	$hasil  = mysqli_query($conn, $edit)or die(mysqli_error($conn));
	$data   = mysqli_fetch_array($hasil);

?>

<div class="row">
	<div class="col-md-12">
		<center><h2>Kode Pemesanan</h2></center>
		<div class="col-md-10">
			<br>
			<h4>Kode Pemesan : <?php echo $data['invoice']; ?></h4>
			<h4>Nama Pemesan : <?php echo $data['nama']; ?></h4>
			<br><br>
			<form action="config/update_konfirm.php">
				<input type="hidden" name="id_pesan" value="<?php echo $data['id_pesan']; ?>">
					<table class="table table-striped-bordered">
						
						<tr>
							<td width="200">NIK Pemesan</td>
							<td width="50">:</td>
							<td><?php echo $data['nik']; ?></td>
						</tr>
						<tr>
							<td width="200">Total</td>
							<td width="50">:</td>
							<td><?php echo $data['total']; ?></td>
						</tr>
					</table>
			</form>
		</div>
	</div>
	<center>
		<h5>
			<p>
				<b>Silahkan Anda Transfer ke No. Rekening yang tersedia pada halaman <a href="index.php?halaman=info_pembayaran">berikut</a> yang harus Anda bayar sesuai dengan Total yang tersedia diatas.
				</b>
			</p>
		</h5>
	</center>
</div>