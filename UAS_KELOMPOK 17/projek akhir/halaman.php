<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Property Agency</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 font-sans">

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
    <div id="nav-menu" class="hidden md:flex space-x-6 font-bold items-center">
      <a href="#home" class="text-gray-700 hover:text-blue-500">Home</a>
      <a href="katalog3.php" class="text-gray-700 hover:text-blue-500">Katalog</a>
      <a href="#galeri" class="text-gray-700 hover:text-blue-500">Galeri</a>
      <a href="halaman1.php" class="block py-2 text-red-600 hover:text-red-800">Logout</a>
    </div>
  </div>

  <!-- Mobile Menu (dropdown style) -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
    <a href="#home" class="block py-2 text-gray-700 hover:text-blue-500">Home</a>
    <a href="katalog3.php" class="block py-2 text-gray-700 hover:text-blue-500">Katalog</a>
    <a href="#galeri" class="block py-2 text-gray-700 hover:text-blue-500">Galeri</a>
    <a href="logout.php" class="block py-2 bg-blue-600 text-white rounded text-center hover:bg-blue-700">Logout</a>
  </div>
</nav>

<!-- Hero Section -->
<section id="home" class="bg-cover bg-center h-auto md:h-[80vh] w-full flex items-center justify-start px-6 md:px-40 py-16 md:py-0 transition-all duration-700 ease-in-out" style="background-image: url('hal1.png');">
  <div class="max-w-lg text-center md:text-left">
    <h1 class="text-white text-4xl md:text-5xl font-extrabold leading-tight">
      <span class="text-blue-300 text-[60px] md:text-[120px]">PHOENIX</span><br/>
      <span class="text-orange-400 text-[30px] md:text-[40px]">property Agency</span>
    </h1>
    <p class="mt-6 text-white/80 text-sm md:text-base">
      "Temukan Rumah Impian Anda dengan Mudah"<br/>
      Jelajahi ribuan properti terbaik, dari rumah minimalis hingga apartemen modern, semua tersedia untuk disewa atau dijual.
    </p>
    <a href="katalog.php" class="mt-6 inline-block px-6 py-2 bg-orange-500 text-white rounded-full font-semibold hover:bg-orange-600 transition">
      Lihat
    </a>
    <p class="mt-8 text-xs text-white/50">www.realestate.co</p>
  </div>
</section>

<!-- JavaScript untuk toggle menu -->
<script>
  function toggleMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
  }
</script>

<!-- Script untuk mengganti background -->
<script>
  const section = document.getElementById('home');
  const backgrounds = ['hal1.png', 'hal2.jpg', 'hal3.png'];
  let index = 0;

  setInterval(() => {
    index = (index + 1) % backgrounds.length;
    section.style.backgroundImage = `url('${backgrounds[index]}')`;
  }, 4000); // Ganti gambar setiap 4 detik
