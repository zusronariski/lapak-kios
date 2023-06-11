<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=penyewa" class="btn btn-info btn-sm"><i class="ti-layout"></i> Tabel Data</a>
<a href="?module=input_penyewa" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i></a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="row">
<div class="col-md-12 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<p class="card-title mb-0">Detail Data Penyewa</p>
<div class="table-responsive">
<table class="table table-hover table-striped">
 <?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b WHERE a.kd_kios=b.kd_kios AND b.kd_penyewa='$_GET[kd_penyewa]'");
$data  = mysqli_fetch_array($query);
$tgl_sewa = tgl_indo($data['tgl_sewa']);
?>
<img class="img-thumbnail" src="images/ktp/<?php echo $data['ktp']; ?>" width="200" height="140"/> 
<img class="img-thumbnail" src="images/penyewa/<?php echo $data['foto']; ?>" height="120" width="100" /> 
           

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
<td width="250">Tanggal Sewa</td>
<td width="650"><b>: <?php echo $tgl_sewa; ?></b></td>                               
</tr>
<tr>
<td width="250">Kd-Penyewa</td>
<td width="650"><b>: <?php echo $data['kd_penyewa']; ?></b></td>                               
</tr>
<tr>
<td>KD-Kios</td>
<td><b>: <?php echo $data['kd_kios']; ?> </b></td>
</tr>
<tr>
<td>Kios</td>
<td><b>: <?php echo $data['nama_kios']; ?> </b></td>
</tr>
<tr>
<td>Tarif Kios</td>
<td><b>: Rp.<?php echo number_format($data['biaya'],2,',','.') ?>,- </b></td>
</tr>
</table>
</div>
</div>
</div>
</div></div>