<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Petugas</title>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

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

      
      <nav id="navmenu" class="navmenu">
    <ul style="list-style: none; display: flex; gap: 20px; margin: 0;">
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#dashboard">dashboard</a></li>
        <li><a href="#daftarmobil">daftar mobil</a></li>
        <li><a href="logout.php" class="btn btn-secondary btn-sm" style="padding: 5px 10px; font-size: 14px;">Logout</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    <?php
    ob_start();
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); 
    }
    ?>

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
            <h2>Halo Petugas DeathWheel</h2>
            <p>Klik untuk meilhat kerjaanmu wkwkkwk</p>
            <a href="#dashboard" class="btn-get-started">Dashboard</a>
            <a href="laporan.php" class="btn-get-started">Laporan</a>
            <a href="inputmobil.php" class="btn-get-started">Add Mobil</a>
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
    

    <section id="dashboard" class="dashboard section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Dashboard Petugas</h2>
        <p>Kelola Rental Mobil</p>
    </div>

    <nav id="transactions-table-tab" class="transactions-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4" role="tablist">
        <a class="flex-sm-fill text-sm-center nav-link active" id="transactions-booking-tab" data-bs-toggle="tab" href="#transactions-booking" role="tab" aria-controls="transactions-booking" aria-selected="true">Booking</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="transactions-approve-tab" data-bs-toggle="tab" href="#transactions-approve" role="tab" aria-controls="transactions-approve" aria-selected="false" tabindex="-1">Approved</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="transactions-ambil-tab" data-bs-toggle="tab" href="#transactions-ambil" role="tab" aria-controls="transactions-ambil" aria-selected="false" tabindex="-1">Ambil</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="transactions-kembali-tab" data-bs-toggle="tab" href="#transactions-kembali" role="tab" aria-controls="transactions-kembali" aria-selected="false" tabindex="-1">Kembali</a>
    </nav>

    <div class="tab-content" id="transactions-table-tab-content">
        <!-- Booking Tab -->
