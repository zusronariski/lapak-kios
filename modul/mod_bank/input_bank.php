<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=bank" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<a href="#" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> </a>
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
$nama_bank=$_POST['nama_bank'];
$no_rekening=$_POST['no_rekening'];
$nama_nasabah=$_POST['nama_nasabah'];
$cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * from bank WHERE nama='$nama' AND nama_nasabah='$nama_nasabah'");
				if(mysqli_num_rows($cek) == 0){	
$a=mysqli_query($GLOBALS["___mysqli_ston"], "insert into bank (id_bank,nama_bank,no_rekening,nama_nasabah) values ('$id_bank','$nama_bank','$no_rekening','$nama_nasabah')");
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
$id_bank=$_GET['id_bank'];
$sql="select * from bank where id_bank='$id_bank'";
$query=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$r=mysqli_fetch_array($query);
if(isset($_POST['Edit'])){
$nama_bank=$_POST['nama_bank'];
$no_rekening=$_POST['no_rekening'];
$nama_nasabah=$_POST['nama_nasabah'];

$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE bank SET nama_bank='$nama_bank',no_rekening='$no_rekening',nama_nasabah='$nama_nasabah' WHERE id_bank='$id_bank'");
if($a){
echo "<script>alert('Data Berhasil di Update!'); window.location = '?module=bank'</script>";
}
}
?>

<form action="" method="post" enctype="multipart/form-data" class="style-form">
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>Nama Bank</label>
<input id="nama_bank" name="nama_bank" type="text" class="form-control " value="<?php echo $r['nama_bank']; ?>" required="" autofocus="" data-errormessage-value-missing="nama bank masih kosong.">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>No. Rekening</label>
<input id="no_rekening" name="no_rekening" type="text" class="form-control " value="<?php echo $r['no_rekening']; ?>" required="" autofocus="" data-errormessage-value-missing="nomor rekening masih kosong.">
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<label>Nama Nasabah</label>
<input id="nama_nasabah" name="nama_nasabah" type="text" class="form-control " value="<?php echo $r['nama_nasabah']; ?>" required="" autofocus="" data-errormessage-value-missing="nama nasabah masih kosong.">
</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="form-group">
<?php if(!$_GET['id_bank']){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" class=\"btn btn-success btn-sm\" type=\"submit\" id=\"simpan\" value=\"Simpan\" />&nbsp;";
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