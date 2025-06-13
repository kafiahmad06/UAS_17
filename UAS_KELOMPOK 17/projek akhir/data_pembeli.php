<?php
session_start();
include "property_agency.php";

// Cek apakah user sudah login
if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'pembeli') {
    echo "<script>alert('Akses ditolak!'); window.location.href='login.php';</script>";
    exit;
}

$email = $_SESSION['email'];

// Ambil data pemesanan khusus user ini
$stmt = $conn->prepare("SELECT * FROM pesanan WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pesanan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">

  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-center text-green-600">Pesanan Saya</h1>

    <table class="w-full table-auto border">
      <thead>
        <tr class="bg-green-100">
          <th class="border px-4 py-2">Nama</th>
          <th class="border px-4 py-2">Email</th>
          <th class="border px-4 py-2">Produk</th> <!-- Sudah diganti -->
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="text-center">
              <td class="border px-4 py-2"><?= htmlspecialchars($row['nama']) ?></td>
              <td class="border px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
              <td class="border px-4 py-2"><?= htmlspecialchars($row['produk']) ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="3" class="text-center text-gray-500 py-4">Belum ada pemesanan.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="mt-6 text-right">
      <a href="katalog3.php" class="text-blue-600 hover:underline">&larr; Kembali ke Katalog</a>
    </div>
  </div>

</body>
</html>
