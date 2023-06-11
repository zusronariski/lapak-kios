<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-1 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=input_pesan" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> Kirim Pesan</a>
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
                                                    <th>Pesan</th>
                                                    <th>Tgl Kirim</th>
                                                    <th>Terjawab</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE email='$ser[nik]' AND status_jawab='Y' ORDER BY id_kontak DESC");
while($data=mysqli_fetch_array($view)){
    $input = tgl_indo($data['tgl_kirim']);
			 $date1 = "$data[tgl_kirim]";
			 $date = new DateTime($date1);
?> 
                                            <tbody>
                                                <tr>
                                                     <td><span class="font-12 text-muted"><?php echo $data['pesan']; ?></span></td>
                                                     <td><?php echo $input; ?> <?php echo $date->format("H:i:s"); ?> </td>
                                                    <td>
														 <?php 
													 $lvl = $data['status_jawab'];
	      $tp = array(
	      	'Y'=>'<font color="#009F00">Sudah</font>',
			'N'=>'<font color="#F06">Belum</font>');
			echo $tp[$lvl]; ?>
                                                    </td>
                                                    <td>
<a href="?module=detail_inbox&id_kontak=<?php echo $data['id_kontak']; ?>"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Lihat"> <i class="ti-zoom-in"></i></button></a>
<a href="#" onclick="confirm_modal('modul/mod_kontak/hapus.php?&id_kontak=<?php echo  $data['id_kontak']; ?>');"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus">
                                                            <i class="ti-trash"></i>
                                                        </button></a>
                                                    </td>

                                                </tr>
                                            </tbody>
<?php
}
?>
                                        </table>
                                    </div>
                                </div>
</div></div></div>
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