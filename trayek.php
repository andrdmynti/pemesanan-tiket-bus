<br><br><br><br>

<div class="col-md-12">
    
    <h3>
        <div align="center">Info Trayek</div>
    </h3>
    <br><br><br>

	<form class="form-horizontal">
  		<table class="table table-striped">
    		<thead>
      			<tr>
					<th>No</th>
					<th>Tujuan</th>
					<th>Jadwal</th>
					<th>Rute</th>	
     			</tr>
    		</thead>
    		<tbody>
    			<?php

    				include 'config/koneksi.php';

					$query = mysqli_query($conn, "SELECT * FROM keberangkatan ORDER BY tujuan ASC")or die(mysqli_error());
						if(mysqli_num_rows($query) == 0){	
							echo '<tr><td colspan="3" align="center">Tidak ada data!</td></tr>';		
						}
						else
						{	
							$no = 1;				
							while($data = mysqli_fetch_array($query)){	
								echo '<tr>';
								echo '<td>'.$no.'</td>';
								echo '<td>'.$data['tujuan'].'</td>';
								echo '<td>'.$data['jadwal'].'</td>';
								echo '<td>'.$data['rute'].'</td>';
								$no++;	
							}
						}
			
				?>
    		</tbody>
  		</table>
	</form>
</center>