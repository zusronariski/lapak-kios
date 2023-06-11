<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=penyewa" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="row">
<div class="col-md-12 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">Detail Data Penyewa</p>
<br />
<div class="table-responsive">
<table class="table table-hover table-striped">
 <?php
$kd_penyewa=$_GET['kd_penyewa'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b WHERE a.kd_kios=b.kd_kios AND b.kd_penyewa='$kd_penyewa'");
$data  = mysqli_fetch_array($query);
$notif = tgl_indo($data['tgl_daftar']);
			 $date1 = "$data[tgl_daftar]";
			 $date = new DateTime($date1);
?>
<a href="images/ktp/<?php echo $data['ktp']; ?>" target="_blank"><img class="img-thumbnail" src="images/ktp/<?php echo $data['ktp']; ?>" width="200" height="140" /></a>
<a href="images/penyewa/<?php echo $data['foto']; ?>" target="_blank"><img class="img-thumbnail" src="images/penyewa/<?php echo $data['foto']; ?>" height="120" width="100" /> </a>
           

<tr>
<td width="250">NIK</td>
<td width="650"><b>: <?php echo $data['nik']; ?></b></td>                            
</tr>
<tr>
<td width="250">Nama Penyewa</td>
<td width="650"><b>: <?php echo $data['nama']; ?></b>      
</td>                       
</tr>
<tr>
<td>No. HP/WA</td>
<td><b>: <?php echo $data['no_hp']; ?></b></td>
</tr>
<tr>
<td>E-Mail</td>
<td><b>: <?php echo $data['email']; ?></b></td>
</tr>
<tr>
<td>Alamat / Asal</td>
<td><b>: <?php echo $data['alamat']; ?></b></td>
</tr>
 
 <tr>
<td><b>DATA kios</b></td>
</tr> 
<tr> 
<td width="250">Tanggal Daftar</td>
<td width="650"><b>: <?php echo $notif; ?> <?php echo $date->format("H:i:s"); ?></b></td>                               
</tr>
<tr>
<td width="250">Kd-Penyewa</td>
<td width="650"><b>: <?php echo $data['kd_penyewa']; ?></b></td>                               
</tr>
<tr>
<td>KD-kios</td>
<td><b>: <?php echo $data['kd_kios']; ?> </b></td>
</tr>
<tr>
<td>kios</td>
<td><b>: <?php echo $data['nama_kios']; ?> </b></td>
</tr>
<tr>
<td>Tarif kios</td>
<td><b>: Rp.<?php echo number_format($data['biaya'],2,',','.') ?>,- </b></td>
</tr>
</tr>
<tr>
<td>
<a href='?module=notifikasi&act=setujui&kd_penyewa=<?php echo $data['kd_penyewa'] ?>'><button class='btn btn-success waves-effect waves-light m-r-5 m-b-10 btn-sm' type='submit'><i class='ti-check-box'></i> Disetujui</button> </a> 
</td>

<td>
<a href='?module=notifikasi&act=tolak&kd_penyewa=<?php echo $data['kd_penyewa'] ?>'><button class='btn btn-danger waves-effect waves-light m-r-5 m-b-10 btn-sm' type='submit'><i class='ti-close'></i> Ditolak</button> </a> 
</td>
</tr>
</table>
<?php	
$act=$_GET['act'];	
if ($act=='setujui'){
$tgl_sewa = date("Y-m-d");
$validasi = 'Y';
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET tgl_sewa='$tgl_sewa',validasi='$validasi' WHERE kd_penyewa='$kd_penyewa'");
if($save){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											permintaan di terima..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";
}else{
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal.,</span>
											Periksa kembali isian..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";

}
}


if ($act=='tolak'){
$kd_kios='-';
$tgl_sewa = '0000-00-00';
$aktif = 'N';
$validasi = 'X';
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE penyewa SET kd_kios='$kd_kios',tgl_sewa='$tgl_sewa',aktif='$aktif',validasi='$validasi' WHERE kd_penyewa='$kd_penyewa'");
if($save){
$km=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kios SET status='kosong' WHERE kd_kios='$data[kd_kios]'");
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											permintaan di tolak..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";
}else{
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal.,</span>
											Periksa kembali isian..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='3; url=media.php'>";

}
}
?>
</div>
</div>
</div>
</div></div>