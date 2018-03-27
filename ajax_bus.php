<?php

	include "config/koneksi.php";

	$id_berangkat = $_GET["id_berangkat"];
	$query = "SELECT * FROM bus WHERE id_berangkat = '$id_berangkat'";
	$sql = mysqli_query($conn,$query)or die(mysqli_error());

	while ($row = mysqli_fetch_array($sql)) { ?>
		<option value="<?php echo $row['id_bus']; ?>"><?php echo $row["kelas"] ?> | <?php echo $row["harga"]; ?></option>
	<?php
	}
	?>
?>