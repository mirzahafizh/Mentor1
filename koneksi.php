<?php
// Konfigurasi koneksi ke database
$servername = "localhost";
$username = "rt0x2164";
$password = "3SJJAE2dt6VU39";
$dbname = "rt0x2164_dbhome";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai feedback dari input form
    $feedback = $_POST["feedback"];

    // Menyimpan data ke dalam database
    $sql = "INSERT INTO feedback (feedback) VALUES ('$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Feedback berhasil disimpan.");</script>';
    } else {
        echo '<script>alert("Terjadi kesalahan: ' . $conn->error . '");</script>';
    }
}

// Menutup koneksi database
$conn->close();
?>