</script>

  </section>
    <section class="text-center px-6 md:px-20 py-16">
    <p class="text-md text-green-600 font-semibold">Kenapa Pilih Kami?</p>
    <h2 class="text-2xl md:text-3xl font-semibold mt-2 mb-10 text-sm text-green-600">Karena Kami Memiliki Keunggulan Diantaranya</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
      <div class="bg-gray-300 p-7 rounded-md hover:scale-90 duration-500">
        <div class="rounded-full  w-[60px] h-[60px] d-flex align-items-center justify-content-center mb-3  " >
            <img src="fast-time.png" alt="AI Icon" >
        </div>
        <h3 class="font-semibold text-left">Fleksibilitas Waktu</h3>
        <p class="text-[16px]  text-left">Belanja properti dari mana saja di Indonesia — akses rumah impian tanpa batasan jarak.</p>
      </div>

      <div class="bg-gray-300 p-7 rounded-md hover:scale-90 duration-500">
        <div class="rounded-full  w-[60px] h-[60px] align-items-center mb-3 border-shadow-blue-500">
            <img src="boy.png" alt="AI Icon">
        </div>
        <h3 class="font-semibold text-left">Panduan Properti Cerdas</h3>
        <p class="text-[16px]  text-left">Phoenix Property akan membantu Anda memilih properti yang paling sesuai, baik untuk hunian maupun investasi.</p>
      </div>

      <div class="bg-gray-300 p-7 rounded-md hover:scale-90 duration-500">
         <div class="rounded-full  w-[60px] h-[60px] d-flex align-items-center  mb-3  ">
            <img src="hotel.png" alt="AI Icon">
        </div>
        <h3 class="font-semibold text-left">Konsultasi Pribadi 1-on-1</h3>
        <p class="text-[16px]  text-left">Kami menyediakan konsultan profesional yang siap membantu Anda secara langsung menemukan properti terbaik sesuai kebutuhan.</p>
      </div>

      <div class="bg-gray-300 p-7 rounded-md hover:scale-90 duration-500">
         <div class="rounded-full w-[60px] h-[60px] d-flex align-items-center mb-3  ">
            <img src="salary.png" alt="AI Icon">
        </div>
        <h3 class="font-semibold text-left">Peluang Investasi</h3>
        <p class="text-[16px]  text-left">Capai impian finansial Anda dengan properti bernilai tinggi yang bisa disewa atau dijual kembali dengan keuntungan.
        </p>
      </div>
    </div>

    <div class="bg-gray-300 mt-8 rounded-md hover:scale-90 duration-500">
      <h1 class="font-bold text-green-500 p-6 text-[32px]">About Phoenix Agenncy</h1>
      <p class="p-6 text-justify text-semibold">
        Phoenix Property Agency didirikan sebagai respons terhadap meningkatnya kebutuhan masyarakat akan layanan properti yang profesional, terpercaya, dan berorientasi pada solusi. Sejak awal berdirinya, Phoenix hadir dengan misi untuk menjadi jembatan antara pemilik properti dan calon pembeli atau penyewa melalui pendekatan layanan yang transparan, efisien, dan berbasis teknologi.

        Nama Phoenix diambil dari simbol burung mitologi yang merepresentasikan kelahiran kembali, kekuatan, dan pertumbuhan yang berkelanjutan nilai-nilai yang kami pegang teguh dalam menjalankan bisnis ini. Dengan semangat tersebut, Phoenix Property Agency telah berkembang dari sebuah layanan lokal menjadi platform properti yang melayani berbagai wilayah dengan jangkauan luas dan pilihan properti yang beragam.

        Keunggulan utama Phoenix terletak pada integrasi antara layanan digital dan pendampingan personal oleh tenaga profesional yang berpengalaman di bidang real estate. Platform kami menyediakan akses mudah terhadap informasi properti, mulai dari rumah, apartemen, hingga properti komersial, lengkap dengan detail lokasi, harga, dan status transaksi.

        Melalui inovasi berkelanjutan dan komitmen terhadap kepuasan klien, Phoenix Property Agency terus berupaya menjadi mitra terpercaya dalam proses jual beli maupun sewa properti, serta berperan aktif dalam mendukung pertumbuhan sektor properti di Indonesia.
      </p>
    </div>
  </section>
  <section>
    <section id="mentor" class="px-10 md:px-10 space-y-20 mb-20 mt-[10px] ">
    <div class="flex flex-col md:flex-row items-center gap-[70px] left-[74px] bg-gray-300 rounded-md hover:scale-90 duration-500 mx-7">
      <img src="rumah 2.jpg" class="w-[550px] h-[328px] rounded-md" />
      <div class="p-9">
        <h3 class="text-[32px] font-bold mb-2 ">Temukan Rumah Impian Anda dengan Mudah dan Cepat</h3>
        <p class="text-gray-600">Temukan hunian terbaik untuk Anda dan keluarga, mulai dari rumah modern hingga apartemen eksklusif. Nikmati pengalaman pencarian properti yang nyaman, informatif, dan terpercaya, hanya di platform kami.<br> data science, dan cybersecurity.</p>
      </div>
    </div>

    <div class="flex flex-col-reverse md:flex-row items-center gap-[10px] left-[74px] bg-gray-300 rounded-md hover:scale-90 duration-500 mx-7">
      <div class="items-center text-left p-9">
        <h3 class="text-[32px] font-bold mb-2 items-center">Miliki Hunian Nyaman Sesuai Gaya Hidup Anda</h3>
        <p class="text-gray-600 items-center">Temukan pilihan rumah dan apartemen yang dirancang untuk kenyamanan dan kebutuhan masa kini. Proses pencarian properti jadi lebih cepat, mudah, dan sesuai anggaran Anda di platform kami.
         </p>
      </div>
      <img src="rumah 3.jpg" class="w-[550px] h-[328px] rounded-md"/>
    </div>

    <div class="flex flex-col md:flex-row items-center gap-[70px] left-[74px] hover:scale-90 duration-500 bg-gray-300 rounded-md mx-7 ">
      <img src="rumah 4.png" class="w-[550px] h-[328 px] rounded-md"/>
      <div class="rounded-md">
        <h3 class="text-[32px] font-bold mb-2 gap-24 mx-5">Solusi Tepat untuk Sewa atau Beli Properti Impian</h3>
        <p class="text-gray-600 gap-24 text-[16px] p-8 py-9 px-7">Kami hadir dengan berbagai pilihan properti strategis dan berkualitas. Mulai dari keluarga muda hingga investor, semua bisa menikmati kemudahan dalam menemukan hunian terbaik hanya di sini.
        </p>
      </div>
    </div>
  </section>


  <!-- Galeri Properti -->
  <section id="galeri" class="py-16 bg-gray-200 px-6 md:px-20">
    <h2 class="text-3xl font-semibold mb-8 text-center text-green-500">Galeri</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <?php
      $galeri = ['rumah 1.jpg', 'apartemen 2.jpeg', 'rumah 3.jpg', 'apartemen 4.jpg'];
      foreach ($galeri as $g) {
        echo '<img src="'.$g.'" alt="Galeri" class="rounded shadow-md w-full h-48 object-cover hover:scale-90 duration-500">';
      }
      ?>
    </div>
  </section>

  <!-- Footer -->
  <footer id="business" class="py-6 px-5 lg:px-24  bg-gray-800">
    </div>
    <p class="text-center text-xs text-gray-400 mt-12">© 2025 Phoenix property Agency</p>
  </footer>
</body>
</html>
