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
  <title>Login Admin</title>
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
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
               <a href="index.php"><img src="images/brand.png" alt="logo"></a>
              </div>
              <h4>Hello..! Admin</h4>
              <h6 class="font-weight-light">Silahkan Login..</h6>
<?php
if(isset($_POST['simpan'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$query=mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_admin where username='$username' and password='$password'");
	$num=mysqli_num_rows($query);
	$r=mysqli_fetch_array($query);
	
	if($num >= 1){
		$_SESSION['id_admin']=$r['id_admin'];
		$_SESSION['akses']=$r['akses'];
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-success'>Sukses.,</span> Login..!
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='2; url=media.php'>";
	}else{
echo "<div class='sufee-alert alert with-close alert-danger alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal..!!</span>
											Ulangi Lagi...
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='2; url='>";
	}
}
?>
              <form class="pt-3" action="" method="post">
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="isian masih kosong">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" autocomplete="off" required="" autofocus="" data-errormessage-value-missing="isian masih kosong">
                </div>
                <div class="mt-3">
                 <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="simpan" type="submit">Login</button>
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
  <!-- endinject -->
</body>

</html>
