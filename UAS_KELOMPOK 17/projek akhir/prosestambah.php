<?php
include 'property_agency.php'; // koneksi ke DB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $jenis = $_POST['jenis'];
  $tipe = $_POST['tipe'];
  $lokasi = $_POST['lokasi'];
  $status = $_POST['status'];
  $harga = $_POST['harga'];

  // Upload gambar
  $gambar = $_FILES['gambar']['name'];
  $tmp_name = $_FILES['gambar']['tmp_name'];
  $folder = 'uploads/' . $gambar;

  move_uploaded_file($tmp_name, $folder);

  // Insert ke DB
  $query = "INSERT INTO properti (jenis, tipe, tower, lokasi, status, harga, gambar) 
            VALUES ('$jenis', '$tipe', '$tipe', '$lokasi', '$status', '$harga', '$folder')";

  if (mysqli_query($conn, $query)) {
    header("Location: katalog.php");
    exit;
  } else {
    echo "Gagal menambah properti: " . mysqli_error($conn);
  }
}
?>

