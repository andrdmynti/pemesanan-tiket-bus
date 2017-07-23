<div class="col-md-12">
    <h3 class="page-header">
        <div align="center">
            Konfirmasi Pembayaran
        </div>
    </h3>
    <br><br><br>
    <form class="form-horizontal" action="update_pembayaran.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-4">Kode :</label>
            <div class="col-sm-6">
                <input type="invoice" class="form-control" name="invoice" placeholder="Enter Kode Pemesanan">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-4">Bukti Pembayaran:</label>
            <div class="col-sm-6">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                
            </div>
            <div class="col-sm-4">
                <input type="submit" value="Upload Bukti" name="submit">
            </div>
        </div>
    </form>
</div>