<?php
session_start();
include 'koneksi.php';

$id_user = $_GET['id_user'] ?? null;

if ($id_user) {
    // Ambil data pengguna berdasarkan id_user
    $sql = "SELECT * FROM tbl_user WHERE id_user = '$id_user'";
    $result = $koneksi->query($sql);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        $_SESSION['error'] = "Pengguna tidak ditemukan.";
        header("Location: admin.php"); // Arahkan kembali ke halaman admin jika tidak ditemukan
        exit;
    }
} else {
    $_SESSION['error'] = "ID pengguna tidak diberikan.";
    header("Location: admin.php"); // Arahkan kembali ke halaman admin jika ID tidak ada
    exit;
}

// Proses pengeditan jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];

    // Update role pengguna
    $sql_update = "UPDATE tbl_user SET role = '$role' WHERE id_user = '$id_user'";

    if ($koneksi->query($sql_update) === TRUE) {
        $_SESSION['success'] = "Role pengguna berhasil diperbarui!";
        header("Location: admin.php"); // Arahkan kembali ke halaman admin
        exit();
    } else {
        $_SESSION['error'] = "Gagal memperbarui role: " . $koneksi->error;
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="assets/img/logoo.jpg" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- CDN Bootstrap -->
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
        }
        .card {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Efek bayangan */
        }
        .form-control:disabled, .form-control[readonly] {
            background-color: #e9ecef; /* Background untuk input yang readonly */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-secondary text-white text-center">
                    <h3>Edit User</h3>
                </div>
                <div class="card-body">
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= isset($user['user']) ? $user['user'] : ''; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="admin" <?= (isset($user['role']) && $user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="petugas" <?= (isset($user['role']) && $user['role'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary">Update Role</button>
                            <a href="admin.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>