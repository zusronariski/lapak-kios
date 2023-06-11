<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=pembayaran" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
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
if(isset($_POST['simpan'])){
$kd_penyewa=$_POST['kd_penyewa'];
$kd_kios=$_POST['kd_kios'];
$jumlah=$_POST['jumlah'];
$tgl= $_POST['tgl'];
$kode_transfer=$_POST['kode_transfer'];
$id_bank=$_POST['id_bank'];
$bukti=$_FILES['bukti']['name'];
if(strlen($bukti)>0){
 
 	if(is_uploaded_file($_FILES['bukti']['tmp_name'])){
	move_uploaded_file($_FILES['bukti']['tmp_name'],"images/bukti/".$bukti);
	}
}
$cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from pembayaran WHERE kd_penyewa='$kd_penyewa' AND kode_transfer='$kode_transfer'");
if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "insert into pembayaran(id_pembayaran,kd_penyewa,kd_kios,jumlah,tgl,kode_transfer,id_bank,bukti)values('','$kd_penyewa','$kd_kios','$jumlah','$tgl','$kode_transfer','$id_bank','$bukti')");
if($a){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
						}
				}else{
echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Kembali Isian.., Data Sudah Ada,..!</div>';
				}
			}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Penyewa Kios</label>
<select id="kd_penyewa" name="kd_penyewa" class="form-control" onchange="changeValue(this.value)">
<option value="">Pilih..</option>
<?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE aktif='Y'");
$jsArray = "var dtpg = new Array();\n";  
while ($row = mysqli_fetch_array($query)) {
?>
<option id="kd_penyewa" class="<?php echo $row['kd_penyewa']; ?>" value="<?php echo $row['kd_penyewa']; ?>">
<?php echo $row['nama']; 
$jsArray .= "dtpg['" . $row['kd_penyewa'] . "'] = {kd_kios:'" . addslashes($row['kd_kios'])."'};\n";   ?>
</option>
<?php } ?>
</select>

</div>
</div>
<div class="col-sm-4">
<div class="form-group">
<label>KD-Kios</label>
<input id="kd_kios" name="kd_kios" type="text" class="form-control " value="<?php echo $row['kd_kios']; ?>" readonly="readonly" />
</div>
</div>
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>Tanggal Pembayaran</label>
<input name="tgl" type="text" class="form-control " required="" value="<?php echo date("Y-m-d"); ?>" readonly="readonly" />
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
<label>Kode Pembayaran</label>
<input id="kode_transfer" name="kode_transfer" type="text" class="form-control" required="" value="<?php echo $r['kode_transfer']; ?>"/>
</div>
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

<div class="col-sm-4">
<div class="form-group">
<label>Bukti Pembayaran</label>
<input type="file" name="bukti" id="input-file-max-fs" class="dropify" data-max-file-size="2M" required="" data-errormessage-value-missing="bukti transfer masih kosong, inputkan file bukti" />
</div>
</div>

<div class="form-group">
<div class="col-sm-10">
<?php if(!$_GET['kd_penyewa']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-success btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"edit\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
} ?>
</div></div>

</form>
</div>
</div>      	
</div>
</div>


<script type="text/javascript">   
<?php echo $jsArray; ?> 
function changeValue(kd_penyewa){ 
document.getElementById('kd_kios').value = dtpg[kd_penyewa].kd_kios; 
}; 
</script>

<script>
function hanyaAngka(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>