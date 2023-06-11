<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=kios" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel</a>
<a href="?module=input_kios" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> </a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="content">
<!---->
<?php
if(isset($_POST['simpan'])){
$kd_kios=$_POST['kd_kios'];
$nama_kios=$_POST['nama_kios'];
$biaya=$_POST['biaya'];
$status=$_POST['status'];
$keterangan=$_POST['keterangan'];

$cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios WHERE kd_kios='$kd_kios' AND nama_kios='$nama_kios'");
if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO kios (idk,kd_kios,nama_kios,status,biaya,keterangan)VALUES('','$kd_kios','$nama_kios','$status','$biaya','$keterangan')");
if($a){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Gagal Di simpan !</div>';
						}
				}else{
echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cek Kembali Isian.., Data Sudah Ada,..!</div>';
				}
			}
			
//Proses edit
$kd_kios=$_GET['kd_kios'];
$sql="select * from kios where kd_kios='$kd_kios'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
$kd_kios=$_POST['kd_kios'];
$nama_kios=$_POST['nama_kios'];
$status=$_POST['status'];
$biaya=$_POST['biaya'];
$keterangan=$_POST['keterangan'];

$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kios SET kd_kios='$kd_kios',nama_kios='$nama_kios',status='$status',biaya='$biaya',keterangan='$keterangan' WHERE kd_kios='$kd_kios'");
if($a){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil di Ubah.</div>';
}
}
?>
<?php
$querm=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios");
$num=mysqli_num_rows($querm);
$jmlh=$num+1;
$waktu='0';
$noubiaya="B-".$waktu.$jmlh;
?>
<form action="" method="post" enctype="multipart/form-data" class="style-form">
<div class="row">
<div class="col-sm-2">
<div class="form-group">
<label>Kd-Kios</label>
<?php if(!$_GET['kd_kios']){ ?>
<input id="kd_kios" name="kd_kios" type="text" class="form-control " value="<?php echo $noubiaya ?>" readonly="readonly" />
<?php  } else { ?>
<input id="kd_kios" name="kd_kios" type="text" class="form-control " value="<?php echo $r['kd_kios']; ?>" readonly="readonly" />	
<?php } ?>

</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Nama Kios</label>
<input id="nama_kios" name="nama_kios" type="text" class="form-control " value="<?php echo $r['nama_kios']; ?>" required="" autofocus="" data-errormessage-value-missing="nama kios masih kosong.">
</div>
</div>

<div class="col-sm-2">
<div class="form-group">
<label>Tarif kios</label>
<input id="biaya" name="biaya" type="text" class="form-control " value="<?php echo $r['biaya']; ?>" onkeypress="return hanyaAngka(event)" required="" autofocus="" data-errormessage-value-missing="tarif kios masih kosong.">
</div>
</div>
</div>

<div class="row">
<div class='col-sm-4'> <div class='form-group'>
<?php
    if ($r['status']=='isi'){
      echo "<label>Status kios</label><br>
                      <input name='status' type='radio' value='kosong'>
                      <label for='test2'>Kosong</label>
					  <input name='status' type='radio' value='isi' checked/>
                      <label>Terisi</label>
";				
} else{
 echo "<label>Status kios</label><br>
                      <input name='status' type='radio' value='kosong' checked/>
                      <label>Kosong</label>
					  
                      <input name='status' type='radio' value='isi' />
                      <label>Terisi</label>

";	
} ?>
</div></div>
<div class="col-sm-8">
<div class="form-group">
<label>Keterangan</label>
<input id="keterangan" name="keterangan" type="text" class="form-control " value="<?php echo $r['keterangan']; ?>" required="" autofocus="" data-errormessage-value-missing="keterangan masih kosong.">
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<?php if(!$_GET['kd_kios']){
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