<?php
include 'koneksi.php';
if (isset($_GET['nopol'])) {
    $nopol = $_GET['nopol'];
    $query = "DELETE FROM tbl_mobil WHERE nopol = '$nopol'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Mobil dengan Nopol $nopol berhasil dihapus.');
                window.location.href = 'petugas.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus mobil: " . mysqli_error($koneksi) . "');
                window.location.href = 'petugas.php';
              </script>";
    }
} else {
    echo "<script>
            alert('Nopol tidak ditemukan.');
            window.location.href = 'petugas.php';
          </script>";
}
mysqli_close($koneksi);
?>