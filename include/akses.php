<?php
if($id_admin=$_SESSION['id_admin']){
	$query=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_admin WHERE id_admin='$id_admin'");
	$ran=mysqli_fetch_array($query);
}
elseif ($kd_penyewa=$_SESSION['kd_penyewa']){
	$query1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE kd_penyewa='$kd_penyewa'");
	$ser=mysqli_fetch_array($query1);	
}
?>