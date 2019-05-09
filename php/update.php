<?php 
	
	require "koneksi.php";

	$nim = htmlspecialchars($_POST['id12']);
	$nilai = htmlspecialchars($_POST['nilai']);
	

	$sql = "UPDATE penilaian_seleksi SET nilai_ujian = $nilai WHERE NIM = $nim";

	$hasil = $koneksi->query($sql);

	header("location: ../kelulusan.php");