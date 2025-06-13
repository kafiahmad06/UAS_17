<?php
session_start();
include "property_agency.php";

$nama = '';
$email = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = "pembeli"; // Force pembeli

    // Cek apakah email sudah ada
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $error = "Email sudah terdaftar. Silakan login.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $password, $role);

        if ($stmt->execute()) {
            header("Location: loginuser.php?registered=1");
            exit();
        } else {
            $error = "Gagal mendaftar. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Pembeli</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex justify-center items-center h-screen">
  <form method="POST" class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center text-blue-600">Daftar</h2>

    <?php if (!empty($error)): ?>
      <p class="text-red-500 text-sm mb-4 text-center"><?= $error ?></p>
    <?php endif; ?>

    <input type="text" name="nama" placeholder="Nama Lengkap" required
      value="<?= htmlspecialchars($nama); ?>"
      class="w-full mb-4 px-4 py-2 border rounded focus:outline-blue-500 border-black">

    <input type="email" name="email" placeholder="Email" required
      value="<?= htmlspecialchars($email); ?>"
      class="w-full mb-4 px-4 py-2 border rounded focus:outline-blue-500 border-black">

    <input type="password" name="password" placeholder="Password" required
      class="w-full mb-4 px-4 py-2 border rounded focus:outline-blue-500 border-black">

    <button type="submit"
      class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full font-semibold">
      Daftar
    </button>

    <p class="mt-4 text-center text-sm">Sudah punya akun?
      <a href="loginuser.php" class="text-blue-500 hover:underline">Login di sini</a>
    </p>
  </form>
</body>
</html>
