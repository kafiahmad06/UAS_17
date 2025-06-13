<?php
include "property_agency.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $produk = $_POST['produk'];

    $stmt = $conn->prepare("UPDATE pesanan SET nama = ?, email = ?, produk = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nama, $email, $produk, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: pesanan.php");
    exit;
}

// Ambil data lama
$stmt = $conn->prepare("SELECT * FROM pesanan WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Pesanan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 flex justify-center items-center min-h-screen">
  <form method="POST" class="bg-white p-6 rounded shadow w-full max-w-md">
    <h2 class="text-xl font-bold text-blue-600 mb-4">Edit Data Pemesanan</h2>

    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required class="w-full mb-3 px-3 py-2 border rounded" placeholder="Nama">
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required class="w-full mb-3 px-3 py-2 border rounded" placeholder="Email">
    <input type="text" name="produk" value="<?= htmlspecialchars($data['produk']) ?>" required class="w-full mb-3 px-3 py-2 border rounded" placeholder="Properti">

    <div class="flex justify-between items-center">
      <a href="pesanan.php" class="text-gray-500 hover:underline">Kembali</a>
      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </div>
  </form>
</body>
</html>
