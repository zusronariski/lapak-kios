<?php
include "../include/koneksi.php";
$id_cover=$_GET['id_cover'];
if($_GET['id_cover']){
$cari=mysqli_query($GLOBALS["___mysqli_ston"], "select * from cover WHERE id_cover='$id_cover'");
$dt=mysqli_fetch_array($cari);
$foto=$dt['foto'];
$tmpfile = "../images/cover/$dt[foto]";
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM cover WHERE id_cover='$id_cover'");
if(!$modal){
echo '<script language="javascript" type="text/javascript">
alert("data gagal terhapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=cover'>";
}else{
unlink ($tmpfile);
echo '<script language="javascript" type="text/javascript">
alert("data berhasil di hapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=cover'>";
}
}
?>