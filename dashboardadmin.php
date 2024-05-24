<?
$koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        li {
            float: left;
        }

        li.logout {
            float: right;
        }

        li a {
            display: block;
            color: #964b00;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li.logout a {
            background-color: #E74C3C;
            color: white;
            border-radius: 5px;
            padding: 10px 20px;
        }

        li.logout a:hover {
            background-color: #ffffff;
            color: #E74C3C;
        }

        .active {
            background-color: #964b00;
            color: white;
        }

        .content {
            margin-top: 20px;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 10px;
        }

        p {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <ul>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editjudul') ? 'active' : ''; ?>" href="?menu=editjudul">Edit Judul</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editberita') ? 'active' : ''; ?>" href="?menu=editberita">Edit Berita</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editnumerik') ? 'active' : ''; ?>" href="?menu=editnumerik">Edit Statistik</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editkontak') ? 'active' : ''; ?>" href="?menu=editkontak">Edit Kontak</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'datasubmission') ? 'active' : ''; ?>" href="?menu=datasubmission">Data Submission</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'feedback') ? 'active' : ''; ?>" href="?menu=feedback">Feedback</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'profilguru') ? 'active' : ''; ?>" href="?menu=profilguru">Surat Administrasi</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editfasilitas') ? 'active' : ''; ?>" href="?menu=editfasilitas">Edit Fasilitas</a></li>
        <li><a class="<?php echo (isset($_GET['menu']) && $_GET['menu'] === 'editinfo') ? 'active' : ''; ?>" href="?menu=editinfo">Edit Informasi</a></li>
        <li class="logout"><a href="logout.php" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a></li>
    </ul>

    <div class="content">
        <?php
        // Cek apakah ada parameter menu yang dikirimkan
        if (isset($_GET['menu'])) {
            $menu = $_GET['menu'];
            // Tampilkan konten berdasarkan menu yang dipilih
            if ($menu === 'editjudul') {
                include 'editjudul.php';
            } elseif ($menu === 'editberita') {
                include 'editberita.php';
            } elseif ($menu === 'editnumerik') {
                include 'editnumerik.php';
            } elseif ($menu === 'editkontak') {
                include 'editkontak.php';
            } elseif ($menu === 'datasubmission') {
                include 'datasubmission.php';
            } elseif ($menu === 'feedback') {
                include 'data_feedback.php';
            } elseif ($menu === 'profilguru') {
                include 'data.php';
            } elseif ($menu === 'editfasilitas') {
                include 'datafasilitas.php';
            } elseif ($menu === 'editinfo') {
                include 'editinfo.php';
            } else {
                echo "<h2>Halaman tidak ditemukan</h2>";
            }
        } else {
            echo "<h2>Selamat datang di Dashboard Admin!</h2>";
            echo "<p>Silakan pilih salah satu menu di atas untuk melanjutkan.</p>";
        }
        ?>
    </div>
</body>
</html>
