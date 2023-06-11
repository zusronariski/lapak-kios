<li class="nav-item">
            <a class="nav-link" href="media.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
</li>
<?php if($akses=='1'){ ?>
<li class="nav-item">
            <a class="nav-link" href="?module=kios">
            <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Data Kios</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=penyewa">
           <i class="icon-head menu-icon"></i>
              <span class="menu-title">Daftar Penyewa</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=pembayaran">
           <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Data Pembayaran</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=kontak">
           <i class="icon-mail menu-icon"></i>
              <span class="menu-title">Kontak</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=bank">
           <i class="icon-briefcase menu-icon"></i>
              <span class="menu-title">Data Banking</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=laporan">
         <i class="icon-file-subtract menu-icon"></i>
              <span class="menu-title">Laporan</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="icon-contract menu-icon"></i>
              <span class="menu-title">Pengaturan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="?module=setting">Sistem</a></li>
                <li class="nav-item"> <a class="nav-link" href="?module=cover">Cover</a></li>
              </ul>
            </div>
          </li>
<?php } ?>
<!--=====end========-->	
<?php if($akses=='2'){ ?>

<li class="nav-item">
            <a class="nav-link" href="?module=profile&kd_penyewa=<?php echo $ser['kd_penyewa'];?>">
           <i class="icon-head menu-icon"></i>
              <span class="menu-title">Profil Saya</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=data_pembayaran&kd_penyewa=<?php echo $ser['kd_penyewa'];?>">
           <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Pembayaran Kios</span>
            </a>
</li>

<li class="nav-item">
            <a class="nav-link" href="?module=inboxq">
           <i class="icon-mail menu-icon"></i>
              <span class="menu-title">Kontak</span>
            </a>
</li>
<li class="nav-item">
            <a class="nav-link" href="?module=petunjuk">
           <i class="icon-help menu-icon"></i>
              <span class="menu-title">Panduan</span>
            </a>
</li>
<?php } ?>