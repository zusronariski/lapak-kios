<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
</div>
                
</div>
</div>
<!--==b=====-->	
 <?php
$kd_penyewa=$_GET['kd_penyewa'];
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b WHERE a.kd_kios=b.kd_kios AND b.kd_penyewa='$kd_penyewa'");
$data  = mysqli_fetch_array($query);
$notif = tgl_indo($data['tgl_daftar']);
			 $date1 = "$data[tgl_daftar]";
			 $date = new DateTime($date1);
?>
<div class="row">
<div class="col-md-12 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">PROFIL: <?php echo $data['nama']; ?></p>
<br />
<div class="table-responsive">
<table class="table table-hover table-striped">

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
<a href='?module=update_akun&kd_penyewa=<?php echo  $data['kd_penyewa']; ?>'><button class='btn btn-primary waves-effect waves-light m-r-5 m-b-10 btn-sm' type='submit'><i class='ti-pencil'></i> Edit</button> </a> 
</td>
<td></td>
</tr>
</table>
</div>
</div>
</div>
</div></div>