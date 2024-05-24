<?php
$servername = "localhost";
$username = "rt0x2164";
$password = "3SJJAE2dt6VU39";
$dbname = "rt0x2164_dbhome";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data guru dari database
$query = "SELECT * FROM profilguru";
$result = mysqli_query($conn, $query);

// Proses form feedback jika ada pengiriman data dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feedback'])) {
    // Ambil data feedback dari formulir
    $feedback = mysqli_real_escape_string($conn, $_POST["feedback"]);

    // Masukkan data feedback ke dalam tabel "feedback"
    $insert_query = "INSERT INTO feedback (feedback) VALUES ('$feedback')";
    if (mysqli_query($conn, $insert_query)) {
        // Feedback berhasil disimpan
        echo json_encode(array("status" => "success", "message" => "Feedback berhasil disimpan."));
        exit;
    } else {
        // Terjadi kesalahan saat menyimpan feedback
        echo json_encode(array("status" => "error", "message" => "Terjadi kesalahan: " . mysqli_error($conn)));
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Trainers - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
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
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">Submission</a></li>
                    <li><a class="active" href="trainers.php">Surat Administrasi</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a href="indexx.php" class="get-started-btn">Login</a>
        </div>
    </header><!-- End Header -->

    <main id="main" data-aos="fade-in">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <h2>Surat Administrasi</h2>
                <p>Surat administrasi adalah jenis surat yang digunakan dalam lingkungan kerja atau organisasi untuk tujuan-tujuan administratif dan manajerial. </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Trainers Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container " data-aos="fade-up">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch hover:scale-110  transition-transform duration-300  cursor-pointer">
                            <div class="member w-full">
                                <a href="uploads/<?php echo $row['file']; ?>" target="_blank" rel="noopener noreferrer">Lihat PDF</a>
                                <div class="member-content">
                                    <h4><?php echo $row['nama']; ?></h4>
                                    <span><?php echo $row['pelajaran']; ?></span>
                                    <p><?php echo $row['deskripsi']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section><!-- End Trainers Section -->

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
                        <form id="feedbackForm">
                            <input type="text" name="feedback" id="feedback" required>
                            <input type="submit" value="Submit" onclick="submitFeedback()">
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Mentor</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
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

    <script>
        function submitFeedback() {
            var feedback = document.getElementById("feedback").value;

            // Kirim data feedback menggunakan AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "trainers.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.status == "success") {
                        alert(response.message);
                    } else {
                        alert("Terjadi kesalahan: " + response.message);
                    }
                }
            };
            xhr.send("feedback=" + feedback);
        }
    </script>
</body>

</html>

