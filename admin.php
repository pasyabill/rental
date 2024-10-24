<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="assets/img/logoo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="sitename">Death Wheel</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#datauser">Data User</a></li>
          <li><a href="logout.php" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 14px;">Logout</a></li>
        </ul>
        <?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); 
}
?>
    </div>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">
    <section id="hero" class="hero section dark-background">
      <div class="hero-image-wrapper">
        <img src="assets/img/mobil.jpg" alt="" data-aos="fade-in" class="hero-image">
      </div>
      
      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2>Halo Admin DeathWheel</h2>
            <p>admin mah enak dek g ngapa ngapain</p>
            <a href="registeruser.php" class="btn-get-started">add petugas</a>
            <a href="laporan_admin.php" class="btn-get-started">Laporan</a>
          </div>
        </div>
      </div>
      <style>
        #hero {
  position: relative;
  width: 100%;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
}

.hero-image-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.hero-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  top: 0;
  left: 0;
}

.container {
  position: relative;
  z-index: 2;
} /* Added closing brace here */

.dark-background::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1;
}

      </style>
    </section>
  
<section id="datauser" class="datauser section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar User</h2>
    <p>min acc minn :D</p>
  </div>
  <!-- Tabel Pengguna -->
<div class="container mt-5">
    <h2>Daftar Pengguna</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';

            // Query untuk mengambil data pengguna
            $sql = "SELECT id_user, username, role FROM tbl_user"; // Ganti 'user' dengan 'username' jika diperlukan
            $result = $koneksi->query($sql);

            // Periksa apakah query berhasil
            if ($result === false) {
                echo "<tr><td colspan='4'>Error: " . $koneksi->error . "</td></tr>";
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_user'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>"; // Sesuaikan nama kolom
                    echo "<td>" . $row['role'] . "</td>";
                    echo "<td>
                            <a href='edit_user.php?id_user=" . $row['id_user'] . "' class='btn btn-success'>Edit Role</a>
                            <a href='delete_user.php?id_user=" . $row['id_user'] . "' class='btn btn-danger' onclick=\"return confirm('Anda yakin ingin menghapus pengguna ini?');\">Delete</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada pengguna yang tersedia</td></tr>";
            }

            $koneksi->close();
            ?>
        </tbody>
    </table>
</div>

  </sectiom>


  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">DeathWheel</h3>
      <p>Siap Sedia Memenuhi Kebutuhan Gengsimu</p>
      <!-- <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div> -->
      <div class="copyright">
        <span>Copyright UKK RPL Okt 2024</span> <strong class="px-1 sitename">Aspasya Salabila</strong> <span>All Rights Reserved</span>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>