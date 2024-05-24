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
    $hapus_query = "DELETE FROM profilguru WHERE id = '$hapus_id'";
    $hapus_result = mysqli_query($conn, $hapus_query);

    if ($hapus_result) {
        echo "Berhasil hapus data";
    } else {
        echo "Gagal hapus data";
    }
}


// Ambil data guru dari database
$query = "SELECT * FROM profilguru";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Surat Administrasi</title>
</head>
<body>
    <h2>Data Surat Administrasi</h2>
    <a href="tambah.php">Tambah Surat</a>

    <table>
        <tr>
            <th>Nama</th>
            <th>Nama Surat</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
            // Tampilkan data guru ke dalam tabel
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['nama']; ?></td>
              
                    <td><?php echo $row['pelajaran']; ?></td>
                    <td><?php echo $row['deskripsi']; ?></td>
                    <td>
                        <a href="editprofil.php?id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['id']; ?>&redirect=dashboardadmin.php?menu=profilguru" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                    </td>
                </tr>
                <?php
            }
        ?>

    </table>
</body>
</html>
