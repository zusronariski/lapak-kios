<?php
include "../../include/koneksi.php";
$kd_penyewa=$_GET['kd_penyewa'];
if($_GET['kd_penyewa']){
$cari=mysqli_query($GLOBALS["___mysqli_ston"], "select * from penyewa WHERE kd_penyewa='$kd_penyewa'");
$dt=mysqli_fetch_array($cari);
$ktp=$dt['ktp'];
$tmpfile = "../images/ktp/$dt[ktp]";
$foto=$dt['foto'];
$tmpfile = "../images/penyewa/$dt[foto]";
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM penyewa WHERE kd_penyewa='$kd_penyewa'");
if(!$modal){
echo '<script language="javascript" type="text/javascript">
alert("data gagal terhapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=penyewa'>";
}else{
unlink ($tmpfile);
echo '<script language="javascript" type="text/javascript">
alert("data berhasil di hapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=penyewa'>";
}
}
?>