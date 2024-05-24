<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Menangani pengiriman form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {
    $nama = mysqli_real_escape_string($koneksi, filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING));
    $alamat = mysqli_real_escape_string($koneksi, filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING));
    $alasan = mysqli_real_escape_string($koneksi, filter_input(INPUT_POST, 'alasan', FILTER_SANITIZE_STRING));
    $pdfName = '';

    // Menghandle upload file
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
        $pdfTmpPath = $_FILES['pdf_file']['tmp_name'];
        $pdfName = time() . '-' . $_FILES['pdf_file']['name'];
        $pdfExtension = pathinfo($pdfName, PATHINFO_EXTENSION);
        $allowedExtensions = ['pdf'];

        if (in_array($pdfExtension, $allowedExtensions)) {
            $dest_path = 'uploads/' . $pdfName;
            if (move_uploaded_file($pdfTmpPath, $dest_path)) {
                echo "File berhasil diupload.";
            } else {
                echo "Terjadi kesalahan saat mengupload file.";
            }
        } else {
            echo "Hanya file PDF yang diperbolehkan.";
        }
    }

    // Menyimpan data ke database
    $query = "INSERT INTO submissions (nama, alamat, alasan, pdf_name) VALUES ('$nama', '$alamat', '$alasan', '$pdfName')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

// Menangani pengiriman form feedback
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback'])) {
    $feedback = mysqli_real_escape_string($koneksi, filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_STRING));

    // Menyimpan feedback ke database
    $query = "INSERT INTO feedback (feedback) VALUES ('$feedback')";
    if (mysqli_query($koneksi, $query)) {
        echo "Feedback berhasil disimpan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="submit1"] {
        background-color: #964b00;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
            .form-container {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            font-weight: bold;
        }

        .form-container input[type="text"],
        .form-container textarea {
            width: 100%;
            display: flex;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container input[type="file"] {
            margin-bottom: 20px;
        }

        .form-container input[type="submit"] {
            background-color: #964b00;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
</style>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>about - Mentor Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
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
                    <li><a class="active" href="about.php">Submission</a></li>
                    <li><a href="trainers.php">Surat Administrasi</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a href="indexx.php" class="get-started-btn">Login</a>
        </div>
    </header><!-- End Header -->

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Submission</h2>
                <p>Upload Surat yang Dibutuhkan </p>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= about Section ======= -->
        <section id="about" class="about ">
            <div class="container " data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 w-full " data-aos="fade-left" data-aos-delay="100"></div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content mx-auto"><div class="form-container">
                          <h2>Submission</h2>
                            <form action="" method="POST" enctype="multipart/form-data" id="submissionForm">
                                <label for="nama">Nama:</label><br>
                                <input type="text" id="nama" name="nama" required><br>
              
                                <label for="alamat">Alamat:</label><br>
                                <textarea id="alamat" name="alamat" required></textarea><br>
              
                                <label for="alasan">Alasan Mengirim Surat:</label><br>
                                <input type="text" id="alasan" name="alasan" required><br>
              
                                <label for="pdf_file">Upload PDF:</label><br>
                                <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required><br>

                                <input type="submit" value="Submit" onclick="submitSubmissionForm(event)">
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section><!-- End about Section -->
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
                        <form id="feedbackForm" method="POST">
                            <input type="text" name="feedback" required>
                            <input type="submit" value="Submit" onclick="submitFeedbackForm(event)">
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
        function submitSubmissionForm(event) {
            event.preventDefault(); // Mencegah perilaku default pengiriman form

            var form = document.getElementById("submissionForm");
            var formData = new FormData(form);

            // Buat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Atur tindakan yang akan dilakukan setelah permintaan selesai
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Berhasil, tampilkan notifikasi popup
                        alert("Submission berhasil disimpan.");
                    } else {
                        // Terjadi kesalahan, tampilkan pesan kesalahan
                        console.error("Terjadi kesalahan: " + xhr.status);
                    }
                }
            };

            // Kirim permintaan POST ke script PHP yang sama
            xhr.open("POST", "", true); // Form ini diproses oleh halaman yang sama
            xhr.send(formData);
        }

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
                    } else {
                        // Terjadi kesalahan, tampilkan pesan kesalahan
                        console.error("Terjadi kesalahan: " + xhr.status);
                    }
                }
            };

            // Kirim permintaan POST ke script PHP yang sama
            xhr.open("POST", "", true); // Form ini diproses oleh halaman yang sama
            xhr.send(formData);
        }
    </script>

</body>

</html>
