<?php
include 'koneksi.php';

// Ambil data dari form modal
$id_transaksi = $_POST['id_transaksi'];
$tgl_kembali = $_POST['tgl_kembali'];
$kondisi_mobil = $_POST['kondisi_mobil'];
$denda = $_POST['denda'];

// Ambil nomor polisi dari tabel transaksi
$sql_nopol = "SELECT nopol FROM tbl_transaksi WHERE id_transaksi = '$id_transaksi'";
$result_nopol = $koneksi->query($sql_nopol);
$row_nopol = $result_nopol->fetch_assoc();
$nopol = $row_nopol['nopol'];

// Insert data pengembalian ke tbl_kembali
$sql_insert_kembali = "INSERT INTO tbl_kembali (id_transaksi, tgl_kembali, kondisi_mobil, denda) 
                       VALUES ('$id_transaksi', '$tgl_kembali', '$kondisi_mobil', '$denda')";
$koneksi->query($sql_insert_kembali);

// Update status transaksi menjadi 'kembali'
$sql_update_transaksi = "UPDATE tbl_transaksi SET status = 'kembali' WHERE id_transaksi = '$id_transaksi'";
$koneksi->query($sql_update_transaksi);

// Update status mobil menjadi 'tersedia' jika tidak ada denda
if ($denda == 0) {
    $sql_update_mobil = "UPDATE tbl_mobil SET status = 'tersedia' WHERE nopol = '$nopol'";
    $koneksi->query($sql_update_mobil);
}

// Update pembayaran di tbl_bayar jika ada denda
if ($denda > 0) {
    $sql_update_bayar = "UPDATE tbl_bayar SET total_bayar = total_bayar + $denda, status = 'belum lunas' 
                         WHERE id_transaksi = '$id_transaksi' AND status = 'lunas'";
    $koneksi->query($sql_update_bayar);
}

// Redirect kembali ke halaman petugas setelah proses selesai
header("Location: petugas.php");
?>