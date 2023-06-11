<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=bank" class="btn btn-info btn-sm"><i class="ti-layout"></i></a>
<a href="?module=input_bank" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> Input</a>
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
<th width="20">No.</th>
<th>Nama Bank</th>
<th>No. Rekening</th>
<th>Nama Nasabah</th>
<th width="90">Aksi</th>
</tr>
</thead>

<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM bank ORDER BY id_bank DESC");
$no=1;
while($data=mysqli_fetch_array($view)){
?>
<tr>
<?php
echo "<td>$no</td>
<td>$data[nama_bank]</td>
<td>$data[no_rekening]</td>
<td>$data[nama_nasabah]</td>
";
?>
<td><a href="?module=input_bank&id_bank=<?php echo  $data['id_bank']; ?>"><button class="btn btn-success btn-xs"><i class="ti-pencil-alt"></i></button></a>
<a href="#" onclick="confirm_modal('modul/mod_bank/hapus.php?&id_bank=<?php echo  $data['id_bank']; ?>');"><button class="btn btn-danger btn-xs"><i class="ti-trash"></i></button></a></td>		    
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
    
