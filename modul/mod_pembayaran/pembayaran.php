<div class="col-md-12 grid-margin">
<div class="col-12 col-xl-8 mb-4 mb-xl-0">

<div class="btn-group" role="group" aria-label="Basic example">
<a href="media.php" class="btn btn-primary btn-sm"><i class="ti-home"></i> </a>
<a href="?module=pembayaran" class="btn btn-info btn-sm"><i class="ti-layout"></i></a>
<a href="?module=input_pembayaran" class="btn btn-danger btn-sm"><i class="ti-pencil-alt"></i> Input</a>
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
<th>kios</th>
<th>Penyewa</th>
<th>Jumlah </th>
<th>Tgl Bayar</th>
<th>Tgl Tempo</th>
<th>Bayar</th>
<th>Option</th>
<th>Aksi</th>
</tr>
</thead>
<?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM kios a, penyewa b, pembayaran c WHERE a.kd_kios=b.kd_kios AND b.kd_penyewa=c.kd_penyewa AND c.status='lunas' ORDER BY c.id_pembayaran DESC");
$no=1;
while($data=mysqli_fetch_array($view)){
	$bayar = $data['biaya'] * $data['jumlah'];
	$bayar = format_rupiah($bayar);
	$jml = $data['jumlah'];
	$tgl = tgl_indo($data['tgl']);
	$tgl_tempo=substr($data['tgl'],8,2)." ".getBulan(substr($data['tgl'],5,2)+$data['jumlah'])." ".substr($data['tgl'],0,4);
?>
	<tr>
<?php
echo "<td>$no</td>
<td>$data[kd_kios]</td>
<td>$data[nama]</td>
<td>$jml Bulan</td>
<td>$tgl</td>
<td>$tgl_tempo</td>
";
?>
<td align="right">Rp.<?php echo $bayar  ?>,-</td>
<td><a href="cetak_bukti.php?id_pembayaran=<?php echo  $data['id_pembayaran']; ?>" target="_blank" title="Cetak Kwitansi"><button class="btn btn-primary btn-fill btn-xs"><i class="ti-printer"></i></button></a>
<a href="?module=detail_pembayaran&id_pembayaran=<?php echo  $data['id_pembayaran']; ?>" title="Tampil Detail"><button class="btn btn-warning btn-fill btn-xs"><i class="ti-search"></i></button></a></td>	
<td><a href="?module=edit_pembayaran&id_pembayaran=<?php echo  $data['id_pembayaran']; ?>" title="Edit Data"><button class="btn btn-success btn-xs"><i class="ti-pencil-alt"></i></button></a>
<a href="#" onclick="confirm_modal('modul/mod_pembayaran/hapus.php?&id_pembayaran=<?php echo  $data['id_pembayaran']; ?>');"><button class="btn btn-danger btn-xs"><i class="ti-trash"></i></button></a>
</td>  
</tr>
<?php $no++;}?>

</table>
</div></div>
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