<?php
$module = $_GET['module'];

if ($module == 'kios'){
	include "modul/mod_kios/kios.php";
}
elseif ($module == 'input_kios'){
	include "modul/mod_kios/input_kios.php";
}
elseif ($module == 'penyewa'){
	include "modul/mod_penyewa/penyewa.php";
}
elseif ($module == 'input_penyewa'){
	include "modul/mod_penyewa/input_penyewa.php";
}
elseif ($module == 'detail_penyewa'){
	include "modul/mod_penyewa/detail_penyewa.php";
}
elseif ($module == 'notifikasi'){
	include "modul/mod_penyewa/notifikasi.php";
}
elseif ($module == 'pembayaran'){
	include "modul/mod_pembayaran/pembayaran.php";
}
elseif ($module == 'data_pembayaran'){
	include "modul/mod_pembayaran/data_pembayaran.php";
}
elseif ($module == 'input_pembayaran'){
	include "modul/mod_pembayaran/input_pembayaran.php";
}
elseif ($module == 'bayar_kios'){
	include "modul/mod_pembayaran/bayar_kios.php";
}
elseif ($module == 'detail_pembayaran'){
	include "modul/mod_pembayaran/detail_pembayaran.php";
}
elseif ($module == 'edit_pembayaran'){
	include "modul/mod_pembayaran/edit_pembayaran.php";
}
elseif ($module == 'bank'){
	include "modul/mod_bank/bank.php";
}
elseif ($module == 'input_bank'){
	include "modul/mod_bank/input_bank.php";
}
elseif ($module == 'laporan'){
	include "modul/mod_laporan/laporan.php";
}
elseif ($module == 'kontak'){
	include "modul/mod_kontak/kontak.php";
}
elseif ($module == 'input_pesan'){
	include "modul/mod_kontak/input_pesan.php";
}
elseif ($module == 'inbox'){
	include "modul/mod_kontak/inbox.php";
}
elseif ($module == 'inboxq'){
	include "modul/mod_kontak/inboxq.php";
}
elseif ($module == 'detail_inbox'){
	include "modul/mod_kontak/detail_inbox.php";
}
elseif ($module == 'input_cover'){
	include "modul/mod_setting/input_cover.php";
}
elseif ($module == 'cover'){
	include "modul/mod_setting/cover.php";
}
elseif ($module == 'input_setting'){
	include "modul/mod_setting/input_setting.php";
}
elseif ($module == 'setting'){
	include "modul/mod_setting/setting.php";
}
elseif ($module == 'profil'){
	include "modul/mod_admin/profil.php";
}
elseif ($module == 'profile'){
	include "modul/mod_admin/profile.php";
}
elseif ($module == 'input_admin'){
	include "modul/mod_admin/input_admin.php";
}
elseif ($module == 'admin'){
	include "modul/mod_admin/admin.php";
}
elseif ($module == 'update_akun'){
	include "modul/mod_admin/update_akun.php";
}
elseif ($module == 'petunjuk'){
	include "modul/mod_bank/petunjuk.php";
}
else{
include "utama.php";
}
?>

