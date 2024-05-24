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
  $locationBaru = $_POST['location'];
  $emailBaru = $_POST['email'];
  $phoneBaru = $_POST['phone'];

  // Update data di database
  $updateQuery = mysqli_query($koneksi, "UPDATE kontak SET location = '$locationBaru', email = '$emailBaru', phone = '$phoneBaru'");

  if ($updateQuery) {
    echo "Data berhasil diupdate.";
  } else {
    echo "Terjadi kesalahan saat mengupdate data: " . mysqli_error($koneksi);
  }
}

// Query untuk mengambil data dari tabel 'kontak'
$query = mysqli_query($koneksi, "SELECT * FROM kontak");
$row = mysqli_fetch_assoc($query);

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Kontak</title>
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

    form {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      display: block;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #964b00;
      color: #fff;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .message {
      text-align: center;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <h1>Edit Kontak</h1>
  <form action="" method="POST">
    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location" value="<?php echo isset($row['location']) ? $row['location'] : ''; ?>"><br><br>
    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br><br>
    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="<?php echo isset($row['phone']) ? $row['phone'] : ''; ?>"><br><br>
    <input type="submit" name="submit" value="Simpan">
  </form>
</body>
</html>
