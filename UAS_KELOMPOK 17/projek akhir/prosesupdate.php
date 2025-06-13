<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'property_agency.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $id          = $_POST['id'] ?? '';
    $tipe        = trim($_POST['tipe'] ?? '');
    $lokasi      = trim($_POST['lokasi'] ?? '');
    $harga       = trim($_POST['harga'] ?? '');
    $status      = trim($_POST['status'] ?? '');
    $gambarLama  = $_POST['gambar_lama'] ?? '';

    // Validasi awal
    if (empty($id) || empty($tipe) || empty($lokasi) || empty($harga) || empty($status)) {
        die("❌ Data tidak lengkap. Harap lengkapi semua field.");
    }

    // Jika user upload gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $namaFile   = $_FILES['gambar']['name'];
        $tmpName    = $_FILES['gambar']['tmp_name'];
        $ekstensi   = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

        // Validasi ekstensi file gambar
        $ekstensiValid = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ekstensi, $ekstensiValid)) {
            die("❌ Format gambar tidak didukung. Hanya: jpg, jpeg, png, webp.");
        }

        // Simpan gambar baru
        $gambarBaru = 'img/' . uniqid('property_', true) . '.' . $ekstensi;
        if (!move_uploaded_file($tmpName, $gambarBaru)) {
            die("❌ Gagal menyimpan gambar baru.");
        }

        // Hapus gambar lama jika ada
        if (!empty($gambarLama) && file_exists($gambarLama)) {
            unlink($gambarLama);
        }

        // Query update dengan gambar
        $query = "UPDATE properti SET tipe=?, lokasi=?, harga=?, status=?, gambar=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssi", $tipe, $lokasi, $harga, $status, $gambarBaru, $id);
    } else {
        // Query update tanpa gambar
        $query = "UPDATE properti SET tipe=?, lokasi=?, harga=?, status=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $tipe, $lokasi, $harga, $status, $id);
    }

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: katalog.php?update=success");
        exit();
    } else {
        die("❌ Gagal mengupdate data: " . mysqli_error($conn));
    }
}
?>
