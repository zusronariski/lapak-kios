<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="#" class="btn btn-info btn-sm"><i class="ti-layout"></i></a>
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
                                                    <th>Pengirim</th>
                                                    <th>Pesan</th>
                                                    <th>Tgl Kirim</th>
                                                    <th>Balas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kontak WHERE sudahbaca='Y' ORDER BY id_kontak DESC");
while($data=mysqli_fetch_array($view)){
?> 
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $data['nama_lengkap']; ?> <br />
                                                    <small><?php echo $data['hp']; ?></small></td>
<td>
<?php echo "<span>".substr(strip_tags($data['pesan']),0,20)."....</span>";?><a href="?module=inbox&id_kontak=<?php echo $data['id_kontak']; ?>"><button class="btn btn-primary btn-xs" title="Balas">
                                                            <i class="ti-share"></i>
                                                        </button></a>
</td>
<td><?php echo $data['tgl_kirim']; ?></td>
<td>
<?php 
$lvl = $data['status_jawab'];
	      $tp = array(
	      	'Y'=>'<font color="#009F00">Sudah</font>',
			'N'=>'<font color="#F06">Belum</font>');
			echo $tp[$lvl]; ?>
</td>
                                                    <td>

<a href="#" onclick="confirm_modal('modul/mod_kontak/hapus.php?&id_kontak=<?php echo  $data['id_kontak']; ?>');"><button class="btn btn-danger btn-xs"><i class="ti-trash"></i></button></a>
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
