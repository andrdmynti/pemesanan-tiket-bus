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
		<h2><p><center>Manajemen Kelas</center></p></h2>
		<hr>
		<br>
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>Tambah</button>
		<br><br>
		<form class="form-horizontal">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Harga</th>
						<th colspan="2"><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					<?php

						include '../config/koneksi.php';

						$query = mysqli_query($conn, "SELECT id_bus, kelas, harga FROM bus")or die(mysqli_error());
										if(mysqli_num_rows($query) == 0){	
											echo '<tr><td colspan="5" align="center">Tidak ada data!</td></tr>';	
										}
											else
										{	
											$no = 1;				
											while($data = mysqli_fetch_array($query)){	
						 						echo '<tr>';
												echo '<td>'.$no.'</td>';
												echo '<td>'.$data['kelas'].'</td>';
												echo '<td>'.$data['harga'].'</td>';
												echo '<td><a href=admin.php?halaman=edit_bus&&id_bus='.$data['id_bus'].'><span class="glyphicon glyphicon-edit"></a></td>';
												echo '<td><a href=../config/delete_bus.php?id_bus='.$data['id_bus'].'><span class="glyphicon glyphicon-remove-sign"></span></a></td>';
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
        		<h4 class="modal-title" align="center">Tambahkan Data Bus</h4>
      		</div>
      		<div class="modal-body">
      			<form action="../config/add_bus.php" class="form-horizontal" method="POST">
      				<div class="form-group">
      					<label class="control-label col-sm-4">Kelas :</label>
      				    <div class="col-sm-6">
      				        <input type="kelas" class="form-control" name="kelas" placeholder="Kelas">
      				    </div>
      				</div>
      				<div class="form-group">
      				    <label class="control-label col-sm-4">Harga :</label>
      				    <div class="col-sm-6">
      				        <input type="harga" class="form-control" name="harga" placeholder="Harga">
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


