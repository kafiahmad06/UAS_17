<?php
include 'property_agency.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM properti WHERE id='$id'");
    $property = mysqli_fetch_assoc($result);

    if (!$property) {
        die("❌ Data properti tidak ditemukan.");
    }
} else {
    die("❌ ID properti tidak tersedia.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Properti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

<div class="max-w-4xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
  <h1 class="text-2xl font-bold mb-4 text-center">Edit Properti</h1>

  <form action="prosesupdate.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $property['id'] ?>">
    <input type="hidden" name="gambar_lama" value="<?= $property['gambar'] ?>">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-sm font-medium">Tipe:</label>
        <input type="text" name="tipe" value="<?= $property['tipe'] ?>" required class="w-full p-2 border rounded border-black focus:outline-blue-500">
      </div>
      <div>
        <label class="block text-sm font-medium">Lokasi:</label>
        <input type="text" name="lokasi" value="<?= $property['lokasi'] ?>" required class="w-full p-2 border rounded border-black focus:outline-blue-500">
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
      <div>
        <label class="block text-sm font-medium">Harga:</label>
        <input type="number" name="harga" value="<?= $property['harga'] ?>" required class="w-full p-2 border rounded border-black focus:outline-blue-500">
      </div>
      <div>
        <label class="block text-sm font-medium ">Status:</label>
        <select name="status" required class="w-full p-2 border rounded border-black focus:outline-blue-500">
          <option value="Dijual" <?= $property['status'] === 'Dijual' ? 'selected' : '' ?>>Dijual</option>
          <option value="Disewa" <?= $property['status'] === 'Disewa' ? 'selected' : '' ?>>Disewa</option>
          <option value="Terjual" <?= $property['status'] === 'Terjual' ? 'selected' : '' ?>>Terjual</option>
          <option value="belum terjual" <?= $property['status'] === 'Terjual' ? 'selected' : '' ?>>-</option>
        </select>
      </div>
    </div>


    <div class="mb-4">
      <label class="block text-sm font-medium mb-1">Gambar Saat Ini:</label>
      <img src="<?= $property['gambar'] ?>" class="w-48 h-32 object-cover mb-2 rounded border">
      <input type="file" name="gambar" accept="image/*" class="w-full p-2 border rounded">
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Update Properti</button>
  </form>
</div>
</body>
</html>
