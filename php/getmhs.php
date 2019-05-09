<?php 
  include "koneksi.php";
  
  $id = $_POST['nim'];

	$query = $koneksi->query("SELECT NIM, pendaftar.nama, nilai_ujian, penilaian_seleksi.jurusan, status, tgl_lulus FROM penilaian_seleksi, pendaftar WHERE penilaian_seleksi.id_pendaftar = pendaftar.id_pendaftar AND NIM = $id");
	$result = array();
	while ($fetchData = $query->fetch_assoc()) {
		$result[] = $fetchData;
  }
  
	echo json_encode($result);