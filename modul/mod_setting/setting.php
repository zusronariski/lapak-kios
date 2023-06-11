<?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM setting_web");
$data  = mysqli_fetch_array($query);
?>
<div class="row">
<div class="col-md-12 stretch-card grid-margin">
<div class="card">
 
<div class="card-body">
                                   <div class="card-header">
<p class="card-title"><a href="media.php"><button class='btn btn-danger btn-sm '><i class="icon-arrow-left"></i></button></a> Tentang Situs</p>
                                    </div>
<div class="table-responsive">
<table class="table table-hover table-striped">       
<tr>
<td width="250">Nama Sistem</td>
<td width="650"><b>: <?php echo $data['title']; ?></b></td>                            
</tr>
<tr>
<td>E-Mail</td>
<td><b>: <?php echo $data['email']; ?></b></td>
</tr>
<tr>
<td>No. HP/WA</td>
<td><b>: <?php echo $data['telp']; ?></b></td>
</tr>
<tr>
<td>Alamat</td>
<td><b>: <?php echo $data['alamat']; ?></b></td>
</tr>
 
<tr> 
<td width="250">Facebook</td>
<td width="650"><b>: <?php echo $data['fb']; ?></b></td>                               
</tr>
<tr>
<td width="250">Twit</td>
<td width="650"><b>: <?php echo $data['twit']; ?></b></td>                               
</tr>

</table>
<div class="col-md-2 grid-margin stretch-card"
<div class="card tale-bg">
<div class="card-people mt-auto">
<img src="images/<?php echo  $data['logo']; ?>" alt="people">
</div></div></div>
<a href="?module=input_setting&id=<?php echo  $data['id']; ?>"><button class='btn btn-primary btn-sm'><i class='ti-pencil'></i> Ubah</button></a>
</div>
</div>
</div>
</div>