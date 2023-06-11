<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<?php if($akses=='1'){ ?>
<a href="?module=pembayaran" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<?php } ?>
<?php if($akses=='2'){ ?>
<a href="?module=data_pembayaran&kd_penyewa=<?php echo $ser['kd_penyewa'];?>" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<?php } ?>
<a href="?module=input_penyewa" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i></a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="row">
<div class="col-md-6 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">Data Penyewa</p>
<div class="table-responsive">
<?php	
$act=$_GET['act'];	
if ($act=='belum'){
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pembayaran SET status='lunas' WHERE id_pembayaran='$_GET[id_pembayaran]'");
if($save){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											pembayaran lunas...
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


if ($act=='lunas'){
$save=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE pembayaran SET status='belum' WHERE id_pembayaran='$_GET[id_pembayaran]'");
if($save){
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses.,</span>
											pembayaran invalid..
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
<table class="table table-hover table-striped">
 <?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b, pembayaran c, bank d WHERE a.kd_kios=c.kd_kios AND b.kd_penyewa=c.kd_penyewa AND c.id_bank=d.id_bank AND c.id_pembayaran='$_GET[id_pembayaran]'");
$data  = mysqli_fetch_array($query);
$sewa = tgl_indo($data['tgl_sewa']);
$tgl = tgl_indo($data['tgl']);
$tgl_tempo=substr($data['tgl'],8,2)." ".getBulan(substr($data['tgl'],5,2)+$data['jumlah'])." ".substr($data['tgl'],0,4);
$bayar = $data['biaya']*$data['jumlah'];
$bayar = format_rupiah($bayar);
?>

<img class="img-thumbnail" src="images/ktp/<?php echo $data['ktp']; ?>" width="200" height="140"/> 
<img class="img-thumbnail" src="images/penyewa/<?php echo $data['foto']; ?>" height="120" width="100" /> 
<tr>
<td><b>DATA DIRI</b></td>
</tr>                
<tr> 
<td>Tanggal Sewa</td>
<td><b>: <?php echo $sewa; ?></b></td>                               
</tr>
<tr>
<td>Kd-Penyewa</td>
<td><b>: <?php echo $data['kd_penyewa']; ?></b></td>                               
</tr>
<tr>
<td width="200">NIK</td>
<td width="450"><b>: <?php echo $data['nik']; ?></b></td>                              
</tr>
<tr>
<td width="200">Nama Penyewa</td>
<td width="450"><b>: <?php echo $data['nama']; ?></b></td>                              
</tr>
<tr>
<td>Alamat / Asal</td>
<td><b>: <?php echo $data['alamat']; ?></b></td>
</tr>
<tr>
<td>Kontak</td>
<td><b>: <?php echo $data['no_hp']; ?> / <?php echo $data['email']; ?></b></td>
</tr>
 <tr>
<td><b>DATA kios</b></td>
</tr> 
<tr>
<td>KD-kios</td>
<td><b>: <?php echo $data['kd_kios']; ?> </b></td>
</tr>
<tr>
<td>nama kios</td>
<td><b>: <?php echo $data['nama_kios']; ?> </b></td>
</tr>
<tr>
<td>Tarif kios</td>
<td><b>: Rp.<?php echo number_format($data['biaya'],2,',','.') ?>,- </b></td>
</tr>
</table>
</div>
</div>
</div>
</div>
<!--//sub-heard-part-->
<div class="col-md-6 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">Data Pembayaran Kost</p>
<div class="table-responsive">
<table class="table table-hover table-striped">           
<tr> 
<td>Tgl Bayar</td>
<td><b>: <?php echo $tgl; ?></b></td>                               
</tr>
<tr>
<td>Jumlah Bulan</td>
<td><b>: <?php echo $data['jumlah']; ?> Bulan</b></td>
</tr>
<tr>
<td>Tgl Tempo</td>
<td><b>: <?php echo $tgl_tempo; ?> </b></td>
</tr>
<tr>
<td>Jumlah Bayar</td>
<td><b>: Rp. <?php echo $bayar; ?> </b></td>
</tr>
<tr>
<td>Kode Transfer</td>
<td><b>: <?php echo $data['kode_transfer']; ?></b></td>
</tr>
<tr>
<td>Bank Tujuan</td>
<td><b>: <?php echo $data['nama_bank']; ?></b></td>
</tr>
<tr>
<td>No-Rek.</td>
<td><b>: <?php echo $data['no_rekening']; ?></b></td>
</tr>
<tr>
<td>Nama Penerima</td>
<td><b>: <?php echo $data['nama_nasabah']; ?></b></td>
</tr>
<tr>
<td>Bukti</td>
<td align="center"> <a href="images/bukti/<?php echo $data['bukti']; ?>" target="_blank"><img src="images/bukti/<?php echo $data['bukti']; ?>" width="120" height="80"/></a></td> 
</tr>
<tr>
<td>Status</td>
<?php if($akses=='1'){  ?>
<td>
<?php
	      $st = $data['status'];
	      $tp = array(
'belum' => "<a href='?module=detail_pembayaran&act=belum&id_pembayaran=$data[id_pembayaran]' class='btn btn-danger btn-sm'><i class='ti-clip'></i> Belum di Verifikasi</a>",
'lunas' => "<a href='?module=detail_pembayaran&act=lunas&id_pembayaran=$data[id_pembayaran]' class='btn btn-success btn-sm'><i class='ti-check-box'></i> Sudah di Verifikasi</a>");
	      echo "$tp[$st]";
?>
</td> 
<?php }  ?>
<?php if($akses=='2'){  ?>
<td>
<?php
	      $st = $data['status'];
	      $tp = array(
'belum' => "<button class='btn btn-danger btn-sm'> <i class='ti-clip'></i> Belum di Verifikasi</button>",
'lunas' => "<button class='btn btn-success btn-sm'> <i class='ti-check-box'></i> Sudah di Verifikasi</button>");
	      echo "$tp[$st]";
?>
</td>
 <?php }  ?>
</tr>
</table>
</div>
</div>
</div>
</div>
</div>