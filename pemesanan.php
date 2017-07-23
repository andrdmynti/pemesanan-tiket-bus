<br><br><br>
<div class="col-md-12">
    <h3 class="page-header">
        <div align="center">Silahkan Pesan Tiket</div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="config/proses_pesan.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-4">NIK :</label>
            <div class="col-sm-6">
                <input type="nik" class="form-control" name="nik" placeholder="Nomor Induk Kependudukan Pemesan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Nama Pemesan :</label>
            <div class="col-sm-6">
                <input class="form-control" name="nama" placeholder="Nama Pemesan" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Alamat Pemesan :</label>
            <div class="col-sm-6">
                <textarea name="alamat" class="form-control" placeholder="Alamat Pemesan" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Tanggal Berangkat :</label>
            <div class="col-sm-6">
                <input type="text" name="tgl_berangkat" class="form-control input-md" id="datepicker" required />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Tujuan :</label>
            <div class="col-sm-6">
                <select class="form-control" name="id_berangkat" id="tujuan">
                    <option>--Pilih Tujuan--</option>
                    <?php
                    $tujuan = "SELECT * FROM keberangkatan";
                    $queryTujuan = mysqli_query($conn,$tujuan);
                    while ($dataTujuan = mysqli_fetch_array($queryTujuan)) { ?>
                        <option value="<?php echo $dataTujuan['id_berangkat'] ?>"><?php echo $dataTujuan["tujuan"] ?> | <?php echo $dataTujuan["jadwal"] ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="select">Kelas :</label>
            <div class="col-sm-6">
                <select class="form-control" id="kelas" name="id_bus">
                    <option>--Pilih Kelas--</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4" for="select">Jumlah Penumpang :</label>
            <div class="col-sm-6">
                <select class="form-control" id="penumpang" name="penumpang">
                    <option>--Pilih Jumlah Penumpang--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Total Harga Tiket :</label>
            <div class="col-sm-6">
                <input class="form-control" type="text" id="total" name="total" readonly>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4"></label>
            <div class="col-sm-6" align="right">
                <button class="btn btn-danger">Selanjutnya</button>
            </div>
        </div>
    </form>

        <!-- Javascript untuk memanggil Kelas dari Tujuan dan Jumlah Pembayaran dari penumpang&kelas -->
        <script type="text/javascript">
            $( "#tujuan" ).change(function() {
              var id_berangkat = $("#tujuan").val();
              console.log(id_berangkat);
              $.ajax({
                url: "./ajax_bus.php?id_berangkat=" + id_berangkat,
                success: function(result){
                  $("#kelas").html(result);
                }
              });
            });

            $( "#penumpang" ).change(function() {
              var id_kelas = $("#kelas").val();
              var penumpang = $("#penumpang").val();
              console.log(penumpang);
              $.ajax({
                url: "./ajax_total.php?id_kelas=" + id_kelas + "&penumpang=" + penumpang,
                success: function(result){
                    console.log(result);
                  $("#total").val(result);
                }
              });
            });
        </script>