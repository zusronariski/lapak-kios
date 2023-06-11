<?php
//variabel database
$nama_host="localhost";
$user_db="root";
$password_db="";
$nama_db="lapak_kios";

//koneksi database
$koneksi=($GLOBALS["___mysqli_ston"] = mysqli_connect($nama_host, $user_db, $password_db));

//bila terkoneksi
if($koneksi){
//pilih database
mysqli_select_db($GLOBALS["___mysqli_ston"], $nama_db);
}else{
echo "Database tidak terhubung,,.Error !!!";
}

?>