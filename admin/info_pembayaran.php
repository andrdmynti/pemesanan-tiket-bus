<style>
	table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #ffdbdb}

th {
    background-color: #ff8c8c;
    color: white;
}

	
</style>
<div class="row">
	<div class="col-md-12">
		<h3><p><center>Manajemen Info Pembayaran</center></p></h3>
		<br><br><br>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		<form class="form-horizontal" method="POST">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Bank</th>
						<th>No. Rekening</th>
						<th>Atas Nama</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					<?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT * FROM pembayaran")or die(mysqli_error());
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';		
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){	
						 						echo '<tr>';
												echo '<td>'.$no.'</td>';
												echo '<td>'.$data['bank'].'</td>';
												echo '<td>'.$data['nmr_rekening'].'</td>';
												echo '<td>'.$data['atas_nama'].'</td>';
												echo '<td><a href=admin.php?halaman=edit_pembayaran&&id='.$data['id'].'><span class="glyphicon glyphicon-edit"></a></td>';
												echo '<td><a href=config/delete_info.php?id='.$data['id'].'><span class="glyphicon glyphicon-remove-sign"></span></a></td>';
												echo '</tr>';
												$no++;	
											}
										}
							
								?>
				    				
				</tbody>
			</table>
		</form>
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
    	<!-- Modal content-->
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title" align="center">Tambahkan Info Pembayaran</h4>
      		</div>
      		<div class="modal-body">
      			<form action="../config/add_pembayaran.php" class="form-horizontal">
      				<div class="form-group">
      					<label class="control-label col-sm-4">Bank :</label>
      				    <div class="col-sm-6">
      				        <input type="bank" class="form-control" name="bank" placeholder="Bank">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4">No. Rekening :</label>
      				    <div class="col-sm-6">
      				        <input type="rekening" class="form-control" name="rekening" placeholder="No. Rekening">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4">Atas Nama :</label>
      				    <div class="col-sm-6">
      				        <input type="nama" class="form-control" name="nama" placeholder="Atas Nama">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4"></label>
      				    <div class="col-sm-6" align="right">
      				        <button class="btn btn-danger">Simpan</button>
      				    </div>
      				</div>
      			</form>
      		</div>
      		<div class="modal-footer">
        		
      		</div>
    	</div>
  	</div>
</div>