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



// Proses hapus data jika parameter hapus_id ada dalam URL
if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];

    // Query untuk menghapus data berdasarkan ID
    $hapus_query = "DELETE FROM fasilitas WHERE id = '$hapus_id'";
    $hapus_result = mysqli_query($conn, $hapus_query);

    if ($hapus_result) {
        echo "Berhasil hapus data";
    } else {
        echo "Gagal hapus data";
    }
}


// Ambil data guru dari database
$query = "SELECT * FROM fasilitas";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Fasilitas</title>
</head>
<body>
    <h2>Data Fasilitas</h2>
    <a href="tambah_fasilitas.php">Tambah Fasilitas</a>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
            // Tampilkan data guru ke dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    
                    <td><img src="uploads/<?php echo $row['gambar']; ?>" width="100px" height="100px" alt=""></td>

                    <td><?php echo $row['judul']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td>
                        <a href="editfasilitas.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="tampil_fasilitas.php?hapus_id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
        ?>

    </table>
</body>
</html>
