<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=data_pembayaran&kd_penyewa=<?php echo $ser['kd_penyewa'];?>" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<a href="#" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> </a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="content">
<?php
if(isset($_POST['simpan'])){
$kd_penyewa=$_POST['kd_penyewa'];
$kd_kios=$_POST['kd_kios'];
$jumlah=$_POST['jumlah'];
$tgl= $_POST['tgl'];
$kode_transfer = $_POST['kode_transfer'];
$id_bank=$_POST['id_bank'];
$bukti=$_FILES['bukti']['name'];
$status='belum';
if(strlen($bukti)>0){
 
 	if(is_uploaded_file($_FILES['bukti']['tmp_name'])){
	move_uploaded_file($_FILES['bukti']['tmp_name'],"images/bukti/".$bukti);
	}
}
$cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pembayaran WHERE kd_penyewa='$kd_penyewa' AND kode_transfer='$kode_transfer'");
if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pembayaran(id_pembayaran,kd_penyewa,kd_kios,jumlah,tgl,kode_transfer,id_bank,bukti,status)VALUES('','$kd_penyewa','$kd_kios','$jumlah','$tgl','$kode_transfer','$id_bank','$bukti','$status')");
if($a){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
						}
				}else{
echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Kembali Isian.., Kode Transfer Sudah Pernah Terpakai,..!</div>';
				}
			}
?>
<?php 
$query1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE kd_penyewa='$_GET[kd_penyewa]'");
$r=mysqli_fetch_array($query1);	 ?>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>KD-Kios</label>
<input id="kd_kios" name="kd_kios" type="text" class="form-control" value="<?php echo $r['kd_kios']; ?>" readonly="readonly" />
</div>
</div>
<div class="col-sm-7">
<div class="form-group">
<label>Nama Penyewa</label>
<input type="text" class="form-control" value="<?php echo $r['nama']; ?>" readonly="readonly" />
<input id="kd_penyewa" name="kd_penyewa" type="hidden" class="form-control" value="<?php echo $r['kd_penyewa']; ?>" />
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>Tanggal Pembayaran</label>
<input name="tgl" type="text" class="form-control" required="" value="<?php echo date("Y-m-d"); ?>" readonly="readonly" />
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label>Jumlah Bulan</label>
<input id="jumlah" name="jumlah" type="text" class="form-control" value="<?php echo $r['jumlah']; ?>" maxlength="2" onkeypress="return hanyaAngka(event)" required="" autofocus="" data-errormessage-value-missing="isikan dengan angka.">
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<label>Bank Tujuan</label>
<select name="id_bank" id="id_bank" class="form-control">
<?php
$qp = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM bank");
while($mk=mysqli_fetch_array($qp)){
	if ($r['id_bank']==$mk['id_bank']){
echo "<option value='$mk[id_bank]' selected>$mk[nama_bank]</option>";
	}else{
echo "<option value='$mk[id_bank]'>$mk[nama_bank]</option>";
	}
	}
?>
</select>
</div>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Kode-Transfer</label>

<input id="kode_transfer" name="kode_transfer" type="text" class="form-control" value="<?php echo $r['kode_transfer']; ?>" required="" autofocus="" data-errormessage-value-missing="kode transfer masih kosong, inputkan kode" />
</div>
</div>

<div class="col-sm-4">
<div class="form-group">
<label>Bukti Transfer</label>
<input type="file" name="bukti" id="input-file-max-fs" class="dropify" data-max-file-size="2M" required="" data-errormessage-value-missing="bukti transfer masih kosong, inputkan file bukti" />
</div>
</div>


<div class="col-md-4">
<div class="form-group">
<input name="simpan" class="btn btn-primary btn-sm" type="submit" id="simpan" value="Simpan" />
<input name="batal" class="btn btn-danger btn-sm" type="reset" id="batal" value="Batal" />
</div></div>

</form>
</div>
</div><!-- col-lg-12-->      	
</div><!-- /row -->
</div>
<script>
function hanyaAngka(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>

<script src="js/civem.js"></script>
