<?php
include "include/library.php"; 
include "include/fungsi_combobox.php"; 
?>
<div class="row">
<div class="col-md-6 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">
<a href="media.php" class="btn btn-light btn-sm"><i class="ti-home"></i> </a>
Laporan Transaksi</p> <br />
<div class="table-responsive">
<?php
echo "
<form method=POST action='laporan_pembayaran.php' target='_blank'>
<table class='table table-hover table-striped'>
 <tr class='success'><th> Dari Tanggal ";
			combotgl(01,31,'tgl_mulai',$tgl_skrg);
			combobln(01,12,'bln_mulai',$bln_sekarang);
			combothn(2022,$thn_sekarang,'thn_mulai',$thn_sekarang);

echo " </th></tr>
 <tr class='warning'><th> s/d &nbsp;Tanggal ";
			combotgl(01,31,'tgl_selesai',$tgl_skrg);
			combobln(01,12,'bln_selesai',$bln_sekarang);
			combothn(2022,$thn_sekarang,'thn_selesai',$thn_sekarang);
			
echo "</th></tr>
		<tr><td><button class='btn btn-danger btn-sm' type='submit' name='Go'><i class='ti-printer'></i> Print </button></td></tr>
		</table>
	</form>";
?>
</div></div></div></div>
<?php
if (isset($_POST['Go'])){
	?>

<?php } ?>                   
</div>


