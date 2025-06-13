<!DOCTYPE html>
<html>
<head>
  <title>Tambah Properti</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex justify-center items-center min-h-screen">
  <div class="w-full max-w-md py-8">
    <form action="prosestambah.php" method="POST" enctype="multipart/form-data" class="bg-white p-10 rounded shadow-md">
      <h2 class="text-2xl font-bold mb-6 text-center">Tambah Properti</h2>

      <!-- Jenis Properti -->
      <label class="block mb-2">Jenis Properti</label>
      <select name="jenis" id="jenis" required class="w-full mb-4 p-2 border rounded focus:outline-blue-500 border-black">
        <option value="rumah">Rumah</option>
        <option value="apartemen">Apartemen</option>
      </select>

      <!-- Tipe / Tower -->
      <label class="block mb-2">Tipe/Tower</label>
      <input type="text" name="tipe" placeholder="Contoh: A / Tower B" required class="w-full mb-4 p-2 border rounded focus:outline-blue-500 border-black">

      <!-- Lokasi -->
      <label class="block mb-2">Lokasi</label>
      <input type="text" name="lokasi" required class="w-full mb-4 p-2 border rounded focus:outline-blue-500 border-black">

      <!-- Status -->
      <label class="block mb-2">Status</label>
      <input type="text" name="status" placeholder="Dijual / Disewa" required class="w-full mb-4 p-2 border rounded focus:outline-blue-500 border-black">

      <!-- Harga -->
      <label class="block mb-2">Harga</label>
      <input type="text" name="harga" required class="w-full mb-4 p-2 border rounded focus:outline-blue-500 border-black">

      <!-- Gambar -->
      <label class="block mb-2">Gambar</label>
      <input type="file" name="gambar" accept="image/*" required class="w-full mb-4 focus:outline-blue-500 border-black">

      <!-- Tombol Submit -->
      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Tambah</button>

      <!-- Kembali -->
      <div class="mt-6 text-center">
        <a href="katalog.php" class="text-blue-600 hover:underline">&larr; Kembali ke Katalog</a>
      </div>
    </form>
  </div>

</body>
</html>
