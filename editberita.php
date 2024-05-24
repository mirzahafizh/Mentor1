<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Berita</title>
  <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }


        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #964b00;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
  <?php
  // Menghubungkan ke database
  $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

  // Memeriksa koneksi
  if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
  }

  // Memeriksa apakah form telah disubmit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menerima data yang dikirimkan melalui form
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Mengunggah file gambar
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "uploads/" . $gambar;

    // Memindahkan file gambar ke folder tujuan
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Update data berita dalam tabel
    $updateQuery = "UPDATE berita SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar_path'";
    $result = mysqli_query($koneksi, $updateQuery);

    // Memeriksa apakah update berhasil
    if ($result) {
      echo "Data berhasil diupdate.";
    } else {
      echo "Terjadi kesalahan saat mengupdate data: " . mysqli_error($koneksi);
    }
  }
  ?>
  <h1>Edit Berita</h1>

  <form action="<?php echo $_SERVER["PHP_SELF"] . "?menu=editberita"; ?>" method="POST" enctype="multipart/form-data">
    <label for="judul">Judul:</label><br>
    <input type="text" id="judul" name="judul"><br>

    <label for="deskripsi">Deskripsi:</label><br>
    <textarea id="deskripsi" name="deskripsi"></textarea><br>

    <label for="gambar">Gambar:</label><br>
    <input type="file" id="gambar" name="gambar"><br>

    <input type="submit" value="Update">
  </form>
</body>
</html>
