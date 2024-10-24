<?php
session_start();
include 'koneksi.php'; // koneksi ke database

// Mengambil data member yang sedang login
$nik = $_SESSION['nik']; // nik member dari session
$query_member = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE nik = '$nik'");
$member = mysqli_fetch_assoc($query_member);

// Mengambil data mobil berdasarkan nopol (misalnya nopol dikirim melalui URL)
$nopol = $_GET['nopol'];
$query_mobil = mysqli_query($koneksi, "SELECT * FROM tbl_mobil WHERE nopol = '$nopol'");
$mobil = mysqli_fetch_assoc($query_mobil);

// Mendapatkan harga per hari dari mobil yang dipilih
$harga_per_hari = $mobil['harga'];

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tgl_booking = date('Y-m-d'); // tanggal hari ini
    $tgl_ambil = $_POST['tgl_ambil'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $supir = $_POST['supir']; // 1 jika menggunakan supir, 0 jika tidak
    $jumlah_hari = (strtotime($tgl_kembali) - strtotime($tgl_ambil)) / (60 * 60 * 24); // menghitung jumlah hari

    // Jika menggunakan supir, biaya tambahan 1 juta per hari
    $biaya_supir = ($supir == 1) ? 1000000 * $jumlah_hari : 0;
    
    // Total harga sewa mobil
    $total = ($harga_per_hari * $jumlah_hari) + $biaya_supir;
    
    // DP minimal 75% dari total
    $downpayment = $total * 0.75;
    
    // Kekurangan yang harus dilunasi
    $kekurangan = $total - $downpayment;
    
    // Status transaksi default 'booking'
    $status = 'booking';

    // Query untuk menyimpan data transaksi ke database
    $query_insert = "INSERT INTO tbl_transaksi (nik, nopol, tgl_booking, tgl_ambil, tgl_kembali, supir, total, downpayment, kekurangan, status)
                     VALUES ('$nik', '$nopol', '$tgl_booking', '$tgl_ambil', '$tgl_kembali', '$supir', '$total', '$downpayment', '$kekurangan', '$status')";

    if (mysqli_query($koneksi, $query_insert)) {
        header("Location: profile.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/logoo.jpg" rel="icon">
    <title>Pengajuan Peminjaman</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Pengajuan Peminjaman</h2>
                                <p class="text-white-50 mb-5">Lengkapi form berikut untuk mengajukan pinjaman mobil</p>

                                <form method="POST" action="" id="peminjamanForm">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="nik">NIK Member</label>
                                        <input type="text" name="nik" class="form-control form-control-lg" value="<?php echo $member['nik']; ?>" readonly />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="nopol">Nomor Polisi Mobil</label>
                                        <input type="text" name="nopol" class="form-control form-control-lg" value="<?php echo $mobil['nopol']; ?>" readonly />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="tgl_booking">Tanggal Booking</label>
                                        <input type="text" name="tgl_booking" class="form-control form-control-lg" value="<?php echo date('Y-m-d'); ?>" readonly />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="tgl_ambil">Tanggal Ambil</label>
                                        <input type="date" name="tgl_ambil" id="tgl_ambil" class="form-control form-control-lg" required />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="tgl_kembali">Tanggal Kembali</label>
                                        <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control form-control-lg" required />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="supir">Supir</label>
                                        <select name="supir" id="supir" class="form-select form-select-lg" required>
                                            <option value="0">Tanpa Supir</option>
                                            <option value="1">Dengan Supir</option>
                                        </select>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="total">Total Harga</label>
                                        <input type="text" name="total" id="total" class="form-control form-control-lg" readonly />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="downpayment">Downpayment (75%)</label>
                                        <input type="text" name="downpayment" id="downpayment" class="form-control form-control-lg" readonly />
                                    </div>
                                    
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="kekurangan">Kekurangan</label>
                                        <input type="text" name="kekurangan" id="kekurangan" class="form-control form-control-lg" readonly />
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-secondary btn-lg w-100">Ajukan Peminjaman</button>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        const hargaPerHari = <?php echo $harga_per_hari; ?>;
        const biayaSupirPerHari = 1000000;

        document.getElementById('peminjamanForm').addEventListener('change', function() {
            const tglAmbil = new Date(document.getElementById('tgl_ambil').value);
            const tglKembali = new Date(document.getElementById('tgl_kembali').value);
            const supir = document.getElementById('supir').value;

            if (tglAmbil && tglKembali && tglKembali > tglAmbil) {
                const jumlahHari = Math.ceil((tglKembali - tglAmbil) / (1000 * 60 * 60 * 24));

                const biayaSupir = (supir == 1) ? (biayaSupirPerHari * jumlahHari) : 0;
                const total = (hargaPerHari * jumlahHari) + biayaSupir;
                const downpayment = total * 0.75;
                const kekurangan = total - downpayment;
                document.getElementById('total').value = total.toLocaleString('id-ID');
                document.getElementById('downpayment').value = downpayment.toLocaleString('id-ID');
                document.getElementById('kekurangan').value = kekurangan.toLocaleString('id-ID');
            }
        });
    </script>
</body>
</html>