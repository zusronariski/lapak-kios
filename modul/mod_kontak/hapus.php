<?php
include "../../include/koneksi.php";
$id_kontak=$_GET['id_kontak'];
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM kontak WHERE id_kontak='$id_kontak'");
if(!$modal){
echo '<script language="javascript" type="text/javascript">
alert("Data berhasil terhapus!");</script>';
echo "<meta http-equiv='refresh' content='0; url=../media.php'>";
}
?>