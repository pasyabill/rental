<?php
// Mulai sesi
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); 
}

// Include koneksi database
include 'koneksi.php';

// Ambil ID transaksi dari URL
$id_transaksi = $_GET['id_transaksi'];

// Proses jika form disubmit
if (isset($_POST['submit_dp'])) {
    $dp = $_POST['dp'];
    $tgl_bayar = $_POST['tgl_bayar'];

    // Update downpayment dan kekurangan di tbl_transaksi
    $sql_update_transaksi = "UPDATE tbl_transaksi SET downpayment = '$dp', kekurangan = total - '$dp', status = 'approved' WHERE id_transaksi = '$id_transaksi'";
    
    if ($koneksi->query($sql_update_transaksi) === TRUE) {
        // Jika update berhasil, insert data pembayaran DP ke tbl_bayar
        $sql_insert_bayar = "INSERT INTO tbl_bayar (id_transaksi, tgl_bayar, total_bayar, status) VALUES ('$id_transaksi', '$tgl_bayar', '$dp', 'belum lunas')";
        
        if ($koneksi->query($sql_insert_bayar) === TRUE) {
            // Redirect ke halaman transaksi setelah sukses
            header("Location: petugas.php");
            exit();
        } else {
            // Tampilkan pesan error jika insert gagal
            echo "Error: " . $sql_insert_bayar . "<br>" . $koneksi->error;
        }
    } else {
        // Tampilkan pesan error jika update gagal
        echo "Error: " . $sql_update_transaksi . "<br>" . $koneksi->error;
    }
}

// Ambil data transaksi untuk ditampilkan di form
$sql_transaksi = "SELECT * FROM tbl_transaksi WHERE id_transaksi = '$id_transaksi'";
$result = $koneksi->query($sql_transaksi);
$transaksi = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/logoo.jpg" rel="icon">
    <title>Form Pembayaran DP</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<section class="vh-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4"> <!-- Sesuaikan lebar card -->
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center"> <!-- Kurangi padding card-body -->

                        <div class="mb-md-4 mt-md-3 pb-4"> <!-- Kurangi margin dan padding di dalam card -->

                            <h2 class="fw-bold mb-2 text-uppercase">Pembayaran DP</h2>
                            <p class="text-white-50 mb-4">Masukkan detail pembayaran DP</p>

                            <form method="POST" action="">
                                <!-- Menampilkan data transaksi -->
                                <div class="form-outline form-white mb-3">
                                    <label for="id_transaksi" class="form-label">ID Transaksi:</label>
                                    <input type="text" id="id_transaksi" name="id_transaksi" class="form-control form-control-lg" value="<?php echo $transaksi['id_transaksi']; ?>" readonly>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="nik" class="form-label">NIK Member:</label>
                                    <input type="text" id="nik" name="nik" class="form-control form-control-lg" value="<?php echo $transaksi['nik']; ?>" readonly>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="nopol" class="form-label">Nomor Polisi Mobil:</label>
                                    <input type="text" id="nopol" name="nopol" class="form-control form-control-lg" value="<?php echo $transaksi['nopol']; ?>" readonly>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="total" class="form-label">Total Harga Sewa:</label>
                                    <input type="text" id="total" name="total" class="form-control form-control-lg" value="<?php echo $transaksi['total']; ?>" readonly>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="tgl_bayar" class="form-label">Tanggal Pembayaran DP:</label>
                                    <input type="date" id="tgl_bayar" name="tgl_bayar" class="form-control form-control-lg" required>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="dp" class="form-label">Jumlah DP:</label>
                                    <input type="number" id="dp" name="dp" class="form-control form-control-lg" value="<?php echo $transaksi['downpayment']; ?>" readonly>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="sisa_pembayaran" class="form-label">Sisa Pembayaran:</label>
                                    <input type="text" id="sisa_pembayaran" name="sisa_pembayaran" class="form-control form-control-lg" value="<?php echo $transaksi['total'] - $transaksi['downpayment']; ?>" readonly>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit_dp" class="btn btn-secondary btn-lg w-100">Proses Pembayaran DP</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 bg-secondary text-white w-100 mt-auto">
        Copyright © UK Okt 2024. Aspasya Salsabila.
    </footer>
</section>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- Custom JS for setting today's date -->
<script>
    // Mengisi input tanggal pembayaran dengan tanggal hari ini
    document.getElementById('tgl_bayar').valueAsDate = new Date();
</script>

<style>
    .card {
        border-radius: 15px;
    }

    .vh-100 {
        min-height: 100vh;
    }

    footer {
        width: 100%;
        position: relative;
        bottom: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    section {
        flex-grow: 1;
    }
</style>

</body>
</html>