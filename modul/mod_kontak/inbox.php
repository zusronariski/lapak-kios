<?php
$info = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE id_kontak='$_GET[id_kontak]'");
	$row = mysqli_fetch_array($info);
    $input = tgl_indo($row['tgl_kirim']);
			 $date1 = "$row[tgl_kirim]";
			 $date = new DateTime($date1);
$clear = tgl_indo($row['tgl_jawab']);
			 $date2 = "$row[tgl_jawab]";
			 $date1 = new DateTime($date2);
?>
<div class="row">
<div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
<p class="card-title"><a href="?module=kontak"><button class='btn btn-danger btn-sm '><i class="icon-arrow-left"></i></button></a> Detail Pesan</p>
                                    </div>
                                    <div class="card-body">
<?php
$foto=$row['foto'];
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
 <span class="mess-time"><font size="-2"><?php echo $input; ?> <?php echo $date->format("H:i:s"); ?></font></span>
</blockquote>

<blockquote class="blockquote blockquote-primary">
<p><?php echo  $row['jawab']; ?></p>
 <span class="mess-time"><font size="-2">Balas: <?php echo $clear; ?> <?php echo $date1->format("H:i:s"); ?></font></span>
</blockquote>

<?php if($row['status_jawab']=='N'){ ?>
<?php
if(isset($_POST['edit'])){
$sudahbaca = 'Y';
$jawab = $_POST['jawab'];
$tgl_jawab = $_POST['tgl_jawab'];
$status_jawab = 'Y';
$cek_jawab = 'N';
$a=mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE kontak SET sudahbaca='$sudahbaca',jawab='$jawab',tgl_jawab='$tgl_jawab',status_jawab='$status_jawab',cek_jawab='$cek_jawab' WHERE id_kontak='$_GET[id_kontak]'");
if($a){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses..</span>
											jawab..
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='2; url='>";
}
}
?>
<form action="" method="post">
<div class="form-group">
<input type="hidden" name="tgl_jawab" value="<?php echo $tgl=date("Y-m-d"); ?> <?php echo $jam = date("H:i:s"); ?>" />
<textarea name="jawab" rows="2" class="form-control" placeholder="Balas pesan.."></textarea>
</div>
<div class="form-group">
<button name="edit" class="btn btn-success btn-rounded btn-sm" title="Send">
                                                            <i class="mdi mdi-send"></i> Kirim
                                                        </button>
                                                        </div>
                                                </form>
<?php } ?>
                                        </div>
                                    </div>
                                </div>
</div>