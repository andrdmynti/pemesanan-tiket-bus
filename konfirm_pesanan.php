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

	$id_pesan	= $_GET['id_pesan'];

	$edit   = "SELECT pesanan.nama, pesanan.id_bus, pesanan.id_berangkat, pesanan.tgl_pesan, pesanan.nik, pesanan.alamat, pesanan.tgl_berangkat, pesanan.total, pesanan.konfirm, keberangkatan.tujuan, keberangkatan.jadwal, bus.kelas, bus.harga FROM pesanan, bus, keberangkatan, kursi_pesanan, kursi WHERE pesanan.id_pesan = '$id_pesan' AND kursi_pesanan.id_pesan = pesanan.id_pesan = kursi.id_pesan AND keberangkatan.id_berangkat = pesanan.id_berangkat AND bus.id_bus = pesanan.id_bus";
	$hasil  = mysqli_query($conn, $edit)or die(mysqli_error($conn));
	$data   = mysqli_fetch_array($hasil);

?>

<div class="row">
	<div class="col-md-12">
		<center><h2>Daftar Bayar Pemesan</h2></center>
		<div class="col-md-10">
			<br>
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
		</div>
	</div>
</div>