<div class="tab-pane fade active show" id="transactions-booking" role="tabpanel" aria-labelledby="transactions-booking-tab">
    <div class="app-card app-card-transactions-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                    <tr class="bg-secondary text-center text-white">
                            <th class="cell">id transaksi</th>
                            <th class="cell">nama</th>
                            <th class="cell">no polisi</th>
                            <th class="cell">tgl booking</th>
                            <th class="cell">tgl ambil</th>
                            <th class="cell">tgl kembali</th>
                            <th class="cell">total</th>
                            <th class="cell">downpayment</th>
                            <th class="cell">kurang</th>
                            <th class="cell">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Include file koneksi.php
                        include 'koneksi.php';

                        // Proses Approve
                        if (isset($_POST['approve_id'])) {
                            $approve_id = $_POST['approve_id'];

                            // Update status transaksi menjadi 'approved'
                            $sql_update_status = "UPDATE tbl_transaksi SET status = 'approved' WHERE id_transaksi = '$approve_id'";
                            if ($koneksi->query($sql_update_status) === TRUE) {

                                // Ambil nomor polisi dari transaksi yang disetujui
                                $nopol = $koneksi->query("SELECT nopol FROM tbl_transaksi WHERE id_transaksi = '$approve_id'")->fetch_assoc()['nopol'];

                                // Update status mobil di tbl_mobil menjadi 'tidak tersedia'
                                $sql_update_mobil = "UPDATE tbl_mobil SET status = 'booked' WHERE nopol = '$nopol'";
                                $koneksi->query($sql_update_mobil);

                                // Tambah record baru ke tbl_bayar untuk DP
                                $total = $koneksi->query("SELECT total FROM tbl_transaksi WHERE id_transaksi = '$approve_id'")->fetch_assoc()['total'];
                                $downpayment = $total * 0.75;
                                $sql_bayar = "INSERT INTO tbl_bayar (id_kembali, tgl_bayar, total_bayar, status) VALUES ('$approve_id', NULL, '$downpayment', 'belum lunas')";
                                $koneksi->query($sql_bayar);

                                // Redirect ke halaman pembayaran DP setelah approve
                                header("Location: downpayment.php?id_transaksi=" . $approve_id);
                                exit();
                            } else {
                                echo "Error updating record: " . $koneksi->error;
                            }
                        }

                        // Query untuk mengambil data transaksi dengan status 'booking'
                        $sql = "SELECT t.id_transaksi, m.nama, t.nopol, t.tgl_booking, t.tgl_ambil, t.tgl_kembali, 
                                       t.total, t.downpayment, t.kekurangan 
                                FROM tbl_transaksi t
                                JOIN tbl_member m ON t.nik = m.nik
                                WHERE t.status = 'booking'";
                        $result = $koneksi->query($sql);

                        // Cek apakah ada hasil
                        if ($result->num_rows > 0) {
                            // Loop melalui hasil dan tampilkan dalam tabel
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_transaksi'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nopol'] . "</td>";
                                echo "<td>" . $row['tgl_booking'] . "</td>";
                                echo "<td>" . $row['tgl_ambil'] . "</td>";
                                echo "<td>" . $row['tgl_kembali'] . "</td>";
                                echo "<td>Rp " . number_format($row['total'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['downpayment'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['kekurangan'], 2, ',', '.') . "</td>";
                                // Tambahkan button untuk aksi "Approve"
                                echo "<td><form method='post' action=''><button type='submit' name='approve_id' value='" . $row['id_transaksi'] . "' class='approve-btn'>Approve</button></form></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>Tidak ada transaksi yang perlu aksi booking</td></tr>";
                        }

                        // Tutup koneksi
                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

        
        <!-- Approved Tab -->
<div class="tab-pane fade" id="transactions-approve" role="tabpanel" aria-labelledby="transactions-approve-tab">
    <div class="app-card app-card-transactions-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr class="bg-secondary text-center text-white">
                            <th class="cell">ID Transaksi</th>
                            <th class="cell">Nama</th>
                            <th class="cell">No Polisi</th>
                            <th class="cell">Tgl Booking</th>
                            <th class="cell">Tgl Ambil</th>
                            <th class="cell">Tgl Kembali</th>
                            <th class="cell">Total</th>
                            <th class="cell">Downpayment</th>
                            <th class="cell">Kurang</th>
                            <th class="cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';

                        // Query untuk mengambil data transaksi dengan status 'approved'
                        $sql = "SELECT t.id_transaksi, m.nama, t.nopol, t.tgl_booking, t.tgl_ambil, t.tgl_kembali, t.total, t.downpayment, t.kekurangan 
                        FROM tbl_transaksi t
                        JOIN tbl_member m ON t.nik = m.nik
                        JOIN tbl_bayar b ON t.id_transaksi = b.id_transaksi
                        WHERE t.status = 'approved' 
                        AND b.status = 'belum lunas'";

                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_transaksi'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nopol'] . "</td>";
                                echo "<td>" . $row['tgl_booking'] . "</td>";
                                echo "<td>" . $row['tgl_ambil'] . "</td>";
                                echo "<td>" . $row['tgl_kembali'] . "</td>";
                                echo "<td>Rp " . number_format($row['total'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['downpayment'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['kekurangan'], 2, ',', '.') . "</td>";
                                // Tambahkan form untuk aksi "Ambil"
                                echo "<td>
                                        <form action='kekurangan.php' method='GET'>
                                            <input type='hidden' name='id_transaksi' value='" . $row['id_transaksi'] . "'>
                                            <button type='submit' class='ambil-btn'>Ambil</button>
                                        </form>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>Tidak ada transaksi yang perlu aksi approved</td></tr>";
                        }

                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <!-- Ambil Tab -->
<div class="tab-pane fade" id="transactions-ambil" role="tabpanel" aria-labelledby="transactions-ambil-tab">
    <div class="app-card app-card-transactions-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr class="bg-secondary text-center text-white">
                            <th class="cell">ID Transaksi</th>
                            <th class="cell">Nama</th>
                            <th class="cell">No Polisi</th>
                            <th class="cell">Tgl Booking</th>
                            <th class="cell">Tgl Ambil</th>
                            <th class="cell">Total</th>
                            <th class="cell">Downpayment</th>
                            <th class="cell">Kurang</th>
                            <th class="cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';

                        // Query untuk mengambil data transaksi dengan status 'ambil'
                        $sql = "SELECT t.id_transaksi, m.nama, t.nopol, t.tgl_booking, t.tgl_ambil, t.total, t.downpayment, t.kekurangan
                                FROM tbl_transaksi t
                                JOIN tbl_member m ON t.nik = m.nik
                                WHERE t.status = 'ambil'";
                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_transaksi'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nopol'] . "</td>";
                                echo "<td>" . $row['tgl_booking'] . "</td>";
                                echo "<td>" . $row['tgl_ambil'] . "</td>";
                                echo "<td>Rp " . number_format($row['total'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['downpayment'], 2, ',', '.') . "</td>";
                                echo "<td>Rp " . number_format($row['kekurangan'], 2, ',', '.') . "</td>";
                                echo "<td>
                                        <button class='btn btn-primary kembali-btn' data-id='" . $row['id_transaksi'] . "'>Kembali</button>
                                      </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='9'>Tidak ada transaksi yang perlu aksi ambil</td></tr>";
                        }

                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


      <!-- Kembali Tab -->
