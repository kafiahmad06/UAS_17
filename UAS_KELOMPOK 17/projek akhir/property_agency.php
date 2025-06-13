<?php
$conn = mysqli_connect("localhost", "root", "", "property_agency");
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>
