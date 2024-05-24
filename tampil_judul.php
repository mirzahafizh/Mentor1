<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Home</title>
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

  // Query untuk mengambil data dari tabel 'judul'
  $query = mysqli_query($koneksi, "SELECT * FROM judul");

  // Memeriksa apakah data ditemukan
  if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_assoc($query)) {
      // Menampilkan data dalam format HTML
      echo '<div class="container">';
      echo '  <img src="' . $row['gambar'] . '" alt="Gambar">';
      echo '  <h1>' . $row['judul'] . '</h1>';
      echo '  <p>' . $row['deskripsi'] . '</p>';
      echo '  <a href="' . $row['link'] . '" target="_blank" class="btn-get-started">Cek Disini</a>';
      echo '  <a href="editjudul.php" class="btn-edit">Edit</a>'; // Tombol Edit
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
