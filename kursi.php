<?php   

     $id_pesan = $_GET['id_pesan'];
          
     $query     = "SELECT * FROM pesanan WHERE id_pesan='$id_pesan'";
     $cek       = mysqli_query($conn, $query)or die(mysqli_error($conn));
     $data    = mysqli_fetch_array($cek);

?>     
     <div class="col-md-8">
          <h3>
             Silahkan Pilih Kursi
          </h3>
          <?php
          $query = "SELECT * FROM kursi WHERE id_bus='$data[id_bus]'";
          $execute_q = mysqli_query($conn, $query);    
          while ($data = mysqli_fetch_array($execute_q)) {
               if ($data['id_pesan'] == 0) { 
                    $kode_kursi = $data['kode_kursi'];
                    ?>
                    <input type="button" class="btn btn-default" value="<?php echo $data['kode_kursi'] ?>" onclick="pesan('<?php echo $kode_kursi ?>')">
               <?php
               } else { ?>
                    <input type="button" class="btn btn-danger" value="<?php echo $data['kode_kursi'] ?>" disabled>
               <?php
               }
               if ($data['urutan'] % 2 == 0) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
               }
               if ($data['urutan'] % 4 == 0) {
                    echo "<br><br>"; 
               }
               if ($data['urutan'] == 40) {
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
               }
               if ($data['urutan'] % 42 == 0 ) {
                    echo "<br><br>";
               }

               }
          ?>
     </div>
     <div class="col-md-4">
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          <p></p>
          Keterangan :
          <p></p>
          <p></p> 
          <p></p> 
          <p><button class="btn btn-default"></button>&nbsp; : Kursi yang tersedia</p>
          <p></p>
          <p></p>
          <p><button class="btn btn-danger"></button>&nbsp;&nbsp; : Kursi yang terbooking</p>
     </div>

     <input type="hidden" name="id_pesan" value="<?php echo $id_pesan ?>" id="id_pesan">

     <script type="text/javascript">
          var pesan = function (kode_kursi){
               var id_pesan = document.getElementById('id_pesan').value;
               console.log('pesan => ', kode_kursi);
               console.log('id_pesan => ', id_pesan);
               var formData = {kode_kursi: kode_kursi, id_pesan: id_pesan};
               $.ajax({
                   url : "pesan_kursi.php",
                   type: "POST",
                   data : formData,
                   success: function(data, textStatus, jqXHR)
                   {
                      
                       if (data == 'full') {
                         console.log("PENUH");
                       } else if (data == 'gagal') {
                         console.log("GAGAL");
                       } else {
                        console.log("BERHASIUL");
                        window.location.reload();
                       }
                   },
                   error: function (jqXHR, textStatus, errorThrown)
                   {
                
                   }
               }); 
          }
     </script>