<?php

// Memeriksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validasi login
    if (validasi_login($username, $password)) {
        // Jika login berhasil, arahkan pengguna ke halaman tujuan
        header("Location: dashboardadmin.php");
        exit();
    } else {
        // Jika login gagal, kembali ke halaman login dengan pesan kesalahan
        header("Location: indexx.php?error=1");
        exit();
    }
}

// Fungsi validasi login
function validasi_login($username, $password) {
    if (empty($username) || empty($password)) {
        // Jika field kosong, tampilkan notifikasi alert
        echo "<script>alert('Tolong lengkapi field!');</script>";
        return false;
    }

    if ($username == "rt29lamaru" && $password == "lamaru29") {
        return true;
    } else {
        // Jika username dan password tidak sesuai, tampilkan notifikasi alert
        echo "<script>alert('Data yang dimasukkan salah');</script>";
        return false;
    }
}
?>
