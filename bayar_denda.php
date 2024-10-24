<?php
session_start();
include 'koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$denda = $_POST['denda'];

// Cek apakah sudah ada pembayaran untuk id_transaksi ini
$sql_check = "SELECT * FROM tbl_bayar WHERE id_transaksi = '$id_transaksi'";
$result_check = $koneksi->query($sql_check);

if ($result_check->num_rows > 0) {
    // Jika sudah ada, update hanya status menjadi 'lunas' tanpa mengubah total_bayar
    $sql_update = "UPDATE tbl_bayar 
                   SET tgl_bayar = NOW(), status = 'lunas' 
                   WHERE id_transaksi = '$id_transaksi'";
    if ($koneksi->query($sql_update) === TRUE) {
        // Mengupdate status denda di tabel tbl_transaksi menjadi lunas jika denda sudah dibayar
        $sql_update_transaksi = "UPDATE tbl_transaksi 
                                  SET denda = 0 
                                  WHERE id_transaksi = '$id_transaksi'";
        $koneksi->query($sql_update_transaksi);

        // Mengambil nomor polisi mobil dari transaksi
        $sql_get_nopol = "SELECT nopol FROM tbl_transaksi WHERE id_transaksi = '$id_transaksi'";
        $result_nopol = $koneksi->query($sql_get_nopol);
        $data_nopol = $result_nopol->fetch_assoc();
        $nopol = $data_nopol['nopol'];

        // Update status mobil menjadi 'tersedia'
        $sql_update_mobil = "UPDATE tbl_mobil SET status = 'tersedia' WHERE nopol = '$nopol'";
        $koneksi->query($sql_update_mobil);
        
        $_SESSION['success'] = "Pembayaran denda berhasil diperbarui!";
        header("Location: petugas.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal memperbarui pembayaran: " . $koneksi->error;
        header("Location: gagal.php");
        exit();
    }
} else {
    // Jika belum ada, lakukan insert
    $sql_bayar = "INSERT INTO tbl_bayar (id_transaksi, tgl_bayar, total_bayar, status) 
                  VALUES ('$id_transaksi', NOW(), 0, 'lunas')";
    if ($koneksi->query($sql_bayar) === TRUE) {
        // Mengupdate status denda di tabel tbl_transaksi menjadi lunas jika denda sudah dibayar
        $sql_update_transaksi = "UPDATE tbl_transaksi 
                                  SET denda = 0 
                                  WHERE id_transaksi = '$id_transaksi'";
        $koneksi->query($sql_update_transaksi);

        // Mengambil nomor polisi mobil dari transaksi
        $sql_get_nopol = "SELECT nopol FROM tbl_transaksi WHERE id_transaksi = '$id_transaksi'";
        $result_nopol = $koneksi->query($sql_get_nopol);
        $data_nopol = $result_nopol->fetch_assoc();
        $nopol = $data_nopol['nopol'];

        // Update status mobil menjadi 'tersedia'
        $sql_update_mobil = "UPDATE tbl_mobil SET status = 'tersedia' WHERE nopol = '$nopol'";
        $koneksi->query($sql_update_mobil);
        
        $_SESSION['success'] = "Pembayaran denda berhasil!";
        header("Location: petugas.php");
        exit();
    } else {
        $_SESSION['error'] = "Gagal melakukan pembayaran denda: " . $koneksi->error;
        header("Location: petugas.php");
        exit();
    }
}

$koneksi->close();
?>