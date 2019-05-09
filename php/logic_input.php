<?php 
	include "koneksi.php";
	$id_daftar = $_POST['id12'];
	$nilai = $_POST['nilai'];
  $ulangi = true;
	$acak = rand(1,1000);
	$tglulus = date('d-M-Y');

	// Pengecakan apa id sudah di data apa belum
	$sql_cek_iddaftar = "SELECT id_pendaftar FROM penilaian_seleksi WHERE id_pendaftar = '$id_daftar'";
	$dt_cek_iddaftar = $koneksi->query($sql_cek_iddaftar);
	$cek_row_iddaftar = mysqli_num_rows($dt_cek_iddaftar);

	// Pengecekan 3 jurusan yang dipilih oleh calon mahasiswa
	$sql_cek_pilihan = "SELECT @no := @no + 1 AS nomor, id_pendaftar, nama, pilihan_prodi_1, pilihan_prodi_2, pilihan_prodi_3 FROM pendaftar JOIN (SELECT @no := 0) r WHERE `id_pendaftar` = $id_daftar;";
	$dt_cek_pilihan = $koneksi->query($sql_cek_pilihan);
	$result_cek_pilihan = array();

	while ($fetchData = $dt_cek_pilihan->fetch_assoc()) {
		$result_cek_pilihan[] = $fetchData;
  }

  $opsi = array();

  foreach ($result_cek_pilihan as $oke) {
    $opsi[] = $oke['pilihan_prodi_1'];
    $opsi[] = $oke['pilihan_prodi_2'];
    $opsi[] = $oke['pilihan_prodi_3'];
	};

	// Logika Kelulusan Otomatis
	if ($cek_row_iddaftar == 0) {
		for ($i=0; $i < 3; $i++) { 
			if ($ulangi == true) {
				$pilihan = $opsi[$i];

				// Pengecekan apa kuota sudah penuh ?
				$sql_cek_row = "SELECT * FROM penilaian_seleksi WHERE jurusan = '$pilihan' ";
				$dt_cek_row = $koneksi->query($sql_cek_row);
				$cek_row = mysqli_num_rows($dt_cek_row);

				// Pengecekan jumlah kuota jurusan
				if ($cek_row < 1) {
					if ($nilai > 70) {

						// Lulus jika nilai melebihi nilai minimal dan kuota masih ada
						$sqltambah = "INSERT INTO penilaian_seleksi (NIM, id_pendaftar, nilai_ujian, jurusan, status, tgl_lulus) VALUES($acak, '$id_daftar', $nilai, '$pilihan', 'Lulus', '$tglulus')";
						$dt_tambah = $koneksi->query($sqltambah);
						$ulangi = false;
						header('location: ../data-mahasiswa.php');
					} else {
						echo "Maaf Nilai anda kurang ";
					}
				} else {

					// Pengecekan Nilai minimun untuk masuk jika kuota sudah penuh
					$sql_cek_min = "SELECT NIM, id_pendaftar, nilai_ujian, jurusan, STATUS FROM penilaian_seleksi WHERE jurusan = '$pilihan' AND nilai_ujian = (SELECT MIN(nilai_ujian) FROM penilaian_seleksi WHERE jurusan = '$pilihan')";
					$dt_cek_min = $koneksi->query($sql_cek_min);
					$hasil_cek_min = $dt_cek_min->fetch_assoc();

					// Inisialisasi Nilai Minimal
					$nilai_min = $hasil_cek_min['nilai_ujian'];
					$id_nilai_min = $hasil_cek_min['id_pendaftar'];

					if ($nilai > $nilai_min) {
						// Update nilai terkecil jika kouta penuh dan nilai lebih besar dari nilai terkecil
						$sql_update = "UPDATE penilaian_seleksi SET NIM = $acak, id_pendaftar = '$id_daftar', nilai_ujian = $nilai , jurusan = '$pilihan' WHERE id_pendaftar = '$id_nilai_min' ";
						$dt_update = $koneksi->query($sql_update);
						$ulangi = false;
						header('location: ../data-mahasiswa.php');
					} else {
						echo "Maaf Nilai Anda Kurang ";
					}
				}
			}
		}
	} else {
		echo "ID sudah di isi";
	}
