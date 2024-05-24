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

    // Query untuk mengambil nama file yang terkait dengan data yang akan dihapus
    $query_file = mysqli_query($conn, "SELECT file FROM profilguru WHERE id = '$id'");
    $row_file = mysqli_fetch_assoc($query_file);
    $file = $row_file['file'];
    $path = './uploads/'.$file;

    // Periksa apakah file terkait ada di direktori
    if (file_exists($path)) {
        if(unlink($path)){
            $delete = mysqli_query($conn, "DELETE FROM profilguru WHERE id = '$id'");

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

    // Redirect kembali ke dashboardadmin.php?menu=profilguru setelah selesai menghapus data
    if(isset($_GET['redirect'])) {
        header("Location: ".$_GET['redirect']);
    } else {
        header("Location: dashboardadmin.php?menu=profilguru");
    }
    exit;
} else {
    echo "ID tidak ditemukan";
}
?>
