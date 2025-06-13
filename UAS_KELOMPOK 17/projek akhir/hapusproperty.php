<?php
include 'property_agency.php'; // koneksi ke database

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Ambil data gambar (jika perlu dihapus dari folder juga)
    $query = mysqli_query($conn, "SELECT gambar FROM properti WHERE id = $id");
    $data = mysqli_fetch_assoc($query);

    // Hapus gambar dari folder jika file ada
    if ($data && file_exists($data['gambar'])) {
        unlink($data['gambar']);
    }

    // Hapus data dari database
    $delete = mysqli_query($conn, "DELETE FROM properti WHERE id = $id");

    if ($delete) {
        header("Location: katalog.php?hapus=berhasil");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID properti tidak ditemukan.";
}
?>
