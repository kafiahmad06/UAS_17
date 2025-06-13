<?php
include 'property_agency.php'; // pastikan file koneksi database kamu benar

// Daftar akun admin
$admins = [
    [
        'nama' => 'Admin Satu',
        'email' => 'admin1@gmail.com',
        'password' => 'admin123'
    ],
    [
        'nama' => 'Admin Dua',
        'email' => 'admin2@gmail.com',
        'password' => 'admin456'
    ],
    [
        'nama' => 'Admin Tiga',
        'email' => 'admin3@gmail.com',
        'password' => 'admin789'
    ],
];

foreach ($admins as $admin) {
    $nama = $admin['nama'];
    $email = $admin['email'];
    $password_plain = $admin['password'];
    $password_hash = password_hash($password_plain, PASSWORD_DEFAULT);
    $role = 'user'; // atau ganti jadi 'admin' jika kamu ingin peran admin khusus

    // Cek apakah admin sudah ada berdasarkan email
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $stmt->close();

        // Tambahkan akun admin ke database
        $stmt = $conn->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama, $email, $password_hash, $role);

        if ($stmt->execute()) {
            echo "✅ Akun admin berhasil dibuat:<br>";
            echo "👤 Nama: $nama<br>";
            echo "📧 Email: $email<br>";
            echo "🔑 Password: $password_plain<br><br>";
        } else {
            echo "❌ Gagal menambahkan akun admin $email: " . $stmt->error . "<br>";
        }
    } else {
        echo "⚠ Akun dengan email $email sudah ada.<br><br>";
    }

    $stmt->close();
}

$conn->close();
?>
