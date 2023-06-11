<?php
include "../../include/koneksi.php";
$kd_penyewa=$_GET['kd_penyewa'];
$dataq=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE kd_penyewa='$kd_penyewa'");	
$row=mysqli_fetch_array($dataq)
?>		

<!-- Modal -->

<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="myModalLabel">Verifikasi</h4>
</div>
<div class="modal-body">

<form action="verifikasi_transaksi.php" method="post" enctype="multipart/form-data">
<input name="kd_penyewa" type="hidden" value="<?php echo $row['kd_penyewa']; ?>" class="form-control" />
<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="control-label">Status Pembayaran</label>
<select name="status_pembayaran" class="form-control" required="" data-errormessage-value-missing="pilih salah satu..">
<option value=""> --Pilih Status--</option>
				<?php
					$arba = array(
						'Lunas' => "Lunas",
						'Invalid' => "Invalid"
					);
					foreach ($arba as $db => $isi) {
						if ($row['status_pembayaran']==$db){
							echo "<option value='$db' selected>$isi</option>";
						}else{
							echo "<option value='$db'>$isi</option>";
						}
					}
				?>
</select>
</div></div>

</div>
<div class="modal-footer">
<button name="simpan" type="submit" class="btn btn-success btn-sm">Simpan</button>
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Keluar</button>
</div>
</form>

</div></div></div>
