<?php
session_start();
include "property_agency.php"; // Pastikan koneksi berhasil

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validasi awal
    if (empty($email) || empty($password) || empty($role)) {
        echo "<script>alert('Harap isi semua input!'); window.location='login.php';</script>";
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND role = ?");
    $stmt->bind_param("ss", $email, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'user') {
                header("Location: katalog.php");
            } else {
                header("Location: halaman.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('Akun tidak ditemukan!'); window.location='login.php';</script>";
    }
}
?>
 proseslogin