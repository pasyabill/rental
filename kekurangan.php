<?php
// Include koneksi database
include 'koneksi.php';

// Ambil ID transaksi dari URL
$id_transaksi = $_GET['id_transaksi'];

// Proses jika form disubmit
if (isset($_POST['submit_kekurangan'])) {
    $tgl_bayar_kekurangan = $_POST['tgl_bayar_kekurangan'];
    $kekurangan = $_POST['kekurangan'];

    // Ambil total_bayar yang sudah ada (DP sebelumnya)
    $sql_get_bayar = "SELECT total_bayar FROM tbl_bayar WHERE id_transaksi = '$id_transaksi' AND status = 'belum lunas' LIMIT 1";
    $result_bayar = $koneksi->query($sql_get_bayar);
    $data_bayar = $result_bayar->fetch_assoc();
    $total_bayar_sebelumnya = $data_bayar['total_bayar'];

    // Hitung total bayar baru (total bayar sebelumnya + kekurangan)
    $total_bayar_baru = $total_bayar_sebelumnya + $kekurangan;

    // Update tgl_bayar dan status menjadi 'lunas' untuk pembayaran kekurangan, serta total_bayar dengan nilai baru
    $sql_update_bayar = "UPDATE tbl_bayar 
                         SET tgl_bayar = '$tgl_bayar_kekurangan', total_bayar = '$total_bayar_baru', status = 'lunas' 
                         WHERE id_transaksi = '$id_transaksi' AND status = 'belum lunas' LIMIT 1";
    $koneksi->query($sql_update_bayar);

    // Update status transaksi menjadi 'ambil'
    $sql_update_status = "UPDATE tbl_transaksi SET status = 'ambil' WHERE id_transaksi = '$id_transaksi'";
    $koneksi->query($sql_update_status);

    // Mengambil nomor polisi mobil dari transaksi
    $sql_get_nopol = "SELECT nopol FROM tbl_transaksi WHERE id_transaksi = '$id_transaksi'";
    $result_nopol = $koneksi->query($sql_get_nopol);
    $data_nopol = $result_nopol->fetch_assoc();
    $nopol = $data_nopol['nopol'];

    // Update status mobil menjadi 'kosong'
    $sql_update_mobil = "UPDATE tbl_mobil SET status = 'kosong' WHERE nopol = '$nopol'";
    $koneksi->query($sql_update_mobil);

    header("Location: petugas.php");
    exit();
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
    <title>Form Pembayaran Kekurangan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<section class="vh-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center">

                        <div class="mb-md-4 mt-md-3 pb-4">

                            <h2 class="fw-bold mb-2 text-uppercase">Pembayaran Kekurangan</h2>
                            <p class="text-white-50 mb-4">Masukkan detail pembayaran kekurangan</p>

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
                                    <label for="kekurangan" class="form-label">Jumlah Kekurangan:</label>
                                    <input type="number" id="kekurangan" name="kekurangan" class="form-control form-control-lg" value="<?php echo $transaksi['kekurangan']; ?>" required>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <label for="tgl_bayar_kekurangan" class="form-label">Tanggal Pembayaran Kekurangan:</label>
                                    <input type="date" id="tgl_bayar_kekurangan" name="tgl_bayar_kekurangan" class="form-control form-control-lg" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="submit_kekurangan" class="btn btn-secondary btn-lg w-100">Proses Pembayaran Kekurangan</button>
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
    document.getElementById('tgl_bayar_kekurangan').valueAsDate = new Date();
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