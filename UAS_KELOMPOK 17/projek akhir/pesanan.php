<?php
include "property_agency.php";

$result = $conn->query("SELECT * FROM pesanan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Pemesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 p-6">

  <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4 text-center text-blue-600">Data Pemesanan</h1>

    <table class="w-full table-auto border">
      <thead>
        <tr class="bg-blue-100">
          <th class="border px-4 py-2">Nama</th>
          <th class="border px-4 py-2">Email</th>
          <th class="border px-4 py-2">Properti</th>
          <th class="border px-4 py-2">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr class="text-center">
          <td class="border px-4 py-2"><?= htmlspecialchars($row['nama']) ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
          <td class="border px-4 py-2"><?= htmlspecialchars($row['produk']) ?></td>
          <td class="border px-4 py-2">
            <a href="edit_pesanan.php?id=<?= $row['id'] ?>" class="text-yellow-600 hover:underline">Edit</a> |
            <a href="hapus_pesanan.php?id=<?= $row['id'] ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
      
    </table>
    <div class="mt-6 text-rig">
        <a href="katalog.php" class="text-blue-600 hover:underline">&larr; Kembali ke Katalog</a>
    </div>
  </div>
    
</body>
</html>
