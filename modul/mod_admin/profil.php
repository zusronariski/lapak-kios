<div class="col-md-8">
<div class="card">
<div class="header">
<h5 class="title">PROFIL PENGGUNA </h5>

<hr />
</div>
<div class="panel-heading">
<div class="content table-responsive table-full-width">
<table class="table table-hover table-striped">
<thead>
<tr>
<th>Nama Lengkap</th>
<th>email</th>
<th>Aksi</th>
</tr>
</thead>
 <?php
$view=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_admin WHERE id_admin='$_GET[id]'");
			  while($data=mysqli_fetch_array($view)){
			  ?>          
			
			<tr>
                <td><?php echo $data['first_name']; ?></td>
                <td><?php echo $data['email']; ?></td>
</td>
<td><a href="?module=input_admin&id_admin=<?php echo  $data['id_admin']; ?>"><button class="btn btn-info btn-xs"><i class="pe-7s-pen"></i></button></a></td>		    
              </tr>
             <?php $no++;}?>
                                </table>

 <div class="clearfix"></div>
</div></div>
</div><!-- /content-panel -->
</div><!-- /col-lg-4 -->
<?php
$query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM user_admin WHERE id_admin='$_GET[id]'");
                    $data  = mysqli_fetch_array($query);
                    ?>
<div class="col-md-4">
<div class="card card-user">
<div class="image">
</div>
<div class="content">
<div class="author">
<img class="avatar border-gray" src="foto_admin/<?php echo $data['foto']; ?>" alt="..."/>
<h4 class="title"><?php echo $data['last_name']." ".$data['first_name']; ?>
</h4>
</div></div></div></div>