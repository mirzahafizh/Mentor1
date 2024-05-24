<?php
header('Content-Type: application/json');

// Koneksi ke database
$servername = "localhost";
$username = "rt0x2164";
$password = "3SJJAE2dt6VU39";
$dbname = "rt0x2164_dbhome";
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    echo json_encode(array("success" => false, "message" => "Koneksi database gagal: " . $conn->connect_error));
    exit();
}

// Menghapus data berdasarkan ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM feedback WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("success" => true, "message" => "Data berhasil dihapus"));
    } else {
        echo json_encode(array("success" => false, "message" => "Terjadi kesalahan: " . $conn->error));
    }
} else {
    echo json_encode(array("success" => false, "message" => "ID tidak ditemukan"));
}

$conn->close();
?>
