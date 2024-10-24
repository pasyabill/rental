<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DeathWheel</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logoo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Death Wheel</h1>
      </a>

      <nav id="navmenu" class="navmenu" style="display: flex; justify-content: space-between; align-items: center;">
    <div style="flex-grow: 1;"></div>
    
    <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#daftarmobil">Mobil</a></li>
        <li><a href="profile.php">PROFIL</a></li>
        <li><a href="logout.php" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 14px;">Logout</a></li>
    </ul>
    </div>
    <?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['nik'])) {
    header("Location: login.php");
    exit(); 
}
?>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>



    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
      <div class="hero-image-wrapper">
        <img src="assets/img/mobil.jpg" alt="" data-aos="fade-in" class="hero-image">
      </div>
    
      <div class="container text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <h2>Selamat Datang di Death Wheel</h2>
            <p>Mulai rental mobil keren disini!</p>
            <a href="#daftarmobil" class="btn-get-started">Gass Cuyy</a>
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
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Death Wheel</h2>
        <p>Satu-satunya tempat sewa mobil mewah untuk memenuhi gengsimu</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
            <h3>Kamu diundang reuni sekolah tapi bingung karena tidak punya hal untuk dipamerkan?</h3>
            <p>
              Ayo sewa mobil di DeathWheel! Dijamin bikin hati orang lain panassssss🔥🔥
            </p>
            <a href="#" class="about-btn align-self-center align-self-xl-start"><span>Mulai Sewa</span> <i class="bi bi-chevron-right"></i></a>
          </div>

          <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-wallet2"></i>
                <h4><a href="" class="stretched-link">Harga murah meriah cik</a></h4>
                <p>Harga sewa mulai Rp 5.000.000,00 /Hari lohh!</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-car-front-fill"></i>
                <h4><a href="" class="stretched-link">Mobil siap pakai anti minuzzz</a></h4>
                <p>Mobil yang kami sewakan sudah pasti no minuss cuyy</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-emoji-heart-eyes-fill"></i>
                <h4><a href="" class="stretched-link">calon mertua langsung setuju</a></h4>
                <p>Buat calon mertua matremu merestui hubunganmu, buat mereka bangga dengan mobil yang kamu sewa</p>
              </div><!-- Icon-Box -->

              <div class="col-md-6 icon-box position-relative">
                <i class="bi bi-emoji-sunglasses-fill"></i>
                <h4><a href="" class="stretched-link">Ikuti gengsimu!!</a></h4>
                <p>Bisa banget buat dipamerin di ajang pamer harta saat reuni sekolah</p>
              </div><!-- Icon-Box -->

            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="250" data-purecounter-duration="1" class="purecounter"></span>
                <p>Penyewa Puas</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-car-front"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
                <p>Mobil Mewah</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-clock"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
                <p>Layanan 24 Jam</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
                <p> yang gercep membantu dan menyervis</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->


    <!-- daftar mobil Section -->
<section id="daftarmobil" class="daftarmobil section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Daftar Mobil</h2>
  <p>Mobil mewah yang kami sewakan</p>
</div><!-- End Section Title -->

<div class="container">
  <div class="row"> <!-- Row untuk grid card -->

  <?php
  // Koneksi ke database
  $koneksi = mysqli_connect("localhost", "root", "", "rental");

  // Query untuk mengambil data dari tabel mobil
  $query = "SELECT * FROM tbl_mobil";
  $result = mysqli_query($koneksi, $query);

  // Cek apakah hasil query ada data
  if (mysqli_num_rows($result) > 0) {
      // Looping untuk menampilkan data mobil
      while ($row = mysqli_fetch_assoc($result)) {
          $imageFileName = $row['foto']; // Mengambil nama file foto dari database
          ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4"> <!-- 4 Kolom per baris di layar besar -->
              <div class="card h-100 shadow-sm">
                  <!-- Bagian gambar mobil -->
                  <div class="card-img-top-container" style="overflow: hidden; height: 200px;"> <!-- Sesuaikan tinggi gambar -->
                      <img src="./assets/img/<?php echo $imageFileName; ?>" class="card-img-top" alt="Gambar Mobil" style="width: 100%; height: 100%; object-fit: cover;">
                  </div>

                  <!-- Bagian informasi mobil -->
                  <div class="card-body p-3">
                      <h5 class="card-title text-center font-weight-bold"><?php echo $row['brand']; ?> <?php echo $row['type']; ?></h5>
                      <p class="card-text text-center mb-1"><strong>Nopol:</strong> <?php echo $row['nopol']; ?></p>
                      <p class="card-text text-center mb-1"><strong>Tahun:</strong> <?php echo date('Y', strtotime($row['tahun'])); ?></p>
                      <p class="card-text text-center mb-1"><strong>Harga:</strong> Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                      <p class="card-text text-center mb-1"><strong>Status:</strong> <?php echo $row['status']; ?></p>
                  </div>

                  <!-- Bagian footer card -->
                  <div class="card-footer text-center p-2">
                  <?php if ($row['status'] == 'tersedia') { ?>
                      <!-- Jika status mobil 'tersedia', tampilkan tombol Booking -->
                      <a href="pinjam.php?nopol=<?php echo $row['nopol']; ?>" class="btn btn-secondary btn-sm">Booking</a>
                  <?php } else { ?>
                      <!-- Jika status mobil 'booked' atau 'kosong', tampilkan pesan -->
                      <button class="btn btn-danger btn-sm" disabled>Mobil tidak tersedia</button>
                  <?php } ?>
                  </div>
              </div>
          </div>
          <?php
      }
  } else {
      echo "<p class='text-center'>Tidak ada data mobil tersedia.</p>";
  }

  // Tutup koneksi
  mysqli_close($koneksi);
  ?>

  </div> <!-- End row -->
</div> <!-- End container -->

</section>

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