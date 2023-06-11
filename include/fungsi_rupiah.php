<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}
?> 
