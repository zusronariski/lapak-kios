<?php
include "koneksi.php";

function getReg(){
	$tgls = date("m.ds.");
	$now = date("d-m-Y");

	$q = mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT MAX(npwz) as x FROM muzakki_lembaga"));
	$d = $q[x];
	$not = substr($d, 8,3);

	if ($not==""){
		$y = "001";
	}else{
		$i = $not;
		$i++;
		if (strlen($i)==1){
			$y="00".$i;
		}elseif (strlen($i)==2) {
			$y="0".$i;
		}else{
			$y=$i;
		}
	}

	$nomor = $tgls.$y;
	return $nomor;
}

function getJumlah($tabel,$term){
	
	$jRec = mysqli_num_rows(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $tabel $term"));
	return $jRec;

}
?>