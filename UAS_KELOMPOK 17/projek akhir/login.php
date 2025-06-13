<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-300 flex justify-center items-center h-screen">

  <form method="POST" action="proseslogin.php" class="bg-white p-6 rounded shadow-md w-full max-w-md">
    <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

    <input 
      type="email" 
      name="email" 
      placeholder="Masukkan E-mail" 
      class="w-full mb-3 px-3 py-2 border rounded border-black focus:outline-blue-600" 
      required
    >

    <input 
      type="password" 
      name="password" 
      placeholder="Password" 
      class="w-full mb-3 px-3 py-2 border rounded border-black focus:outline-blue-600" 
      required
    >

    <select 
      name="role" 
      class="w-full mb-4 px-3 py-2 border rounded border-black focus:outline-blue-500" 
      required
    >
      <option value="" selected hidden>Pilih Peran</option>
      <option value="pembeli">Pembeli</option>
      <option value="user">Admin</option>
    </select>

    <button 
      type="submit" 
      class="w-full bg-blue-500 text-white py-2 rounded"
    >
      Login
    </button>

    <p class="mt-1 text-gray-700 text-center">
      Belum punya akun? 
      <a href="register.php" class="text-blue-600 hover:underline">Daftar di sini</a>
    </p>
  </form>

</body>
</html>