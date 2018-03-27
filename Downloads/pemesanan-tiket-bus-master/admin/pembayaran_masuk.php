	<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #accaf9}

th {
    background-color: #3d66aa;
    color: white;
}
</style>
<div class="row">
	<div class="col-md-12">
		<center><h2>Daftar Pembayaran Masuk</h2></center>
		<hr>
		<br><br>
		<form class="form-horizontal" method="POST">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Pesan</th>
						<th>NIK Pemesan</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Berangkat</th>
						<th>Total</th>
						<th>Bukti</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT id_pesan, tgl_pesan, nik, nama, tgl_berangkat, total, respons, pembayaran FROM pesanan WHERE respons != '' ORDER BY tgl_berangkat ASC")or die(mysqli_error($conn));
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';		
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){ 
					?>

						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['tgl_pesan']; ?></td>
							<td><?php echo $data['nik']; ?></td>
							<td><?php echo $data['nama']; ?></td>
							<td><?php echo $data['tgl_berangkat']; ?></td>
							<td><?php echo $data['total']; ?></td>
							<td><img src="../<?php echo $data['respons']; ?>" width="300" height="270"></td>
							<td align="center"><?php if ($data['pembayaran']==0) echo "Belum Di Konfirmasi";
										elseif ($data['pembayaran']==1) echo "Sudah Di Konfirmasi"; 
								?>	
							</td>		 						
					<?php
						echo '<td><a href=admin.php?halaman=konfirmasi_pembayaran&&id_pesan='.$data['id_pesan'].'><span class="glyphicon glyphicon-edit"></a></td>';
						echo "</tr>";
						$no++;	
							}
						}							
					?>
				</tbody>
			</table>
		</form>
		<br><br><br><br><br><br><br>
	</div>
</div>