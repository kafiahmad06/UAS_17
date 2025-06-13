<?php
include "property_agency.php"; // koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $produk = $_POST['produk'] ?? '';
    $catatan = $_POST['catatan'] ?? '';

    // Validasi sederhana
    if (empty($nama) || empty($email) || empty($produk)) {
        echo "<script>alert('Data tidak lengkap!'); window.history.back();</script>";
        exit;
    }

    // Simpan ke database (pastikan kolom 'catatan' ada di tabel 'pesanan')
    $stmt = $conn->prepare("INSERT INTO pesanan (nama, email, produk, catatan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $produk, $catatan);
    $stmt->execute();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Konfirmasi Pesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-md w-full">
    <h2 class="text-2xl font-bold text-green-600 mb-4">
      Terima kasih, <?= htmlspecialchars($nama) ?>
    </h2>
    <p class="text-gray-700 mb-2">
      Pesanan Anda untuk <strong><?= htmlspecialchars($produk) ?></strong><br><p class="font-bold p-2">Telah Kami Terima.</p> 
    </p>
    <p class="text-gray-700">
      Email konfirmasi dikirim ke: <span class="font-medium"><?= htmlspecialchars($email) ?></span>
    </p>

    <?php if (!empty($catatan)): ?>
      <p class="text-gray-700 mt-4">
        Catatan Anda: <?= nl2br(htmlspecialchars($catatan)) ?>
      </p>
    <?php endif; ?>

    <a href="katalog3.php" class="inline-block bg-blue-600 text-white mt-6 px-6 py-2 rounded hover:bg-blue-700 transition">
      Kembali ke Katalog
    </a>
  </div>

</body>
</html>
<?php } ?>
