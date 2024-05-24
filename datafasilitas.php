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



// Ambil data guru dari database
$query = "SELECT * FROM fasilitas";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h2 {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #337ab7;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .action-links a {
            margin-right: 5px;
        }

        .action-links a:last-child {
            margin-right: 0;
        }

        
        .add-button {
        display: inline-block;
        background-color: #964b00;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        border: none;
        transition: background-color 0.3s;
        }

        .add-button:hover {
        background-color: #45a049;
        }
        
        .edit-button,
        .delete-button {
        display: inline-block;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
        }

        .edit-button {
        background-color: #3498db;
        color: white;
        border: none;
        }

        .delete-button {
        background-color: #e74c3c;
        color: white;
        border: none;
        }

        .edit-button:hover,
        .delete-button:hover {
        opacity: 0.8;
        }
        
        .edit-button,
        .delete-button {
        display: inline-block;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        transition: background-color 0.3s;
        width: 100px; /* Menyesuaikan lebar tombol */
        font-size: 14px; /* Menyesuaikan ukuran teks tombol */
        }

        .edit-button {
        background-color: #3498db;
        color: white;
        border: none;
        }

        .delete-button {
        background-color: #e74c3c;
        color: white;
        border: none;
        }

        .edit-button:hover,
        .delete-button:hover {
        opacity: 0.8;
        }
    </style>
</head>
<body>
    <h1>Data Fasilitas</h1>
    <a href="tambah_fasilitas.php" class="add-button">Tambah Fasilitas</a>


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
                    <a href="editfasilitas.php?id=<?php echo $row['id']; ?>" class="edit-button">Edit</a>
                    <a href="editfasilitas.php?hapus_id=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>

            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
