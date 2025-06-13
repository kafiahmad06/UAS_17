<?php
session_start();
include "property_agency.php";

// Ambil data dari URL
$gambar = $_GET['gambar'] ?? '';
$harga = $_GET['harga'] ?? '';
$lokasi = $_GET['lokasi'] ?? '';
$status = $_GET['status'] ?? '';
$tipe = $_GET['tipe'] ?? null;
$tower = $_GET['tower'] ?? null;

// Validasi data
if (!$gambar || !$harga || !$lokasi || !$status || (!$tipe && !$tower)) {
    echo "<p class='text-red-600 text-center mt-10'>Data properti tidak lengkap.</p>";
    exit;
}

// Fasilitas properti
$fasilitas = [
  'A' => ['Kolam Renang Pribadi', 'Taman Belakang', 'CCTV', 'Garasi Mobil', 'AC & Air Panas'],
  'B' => ['Kamar Tidur Luas', 'Kamar Mandi Dalam', 'Dapur Modern', 'Garasi Mobil', 'Teras Depan'],
  'C' => ['Dekat Sekolah', 'Garasi 2 Mobil', 'Listrik 2200 Watt', 'Dapur Bersih', 'Balkon'],
  'D' => ['Halaman Luas', '2 Lantai', 'Pagar Otomatis', 'Air PAM', 'Ruang Tamu Luas'],
  'E' => ['Taman Bermain Anak', 'Area BBQ', 'Kamar Utama + Walk-In Closet', 'Garasi Motor & Mobil', 'Wifi'],
  'F' => ['Kamar Tidur 4', '3 Kamar Mandi', 'Ruang Keluarga Besar', 'Dapur + Pantry', 'Gudang'],
  'Tower A' => ['Dekat Mall', 'Security 24 Jam', 'Lift Pribadi', 'Parkir Basement', 'Kolam Renang'],
  'Tower B' => ['Fitness Center', 'Akses Transportasi Mudah', 'Ruang Serbaguna', 'Parkir Tamu', 'Laundry Bersama']
];

$fitur = $tipe ? ($fasilitas[$tipe] ?? []) : ($fasilitas["Tower $tower"] ?? []);
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Properti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-gray-300 shadow-lg sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <a href="#" class="text-2xl font-bold text-blue-600">Property Agency</a>
    <button class="md:hidden text-gray-700" onclick="toggleMenu()">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
    <div id="nav-menu" class="hidden md:flex space-x-6 items-center font-bold">
      <a href="halaman.php" class="text-gray-700 hover:text-blue-500">Home</a>
      <a href="katalog.php" class="text-gray-700 hover:text-blue-500">Katalog</a>
      <a href="#galeri" class="text-gray-700 hover:text-blue-500">Galeri</a>
      <a href="login.php" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Login</a>
    </div>
  </div>
</nav>

<!-- Konten -->
<section class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
  <img src="<?php echo htmlspecialchars($gambar); ?>" class="w-full h-96 object-cover" alt="Properti">
  <div class="p-6">
    <h2 class="text-2xl font-bold mb-2">
      <?php echo $tipe ? "Rumah Tipe " . htmlspecialchars($tipe) : "Apartemen Tower " . htmlspecialchars($tower); ?>
    </h2>
    <p class="text-gray-600">Lokasi: <?php echo htmlspecialchars($lokasi); ?></p>
    <p class="text-gray-600">Status: <span class="font-semibold text-green-600"><?php echo htmlspecialchars($status); ?></span></p>
    <p class="text-xl text-blue-600 font-bold mt-4">Harga: <?php echo htmlspecialchars($harga); ?></p>

    <h3 class="text-xl font-semibold mt-6 mb-2">Fasilitas:</h3>
    <ul class="list-disc list-inside text-gray-700 space-y-1">
      <?php
      if (!empty($fitur)) {
        foreach ($fitur as $f) {
          echo "<li>" . htmlspecialchars($f) . "</li>";
        }
      } else {
        echo "<li>Fasilitas belum tersedia.</li>";
      }
      ?>
    </ul>

    <h3 class="text-xl font-semibold mt-6 mb-2">Pesan Sekarang:</h3>

    <!-- Form aktif, tapi tombol hanya memunculkan alert -->
    <form onsubmit="return showAlert();" class="space-y-4">
      <input type="text" name="nama" placeholder="Nama Anda" class="w-full p-2 border rounded" required>
      <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded" required>
      <textarea name="catatan" placeholder="Catatan tambahan..." class="w-full p-2 border rounded"></textarea>
      <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Pesan Properti</button>
      <!-- <p class="text-sm text-red-600 mt-2">* Anda harus login terlebih dahulu untuk memesan properti.</p> -->
    </form>

    <script>
      function showAlert() {
        alert("Silakan login terlebih dahulu untuk memesan properti.");
        // window.location.href = "login.php";
        return false;
      }
    </script>

    <div class="mt-6">
      <a href="katalog.php" class="text-blue-600 hover:underline">&larr; Kembali ke Katalog</a>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gray-700 text-white text-center py-6 mt-10">
  <p>&copy; 2025 Property Agency. All rights reserved.</p>
</footer>

</body>
</html>
