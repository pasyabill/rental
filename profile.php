<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Ambil username dari sesi
$username = $_SESSION['username'];

// Ambil data member yang login
$queryMember = "SELECT * FROM tbl_member WHERE username='$username'";
$resultMember = mysqli_query($koneksi, $queryMember);
$member = mysqli_fetch_assoc($resultMember);

// Cek apakah data member ditemukan
if (!$member) {
    echo "Data member tidak ditemukan!";
    exit();
}

// Ambil NIK dari data member
$nik = $member['nik'];

// Ambil data transaksi beserta nama mobil berdasarkan NIK
$queryTransaksi = "
    SELECT t.id_transaksi, t.nopol, m.brand, m.type, t.status 
    FROM tbl_transaksi t
    JOIN tbl_mobil m ON t.nopol = m.nopol
    WHERE t.nik = '$nik'
";
$resultTransaksi = mysqli_query($koneksi, $queryTransaksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="assets/img/logoo.jpg" rel="icon">
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">

<div class="row">
    <div class="col-md-4 d-flex flex-column align-items-center">
        <img src="assets/img/logo.jpg" alt="Profile Icon" class="rounded-circle mb-3" style="width: 150px; height: 150px;">
        <p class="text-center">Halo! Ini adalah profile mu dan daftar transaksi mu.</p>
    </div>
    <div class="col-md-8">
        <h3>Data Diri</h3>
        <ul class="list-group">
            <li class="list-group-item"><strong>Username:</strong> <?= htmlspecialchars($member['username']) ?></li>
            <li class="list-group-item"><strong>NIK:</strong> <?= htmlspecialchars($member['nik']) ?></li>
            <li class="list-group-item"><strong>Nama Lengkap:</strong> <?= htmlspecialchars($member['nama']) ?></li>
            <li class="list-group-item"><strong>Alamat:</strong> <?= htmlspecialchars($member['alamat']) ?></li>
            <li class="list-group-item"><strong>No. Telepon:</strong> <?= htmlspecialchars($member['telp']) ?></li>
        </ul>
    </div>
</div>
    <div>
        <h2> <center> Daftar Transaksi </h2>
        <table class="table table-bordered">
            <thead>
                <tr class="bg-secondary text-center text-white">
                    <th>ID Transaksi</th>
                    <th>No. Polisi</th>
                    <th>Nama Mobil</th>
                    <th>Status Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($resultTransaksi) > 0) {
                    while ($rowTransaksi = mysqli_fetch_assoc($resultTransaksi)) {
                        echo "<tr>";
                        echo "<td>" . $rowTransaksi['id_transaksi'] . "</td>";
                        echo "<td>" . $rowTransaksi['nopol'] . "</td>";
                        echo "<td>" . $rowTransaksi['brand'] . " " . $rowTransaksi['type'] . "</td>"; // Nama mobil
                        echo "<td>" . ucfirst($rowTransaksi['status']) . "</td>"; // Status transaksi
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Belum ada transaksi.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <a href="index.php" class="btn btn-secondary no-print">Kembali</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Tutup koneksi
mysqli_close($koneksi);
?>