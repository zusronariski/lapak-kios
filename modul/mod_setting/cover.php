<div class="row">
<div class="col-lg-12 stretch-card">
<div class="card">
<div class="card-header">
<a href="media.php"><button class='btn btn-danger btn-sm '><i class="icon-arrow-left"></i></button></a> Cover Sistem
</div>         
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped table-borderless">
<thead>
<tr>
<th><b>Judul </b></th>
<th><b>Gambar</b></th>
<th><b>Aksi</b></th>
</tr>
</thead>
 <?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM cover order by id_cover DESC");
$no=1;
while($data=mysqli_fetch_array($view)){
?>
<tr>
<td> <?php echo $data['judul']; ?></td>
<td><img src="images/cover/<?php echo $data['foto']; ?>" /></td>
<td><a href="?module=input_cover&id_cover=<?php echo  $data['id_cover']; ?>"><button class="btn btn-outline btn-primary btn-sm" title="Edit"><i class="ti-pencil"></i></button></a>
<a href="#" onclick="confirm_modal('mod_setting/hapus.php?&id_cover=<?php echo  $data['id_cover']; ?>');"><button class="btn btn-outline btn-danger btn-sm" title="Hapus"><i class="ti-trash"></i></button></a>
</td></tr>
<?php $no++;}?>
</table>
</div>
</div>
</div>
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

