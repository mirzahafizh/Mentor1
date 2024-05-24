<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Statistik</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }


    h2 {
      text-align: center;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #964b00;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .message {
      margin-top: 10px;
      text-align: center;
      font-weight: bold;
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
    $murid = $_POST['murid'];
    $guru = $_POST['guru'];
    $penghargaan = $_POST['penghargaan'];
    $fasilitas = $_POST['fasilitas'];

    // Update data numerik dalam tabel
    $updateQuery = "UPDATE numerik SET murid='$murid', guru='$guru', penghargaan='$penghargaan', fasilitas='$fasilitas'";
    $result = mysqli_query($koneksi, $updateQuery);

    // Memeriksa apakah update berhasil
    if ($result) {
      echo "Data berhasil diupdate.";
    } else {
      echo "Terjadi kesalahan saat mengupdate data: " . mysqli_error($koneksi);
    }
  }

  // Query untuk mengambil data dari tabel 'numerik'
  $query = mysqli_query($koneksi, "SELECT * FROM numerik");
  $data = mysqli_fetch_assoc($query);

  // Menutup koneksi
  mysqli_close($koneksi);
  ?>

  <h1>Edit Statistik</h1>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?menu=editnumerik" method="POST">
    <label for="murid">Jumlah Penduduk Laki-Laki:</label><br>
    <input type="number" id="murid" name="murid" value="<?php echo $data['murid']; ?>"><br>

    <label for="guru">Jumlah Penduduk Perempuan:</label><br>
    <input type="number" id="guru" name="guru" value="<?php echo $data['guru']; ?>"><br>

    <label for="penghargaan">Jumlah Rumah:</label><br>
    <input type="number" id="penghargaan" name="penghargaan" value="<?php echo $data['penghargaan']; ?>"><br>

    <label for="fasilitas">Jumlah KK:</label><br>
    <input type="number" id="fasilitas" name="fasilitas" value="<?php echo $data['fasilitas']; ?>"><br>

    <input type="submit" value="Update">
  </form>
</body>
</html>
