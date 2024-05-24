<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RT 29 Lamaru</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/LOGO.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/styles.css" rel="stylesheet" type="text/css">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php"><img src="assets\img\LOGO.png" alt="LOGO"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          <li><a href="about.php">Submission</a></li>
          <li><a href="trainers.php">Surat Administrasi</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        
      </nav><!-- .navbar -->

      <a href="indexx.php" class="get-started-btn">Login</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <?php
    // Menghubungkan ke database
    $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

    // Memeriksa koneksi
    if (mysqli_connect_errno()) {
      echo "Koneksi database gagal: " . mysqli_connect_error();
      exit();
    }

    // Mengambil data dari tabel
    $query = mysqli_query($koneksi, "SELECT judul, deskripsi, link FROM judul");
    $data = mysqli_fetch_assoc($query);

    // Menampilkan data dalam elemen HTML
    echo '<h1>' . $data['judul'] . '</h1>';
    echo '<h2>' . $data['deskripsi'] . '</h2>';
    echo '<a href="' . $data['link'] . '" target="_blank" class="btn-get-started">Cek Disini</a>';

    // Menutup koneksi
    mysqli_close($koneksi);
    ?>
  </div>
</section>
<!-- End Hero -->

  <main id="main">

    <!-- ======= about Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <?php
            // Menghubungkan ke database
            $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

            // Memeriksa koneksi
            if (mysqli_connect_errno()) {
              echo "Koneksi database gagal: " . mysqli_connect_error();
              exit();
            }

            // Query untuk mengambil data dari tabel 'berita'
            $query = mysqli_query($koneksi, "SELECT * FROM berita");

            // Memeriksa apakah data ditemukan
            if (mysqli_num_rows($query) > 0) {
              $row = mysqli_fetch_assoc($query);
              // Menampilkan gambar dari database
              echo '<img src="' . $row['gambar'] . '" class="img-fluid" style="max-height: 500px;" alt="">';

            }
            ?>

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <?php
            // Menghubungkan ke database (dapat dihilangkan jika koneksi sudah terhubung di atas)
            $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");
            // Memeriksa koneksi
            if (mysqli_connect_errno()) {
              echo "Koneksi database gagal: " . mysqli_connect_error();
              exit();
            }

            // Query untuk mengambil data dari tabel 'berita'
            $query = mysqli_query($koneksi, "SELECT * FROM berita");

            // Memeriksa apakah data ditemukan
            if (mysqli_num_rows($query) > 0) {
              $row = mysqli_fetch_assoc($query);
              // Menampilkan judul dan deskripsi dari database
              echo '<h3>' . $row['judul'] . '</h3>';
              echo '<p class="fst-italic">' . $row['deskripsi'] . '</p>';
            }
            ?>

          </div>
        </div>
      </div>
    </section><!-- End about Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

      <div class="row counters">
        <?php
        // Menghubungkan ke database
        $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");
        // Memeriksa koneksi
        if (mysqli_connect_errno()) {
          echo "Koneksi database gagal: " . mysqli_connect_error();
          exit();
        }

        // Query untuk mengambil data dari tabel 'numerik'
        $query = mysqli_query($koneksi, "SELECT * FROM numerik");

        // Memeriksa apakah data ditemukan
        if (mysqli_num_rows($query) > 0) {
          while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $row['murid']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Penduduk Laki-Laki</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $row['guru']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Penduduk Perempuan</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $row['penghargaan']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah Rumah</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
              <span data-purecounter-start="0" data-purecounter-end="<?php echo $row['fasilitas']; ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Jumlah KK</p>
            </div>
            <?php
          }
        } else {
          echo "Tidak ada data yang ditemukan.";
        }

        // Menutup koneksi
        mysqli_close($koneksi);
        ?>
      </div>


    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <?php
              // Menghubungkan ke database
              $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

              // Memeriksa koneksi
              if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
              }

              // Query untuk mengambil data dari tabel 'info'
              $query = mysqli_query($koneksi, "SELECT * FROM info");

              // Memeriksa apakah data ditemukan
              if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                // Menampilkan data dalam format HTML
                echo '<h3>' . $row['judul'] . '</h3>';
                echo '<p>' . $row['deskripsi'] . '</p>';
                echo '<div class="text-center">';
                echo '  <a href="' . $row['link'] . '" class="more-btn">Klik Disini <i class="bx bx-chevron-right"></i></a>';
                echo '</div>';
              } else {
                echo "Data tidak ditemukan.";
              }

              // Menutup koneksi
              mysqli_close($koneksi);
              ?>
            </div>
          </div>

          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
            <?php
              // Menghubungkan ke database
              $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

              // Memeriksa koneksi
              if (mysqli_connect_errno()) {
                  echo "Koneksi database gagal: " . mysqli_connect_error();
                  exit();
              }

              // Mengambil data fasilitas dari tabel fasilitas
              $query = mysqli_query($koneksi, "SELECT * FROM fasilitas");
              ?>
              
              <div class="row">
                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                  <div class="col-xl-4 d-flex align-items-stretch">
                    <div class="icon-box mt-4 mt-xl-0">
                      <div class="member">
                        <img src="uploads/<?php echo $row['gambar']; ?>" class="img-fluid" style="width: 170px; height: 120px; object-fit: cover;" alt="">

                        <br><br>
                        <div class="member-content">
                          <h4><?php echo $row['judul']; ?></h4>
                          <p><?php echo $row['deskripsi']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
                </div> 
                


                </div><!-- Ini wajib ada-->
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

   
      </div>
    </section><!-- End Features Section -->

   
          </div> <!-- End Course Item-->

        </div>

      </div>
    </section><!-- End Popular Courses Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <!--  <img src="assets/img/LOGO.png" alt="LOGO.png">-->
            <p>
              Lamaru RT 29 <br>
              Kelurahan Lamaru, Balikpapan Timur<br>
              Indonesia <br><br>
              <strong>Phone:</strong> 085920789254<br>
              <strong>Email:</strong> -@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="about.php">Submission</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="trainers.php">Surat Administrasi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="contact.php">Contact</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Feedback</h4>
            <p>Silahkan isi feedback tentang website kami</p>
            <form id="feedbackForm">
                <input type="text" name="feedback">
                <input type="submit" value="Submit" onclick="submitForm(event)">
            </form>
          </div>

          <script>
          function submitForm(event) {
              event.preventDefault(); // Mencegah perilaku default pengiriman form

              var form = document.getElementById("feedbackForm");
              var formData = new FormData(form);

              // Buat objek XMLHttpRequest
              var xhr = new XMLHttpRequest();

              // Atur tindakan yang akan dilakukan setelah permintaan selesai
              xhr.onreadystatechange = function() {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                          // Berhasil, tampilkan notifikasi popup
                          alert("Feedback berhasil disimpan.");
                      } else {
                          // Terjadi kesalahan, tampilkan pesan kesalahan
                          console.error("Terjadi kesalahan: " + xhr.status);
                      }
                  }
              };

              // Kirim permintaan POST ke file koneksi.php
              xhr.open("POST", "koneksi.php", true);
              xhr.send(formData);
          }
          </script>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>