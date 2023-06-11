<div class="row">
<div class="col-lg-12 stretch-card">
<div class="card">
<div class="card-header">
<a href="media.php"><button class='btn btn-danger btn-sm '><i class="ti-home"></i></button></a> <a href="?module=cover"> <button class='btn btn-primary btn-sm '><i class="ti-layout"></i></button></a>
</div>         
<div class="card-body">
<?php
if(isset($_POST['simpan'])){
$judul=$_POST['judul'];
$foto=$_FILES['foto']['name'];
 if(strlen($foto)>0){ 
 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"images/cover/".$foto);
	}
}
  $cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE judul='$judul'");
  if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "insert into cover values('','$judul','$foto')");
if($a){
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Kembali Isian.., Data Sudah Ada,..!</div>';
				}
			}
			
//Proses edit
$id_cover=$_GET['id_cover'];
$sql="select * from cover where id_cover='$id_cover'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
$judul=$_POST['judul'];
$foto=$_FILES['foto']['name'];
 if(strlen($foto)>0){ 
 unlink("images/cover/$r[foto]"); 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"images/cover/".$foto);
	}
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE cover SET foto='$foto' where id_cover='$id_cover'");
}
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE cover SET judul='$judul' WHERE id_cover='$id_cover'");
if($modal){
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Update.</div>';
}else{
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
}
echo "<meta http-equiv='refresh' content='2; url=?module=cover'>";
}
?>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
	<label class="control-label col-lg-2 col-lg-2">Judul</label>
	<div class="col-lg-6">
<input id="judul" name="judul" type="text" class='form-control' required='' data-errormessage-value-missing='judul masih kosong' value="<?php echo $r['judul']; ?>"/>
</div></div>

<div class="form-group">
<?php if($_GET['id_cover']){ 
$foto=$r['foto'];
if(empty($foto)){
?>
<span class="status--denied">Belum ada foto</span>
<p>Upload foto max file 2MB</p>
<?php
} else{
?>
<div class="col-lg-6">
<img src="<?php echo "images/cover/".$foto; ?>" height="140" width="180" />
<p>Ganti foto max file 2MB.</p>
</div>
<?php } } ?>
<div class="col-lg-4">
<p>Upload foto max file 2MB</p>
<input type="file" name="foto" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />  
</div>
</div>
<div style="text-align:left" class="form-actions no-margin-bottom">
<?php if(!$_GET['id_cover']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-success btn-sm btn-grad btn-rect\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-warning btn-sm btn-grad btn-rect\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-primary btn-sm btn-grad btn-rect\" type=\"submit\" id=\"edit\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-warning btn-sm btn-grad btn-rect\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
} ?>
</div>
</form>
 	<!---->
</div>
</div>
</div>
</div>
<!--//grid-->
<script src="js/civem.js"></script>