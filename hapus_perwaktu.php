<?php

require 'koneksi/koneksi.php';

	$koneksi->query("DELETE FROM form_pengajuan WHERE tgl_diajukan='$_GET[waktu]'");
	echo "<script>alert('SPK Tanggal $_GET[waktu] Telah Dihapus');</script>";
	echo "<script>location='index.php';</script>";
?>