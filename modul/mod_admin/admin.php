<div class="col-md-12">
<div class="card">
<div class="header">
<h5 class="title">DATA ADMINISTRATOR</h5>
</div>
<div class="panel-heading"><a href="?module=input_admin" class="btn btn-danger btn-sm">Entry Admin Baru</a>
<hr />
<div class="content table-responsive table-full-width">
<table id="dynamic-table" class="table table-hover table-bordered ">
<thead>
<tr>
<th><div align="center">No.</div></th>
<th><b>Nama User </b></th>
<th><b>email</b></th>
<th><b>Hak Akses</b></th>
<th><b>Foto</b></th>
<th width="70"><b>Aksi</b></th>
</tr></thead>
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_admin");
$no=1;
while($data=mysqli_fetch_array($view)){
?>
<tr>
<?php
	      $lvl = $data['akses'];
	      $tp = array(
	      	'1'=>'Administrator',
	      	'2'=>'Admin Biasa');
	      echo "
	      <td><div align='center'>$no</div></td>
	      <td>$data[first_name]</td>
	      <td>$data[email]</td>
	      <td>$tp[$lvl]</td>";
           ?>     
<td><center>
 <?php
$foto=$data['foto'];
if(empty($foto)){
?>
<img src="foto_admin/default.jpg" class="img-circle" height="80" width="75" style="border: 3px solid #333333;" />
<?php
}else{
?>
<img src="foto_admin/<?php echo $data['foto']; ?>" class="img-circle" height="80" width="75" style="border: 3px solid #333333;" />
<?php
}
?>
</center>
</td>
<td>
<a href="?module=input_admin&id_admin=<?php echo  $data['id_admin']; ?>"><button class="btn btn-warning btn-fill btn-xs"><i class="pe-7s-note"></i></button></a>
<a href="modul/mod_admin/hapus.php?&id_admin=<?php echo  $data['id_admin']; ?>"><button class="btn btn-danger btn-fill btn-xs"><i class="pe-7s-trash"></i></button></a></td>		    
              </tr>
             <?php $no++;}?>
</table>
</div>
</div>
</div></div>    

