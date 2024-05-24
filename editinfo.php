<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
  echo "Koneksi database gagal: " . mysqli_connect_error();
  exit();
}

// Memeriksa apakah ada permintaan pengeditan
if (isset($_POST['submit'])) {
  // Mengambil data yang diinput oleh pengguna
  $judulBaru = $_POST['judul'];
  $deskripsiBaru = $_POST['deskripsi'];
  $linkBaru = $_POST['link'];

  // Update data di database
  $updateQuery = mysqli_query($koneksi, "UPDATE info SET judul = '$judulBaru', deskripsi = '$deskripsiBaru', link = '$linkBaru'");

  if ($updateQuery) {
    echo "Data berhasil diupdate.";
  } else {
    echo "Terjadi kesalahan saat mengupdate data.";
  }
}

// Query untuk mengambil data dari tabel 'info'
$query = mysqli_query($koneksi, "SELECT * FROM info");
$row = mysqli_fetch_assoc($query);

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Info</title>
  <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            width: 400px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #964b00;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
  <h1>Edit Info</h1>
  <form action="" method="POST">
    <label for="judul">Judul:</label><br>
    <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>"><br><br>
    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi"><?php echo $row['deskripsi']; ?></textarea><br><br>
    <label for="link">Link:</label><br>
    <input type="text" name="link" value="<?php echo $row['link']; ?>"><br><br>
    <input type="submit" name="submit" value="Simpan">
  </form>

</body>
</html>