<div class="tab-pane fade" id="transactions-kembali" role="tabpanel" aria-labelledby="transactions-kembali-tab">
    <div class="app-card app-card-transactions-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr class="bg-secondary text-center text-white">
                            <th class="cell">ID Transaksi</th>
                            <th class="cell">Nama</th>
                            <th class="cell">No Polisi</th>
                            <th class="cell">Tgl Ambil</th>
                            <th class="cell">Kondisi Mobil</th>
                            <th class="cell">Denda</th>
                            <th class="cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'koneksi.php';

                        // Query untuk mengambil data transaksi yang sudah kembali, 
                        // hanya menampilkan yang belum dilunasi
                        $sql = "SELECT t.id_transaksi, m.nama, t.nopol, t.tgl_ambil, k.kondisi_mobil, k.denda, b.status 
                                FROM tbl_kembali k
                                JOIN tbl_transaksi t ON k.id_transaksi = t.id_transaksi
                                JOIN tbl_member m ON t.nik = m.nik
                                LEFT JOIN tbl_bayar b ON t.id_transaksi = b.id_transaksi
                                WHERE k.denda > 0 AND (b.status IS NULL OR b.status != 'lunas')"; // Hanya ambil transaksi dengan denda yang belum lunas

                        $result = $koneksi->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_transaksi'] . "</td>";
                                echo "<td>" . $row['nama'] . "</td>";
                                echo "<td>" . $row['nopol'] . "</td>";
                                echo "<td>" . $row['tgl_ambil'] . "</td>";
                                echo "<td>" . $row['kondisi_mobil'] . "</td>";
                                echo "<td>Rp " . number_format($row['denda'], 2, ',', '.') . "</td>";
                                
                                // Tampilkan tombol bayar hanya jika status tidak 'lunas'
                                if (empty($row['status']) || $row['status'] != 'lunas') {
                                    echo "<td><button class='btn btn-primary bayar-btn' data-id='" . $row['id_transaksi'] . "'>Bayar</button></td>";
                                } else {
                                    echo "<td><span class='text-success'>Lunas</span></td>";
                                }

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Tidak ada transaksi yang perlu aksi kembali</td></tr>";
                        }

                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <!-- Modal Pengembalian -->
<div id="kembaliModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kembaliModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kembaliModalLabel">Pengembalian Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="kembali.php">
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" id="id_transaksi">
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Kembali:</label>
                        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
                    </div>
                    <div class="form-group">
                        <label for="kondisi_mobil">Kondisi Mobil:</label>
                        <textarea class="form-control" id="kondisi_mobil" name="kondisi_mobil" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="denda">Denda (Jika Ada):</label>
                        <input type="number" class="form-control" id="denda" name="denda" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Pengembalian</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Bayar -->
<div id="bayarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarModalLabel">Pembayaran Denda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="bayar_denda.php">
                <div class="modal-body">
                    <input type="hidden" name="id_transaksi" id="id_transaksi_bayar"> <!-- Pastikan nama input sesuai -->
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar:</label>
                        <input type="number" class="form-control" id="total_bayar" name="total_bayar" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</section>


<section id="daftarmobil" class="daftarmobil section">

  <div class="container section-title" data-aos="fade-up">
    <h2>Daftar Mobil</h2>
    <p>Mobil mewah yang disewakan</p>
  </div>

  <div class="container">
    <div class="row">

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "rental");
    $query = "SELECT * FROM tbl_mobil";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $imageFileName = $row['foto']; 
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-img-top-container" style="overflow: hidden; height: 200px;"> 
                        <img src="./assets/img/<?php echo $imageFileName; ?>" class="card-img-top" alt="Gambar Mobil" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title text-center font-weight-bold"><?php echo $row['brand']; ?> <?php echo $row['type']; ?></h5>
                        <p class="card-text text-center mb-1"><strong>Nopol:</strong> <?php echo $row['nopol']; ?></p>
                        <p class="card-text text-center mb-1"><strong>Tahun:</strong> <?php echo date('Y', strtotime($row['tahun'])); ?></p>
                        <p class="card-text text-center mb-1"><strong>Harga:</strong> Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                        <p class="card-text text-center mb-1"><strong>Status:</strong> <?php echo $row['status']; ?></p>
                    </div>

                    <div class="card-footer text-center p-2">
                        <a href="hapusmobil.php?nopol=<?php echo $row['nopol']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?');">Hapus</a>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center'>Tidak ada data mobil tersedia.</p>";
    }
    mysqli_close($koneksi);
    ?>

    </div> 
  </div> 

</section>
    
  </main>
  <?php
ob_end_flush(); 
?>

  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename">DeathWheel</h3>
      <p>Siap Sedia Memenuhi Kebutuhan Gengsimu</p>
      <div class="copyright">
        <span>Copyright UKK RPL Okt 2024</span> <strong class="px-1 sitename">Aspasya Salsabila</strong> <span>All Rights Reserved</span>
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!-- Tambahkan jQuery dan Bootstrap jika belum ada -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="assets/js/main.js"></script>
  <!-- JavaScript untuk membuka modal dan mengisi id_transaksi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.kembali-btn').forEach(button => {
            button.addEventListener('click', function() {
                var idTransaksi = this.getAttribute('data-id');
                document.getElementById('id_transaksi').value = idTransaksi;
                $('#kembaliModal').modal('show');
            });
        });
    });
</script>

<script>
    document.querySelectorAll('.bayar-btn').forEach(button => {
        button.addEventListener('click', function() {
            var idTransaksi = this.getAttribute('data-id');
            // Tampilkan ID transaksi di console untuk debugging
            console.log('ID Transaksi:', idTransaksi);

            // Tampilkan modal pembayaran
            $('#bayarModal').modal('show');
            
            // Atur input hidden ID Transaksi dalam modal
            document.getElementById('id_transaksi_bayar').value = idTransaksi;
        });
    });
</script>
</body>
</html>