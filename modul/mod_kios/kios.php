<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=kios" class="btn btn-info btn-sm"><i class="ti-layout"></i></a>
<a href="?module=input_kios" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> Input</a>
</div>
                
</div>
</div>
<!--==b=====-->	
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="table-responsive">
<table id="dynamic-table" class="table table-hover table-bordered ">
<thead>
<tr>
<th width="20">No.</th>
<th>ID-Kios</th>
<th>Nama Kios</th>
<th>Tarif Sewa</th>
<th>Keterangan</th>
<th>Status</th>
<th width="90">Aksi</th>
</tr>
</thead>

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios ORDER BY kd_kios DESC");
$no=1;
while($data=mysqli_fetch_array($view)){
?>
<tr>
<?php
echo "
<td>$no</td>
<td>$data[kd_kios]</td>
<td>$data[nama_kios]</td>
<td>Rp. ".number_format($data['biaya'],2,',','.').",-</td>
<td>$data[keterangan]</td>
";
?>
<td>
<?php
	      $st = $data['status'];
	      $tp = array(
'kosong' => "<label class='btn btn-danger btn-sm'> Kosong</label>",
'isi' => "<label class='btn btn-success btn-sm'> Terisi</label>");
	      echo "$tp[$st]";
?></td> 
<td><a href="?module=input_kios&kd_kios=<?php echo  $data['kd_kios']; ?>"><button class="btn btn-success btn-sm"><i class="ti-pencil-alt"></i></button></a>
<a href="#" onclick="confirm_modal('modul/mod_kios/hapus.php?&kd_kios=<?php echo  $data['kd_kios']; ?>');"><button class="btn btn-danger btn-rounded btn-sm" title="Delete"><i class="ti-trash"></i></button></a>
</td>		    
</tr>
<?php $no++;}?>

</table>
</div>
</div><!-- /content-panel -->
</div><!-- /col-lg-4 -->			
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