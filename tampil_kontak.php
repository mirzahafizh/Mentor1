<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Kontak</title>
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

  // Query untuk mengambil data dari tabel 'kontak'
  $query = mysqli_query($koneksi, "SELECT * FROM kontak");

  // Memeriksa apakah data ditemukan
  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      // Menampilkan data dalam format HTML
      echo '<div class="container">';
      echo '  <h4>Location:</h4>';
      echo '  <p>' . $row['location'] . '</p>';
      echo '  <h4>Email:</h4>';
      echo '  <p>' . $row['email'] . '</p>';
      echo '  <h4>Call:</h4>';
      echo '  <p>' . $row['phone'] . '</p>';
      echo '</div>';
    }
  } else {
    echo "Tidak ada data yang ditemukan.";
  }

  // Menutup koneksi
  mysqli_close($koneksi);
  ?>
</body>
</html>
