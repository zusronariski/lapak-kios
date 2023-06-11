<?php
include "../../include/koneksi.php";
$id_bank=$_GET['id_bank'];
$modal=mysqli_query($GLOBALS["___mysqli_ston"], "Delete FROM bank WHERE id_bank='$id_bank'");
if($modal){
echo '<script>window.alert("Data Berhasil di Hapus");
       window.location=("../../media.php?module=bank")</script>';  
	}
?>