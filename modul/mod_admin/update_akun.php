<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<h4 class="card-title"><code class="highlighter-rouge">Update Data Profil</code></h4>
<div class="content">
<?php		
//Proses edit
$kd_penyewa=$ser['kd_penyewa'];
$sql="select * from penyewa where kd_penyewa='$kd_penyewa'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['simpan'])){
$kd_penyewa=$_POST['kd_penyewa'];
$nik=$_POST['nik'];
$nama=ucwords(htmlentities($_POST['nama']));
$ktp=$_FILES['ktp']['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$foto=$_FILES['foto']['name'];

 if(strlen($ktp)>0){
 
 	if(is_uploaded_file($_FILES['ktp']['tmp_name'])){
	move_uploaded_file($_FILES['ktp']['tmp_name'],"images/ktp/".$ktp);
	}
$save=mysqli_query($GLOBALS["___mysqli_ston"], "update penyewa set ktp='$ktp' where kd_penyewa='$kd_penyewa'");
}
$foto=$_FILES['foto']['name'];
 if(strlen($foto)>0){
 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"images/penyewa/".$foto);
	}
$save=mysqli_query($GLOBALS["___mysqli_ston"], "update penyewa set foto='$foto' where kd_penyewa='$kd_penyewa'");
}
if (!empty($_POST['password'])){
$password = md5($_POST['password']);
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET nik='$nik',nama='$nama',email='$email',password='$password',jk='$jk',alamat='$alamat',no_hp='$no_hp' WHERE kd_penyewa='$kd_penyewa'");
if($save){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											Berhasil di ubah..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";
}
}else{
	 $save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET nik='$nik',nama='$nama',email='$email',jk='$jk',alamat='$alamat',no_hp='$no_hp' WHERE kd_penyewa='$kd_penyewa'");
if($save){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											Berhasil di ubah..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";
}
}
}
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-2">
<div class="form-group">
<label>KD-penyewa</label>
<input id="kd_penyewa" name="kd_penyewa" type="text" class="form-control " value="<?php echo $r['kd_penyewa']; ?>" readonly="readonly" />	
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label>NIK</label>
<input id="nik" name="nik" type="text" class="form-control " value="<?php echo $r['nik']; ?>" onkeypress="return hanyaAngka(event)" required="" autofocus="" data-errormessage-value-missing="NIK masih kosong.">
</div>	
</div>

<div class="col-md-6">
<div class="form-group">
<label>Nama Penyewa</label>
<input id="nama" name="nama" type="text" class="form-control" value="<?php echo $r['nama']; ?>" required="" autofocus="" data-errormessage-value-missing="nama penyewa masih kosong.">
</div>
</div>
</div>


<div class="row">
<div class="col-md-2">
<div class="form-group">
<label>Jenis Kelamin</label>
<select class="form-control" name="jk" id="jk" required="" data-errormessage-value-missing="pilih salah satu..">
<option value=""> --Pilih--</option>
				<?php
					$arjk = array(
						'Laki-Laki' => "Laki-Laki",
						'Perempuan' => "Perempuan"
					);
					foreach ($arjk as $db => $isi) {
						if ($r['jk']==$db){
							echo "<option value='$db' selected>$isi</option>";
						}else{
							echo "<option value='$db'>$isi</option>";
						}
					}
				?>
</select>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label>No. HP/WA</label>
<input id="no_hp" name="no_hp" type="text" class="form-control " value="<?php echo $r['no_hp']; ?>" onkeypress="return hanyaAngka(event)" required="" autofocus="" data-errormessage-value-missing="No. HP penyewa masih kosong.">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>E-Mail</label>
<input id="email" name="email" type="email" class="form-control " value="<?php echo $r['email']; ?>" required="" autofocus="" data-errormessage-value-missing="email penyewa masih kosong.">
</div>
</div>
</div>
<div class="row">
<div class="col-md-11">
<div class="form-group">
<label>Alamat/Tempat Asal</label>
<input id="alamat" name="alamat" type="text" class="form-control " value="<?php echo $r['alamat']; ?>" required="" autofocus="" data-errormessage-value-missing="alamat asal penyewa masih kosong.">
</div>
</div>
</div>
<div class="row">
<?php
$ktp=$r['ktp'];
if(empty($ktp)){
?>

<div class="col-sm-4">
<div class="form-group">
<label>Foto Copy KTP</label>
<input type="file" name="ktp" id="input-file-max-fs" class="dropify" data-max-file-size="2M" required="" data-errormessage-value-missing="Foto Copy KTP masih kosong...">
</div>
</div>
<?php
}else{
?>

<div class="col-sm-4">
<div class="form-group">
<img class="mx-auto d-block" src="<?php echo "images/ktp/".$ktp; ?>" height="120" width="160" alt="User">
<label>Ganti KTP</label>
<input type="file" name="ktp" id="input-file-max-fs" class="dropify" data-max-file-size="2M">
</div>
</div>
<?php } ?>




<?php 
$foto=$r['foto'];
if(empty($foto)){
?>
<div class="col-sm-4">
<div class="form-group">
<label>Foto</label>
<input type="file" name="foto" id="input-file-max-fs" class="dropify" data-max-file-size="2M" required="" data-errormessage-value-missing="Foto masih kosong...">
</div>
</div>
<?php
}else{
?>
<div class="col-sm-4">
<div class="form-group">
<img class="mx-auto d-block" src="<?php echo "images/penyewa/".$foto; ?>" height="120" width="100" alt="User">
<label>Ganti Foto</label>
<input type="file" name="foto" id="input-file-max-fs" class="dropify" data-max-file-size="2M">  
</div>
</div>
<?php } ?>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label>Password</label>
<input id="password" name="password" type="password" class="form-control " />
              <?php
if($_GET['kd_penyewa']){
echo "<br><font color='red'>Apabila password tidak diubah, silahkan dikosongkan saja</font>";
}
?>
</div>
</div></div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<input name="simpan" class="btn btn-primary btn-sm" type="submit" id="simpan" value="Simpan" />
<input name="batal" class="btn btn-danger btn-sm" type="reset" id="batal" value="Batal" />
</div></div></div>

</form>
</div>
</div>     	
</div>
</div>
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