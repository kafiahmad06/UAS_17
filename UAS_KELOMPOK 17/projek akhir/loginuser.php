<?php
// Cek session login admin jika perlu
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "property_agency");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM pesanan ORDER BY tanggal_pesan DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pesanan Masuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
  <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Daftar Pesanan</h1>

  <div class="overflow-x-auto">
    <table class="w-full table-auto bg-white shadow-md rounded-lg">
      <thead class="bg-blue-600 text-white">
        <tr>
          <th class="px-4 py-2">No</th>
          <th class="px-4 py-2">Nama</th>
          <th class="px-4 py-2">Email</th>
          <th class="px-4 py-2">Properti</th>
          <th class="px-4 py-2">Catatan</th>
          <th class="px-4 py-2">Tanggal</th>
        </tr>
      </thead>
      <tbody class="text-gray-700">
        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr class='border-b'>";
            echo "<td class='px-4 py-2'>" . $no++ . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['nama']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['produk']) . "</td>";
            echo "<td class='px-4 py-2'>" . htmlspecialchars($row['catatan']) . "</td>";
            echo "<td class='px-4 py-2'>" . $row['tanggal_pesan'] . "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php $conn->close(); ?>
