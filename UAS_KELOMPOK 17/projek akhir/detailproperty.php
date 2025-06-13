<?php
include "property_agency.php";
$gambar = $_GET['gambar'] ?? '';
$harga = $_GET['harga'] ?? '';
$lokasi = $_GET['lokasi'] ?? '';
$status = $_GET['status'] ?? '';
$tipe = $_GET['tipe'] ?? null;
$tower = $_GET['tower'] ?? null;
$fasilitas= $_GET['fasilitas'] ?? '';


// Validasi data wajib
if (!$gambar || !$harga || !$lokasi || !$status || (!$tipe && !$tower)) {
    echo "<p class='text-red-600 text-center mt-10'>Data properti tidak lengkap.</p>";
    exit;
}

// Data fasilitas per properti
$fasilitas = [
  $fasilitas = [
  'A' => ['Kolam Renang Pribadi', 'Taman Belakang', 'CCTV', 'Garasi Mobil', 'AC & Air Panas'],
  'B' => ['Kamar Tidur Luas', 'Kamar Mandi Dalam', 'Dapur Modern', 'Garasi Mobil', 'Teras Depan'],
  'C' => ['Dekat Sekolah', 'Garasi 2 Mobil', 'Listrik 2200 Watt', 'Dapur Bersih', 'Balkon'],
  'D' => ['Halaman Luas', '2 Lantai', 'Pagar Otomatis', 'Air PAM', 'Ruang Tamu Luas'],
  'E' => ['Taman Bermain Anak', 'Area BBQ', 'Kamar Utama + Walk-In Closet', 'Garasi Motor & Mobil', 'Wifi'],
  'F' => ['Kamar Tidur 4', '3 Kamar Mandi', 'Ruang Keluarga Besar', 'Dapur + Pantry', 'Gudang'],
  'G' => ['Dekat Jalan Raya', 'Carport', 'AC di Semua Ruangan', 'Kamar ART', 'Storage Room'],
  'H' => ['Roof Garden', 'Kolam Renang Umum', 'Minimarket Dekat', 'Smart Lock Door', 'Lighting Otomatis'],
  'I' => ['Teras Depan & Belakang', 'Gazebo', 'Taman Kecil', 'Kamar Tamu', 'Tangga Kayu'],
  'J' => ['Akses Tol Dekat', 'Genset Cadangan', 'CCTV 24 Jam', 'Pos Satpam', 'Taman Depan'],
  'K' => ['Jendela Besar', 'Ventilasi Udara Alami', 'Dekat RS & Sekolah', 'Akses Motor Mudah', 'Dapur Terbuka'],
  'L' => ['Parkir Indoor', 'Void Tinggi', 'Mezzanine', 'Lantai Granit', 'Pintu Geser'],
  'M' => ['Pencahayaan Alami', 'Dapur Kering & Basah', 'Walk-In Pantry', 'Rak Sepatu Built-in', 'Taman Dalam'],
  'N' => ['Lift Pribadi', 'AC Central', 'Ruang Musik', 'Kamar Studio', 'Pintu Otomatis'],
  'O' => ['Dekat Mall', 'View Pegunungan', 'Kamar Serbaguna', 'Gudang Besar', 'Lorong Luas'],
  'P' => ['Area Cuci Jemur', 'Pagar Besi Hollow', 'Balkon Panjang', 'Cermin Dinding', 'Water Heater'],
  'Q' => ['Toilet Tamu', 'Ruang Keluarga Terbuka', 'Rak TV Tanam', 'Smart Home System', 'Pintu Digital'],
  'R' => ['Kamar Tidur Anak 2', 'Lampu LED Hemat Energi', 'Lemari Dinding', 'Area Parkir Luas', 'Dekat Taman Kota'],
  'S' => ['Sistem Keamanan Pintu Ganda', 'Ruang Kerja', 'Pencahayaan LED Otomatis', 'Koneksi Internet Fiber', 'Garasi Listrik']
];

  'Tower A' => ['Dekat Mall', 'Security 24 Jam', 'Lift Pribadi', 'Parkir Basement', 'Kolam Renang'],
  'Tower B' => ['Fitness Center', 'Akses Transportasi Mudah', 'Ruang Serbaguna', 'Parkir Tamu', 'Laundry Bersama']
];

// Ambil daftar fasilitas sesuai tipe/tower
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
<body class="bg-gray-300">

  <!-- Navbar -->
   <nav class="bg-gray-300 shadow-lg sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <a href="#" class="text-2xl font-bold text-blue-600">Property Agency</a>

    <!-- Hamburger icon (mobile only) -->
    <button class="md:hidden text-gray-700 focus:outline-none" onclick="toggleMenu()">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none"
           viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>

    <!-- Menu Items -->
    <div id="nav-menu" class="hidden md:flex space-x-6 items-center font-bold">
      <a href="halaman.php" class="text-gray-700 hover:text-blue-500">Home</a>
      <a href="katalog.php" class="text-gray-700 hover:text-blue-500">Katalog</a>
      <a href="#galeri" class="text-gray-700 hover:text-blue-500">Galeri</a>
    </div>
  </div>

  <!-- Mobile Menu (dropdown style) -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
    <a href="#home" class="block py-2 text-gray-700 hover:text-blue-500">Home</a>
    <a href="katalog.php" class="block py-2 text-gray-700 hover:text-blue-500">Katalog</a>
    <a href="#galeri" class="block py-2 text-gray-700 hover:text-blue-500">Galeri</a>
    <a href="login.php" class="block py-2 bg-blue-600 text-white rounded text-center hover:bg-blue-700">Login</a>
  </div>
</nav>

  <!-- Konten Detail -->
  <section class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <img src="<?php echo htmlspecialchars($gambar); ?>" class="w-full h-96 object-cover" alt="Properti">
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-2">
        <?php
        if ($tipe) {
          echo "Rumah Tipe " . htmlspecialchars($tipe);
        } else {
          echo "Apartemen Tower " . htmlspecialchars($tower);
        }
        ?>
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
      <form action="pesan.php" method="POST" class="space-y-4">
        <input type="hidden" name="produk" value="<?php echo $tipe ? 'Rumah Tipe ' . htmlspecialchars($tipe) : 'Apartemen Tower ' . htmlspecialchars($tower); ?>">
        <input type="text" name="nama" placeholder="Nama Anda" class="w-full p-2 border rounded" required>
        <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded" required>
        <textarea name="catatan" placeholder="Catatan tambahan..." class="w-full p-2 border rounded"></textarea>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Pesan Properti</button>
      </form>

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
