<!--=============================================User==================================================-->	
<?php
if (empty ($_SESSION['akses'])) {	
?> 
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h4 class="font-weight-bold">Selamat Datang..</h4>
<h6 class="font-weight-normal mb-0"> di Aplikasi <?php echo $file['title'];?>..!</h6>
                </div>

              </div>
            </div>
          </div>
          
          
         <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover='4'");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>   

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover IN ('3','2','1')");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>     
                      
                    </div>
                    
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>

</div>
</div>
</div>
</div>

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Lapak <?php echo $file['title'];?></p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">Kios</th>
                          <th class="border-bottom pb-2">Status</th>
                           <th class="border-bottom pb-2">Tarif</th>
                        </tr>
                      </thead>
                      <tbody>
                        
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios ORDER BY idk DESC");
while($data=mysqli_fetch_array($view)){
?>
<tr>
<td class="pl-0"><?php echo $data['nama_kios'];?></td>
<td class="font-weight-medium">
<?php
	      $st = $data['status'];
	      $tp = array(
'kosong' => "<div class='badge badge-success'> Kosong</div>",
'isi' => "<div class='badge badge-danger'> Terisi</div>");
	      echo "$tp[$st]";
?></td>
<td>Rp. <?php echo number_format($data['biaya']) ?>,-</td>
</tr>
<?php
}
?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
</div>


<?php
}	
?> 

<!--==================================-->	
<?php if($akses=='1'){ ?>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
			<h3 class="font-weight-bold">Hallo.., <?php echo $ran['nama'];?></h3>
                  <h6 class="font-weight-normal mb-0">Selamat Datang di Aplikasi <?php echo $file['title'];?>..!</h6>
                </div>

              </div>
            </div>
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover='4'");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>   

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover IN ('3','2','1')");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>     
                      
                    </div>
                    
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>

</div>
</div>
</div>
</div>

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">kios <?php echo $file['title'];?></p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">kios</th>
                          <th class="border-bottom pb-2">Status</th>
                           <th class="border-bottom pb-2">Tarif</th>
                        </tr>
                      </thead>
                      <tbody>
                        
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios ORDER BY idk DESC");
while($data=mysqli_fetch_array($view)){
?>
<tr>
<td class="pl-0"><?php echo $data['nama_kios'];?></td>
<td class="font-weight-medium">
<?php
	      $st = $data['status'];
	      $tp = array(
'kosong' => "<div class='badge badge-success'> Kosong</div>",
'isi' => "<div class='badge badge-danger'> Terisi</div>");
	      echo "$tp[$st]";
?></td>
<td>Rp. <?php echo number_format($data['biaya']) ?>,-</td>
</tr>
<?php
}
?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
</div>

<?php } ?>
<!--=====admin======-->   


<?php if($akses=='2'){ ?>

          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Hallo.., <?php echo $ser['nama'];?></h3>
                  <h6 class="font-weight-normal mb-0">Selamat Datang di Aplikasi <?php echo $file['title'];?>..!</h6>
                </div>
               
              </div>
            </div>
          </div>
<?php 
$valid    = $ser['validasi'];
if($valid=='N'){
?>
<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<h4 class="card-title"><code class="highlighter-rouge">Silahkan lengkapi isian data Anda untuk memudahkan proses validasi.</code></h4>
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
$kd_kios=$_POST['kd_kios'];
$tgl_sewa = $_POST['tgl_sewa'];
$validasi = 'M';
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
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET nik='$nik',nama='$nama',email='$email',jk='$jk',alamat='$alamat',no_hp='$no_hp' ,kd_kios='$kd_kios',tgl_sewa='$tgl_sewa',validasi='$validasi' WHERE kd_penyewa='$kd_penyewa'");
if($save){
$km=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kios SET status='isi' WHERE kd_kios='$_POST[kd_kios]'");
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											Selanjutnya menunggu validasi admin..! Terima kasih..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url='>";
}else{
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal.,</span>
											Periksa kembali isian..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url='>";

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

<?php 
}elseif($valid=='M'){   	
?>
<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
<span class='badge badge-pill badge-danger'>Data Anda dalam proses validasi,,</span>
</div>
<?php 
}elseif($valid=='X'){   	
?>
<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
<span class='badge badge-pill badge-danger'>Permintaan Anda di Tolak atau Data Anda Tidak Valid,,!</span>
</div>
<?php 
}elseif($valid=='Y'){   	
?>
 <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover='4'");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>   

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover WHERE id_cover IN ('3','2','1')");
while($data=mysqli_fetch_array($view)){
?>                  
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-12">
                            <div class="row">
                            
                              
                              <div class="col-md-12 mt-3">

<div class="card-people mt-auto">

                  <img src="images/cover/<?php echo $data['foto']; ?>" />
                  <div class="weather-info">
                    <div class="d-flex">
                      <div class="ml-2">
                        <h6 class="font-weight-normal"><?php echo $data['judul']; ?></h6>
                      </div>
                    </div>
				</div>

</div>
                              </div>
                              

                              
                              
                            </div>
                          </div>
                        </div>
                      </div>
<?php
}
?>     
                      
                    </div>
                    
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>

</div>
</div>
</div>
</div>

            <div class="col-md-6 stretch-card grid-margin">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">kios <?php echo $file['title'];?></p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th class="pl-0  pb-2 border-bottom">kios</th>
                          <th class="border-bottom pb-2">Status</th>
                           <th class="border-bottom pb-2">Tarif</th>
                        </tr>
                      </thead>
                      <tbody>
                        
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios ORDER BY idk DESC");
while($data=mysqli_fetch_array($view)){
?>
<tr>
<td class="pl-0"><?php echo $data['nama_kios'];?></td>
<td class="font-weight-medium">
<?php
	      $st = $data['status'];
	      $tp = array(
'kosong' => "<div class='badge badge-success'> Kosong</div>",
'isi' => "<div class='badge badge-danger'> Terisi</div>");
	      echo "$tp[$st]";
?></td>
<td>Rp. <?php echo number_format($data['biaya']) ?>,-</td>
</tr>
<?php
}
?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
</div>

<?php 
}  	
?>
          
 
<?php } ?>
<!--=====member======-->   

<script src="js/civem.js"></script>