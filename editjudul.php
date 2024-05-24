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
  $updateQuery = mysqli_query($koneksi, "UPDATE judul SET judul = '$judulBaru', deskripsi = '$deskripsiBaru', link = '$linkBaru'");

  if ($updateQuery) {
    echo "Data berhasil diupdate.";
  } else {
    echo "Terjadi kesalahan saat mengupdate data.";
  }
}

// Query untuk mengambil data dari tabel 'judul'
$query = mysqli_query($koneksi, "SELECT * FROM judul");
$row = mysqli_fetch_assoc($query);

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Home</title>
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
  <h1>Edit Judul</h1>
  <form action="" method="POST">
    <label for="judul">Judul:</label><br>
    <input type="text" id="judul" name="judul" value="<?php echo $row['judul']; ?>"><br><br>
    <label for="deskripsi">Deskripsi:</label><br>
    <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>"><br><br>
    <label for="link">Link:</label><br>
    <input type="text" name="link" value="<?php echo $row['link']; ?>"><br><br>
    <input type="submit" name="submit" value="Simpan">
  </form>
  <script>
  document.getElementById("judul").addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        var input = this;
        var value = input.value;
        var selectionStart = input.selectionStart;
        var selectionEnd = input.selectionEnd;
        var newValue = value.substring(0, selectionStart) + "\n" + value.substring(selectionEnd);
        input.value = newValue;
        input.setSelectionRange(selectionStart + 1, selectionStart + 1);
        }
    });
    </script>


</body>
</html>
