<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=penyewa" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<a href="?module=input_penyewa" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> </a>
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
$nik=$_POST['nik'];
$nama=ucwords(htmlentities($_POST['nama']));
$ktp=$_FILES['ktp']['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$foto=$_FILES['foto']['name'];
$kd_kios=$_POST['kd_kios'];
$tgl_sewa=date("Y-m-d");
$aktif ='Y';
$akses ='2';
$validasi ='Y';
$tgl_daftar = $_POST['tgl_daftar'];
 if(strlen($ktp)>0){
 
 	if(is_uploaded_file($_FILES['ktp']['tmp_name'])){
	move_uploaded_file($_FILES['ktp']['tmp_name'],"images/ktp/".$ktp);
	}
}
$foto=$_FILES['foto']['name'];
 if(strlen($foto)>0){
 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"images/penyewa/".$foto);
	}
}
$cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from penyewa WHERE nik='$nik' AND email='$email'");
if(mysqli_num_rows($cek) == 0){	
$masuk=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO penyewa (id,kd_penyewa,nik,nama,ktp,email,password,jk,alamat,no_hp,foto,kd_kios,tgl_sewa,aktif,akses,validasi,tgl_daftar)VALUES('','$kd_penyewa','$nik','$nama','$ktp','$email','$password','$jk','$alamat','$no_hp','$foto','$kd_kios','$tgl_sewa','$aktif','$akses','$validasi','$tgl_daftar')");
if($masuk){
$a=mysqli_query($GLOBALS["___mysqli_ston"], "update kios set status='isi' where kd_kios='$_POST[kd_kios]'");
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
						}
				}else{
echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Kembali Isian.., Data Sudah Ada,..!</div>';
				}
			}
			
//Proses edit
$kd_penyewa=$_GET['kd_penyewa'];
$sql="select * from penyewa where kd_penyewa='$kd_penyewa'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
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
$kd_kios=$_POST['kd_kios'];
$tgl_sewa = $_POST['tgl_sewa'];
 if(strlen($ktp)>0){
 unlink("images/ktp/$r[ktp]"); 
 	if(is_uploaded_file($_FILES['ktp']['tmp_name'])){
	move_uploaded_file($_FILES['ktp']['tmp_name'],"images/ktp/".$ktp);
	}
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET ktp='$ktp' WHERE kd_penyewa='$kd_penyewa'");
}
$foto=$_FILES['foto']['name'];
 if(strlen($foto)>0){
 unlink("images/penyewa/$r[foto]"); 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"images/penyewa/".$foto);
	}
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET foto='$foto' WHERE kd_penyewa='$kd_penyewa'");
}
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET nik='$nik',nama='$nama',email='$email',jk='$jk',alamat='$alamat',no_hp='$no_hp' ,kd_kios='$kios',tgl_sewa='$tgl_sewa' WHERE kd_penyewa='$kd_penyewa'");
if($a){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
}else{
echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';

}
}
?>
<?php
$querm=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa");
$num=mysqli_num_rows($querm);
$jmlh=$num+1;
$waktu=date('my');
$nounik="SW-".$waktu.$jmlh;
?>

<form action="" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-sm-2">
<div class="form-group">
<label>KD-Penyewa</label>
<?php if(!$_GET['kd_penyewa']){ ?>
<input id="kd_penyewa" name="kd_penyewa" type="text" class="form-control " value="<?php echo $nounik ?>" readonly="readonly" />
<?php  } else { ?>
<input id="kd_penyewa" name="kd_penyewa" type="text" class="form-control " value="<?php echo $r['kd_penyewa']; ?>" readonly="readonly" />	
<?php } ?>
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label>NIK</label>
<input type="hidden" name="tgl_daftar" value="<?php echo $tgl=date("Y-m-d"); ?> <?php echo $jam = date("H:i:s"); ?>"> 
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
<select class="form-control" name="jk" id="jk">
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
<input type="file" name="ktp" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />  
</div>
</div>
<?php
}else{
?>

<div class="col-sm-4">
<div class="form-group">
<img class="mx-auto d-block" src="<?php echo "images/ktp/".$ktp; ?>" height="120" width="160" alt="User">
<label>Ganti KTP</label>
<input type="file" name="ktp" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />  
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
<input type="file" name="foto" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />  
</div>
</div>
<?php
}else{
?>
<div class="col-sm-4">
<div class="form-group">
<img class="mx-auto d-block" src="<?php echo "images/penyewa/".$foto; ?>" height="120" width="100" alt="User">
<label>Ganti Foto</label>
<input type="file" name="foto" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />  
</div>
</div>
<?php } ?>
</div>

<div class="row">
<?php if(!$_GET['kd_penyewa']){ ?>
<div class="col-sm-2">
<div class="form-group">
<label>Pilih kios</label>
<select name="kd_kios" id="kd_kios" class="form-control">
<?php
$qp = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios WHERE status='kosong'");
while($mk=mysqli_fetch_array($qp)){
	if ($r['kd_kios']==$mk['kd_kios']){
echo "<option value='$mk[kd_kios]' selected>$mk[nama_kios]</option>";
	}else{
echo "<option value='$mk[kd_kios]'>$mk[nama_kios]</option>";
	}
	}
?>
</select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label>Password</label>
<input id="password" name="password" type="password" class="form-control " required="" autofocus="" data-errormessage-value-missing="password masih kosong.">
</div>
</div>
<?php  } else { ?>

<?php } ?>


</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<?php if(!$_GET['kd_penyewa']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"edit\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
} ?>
</div></div></div>

</form>
</div>
</div><!-- col-lg-12-->      	
</div><!-- /row -->
<script>
function hanyaAngka(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>

<script src="js/civem.js"></script>