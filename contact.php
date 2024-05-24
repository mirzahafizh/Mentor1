<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
// Mengambil data lokasi, email, dan phone dari tabel kontak
$query = mysqli_query($koneksi, "SELECT location, email, phone FROM kontak");
$data = mysqli_fetch_assoc($query);
$location = $data['location'];
$email = $data['email'];
$phone = $data['phone'];

// Menangani pengiriman form feedback
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback'])) {
    $feedback = mysqli_real_escape_string($koneksi, filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING));

    // Menyimpan feedback ke database
    $query = "INSERT INTO feedback (feedback) VALUES ('$feedback')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Feedback berhasil disimpan.');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . mysqli_error($koneksi) . "');</script>";
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contact - Mentor Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">Submission</a></li>
          <li><a href="trainers.php">Surat Administrasi</a></li>
          <li><a class="active" href="contact.php">Contact</a></li>
        </ul>
        
      </nav><!-- .navbar -->

      <a href="indexx.php" class="get-started-btn">Login</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs" data-aos="fade-in">
      <div class="container">
        <h2>Contact Us</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3988.953533971717!2d116.98445507496538!3d-1.1929529987956509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMcKwMTEnMzQuNiJTIDExNsKwNTknMTMuMyJF!5e0!3m2!1sid!2sid!4v1716303600714!5m2!1sid!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $location; ?></p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $email; ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $phone; ?></p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
          
            <p>
              Mulawarman RT 08 <br>
              Manggar baru, Balikpapan Timur<br>
              Indonesia <br><br>
              <strong>Phone:</strong> (0542) 77195<br>
              <strong>Email:</strong> rt29lamaru@gmail.com<br>
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
            <form id="feedbackForm" method="POST" onsubmit="submitFeedbackForm(event)">
                <input type="text" name="feedback" required>
                <input type="submit" value="Submit">
            </form>
          </div>


          <script>
          function submitFeedbackForm(event) {
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
                          form.reset(); // Reset form setelah pengiriman berhasil
                      } else {
                          // Terjadi kesalahan, tampilkan pesan kesalahan
                          console.error("Terjadi kesalahan: " + xhr.status);
                      }
                  }
              };

              // Kirim permintaan POST ke file PHP yang sama
              xhr.open("POST", "contact.php", true);
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
