<!--=============================================User==================================================-->	
<?php
if (empty ($_SESSION['akses'])) {	
?> 
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
			<img src="foto_admin/akun.png" alt="Default" />
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="signin.php">
                <i class="ti-user text-primary"></i>
                Akses Penyewa
              </a>
              <a class="dropdown-item" href="login.php">
                <i class="ti-key text-primary"></i>
              Akses Admin
              </a>
            </div>
          </li>
<?php
}	
?> 
<!--=============================================End User==================================================-->	
<!--=============================================Admin==================================================-->	
<?php if($akses=='1'){ ?>
<li class="nav-item dropdown">
<?php
$con =  mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE sudahbaca='N'"));
?>
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="icon-mail mx-0"><span class="badge badge-primary"> <?php echo $con ?></span></i>
                </a>
                
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0 font-weight-semibold"><?php echo $con ?> Pesan</h6>
<?php
$qr = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE sudahbaca='N'");
	while($dv = mysqli_fetch_array($qr)){
 $input = tgl_indo($dv['tgl_kirim']);
			 $date1 = "$dv[tgl_kirim]";
			 $date = new DateTime($date1);
?>  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="?module=inbox&id_kontak=<?php echo $dv['id_kontak']; ?>">
                    <div class="preview-thumbnail">
                      <img src="foto_admin/default.png" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
       <h6 class="preview-subject ellipsis mb-1 font-weight-normal"><?php echo  $dv['nama_lengkap']; ?></h6>
                      <p class="text-gray mb-0"> <?php echo $input; ?> <?php echo $date->format("H:i:s"); ?></p>
                    </div>
                  </a>
                  
<?php } ?>
                  
                  <div class="dropdown-divider"></div>
                </div>
              </li>
<!--=====inbox======-->
<li class="nav-item dropdown">
<?php
$bayar = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pembayaran WHERE status='belum'");
$kos = mysqli_num_rows($bayar);
?>
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-archive mx-0">
              <span class="badge badge-success"> <?php echo $kos ?></span></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="p-3 mb-0 font-weight-semibold"><?php echo $kos ?> Pembayaran Masuk</p>
 			<div class="dropdown-divider"></div>
<?php
while($ks = mysqli_fetch_array($bayar)){
$tanggal = tgl_indo($not['tgl']);
?>
              <a class="dropdown-item preview-item" href="?module=detail_pembayaran&id_pembayaran=<?php echo $ks['id_pembayaran']; ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-primary">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal"><?php echo  $ks['kd_kamar']; ?></h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                 <?php echo $tanggal; ?>
                  </p>
                </div>
              </a>
<?php
}
?>
            </div>
          </li>
<!--=====pembayaran======-->	           
<li class="nav-item dropdown">
<?php
$sewa = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE validasi='M'");
$member = mysqli_num_rows($sewa);
?>
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0">
              <span class="badge badge-danger"> <?php echo $member ?></span></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="p-3 mb-0 font-weight-semibold"><?php echo $member ?> Member Baru</p>
 			<div class="dropdown-divider"></div>
<?php
while($not = mysqli_fetch_array($sewa)){
$notif = tgl_indo($not['tgl_daftar']);
			 $date1 = "$not[tgl_daftar]";
			 $date = new DateTime($date1);
?>
              <a class="dropdown-item preview-item" href="?module=notifikasi&kd_penyewa=<?php echo $not['kd_penyewa']; ?>">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal"><?php echo  $not['nama']; ?></h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                 <?php echo $notif; ?> <?php echo $date->format("H:i:s"); ?>
                  </p>
                </div>
              </a>
<?php
}
?>
            </div>
          </li>
<!--=====member======-->
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
<?php
$foto=$ran['foto'];
if(empty($foto)){
?>
<img src="foto_admin/default.png" alt="Default" />
<?php
} else{
?>
<img src="<?php echo "foto_admin/".$foto; ?>" alt="User">
<?php } ?>  
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="?module=profil&id=<?php echo $ran['id_admin'];?>">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
<?php } ?>
<!--=============================================End Admin==================================================-->	


<!--=============================================Admin==================================================-->	
<?php if($akses=='2'){ ?>
<li class="nav-item dropdown">
<?php
$jawab = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE email='$ser[nik]' AND status_jawab='Y' AND cek_jawab='N'");
$ok = mysqli_num_rows($jawab);
?>
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="icon-mail mx-0"><span class="badge badge-primary"> <?php echo $ok ?></span></i>
                </a>
                
                <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0 font-weight-semibold"><?php echo $ok ?> Pesan</h6>
<?php
while($cn = mysqli_fetch_array($jawab)){
 $input = tgl_indo($cn['tgl_jawab']);
			 $date1 = "$cn[tgl_jawab]";
			 $date = new DateTime($date1);
?>  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="?module=detail_inbox&id_kontak=<?php echo $cn['id_kontak']; ?>">
                    <div class="preview-thumbnail">
                      <img src="images/penyewa/default.png" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
       <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Admin</h6>
                      <p class="text-gray mb-0"> <?php echo $input; ?> <?php echo $date->format("H:i:s"); ?></p>
                    </div>
                  </a>
                  
<?php } ?>
                  
                  <div class="dropdown-divider"></div>
                </div>
              </li>
<!--=====inbox======-->           
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
<?php
$foto=$ser['foto'];
if(empty($foto)){
?>
<img src="images/penyewa/default.png" alt="Default" />
<?php
} else{
?>
<img src="<?php echo "images/penyewa/".$foto; ?>" alt="User">
<?php } ?>  
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="?module=profile&kd_penyewa=<?php echo $ser['kd_penyewa'];?>">
                <i class="ti-settings text-primary"></i>
                Profil Saya
              </a>
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
<?php } ?>
<!--=============================================End Member==================================================-->	