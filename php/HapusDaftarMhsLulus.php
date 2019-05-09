<?php
  include "koneksi.php";
  $nim = $_GET['nim'];

  $sql = "DELETE FROM penilaian_seleksi WHERE nim = $nim";

  $result = $koneksi->query($sql);

  if ($result === true) {
    header("location: ../kelulusan.php");
  }
