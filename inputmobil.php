<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/logoo.jpg" rel="icon">
    <title>Input Mobil</title> 
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nopol = $_POST['nopol'];
    $brand = $_POST['brand'];
    $type = $_POST['type'];
    $tahun = $_POST['tahun'];
    $harga = $_POST['harga'];
    $status = 'tersedia';
    $foto = $_FILES['foto']['name'];
    $tmp_name = $_FILES['foto']['tmp_name'];
    $folder = "assets/img/";
    $foto_path = $folder . $foto;
    if (move_uploaded_file($tmp_name, $foto_path)) {
        $query = "INSERT INTO tbl_mobil (nopol, brand, type, tahun, harga, foto, status) 
                  VALUES ('$nopol', '$brand', '$type', '$tahun', '$harga', '$foto', '$status')";
        if (mysqli_query($koneksi, $query)) {
            echo "<div class='alert alert-success text-center'>Mobil berhasil ditambahkan.</div>";
            header("Location: petugas.php");
            exit();
        } else {
            echo "<div class='alert alert-danger text-center'>Gagal menambahkan mobil: " . mysqli_error($koneksi) . "</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Gagal mengupload foto.</div>";
    }
}
?>

    <section class="vh-100">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Input Mobil</h2>
                                <p class="text-white-50 mb-5">Masukkan detail mobil untuk disewakan</p>

                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="nopol">Nomor Polisi</label>
                                        <input type="text" name="nopol" class="form-control form-control-lg" placeholder="Masukkan Nomor Polisi" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="brand">Brand</label>
                                        <input type="text" name="brand" class="form-control form-control-lg" placeholder="Masukkan Brand Mobil" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="type">Type</label>
                                        <input type="text" name="type" class="form-control form-control-lg" placeholder="Masukkan Tipe Mobil" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="tahun">Tahun</label>
                                        <input type="date" name="tahun" class="form-control form-control-lg" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="harga">Harga Sewa per Hari (Rp)</label>
                                        <input type="number" step="0.01" name="harga" class="form-control form-control-lg" placeholder="Masukkan Harga Sewa" required />
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label" for="foto">Foto Mobil</label>
                                        <input type="file" name="foto" class="form-control form-control-lg" required />
                                    </div>

                                    <!-- Submit button -->
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-secondary btn-lg w-100">Simpan Data Mobil</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center py-4 bg-secondary text-white w-100 mt-auto">
        Copyright © UK Okt 2024. Aspasya Salsabila.
    </footer>
    </section>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <style>
        .card {
            border-radius: 15px;
        }

        .vh-100 {
            min-height: 100vh;
        }

        /* Footer full-width dan di bawah card */
        footer {
            width: 100%;
            position: relative;
            bottom: 0;
        }

        /* Memastikan footer berada di bawah */
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