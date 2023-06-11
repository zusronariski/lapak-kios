
<div class="col-md-6 grid-margin stretch-card">
<div class="card">
<div class="card-header">
     <div class="card-title mb-1"><a href="media.php"><button class='btn btn-danger btn-sm '><i class="icon-arrow-left"></i></button></a> Kirim Pesan</div>
</div>
<div class="card-body">

<?php		
 if(isset($_POST['simpan'])){
			$nama_lengkap = $_POST['nama_lengkap'];
			$email = $_POST['email'];
			$hp = $_POST['hp'];
			$pesan = $_POST['pesan'];
			$tgl_kirim = $_POST['tgl_kirim'];
            $sudahbaca = 'N';
            $jawab = '';
            $tgl_jawab = '0000-00-00 00:00:00';
            $status_jawab = 'N';
            $cek_jawab = '';
$save=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO kontak (nama_lengkap,email,hp,pesan,tgl_kirim,sudahbaca,jawab,tgl_jawab,status_jawab,cek_jawab) VALUES ('$nama_lengkap','$email','$hp','$pesan','$tgl_kirim','$sudahbaca','$jawab','$tgl_jawab','$status_jawab','$cek_jawab')");
if($save){
echo "<div class='sufee-alert alert with-close alert-success alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Sukses..</span>
											terkirim...
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
echo "<meta http-equiv='refresh' content='2; url=media.php'>";
						}else{
echo "<div class='sufee-alert alert with-close alert-warning alert-dismissible fade show'>
											<span class='badge badge-pill badge-danger'>Gagal..!!</span>
											Menyimpan data, ulangi lagi
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'>&times;</span>
											</button>
										</div>";
			}
			}
?>
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
              <input name="nama_lengkap" type="hidden" class='form-control' placeholder="Nama Lengkap" required='' data-errormessage-value-missing='isian masih kosong' value="<?php echo $ser['nama']; ?>" readonly="readonly" />
     </div>
     	<div class="form-group">
              <input name="email" type="hidden" class='form-control' placeholder="Email" required='' data-errormessage-value-missing='isian masih kosong' value="<?php echo $ser['nik']; ?>" readonly="readonly" />
     </div>
     <div class="form-group">
<input name="hp" type="hidden" class='form-control' required='' maxlength="12" placeholder="Nomor HP" data-errormessage-value-missing='isian masih kosong' value="<?php echo $ser['no_hp']; ?>" onkeypress="return hanyaAngka(event)" readonly="readonly" />
     </div>
	<div class="form-group">
<textarea name="pesan" class='form-control' rows="3" placeholder="Isi Pesan..." required='' data-errormessage-value-missing='isian masih kosong'></textarea>
              <input type="hidden" name="tgl_kirim" value="<?php echo $tgl=date("Y-m-d"); ?> <?php echo $jam = date("H:i:s"); ?>" />
            </div>       		

<div class="form-group" align="right">
<button type="submit" name="simpan" class="btn btn-primary btn-sm">
                                            <i class="ti-share"></i> Kirim
                                        </button>
</div>
</form>
</div>
</div>
</div>

<script src="js/civem.js"></script>