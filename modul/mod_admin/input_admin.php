<div class="col-md-12">
<div class="card">
<div class="header">
<h5 class="title">INPUT & UPDATE DATA ANDA</h5>
</div>
<hr />
<div class="content">
<?php
if(isset($_POST['simpan'])){
$first_name=$_POST['first_name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$foto=$_FILES['foto']['name'];
$akses='2';
 if(strlen($foto)>0){ 
 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"foto_admin/".$foto);
	}
}
  $cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_admin WHERE email='$email'");
  if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "insert into user_admin values('','$first_name','$email','$password','$foto','$akses')");
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
$id_admin=$_GET['id_admin'];
$sql="select * from user_admin where id_admin='$id_admin'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
$first_name=$_POST['first_name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$foto=$_FILES['foto']['name'];
$akses='1';
 if(strlen($foto)>0){ 
 
 	if(is_uploaded_file($_FILES['foto']['tmp_name'])){
	move_uploaded_file($_FILES['foto']['tmp_name'],"../../foto_admin/".$foto);
	}
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "update user_admin set foto='$foto' where id_admin='$id_admin'");
}
if (!empty($_POST['password'])){
$password = md5($_POST['password']);
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE user_admin SET first_name='$first_name',email='$email',password='$password',akses='$akses' WHERE id_admin='$id_admin'");
if($a){
echo "<script>alert('Data Berhasil di Update!'); window.location = 'media.php'</script>";
}
 }else{
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE user_admin SET first_name='$first_name',email='$email',akses='$akses' WHERE id_admin='$id_admin'");
if($a){
echo "<script>alert('Data Berhasil di Update!'); window.location = 'media.php'</script>";
}
}
}
?>

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Nama Lengkap</label>
<div class="col-sm-3">
<input id="first_name" name="first_name" type="text" class="form-control round-form" placeholder="Nama Lengkap" required="" value="<?php echo $r['first_name']; ?>" />
</div></div>
            
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">email</label>
<div class="col-sm-3">
<input id="email" name="email" type="text" class="form-control round-form" placeholder="email" required="" value="<?php echo $r['email']; ?>" />
</div></div>
            
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Password</label>
<div class="col-sm-3">
<input id="password" name="password" type="password" class="form-control round-form" placeholder="Password" />
              <?php
if($_GET['id_admin']){
echo "<br><font color='red'>Apabila password tidak diubah, silahkan dikosongkan saja</font>";
}
?>
</div></div>
            
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Foto</label>
<div class="col-sm-10">
 <?php if($_GET['id_admin']){
				//tampilkan foto saat mau ngedit
				 echo "<img src='foto_admin/$r[foto]' width=110 height=110> <br />";
				} 
				?>
				  <input name="foto" type="file" id="foto" />
</div>    
</div>

<div class="form-group">
<div class="col-sm-10">
<?php if(!$_GET['id_admin']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-success btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
		echo "<input name=\"batal\" class=\"btn btn-danger btn-sm\" type=\"reset\" id=\"batal\" value=\"Batal\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" class=\"btn btn-info btn-sm\" type=\"submit\" id=\"edit\" value=\"Edit\" />";
} ?>
</div></div>

</form>
<!---->
</div>
</div><!-- col-lg-12-->      	
</div><!-- /row -->

<script src="js/civem.js"></script>