<?php 
	include "koneksi.php";
	$id_daftar = $_POST['id12'];
	$nilai = $_POST['nilai'];
  $ulangi = true;
	$tglulus = date('d-M-Y');

	// Pengecekan 3 jurusan yang dipilih oleh calon mahasiswa
	$sql_cek_pilihan = "SELECT a.id_pendaftar AS id, a.nama AS nama, b1.nm_jurusan AS jurusan1, b2.nm_jurusan AS jurusan2, b3.nm_jurusan AS jurusan3 FROM pendaftar a JOIN jurusan b1 ON b1.id_jurusan = a.id_jurusan1 JOIN jurusan b2 ON b2.id_jurusan = a.id_jurusan2 JOIN jurusan b3 ON b3.id_jurusan = a.id_jurusan3 WHERE id_pendaftar = $id_daftar";
	$dt_cek_pilihan = $koneksi->query($sql_cek_pilihan);
	$result_cek_pilihan = array();

	while ($fetchData = $dt_cek_pilihan->fetch_assoc()) {
		$result_cek_pilihan[] = $fetchData;
  }

  $opsi = array();

  foreach ($result_cek_pilihan as $oke) {
    $opsi[] = $oke['jurusan1'];
    $opsi[] = $oke['jurusan2'];
    $opsi[] = $oke['jurusan3'];
	};

	// Logika Kelulusan Otomatis
	for ($i = 0; $i < 3; $i++){
		if ($ulangi == true) {
			$acak = rand(1,1000);
			$pilihJurusan = $opsi[$i];

			$batasNilai = batasNilai();
			$batasKuota = batasKuota();

			// Pengecekan apa kuota sudah penuh ?
			$sql_cek_row = "SELECT * FROM penilaian_seleksi WHERE jurusan = '$pilihJurusan' AND status = 'Lulus'";
			$dt_cek_row = $koneksi->query($sql_cek_row);
			$cek_row = mysqli_num_rows($dt_cek_row);

			// Pengecekan jumlah kuota jurusan
			if ($cek_row < $batasKuota - 1) {
				if ($nilai > $batasNilai) {

					// Lulus jika nilai melebihi nilai minimal dan kuota masih ada
					$sqltambah = "INSERT INTO penilaian_seleksi (NIM, id_pendaftar, nilai_ujian, jurusan, status, tgl_lulus) VALUES($acak, '$id_daftar', $nilai, '$pilihJurusan', 'Lulus', '$tglulus')";
					$dt_tambah = $koneksi->query($sqltambah);
					$ulangi = false;
					header('location: ../data-mahasiswa.php');
				} else {
					$sqltambah = "INSERT INTO penilaian_seleksi (NIM, id_pendaftar, nilai_ujian, jurusan, status, tgl_lulus) VALUES($acak, '$id_daftar', $nilai, '$pilihJurusan', 'Tidak Lulus', '-')";
					$dt_tambah = $koneksi->query($sqltambah);
					if ($i == 2) {
						header('location: ../data-mahasiswa.php');
					}
				}
			} else {

				// Pengecekan Nilai minimun untuk masuk jika kuota sudah penuh
				$sql_cek_min = "SELECT NIM, id_pendaftar, nilai_ujian, jurusan, STATUS FROM penilaian_seleksi WHERE jurusan = '$pilihJurusan' AND nilai_ujian = (SELECT MIN(nilai_ujian) FROM penilaian_seleksi WHERE jurusan = '$pilihJurusan')";
				$dt_cek_min = $koneksi->query($sql_cek_min);
				$hasil_cek_min = $dt_cek_min->fetch_assoc();

				// Inisialisasi Nilai Minimal
				$nilai_min = $hasil_cek_min['nilai_ujian'];
				$id_nilai_min = $hasil_cek_min['id_pendaftar'];

				if ($nilai > $nilai_min) {
					// Update nilai terkecil jika kouta penuh dan nilai lebih besar dari nilai terkecil
					$sql_update = "UPDATE penilaian_seleksi SET status = 'Tidak Lulus' WHERE id_pendaftar = '$id_nilai_min' ";
					$sqltambah = "INSERT INTO penilaian_seleksi (NIM, id_pendaftar, nilai_ujian, jurusan, status, tgl_lulus) VALUES($acak, '$id_daftar', $nilai, '$pilihJurusan', 'Lulus', '$tglulus')";
					$dt_tambah = $koneksi->query($sqltambah);
					$dt_update = $koneksi->query($sql_update);
					$ulangi = false;
					header('location: ../data-mahasiswa.php');
				} else {
					$sqltambah = "INSERT INTO penilaian_seleksi (NIM, id_pendaftar, nilai_ujian, jurusan, status, tgl_lulus) VALUES($acak, '$id_daftar', $nilai, '$pilihJurusan', 'Tidak Lulus', '-')";
					$dt_tambah = $koneksi->query($sqltambah);
					if ($i == 2) {
						header('location: ../data-mahasiswa.php');
					}
				}
			}
		}
	}

function batasNilai(){
	global $pilihJurusan;

	if ($pilihJurusan == "Teknik Informatika") {
		return 50;
	} elseif ($pilihJurusan == "Teknik Arsitektur") {
		return 50;
	} elseif ($pilihJurusan == "Biologi") {
		return 60;
	} elseif ($pilihJurusan == "Kimia") {
		return 50;
	} elseif ($pilihJurusan == "Fisika") {
		return 50;
	} elseif ($pilihJurusan == "Matematika") {
		return 50;
	}
}

function batasKuota(){
	global $pilihJurusan;

	if ($pilihJurusan == "Teknik Informatika") {
		return 125;
	} elseif ($pilihJurusan == "Teknik Arsitektur") {
		return 100;
	} elseif ($pilihJurusan == "Biologi") {
		return 150;
	} elseif ($pilihJurusan == "Kimia") {
		return 120;
	} elseif ($pilihJurusan == "Fisika") {
		return 100;
	} elseif ($pilihJurusan == "Matematika") {
		return 100;
	}
}
