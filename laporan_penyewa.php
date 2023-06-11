<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_SESSION['id_admin']==""){
	echo "<script>parent.location ='media.php';</script>";
	exit;
}
include "include/koneksi.php";
include "include/fungsi_indotgl.php";  
if (isset($_SESSION['id_admin'])){
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
		font-family:"Tahoma", Courier, monospace;
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
		margin-right:200px;
		font-family:Tahoma, Geneva, sans-serif;
	}
		#print .ttd2 {
		float:right;
		width:250px;
	}
	#print table th {
		color:#000;
		font-family:Tahoma, Geneva, sans-serif;
		font-size:12px;
	}
	
	#print table td {
		color:#000;
		font-family:Tahoma, Geneva, sans-serif;
		font-size:12px;
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

	<title>laporan-penyewa</title>
    <link rel="shortcut icon" href="images/<?php echo $file['logo']; ?>" />
	<?php
	$tanggal = tgl_indo(date("Y-m-d"));
	$jam     = date("H:i:s");

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
			<table>		
				<strong><hr></strong>
				<br>
<h2><u>Laporan Data Penyewa <?php echo $file['title']; ?></u></h2>
<tr>
<td>
<table border='1' class='table'>
<tr>
<th width="20">No.</div></th>

<th>NIK</th>
<th>Nama</th>
<th>Alamat/Asal</th>
<th>kontak</th>
<th>Mulai Sewa</th>
<th>Kd-Kios</th>
<th>Nama Kios</th>
<th>Tarif Sewa</th>
</tr>

<?php
$tgl_awal = $_POST['thn_mulai']."-".$_POST['bln_mulai']."-".$_POST['tgl_mulai'];
$tgl_akhir = $_POST['thn_selesai']."-".$_POST['bln_selesai']."-".$_POST['tgl_selesai'];
$res = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b WHERE a.kd_kios=b.kd_kios AND b.tgl_sewa BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY b.tgl_sewa DESC");
while ($data = mysqli_fetch_array($res)){
$tgl_sewa = tgl_indo($data['tgl_sewa']);
$no++;
?>
<tr>
<td align='center'><?php echo $no ?>.</td>
<td> &nbsp;<?php echo $data['nik']; ?></td>
<td> &nbsp;<?php echo $data['nama']; ?></td>
<td> &nbsp;<?php echo $data['alamat']; ?></td>
<td> &nbsp;<?php echo $data['email']; ?> / <?php echo $data['no_hp']; ?></td>
<td align='center'> <?php echo $tgl_sewa;?></td>
<td> &nbsp;<?php echo $data['kd_kios']; ?></td>
<td> &nbsp;<?php echo $data['nama_kios']; ?></td>
<td align="right">Rp.<?php echo number_format($data['biaya'],2,',','.') ?>,- &nbsp;</td>

</tr> 
<?php } ?>   
        
</table></td>
					</tr>
				</table>
	</table>
			<br>
<table width="450" align="right" class="ttd2">
<tr>
<td width="100px" style="padding:20px 20px 20px 20px;" align="center">

<?php echo "$tanggal";?><br> Admin,
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