<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<?php if($akses=='1'){ ?>
<a href="?module=pembayaran" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<?php } ?>
<?php if($akses=='2'){ ?>
<a href="?module=data_pembayaran&kd_penyewa=<?php echo $ser['kd_penyewa'];?>" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<?php } ?>
<a href="#" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i></a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="content">
<?php
$id_pembayaran=$_GET['id_pembayaran'];
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from pembayaran where id_pembayaran='$id_pembayaran'");
$r=mysqli_fetch_array($sql);
if(isset($_POST['Edit'])){
$id_pembayaran=$_POST['id_pembayaran'];
$kd_kios=$_POST['kd_kios'];
$jumlah=$_POST['jumlah'];
$tgl= $_POST['tgl'];
$kode_transfer=$_POST['kode_transfer'];
$id_bank=$_POST['id_bank'];
$bukti=$_FILES['bukti']['name'];
if(strlen($bukti)>0){
 unlink("images/bukti/$r[bukti]"); 
 	if(is_uploaded_file($_FILES['bukti']['tmp_name'])){
	move_uploaded_file($_FILES['bukti']['tmp_name'],"images/bukti/".$bukti);
	}
$ok=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pembayaran SET bukti='$bukti' WHERE id_pembayaran='$id_pembayaran'");
}
$ok=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pembayaran SET kd_kios='$kd_kios',jumlah='$jumlah',tgl='$tgl',
kode_transfer='$kode_transfer',id_bank='$id_bank' WHERE id_pembayaran='$id_pembayaran'");
if($ok){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
echo "<meta http-equiv='refresh' content='3; url=media.php'>";
}
}
?>

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>KD-Kios</label>
<input id="kd_kios" name="kd_kios" type="text" class="form-control" value="<?php echo $r['kd_kios']; ?>" readonly="readonly" />
</div>
</div>

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
</div>

<div class="row">
<div class="col-sm-5">
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

<div class="col-sm-4">
<div class="form-group">
<label>Kode-Transfer</label>
<input id="kode_transfer" name="kode_transfer" type="text" class="form-control" value="<?php echo $r['kode_transfer']; ?>" required="" autofocus="" data-errormessage-value-missing="kode transfer masih kosong, inputkan kode" />
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>Bukti Pembayaran</label>
<br />
<?php if($_GET['id_pembayaran']){
echo "<img src='images/bukti/$r[bukti]' width=280 height=200 style='border: 3px solid #DDD;'>";
} 
?>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>Ubah Bukti Pembayaran</label>
<input type="file" name="bukti" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
</div>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
<?php if(!$_GET['id_pembayaran']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-success btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"edit\" value=\"Update\" />";
} ?>
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