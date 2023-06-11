<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if(empty($_SESSION['akses'])){
include "error-404.html";
}
elseif(isset($_SESSION['akses'])){
include "include/koneksi.php";
include "include/fungsi_indotgl.php";  
include "include/lib.php"; 
date_default_timezone_set("Asia/Jakarta");

$setting=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM setting_web");
$file=mysqli_fetch_array($setting);
?>
<script type="text/javascript">
	window.print() 
	</script>

	<style type="text/css">
	#print {
		margin:auto;
		border:0px solid #2A9FAA;
		text-align:center;
		font-family:"Courier New", Courier, monospace;
		width:900px;
		font-size:14px;
	}
	#print .title {
		margin:20px;
		text-align:right;
		font-family:"Courier New", Courier, monospace;
		font-size:12px;
	}
	#print span {
		text-align:center;
		font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;	
		font-size:18px;
	}
	#print table {
		border-collapse:collapse;
		width:100%;
		margin:10px;
	}
	#print .table1 {
		border-collapse:collapse;
		width:100%;
		text-align:center;
	}
	#print .table2 {
		margin:20px;
		border-collapse:collapse;;
		width:100%;
	}
	#print table hr {
		border:3px dashed #A0A0A4;	
	}
	#print .ttd1 {
		float:left;
		width:400px;
	}
	#print .ttd2 {
		float:right;
		width:400px;
	}
	#print table th {
		color:#000;
		font-family:Verdana, Geneva, sans-serif;
		font-size:12px;
	}

	#print .grand {
		width:700px;
		padding:10px;
		text-align:left;	
	}
	#print .grand table {
		margin-left:-90px;	
	}
	#logo{
		width:111px;
		height:90px;
		padding-top:10px;	
		margin-left:10px;
	}

	h2,h3{
		margin: 0px 0px 0px 0px;
	}
	</style>

	<title><?php echo $file['title']; ?></title>
    <link rel="shortcut icon" href="images/<?php echo $file['logo']; ?>" />
	<?php
	$tanggal = tgl_indo(date("Y-m-d"));
	$jam     = date("H:i:s");
	$hari_ini = $seminggu[$hari];
	?>
	<div id="print">
		<table class='table1'>
			<tr align='left'>
				<td><img src="images/<?php echo $file['logo']; ?>" height="100" width="100"></td>
				<td valign='middle' colspan='2'>
					<h1><?php echo $file['title']; ?></h1>
					<p style="font-size:14px;">
						<?php echo $file['alamat']; ?><br>
					</p>
				</td>
			</tr>
            </table>	
				<strong><hr></strong>
				<br>
<?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b, pembayaran c, bank d WHERE a.kd_kios=c.kd_kios AND b.kd_penyewa=c.kd_penyewa AND c.id_bank=d.id_bank AND c.id_pembayaran='$_GET[id_pembayaran]'");
$data  = mysqli_fetch_array($query);
$sewa = tgl_indo($data['tgl_sewa']);
$tgl = tgl_indo($data['tgl']);
$tgl_tempo=substr($data['tgl'],8,2)." ".getBulan(substr($data['tgl'],5,2)+$data['jumlah'])." ".substr($data['tgl'],0,4);
$bayar = $data['biaya']*$data['jumlah'];
$bayar = format_rp($bayar);
$bilangan = $data['biaya']*$data['jumlah'];
$bilangan = terbilang($bilangan);
?>	
<h2><u>KWITANSI PEMBAYARAN KIOS</u></h2>
<td> <strong>Kode Transfer : <?php echo $data['kode_transfer'];?></strong></td>         
<table border='0' class='table'>
<tr>
<td width="190px">Telah diterima dari <br /><br /></td>
<td>:<br /><br /></td>
</tr>

<tr>
<td>Nama Penyewa </td> 
<td>:</td>
<td> <strong><?php echo $data['nama'];?></strong></td>
</tr>
<tr>
<td>Kd-kios</td>
<td>:</td>
<td> <strong><?php echo $data['kd_kios'];?></strong></td>
</tr>
<tr>
<td>Kontak</td>
<td>:</td>
<td> <strong><?php echo $data['no_hp'];?> / <?php echo $data['email'];?></strong></td>
</tr>
<tr>
<td>Untuk Pembayaran</td>
<td>:</td>
<td> <strong>kios Kost Tanggal <?php echo $tgl;?> s/d <?php echo $tgl_tempo;?> Selama <?php echo $data['jumlah'];?> Bulan</strong></td>
</tr>
<tr>
<td>Tempat Pembayaran</td>
<td>:</td>
<td> <strong> <?php echo $data['nama_bank'];?> </strong></td>
</tr>
<tr>
<td>Total Bayar</td>
<td>:</td>
<td> <strong><font color="#FF0000"> Rp. <?php echo $bayar;?>,- </font></strong></td>
</tr>
<tr>
<td>Terbilang</td>
<td>:</td>
<td> <strong> <font color="#FF0000"><u><?php echo $bilangan;?> Rupiah</u></font></strong></td>
</tr>

</table></div>
<br><br>
<div id="print">	
<table width="400" class="ttd1">
<tr>
<td>

<strong><br>Penyetor,</strong>
<br><br><br><br>

<strong><u><?php echo $data['nama'];?></u><br></strong><small></small>
</td>
</tr>
</table>
		
<table width="400" class="ttd2">
<tr>
<td>

<strong><?php echo $tanggal;?><br>Penerima,</strong>
                                 <br><br><br><br>

<strong><u>Pemilik <?php echo $file['title']; ?></u><br></strong><small></small>

</td>
</tr>
</table>
</div>

<?php
}else{
	exit;
}
?>