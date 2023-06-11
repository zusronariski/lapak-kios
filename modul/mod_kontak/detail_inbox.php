<?php
$info = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE id_kontak='$_GET[id_kontak]'");
	$row = mysqli_fetch_array($info);
    $input = tgl_indo($row['tgl_kirim']);
			 $date1 = "$row[tgl_kirim]";
			 $date = new DateTime($date1);
$clear = tgl_indo($row['tgl_jawab']);
			 $date2 = "$row[tgl_jawab]";
			 $date1 = new DateTime($date2);
mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kontak SET cek_jawab='Y' WHERE id_kontak='$_GET[id_kontak]'");
?>
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
<p class="card-title"><a href="?module=inboxq"><button class='btn btn-danger btn-sm '><i class="icon-arrow-left"></i></button></a> Detail Pesan</p>
                                    </div>
                                    <div class="card-body">
<?php
$foto=$ser['foto'];
if(empty($foto)){
?>
<img class="rounded-circle mx-auto d-block" src="images/penyewa/default.png" height="100" width="100" alt="User">
<?php
} else{
?>
<img class="rounded-circle mx-auto d-block" src="<?php echo "images/penyewa/".$foto; ?>" height="100" width="100" alt="User">
<?php } ?>
<h5 class="text-sm-center mt-2 mb-1"> <i class="mdi mdi-rename-box"></i> <?php echo $row['nama_lengkap']; ?></h5>
                                        <div class="location text-sm-center">
                                                <i class="mdi mdi-cellphone"></i> <?php echo $row['hp']; ?>
                                        </div>
<br />                               
<blockquote class="blockquote">
<p><?php echo  $row['pesan']; ?></p>
 <span class="mess-time"><font size="-2">Kirim: <?php echo $input; ?> <?php echo $date->format("H:i:s"); ?></font></span>
</blockquote>

<blockquote class="blockquote blockquote-primary">
<p><?php echo  $row['jawab']; ?></p>
 <span class="mess-time"><font size="-2">Jawab: <?php echo $clear; ?> <?php echo $date1->format("H:i:s"); ?></font></span>
</blockquote>

                                        </div>
                                    </div>
                                </div>
</div>