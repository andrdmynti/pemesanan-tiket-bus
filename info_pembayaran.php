<div> 
	<form class="form-horizontal">
		<table class="table table-bordered table-striped">
			<br>
			<h3>
				<center>
					Info Pembayaran Tiket Online Sumber Alam
				</center>
			</h3>
			<br>
			<h5>
				Setelah melakukan booking tiket online, langkah selanjutnya adalah melakukan transfer sesuai dengan total harga yang tertera pada saat memesan ke salah satu dari nomer rekening yang ada dibawah ini. Jika sudah melakukan transfer, silahkan konfirmasi pembayaran tersebut melalui menu <a href="index.php?halaman=konfirmasi_pembayaran">Konfirmasi Pembayaran</a>
			</h5>
			<br>
			<thead>
				<tr>
					<td>No</td>
					<td>Bank</td>
					<td>No. Rekening</td>
					<td>Atas Nama</td>
				</tr>
			</thead>
			<tbody>
				<?php
					include 'config/koneksi.php';
					
					$query = mysqli_query($conn,"SELECT * FROM pembayaran");
						if (mysqli_num_rows($query) == 0){
							echo "<td colspan=4 align=center>Tidak Ada Data!</td>";
						}
						else
						{
							$no=1;
							while($data=mysqli_fetch_array($query))
							{
								echo '<tr>';
								echo '<td>'.$no.'</td>';
								echo '<td>'.$data['bank'].'</td>';
								echo '<td>'.$data['nmr_rekening'].'</td>';
								echo '<td>'.$data['atas_nama'].'</td>';
								$no++;
							}
						}


				?>
			</tbody>	
		</table>
	</form>
</div>