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


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT gambar FROM fasilitas WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $file = $row['gambar'];
    $path = './uploads/'.$file;
    if (file_exists($path)) {
        if(unlink($path)){
            $delete = mysqli_query($conn, "DELETE FROM fasilitas WHERE id = '$id'");

            if ($delete) {
                echo "Berhasil hapus data";
            } else {
                echo "Gagal hapus data";
            }
        }else{
            echo "Gagal hapus file";
        }
    }else{
        echo "File tidak ditemukan";
    }

    // Redirect kembali ke data.php setelah selesai menghapus data
    header("Location: datafasilitas.php");
    exit;
} else {
    echo "ID tidak ditemukan";
}
?>
