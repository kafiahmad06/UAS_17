<?php
include 'property_agency.php'; // koneksi database
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Katalog Properti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<!-- Navbar -->
<nav class="bg-gray-300 shadow-lg sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <a href="#" class="text-2xl font-bold text-blue-600">Property Agency</a>
    <button class="md:hidden text-gray-700" onclick="toggleMenu()">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
    </button>
    <div id="nav-menu" class="hidden md:flex space-x-6 items-center font-bold">
      <a href="halaman.php" class="hover:text-blue-500">Home</a>
      <a href="katalog3.php" class="hover:text-blue-500">Katalog</a>
    </div>
  </div>
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
    <a href="halaman.php" class="block py-2">Home</a>
    <a href="katalog.php" class="block py-2">Katalog</a>
  </div>
</nav>

<!-- Hero -->
<section class="bg-cover bg-center h-auto md:h-[80vh] w-full flex items-center justify-start px-6 md:px-40 py-16 md:py-0" style="background-image: url('hal1.png');">
  <div class="max-w-lg text-center md:text-left">
    <h1 class="text-white text-5xl font-extrabold leading-tight">
      <span class="text-blue-300 text-[60px] md:text-[120px]">PHOENIX</span><br/>
      <span class="text-orange-400 text-[30px] md:text-[40px]">property Agency</span>
    </h1>
    <p class="mt-6 text-white/80 text-sm md:text-base">
      "Temukan Rumah Impian Anda dengan Mudah"
      <br/>Jelajahi ribuan properti terbaik, dari rumah minimalis hingga apartemen modern.
    </p>
    <a href="#katalog" class="mt-6 inline-block px-6 py-2 bg-orange-500 text-white rounded-full font-semibold hover:bg-orange-600 transition">
      Lihat
    </a>
  </div>
</section>

<!-- Katalog -->
<section id="katalog" class="py-16 px-6 md:px-20">
  <h2 class="text-3xl font-bold mb-8 text-center">Katalog Properti</h2>

  <!-- RUMAH -->
  <h3 class="text-2xl font-bold mb-4 text-center">RUMAH</h3>
  <div class="flex overflow-x-auto space-x-4 mb-10">
    <?php
    $rumah = mysqli_query($conn, "SELECT * FROM properti WHERE jenis='Rumah' ORDER BY id DESC");
    while ($r = mysqli_fetch_assoc($rumah)) {
      $warna = ($r['status'] === 'Dijual') ? 'green' : (($r['status'] === 'Disewa') ? 'yellow' : 'gray');
      $hargaTampil = 'Rp ' . number_format((int)preg_replace('/[^0-9]/', '', $r['harga']), 0, ',', '.');

      echo '
      <div class="min-w-[250px] bg-white rounded-lg shadow-md overflow-hidden hover:scale-90 duration-500">
        <a href="detailproperty.php?tipe=' . urlencode($r['tipe']) . '&lokasi=' . urlencode($r['lokasi']) . '&status=' . urlencode($r['status']) . '&harga=' . urlencode($r['harga']) . '&gambar=' . urlencode($r['gambar']) . '">
          <img src="' . $r['gambar'] . '" class="w-full h-48 object-cover" alt="Rumah">
        </a>
        <div class="p-4">
          <h3 class="font-bold text-xl">Rumah Tipe ' . $r['tipe'] . '</h3>
          <p class="text-gray-600">' . $r['lokasi'] . '</p>
          <p>Status: <span class="text-' . $warna . '-600 font-semibold">' . $r['status'] . '</span></p>
          <p class="text-blue-600 font-bold">' . $hargaTampil . '</p>
        </div>
      </div>';
    }
    ?>
  </div>

  <!-- APARTEMEN -->
  <h3 class="text-2xl font-bold mb-4 text-center mt-10 py-6">APARTEMEN</h3>
  <div class="flex overflow-x-auto space-x-4">
    <?php
    $apartemen = mysqli_query($conn, "SELECT * FROM properti WHERE jenis='Apartemen' ORDER BY id DESC");
    while ($a = mysqli_fetch_assoc($apartemen)) {
      $warna = ($a['status'] === 'Dijual') ? 'green' : (($a['status'] === 'Disewa') ? 'yellow' : 'gray');
      $hargaTampil = 'Rp ' . number_format((int)preg_replace('/[^0-9]/', '', $a['harga']), 0, ',', '.');

      echo '
      <div class="min-w-[250px] bg-white rounded-lg shadow-md overflow-hidden hover:scale-90 duration-500">
        <a href="detailproperty.php?tipe=Tower ' . urlencode($a['tipe']) . '&lokasi=' . urlencode($a['lokasi']) . '&status=' . urlencode($a['status']) . '&harga=' . urlencode($a['harga']) . '&gambar=' . urlencode($a['gambar']) . '">
          <img src="' . $a['gambar'] . '" class="w-full h-48 object-cover" alt="Apartemen">
        </a>
        <div class="p-4">
          <h3 class="font-bold text-xl">Apartemen Tower ' . $a['tipe'] . '</h3>
          <p class="text-gray-600">' . $a['lokasi'] . '</p>
          <p>Status: <span class="text-' . $warna . '-600 font-semibold">' . $a['status'] . '</span></p>
          <p class="text-blue-600 font-bold">' . $hargaTampil . '</p>
        </div>
      </div>';
    }
    ?>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gray-700 text-white text-center py-6">
  <p>&copy; 2025 Property Agency. All rights reserved.</p>
</footer>

<!-- Script Navbar -->
<script>
  function toggleMenu() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  }
</script>

</body>
</html>
