<?php
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = 'petugas'; 
    $cek_username = $koneksi->prepare("SELECT * FROM tbl_user WHERE username = ?");
    $cek_username->bind_param("s", $username);
    $cek_username->execute();
    $result = $cek_username->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan, coba yang lain');</script>";
    } else {
        $query = $koneksi->prepare("INSERT INTO tbl_user (username, password, role) VALUES (?, ?, ?)");
        $query->bind_param("sss", $username, $password, $role);

        if ($query->execute()) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.');window.location='login.php';</script>";
        } else {
            echo "<script>alert('Pendaftaran gagal. Silakan coba lagi.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/img/logoo.jpg" rel="icon">
    <title>Register</title>
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

                                <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                                <p class="text-white-50 mb-5">Register khusus untuk pengelola DeathWheel</p>

                                <form method="POST" action="">
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Buat Username" required />
                                    </div>
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Buat Password" required />
                                    </div>
                                    <!-- Submit button -->
                                    <div class="text-center">
                                        <button type="submit" name="submit" class="btn btn-secondary btn-lg w-100">Register</button>
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

    <!-- Custom CSS -->
    <style>
        .card {
            border-radius: 15px;
        }

        .vh-100 {
            min-height: 100vh;
        }

        .h3 {
            font-size: 1.75rem;
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