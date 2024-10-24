<?php
session_start();
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Pastikan pengguna sudah login dan memiliki hak akses
if (!isset($_SESSION['username']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    header("Location: login.php");
    exit();
}

// Ambil tanggal hari ini
$tanggal_hari_ini = date('Y-m-d');

// Query untuk laporan transaksi hari ini
$queryTransaksi = "SELECT * FROM tbl_transaksi WHERE DATE(tgl_booking) = '$tanggal_hari_ini'";
$resultTransaksi = mysqli_query($koneksi, $queryTransaksi);

// Query untuk total pendapatan hari ini
$queryPendapatan = "SELECT SUM(total) AS total_pendapatan FROM tbl_transaksi WHERE DATE(tgl_booking) = '$tanggal_hari_ini'";
$resultPendapatan = mysqli_query($koneksi, $queryPendapatan);
$pendapatan = mysqli_fetch_assoc($resultPendapatan)['total_pendapatan'];

// Query untuk mobil yang sedang disewa hari ini (status booked dan kosong)
$queryMobilDisewa = "
    SELECT m.*, t.status 
    FROM tbl_mobil m 
    LEFT JOIN tbl_transaksi t ON m.nopol = t.nopol AND DATE(t.tgl_booking) = '$tanggal_hari_ini' 
    WHERE m.status IN ('booked', 'kosong')";
$resultMobilDisewa = mysqli_query($koneksi, $queryMobilDisewa);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Transaksi Hari Ini</title>
    <link href="assets/img/logoo.jpg" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Laporan Transaksi Hari Ini (<?= $tanggal_hari_ini ?>)</h2>
    
    <!-- Laporan Pendapatan -->
    <div class="alert alert-info">
        <strong>Total Pendapatan Hari Ini:</strong> Rp <?= number_format($pendapatan, 2, ',', '.') ?>
    </div>

    <!-- Laporan Transaksi -->
    <h4>Daftar Transaksi Hari Ini</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>No. Polisi</th>
                <th>Tanggal Booking</th>
                <th>Tanggal Ambil</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($resultTransaksi) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($resultTransaksi)): ?>
                    <tr>
                        <td><?= $row['id_transaksi'] ?></td>
                        <td><?= $row['nopol'] ?></td>
                        <td><?= $row['tgl_booking'] ?></td>
                        <td><?= $row['tgl_ambil'] ?></td>
                        <td><?= ucfirst($row['status']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Tidak ada transaksi hari ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Laporan Mobil yang Sedang Disewa -->
    <h4>Mobil yang Sedang Disewa Hari Ini</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No. Polisi</th>
                <th>Brand</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($resultMobilDisewa) > 0): ?>
                <?php while ($mobil = mysqli_fetch_assoc($resultMobilDisewa)): ?>
                    <tr>
                        <td><?= $mobil['nopol'] ?></td>
                        <td><?= $mobil['brand'] ?></td>
                        <td><?= $mobil['type'] ?></td>
                        <td><?= ucfirst($mobil['status']) ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada mobil yang sedang disewa hari ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <button class="btn btn-warning no-print" onclick="window.print();">Cetak Laporan</button>
    <a href="petugas.php" class="btn btn-secondary no-print">Kembali</a>
</div>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($koneksi);
?>