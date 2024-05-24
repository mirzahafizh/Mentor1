<?php
$host = "localhost";
$username = "rt0x2164";
$password = "3SJJAE2dt6VU39";
$database = "dblogin";


$conn = new mysqli($host, $username, $password, $database);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
$sql = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($sql) === FALSE) {
    echo "Error creating database: " . $conn->error;
}

// Menggunakan database yang dibuat
$conn->select_db($database);

// Membuat tabel 'admin' jika belum ada
$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL)
";
// Perintah INSERT tanpa menentukan nilai id
$sql = "INSERT INTO admin (id,username, password) VALUES (2,'madun', 'madun123')";


if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}
?>
