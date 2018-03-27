<div class="row">
  <div class="col-md-12">
    <h2><center>Laporan Penjualan Tiket</h2>
    <hr>
       
<form action="" method="POST">
<table>
<tr>
<td>
  <select name="bln" class="form-control">
                  <option>--Pilih--</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                </select>
</select>
</td>
<td>
<select name="thn" class="form-control">
<?php
$mulai= date('Y') - 50;
for($i = $mulai;$i<$mulai + 100;$i++){
    $sel = $i == date('Y') ? ' selected="selected"' : '';
    echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
}
?>
</select>
</td>

<td>&nbsp;&nbsp;<button type="submit" class="btn btn-primary" name="cari">Pilih</button></td>
</tr>
</table>
</form>
<br>
<br>
</div>

<?php

  if(isset($_POST['cari'])){

    $bln = $_POST['bln'];
    $thn = $_POST['thn'];
  
?>


  <script>

  window.location = 'admin.php?halaman=laporan&&bln=<?php echo $bln; ?>&&thn=<?php echo $thn; ?>';

  </script>


  <?php
  }
  
  ?>

<?php
  if(isset($_GET['bln'])&& isset($_GET['thn'])){
 
  ?>

<table class="table" style="width:800px;">
    <thead>
      <tbody>
    <tr>
        <th class="bg-info"><center>No</th>
        <th class="bg-info"><center>Tanggal Berangkat</th>
        <th class="bg-info"><center>Tujuan</th>
        <th class="bg-info"><center>Total</th>
    </tr>

<?php

$bln = $_GET['bln'];
$thn = $_GET['thn'];

include '../config/koneksi.php'; 

$no = 1;
     $query1 = "SELECT pesanan.tgl_berangkat, pesanan.id_bus, pesanan.id_berangkat, pesanan.harga, pesanan.total, bus.id_bus, bus.harga, bus.tujuan, keberangkatan.id_berangkat, keberangkatan.tujuan FROM pesanan, bus, keberangkatan WHERE pesanan.id_berangkat = keberangkatan.id_berangkat AND pesanan.id_bus = bus.id_bus AND month(pesanan.tgl_berangkat) = '$bln' AND year(pesanan.tgl_berangkat) = '$thn'";

  /*$query1 = "SELECT * FROM pesanan p
              JOIN keberangkatan k ON p.id_berangkat = k.id_berangkat";*/

  $tampil1 = mysqli_query($conn, $query1);


?>


<?php
if(!mysqli_num_rows($tampil1)) {
  echo "No posts yet";

} else {
while($row = mysqli_fetch_array($tampil1)) { ?>
    <tr>
        <td><center><?php echo $no++; ?></td>
        <td><center><?php echo $row['tgl_berangkat']; ?></td>
        <td><center><?php echo $row['tujuan']; ?></td>
        <td><center><?php echo $row['total']; ?></td>   
    </tr>

<?php }

?>
    
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td><a href="cetak_report.php?print=1&id_pesan=<?php echo $_GET['id_pesan'];?>&bln=<?php echo $bln; ?>&&thn=<?php echo $thn; ?>" target ="_blank" role="button" class="btn btn-primary pull-right" style="margin-right:16px;margin-bottom:10px;width:150px"><span class="fa fa-print"></span> Cetak Report</a></td>
    </tr>

<?php }
?>


<?php }
?>  
      
</table>
</form>