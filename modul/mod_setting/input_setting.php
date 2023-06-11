<div class="row">
<div class="col-lg-12 stretch-card">
<div class="card">
<div class="card-header">
<a href="media.php"><button class='btn btn-danger btn-sm '><i class="ti-home"></i></button></a> <a href="?module=setting"> <button class='btn btn-primary btn-sm '><i class="ti-layout"></i></button></a>
</div>         
<div class="card-body">
<?php
$id=$_GET['id'];
$sql="select * from setting_web where id='$id'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
$title=$_POST['title'];
$keyword=$_POST['keyword'];
$email=$_POST['email'];
$telp=$_POST['telp'];
$fb=$_POST['fb'];
$twit=$_POST['twit'];
$alamat=$_POST['alamat'];
$logo=$_FILES['logo']['name'];
 if(strlen($logo)>0){ 
  unlink("images/$r[logo]"); 
 	if(is_uploaded_file($_FILES['logo']['tmp_name'])){
	move_uploaded_file($_FILES['logo']['tmp_name'],"images/".$logo);
	}
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "update user_admin set logo='$logo' where id_admin='$id_admin'");
}
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE setting_web SET title='$title',
keyword='$keyword',email='$email',telp='$telp',fb='$fb',twit='$twit',alamat='$alamat',logo='$logo' WHERE id='$id'");
if($a){
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
}else{
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
}
echo "<meta http-equiv='refresh' content='1; url=?module=setting'>";
}
?>

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

<div class="form-group">
<label class="col-sm-2 control-label">Title Web</label>
<div class="col-sm-4">
<input id="title" name="title" type="text" required="true" value="<?php echo $r['title']; ?>" class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Keyword Web</label>
<div class="col-sm-4">
<input id="keyword" name="keyword" type="text" required="true" value="<?php echo $r['keyword']; ?>" class="form-control"/>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Alamat Email</label>
<div class="col-sm-4">
<input id="email" name="email" type="text" required="true" value="<?php echo $r['email']; ?>" class="form-control"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">No Telepon</label>
<div class="col-sm-4">
<input name="telp" id="telp" required="true" value="<?php echo $r['telp']; ?>" class="form-control"/>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Alamat Facebook</label>
<div class="col-sm-6">
<input id="fb" name="fb" type="text" required="true" value="<?php echo $r['fb']; ?>" class="form-control"/>
</div>
</div>
 <div class="form-group">
<label class="col-sm-2 control-label">Alamat Twiter</label>
<div class="col-sm-6">
<input id="twit" name="twit" type="text" required="true" value="<?php echo $r['twit']; ?>" class="form-control"/>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Alamat</label>
<div class="col-sm-9">
<input id="alamat" name="alamat" type="text" required="true" value="<?php echo $r['alamat']; ?>" class="form-control"/>
</div>
</div>

<div class="form-group">      
<label class="col-sm-2 control-label">Logo</label>
<div class="col-sm-4">
 <?php if($_GET['id']){
				//tampilkan logo saat mau ngedit
				 echo "<img src='images/$r[logo]' width='110' height='110' style='border: 3px solid #DDD;'> <br />";
				} 
				?>
				  <input name="logo" type="file" id="logo" />
</div> 
</div>


<div class="form-group">
<?php if(!$_GET['id']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-primary btn-sm\" type=\"submit\" id=\"edit\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
} ?>
</div>

</form>

</div></div></div>
</div>
<!--//grid-->
<script src="js/civem.js"></script>