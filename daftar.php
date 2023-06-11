<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "include/koneksi.php";
$setting=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM setting_web");
$file=mysqli_fetch_array($setting);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Daftar-Member</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/<?php echo $file['logo']; ?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-3 px-2 px-sm-3">
              <div class="brand-logo">
               <a href="index.php"><img src="images/brand.png" alt="logo"></a>
              </div>
              <h4>Member Baru.?</h4>
              <h6 class="font-weight-light">Lengkapi isian form berikut..</h6>
              <?php
			if(isset($_POST['daftar'])){
			$kd_penyewa=$_POST['kd_penyewa'];
			$nik=$_POST['nik'];
			$nama=ucwords(htmlentities($_POST['nama']));
$ktp=$_POST['ktp'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$jk=$_POST['jk'];
$alamat=$_POST['alamat'];
$no_hp=$_POST['no_hp'];
$foto=$_POST['foto'];
$kd_kios=$_POST['kd_kios'];
$tgl_sewa=$_POST['tgl_sewa'];
$aktif ='Y';
$akses ='2';
$validasi ='N';
$tgl_daftar = $_POST['tgl_daftar'];
  $cek = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE nik='$nik' AND email='$email'");
  if(mysqli_num_rows($cek) == 0){
$masuk=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO penyewa (id,kd_penyewa,nik,nama,ktp,email,password,jk,alamat,no_hp,foto,kd_kios,tgl_sewa,aktif,akses,validasi,tgl_daftar)VALUES('','$kd_penyewa','$nik','$nama','$ktp','$email','$password','$jk','$alamat','$no_hp','$foto','$kd_kios','$tgl_sewa','$aktif','$akses','$validasi','$tgl_daftar')");
if($masuk){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Registrasi,</span>
											Sukses..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='2; url=signin.php'>";
						}else{
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal..!!</span>
											Menyimpan data, ulangi lagi
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
						}
				}else{
echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal..!!</span>
											Email sudah digunakan, coba yang lain...
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
				}
			}
?>
<?php
$querm=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa");
$num=mysqli_num_rows($querm);
$jmlh=$num+1;
$waktu=date('my-');
$nounik="PW-".$waktu.$jmlh;
?>
<form class="pt-3" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
<input type="hidden" name="tgl_daftar" value="<?php echo $tgl=date("Y-m-d"); ?> <?php echo $jam = date("H:i:s"); ?>"> 
<input id="kd_penyewa" name="kd_penyewa" type="hidden" value="<?php echo $nounik ?>">
                  <input type="text" class="form-control form-control-sm" name="nik" placeholder="NIK" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="nik masih kosong">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="nama" placeholder="Nama Lengkap" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="nama masih kosong">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-sm" name="email" placeholder="E-mail" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="email masih kosong">
                </div>
                                <div class="form-group">
                                  
<input type="text" name="no_hp" class="form-control form-control-sm" placeholder="Nomor HP" maxlength="12" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="nomor hp masih kosong" onkeypress="return hanyaAngka(event)">
                                </div>
                                <div class="form-group">
<input type="text" name="alamat" class="form-control form-control-sm" placeholder="Alamat/Tempat Asal" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="alamat masih kosong">
                                </div>
<div class="form-group">
<input type="password" class="form-control form-control-sm" name="password" placeholder="Password" required="" data-errormessage-value-missing="password masih kosong">
                </div>

                <div class="mt-2">
               <button class="btn btn-block btn-primary btn-sm font-weight-medium auth-form-btn" type="submit" name="daftar">Daftar</button>
                </div>
                <div class="text-center mt-2 font-weight-light">
                 Sudah punya akun.? <a href="signin.php" class="text-primary">Login Disini</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/civem.js"></script>
  <script>
function hanyaAngka(evt) {
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>
  <!-- endinject -->
</body>

</html>
