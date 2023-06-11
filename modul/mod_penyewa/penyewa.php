<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=penyewa" class="btn btn-info btn-sm"><i class="ti-layout"></i></a>
<a href="?module=input_penyewa" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> Input</a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="row">
<div class="col-md-12 stretch-card grid-margin">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="dynamic-table" class="table table-hover table-bordered ">
<thead>
<tr>
<th>No. </th>
<th>Kd-Penyewa</th>
<th>NIK</th>
<th>Nama</th>
<th>Alamat/Asal</th>
<th>Kontak</th>
<th>Mulai Sewa</th>
<th>Foto</th>
<th>Aksi</th>
</tr>
</thead>

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM penyewa WHERE aktif='Y' AND validasi='Y' ORDER BY kd_penyewa DESC");
$no=1;
while($data=mysqli_fetch_array($view)){
$tgl_sewa = tgl_indo($data['tgl_sewa']);
?>
<tr>
<?php
echo "
<td>$no</td>
<td><a href='?module=detail_penyewa&kd_penyewa=$data[kd_penyewa]' title='Lihat Detail' class='btn btn-warning btn-sm'> $data[kd_penyewa] <i class='ti-search'></i> </a></td>
<td>$data[nik]</td>
<td> $data[nama] </td>
<td>$data[alamat] </td>
<td>$data[email] / $data[no_hp]</td>
<td>$tgl_sewa </td>";
?>
<td><center>
 <?php
$foto=$data['foto'];
if(empty($foto)){
?>
<img src="images/penyewa/default.jpg" class="img-circle" height="80" width="75" style="border: 3px solid #DDD;" />
<?php
}else{
?>
<img src="images/penyewa/<?php echo $data['foto']; ?>" class="img-circle" height="80" width="75" style="border: 3px solid #DDD;" />
<?php
}
?>
</center>
</td>
<td>
<a href="?module=input_penyewa&kd_penyewa=<?php echo  $data['kd_penyewa']; ?>"><button class="btn btn-success btn-sm"><i class="ti-pencil-alt"></i></button></a>
<a href="#" onclick="confirm_modal('modul/mod_penyewa/hapus.php?&kd_penyewa=<?php echo  $data['kd_penyewa']; ?>');"><button class="btn btn-danger btn-rounded btn-sm" title="Delete"><i class="ti-trash"></i></button></a>
</td>		    
</tr>
<?php $no++;}?>

</table>
</div>
</div><!-- /content-panel -->
</div><!-- /col-lg-4 -->			
</div>
</div>
 <!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <p class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</p>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>