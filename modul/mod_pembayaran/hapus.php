<?php
include "../../include/koneksi.php";
$id_pembayaran=$_GET['id_pembayaran'];
if($_GET['id_pembayaran']){
$cari=mysqli_query($GLOBALS["___mysqli_ston"], "select * from pembayaran WHERE id_pembayaran='$id_pembayaran'");
$dt=mysqli_fetch_array($cari);
$bukti=$dt['bukti'];
$tmpfile = "../images/bukti/$dt[bukti]";
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
if(!$modal){
echo '<script language="javascript" type="text/javascript">
alert("data gagal terhapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=pembayaran'>";
}else{
unlink ($tmpfile);
echo '<script language="javascript" type="text/javascript">
alert("data berhasil di hapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php?module=pembayaran'>";
}
}
?>