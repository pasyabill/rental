<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lakukan sanitasi input untuk keamanan
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Cek terlebih dahulu di tabel tbl_user (untuk admin/petugas)
    $queryUser = "SELECT * FROM tbl_user WHERE username='$username'";
    $resultUser = mysqli_query($koneksi, $queryUser);
    $user = mysqli_fetch_assoc($resultUser);

    if ($user) {
        // Verifikasi password untuk user admin/petugas
        if (password_verify($password, $user['password'])) {
            // Set session untuk admin atau petugas
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            // Redirect sesuai role
            if ($user['role'] == 'admin') {
                header('Location: admin.php');
            } elseif ($user['role'] == 'petugas') {
                header('Location: petugas.php');
            } else {
                echo "Role tidak valid.";
            }
        } else {
            echo "Password salah!";
        }
    } else {
        // Jika tidak ditemukan di tbl_user, cek di tbl_member
        $queryMember = "SELECT * FROM tbl_member WHERE username='$username'";
        $resultMember = mysqli_query($koneksi, $queryMember);
        $member = mysqli_fetch_assoc($resultMember);

        if ($member) {
            // Verifikasi password untuk member
            if (password_verify($password, $member['password'])) {
                // Set session untuk member, termasuk nik
                $_SESSION['username'] = $username;
                $_SESSION['role'] = 'member';
                $_SESSION['nik'] = $member['nik']; // Simpan nik ke dalam session
                
                // Redirect ke halaman member (index.php atau halaman lain)
                header('Location: index.php');
            } else {
                echo "Password salah!";
            }
        } else {
            echo "Username tidak ditemukan!";
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
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<section class="vh-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-5 col-xl-4"> <!-- Sesuaikan lebar card -->
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-4 text-center"> <!-- Kurangi padding card-body -->

                        <div class="mb-md-4 mt-md-3 pb-4"> <!-- Kurangi margin dan padding di dalam card -->

                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-4">Login untuk memulai</p>

                            <form method="POST" action="">
                                <div data-mdb-input-init class="form-outline form-white mb-3"> <!-- Sesuaikan jarak antar elemen -->
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" name="username" class="form-control form-control-lg" required />
                                </div>
                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg" required />
                                </div>
                                <div class="text-center">
                                    <button type="submit" name="submit" class="btn btn-secondary btn-lg w-100">Login</button>
                                </div>
                            </form>

                            <div class="mt-3"> <!-- Kurangi margin atas -->
                                <p class="small mb-4">
                                    <a class="text-white-50" href="register.php">Belum Register?</a>
                                </p>
                            </div>

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