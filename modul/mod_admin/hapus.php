<?php
include "../../include/koneksi.php";
$id_admin=$_GET['id_admin'];
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM user_admin WHERE id_admin='$id_admin'");
if($modal){
echo '<script>window.alert("Data Berhasil di Hapus");
       window.location=("../../media.php?module=admin")</script>';  
	}
?>