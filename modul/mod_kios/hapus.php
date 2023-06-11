<?php
include "../../include/koneksi.php";
$kd_kios=$_GET['kd_kios'];
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM kios WHERE kd_kios='$kd_kios'");
if($modal){
echo '<script>window.alert("Data Berhasil di Hapus");
       window.location=("../../media.php?module=kios")</script>';  
	}
?>