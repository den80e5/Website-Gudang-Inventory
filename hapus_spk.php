<?php

require 'koneksi/koneksi.php';

	$koneksi->query("DELETE FROM form_pengajuan WHERE no_sok='$_GET[no_sok]'");
	echo "<script>alert('SPK $_GET[no_sok] Telah Dihapus');</script>";
	echo "<script>location='tmpl_perspk.php';</script>";
?>