<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Hapus pengguna berdasarkan id_user
    $sql_delete = "DELETE FROM tbl_user WHERE id_user = '$id_user'";

    if ($koneksi->query($sql_delete) === TRUE) {
        $_SESSION['success'] = "Pengguna berhasil dihapus!";
    } else {
        $_SESSION['error'] = "Gagal menghapus pengguna: " . $koneksi->error;
    }

    header("Location: admin.php"); // Arahkan kembali ke halaman admin
    exit();
} else {
    echo "ID pengguna tidak diberikan.";
    exit;
}

$koneksi->close();
?>