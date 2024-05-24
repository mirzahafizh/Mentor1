<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data Numerik</title>
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

  // Query untuk mengambil data dari tabel 'numerik'
  $query = mysqli_query($koneksi, "SELECT * FROM numerik");

  // Memeriksa apakah data ditemukan
  if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $murid = $data['murid'];
    $guru = $data['guru'];
    $penghargaan = $data['penghargaan'];
    $fasilitas = $data['fasilitas'];
  } else {
    $murid = 0;
    $guru = 0;
    $penghargaan = 0;
    $fasilitas = 0;
  }

  // Menutup koneksi
  mysqli_close($koneksi);
  ?>

  <div class="row counters">
    <div class="col-lg-3 col-6 text-center">
      <span data-purecounter-start="0" data-purecounter-end="<?php echo $murid; ?>" data-purecounter-duration="1" class="purecounter"></span>
      <p>Murid</p>
    </div>

    <div class="col-lg-3 col-6 text-center">
      <span data-purecounter-start="0" data-purecounter-end="<?php echo $guru; ?>" data-purecounter-duration="1" class="purecounter"></span>
      <p>Warga</p>
    </div>

    <div class="col-lg-3 col-6 text-center">
      <span data-purecounter-start="0" data-purecounter-end="<?php echo $penghargaan; ?>" data-purecounter-duration="1" class="purecounter"></span>
      <p>Penghargaan</p>
    </div>

    <div class="col-lg-3 col-6 text-center">
      <span data-purecounter-start="0" data-purecounter-end="<?php echo $fasilitas; ?>" data-purecounter-duration="1" class="purecounter"></span>
      <p>Fasilitas</p>
    </div>
  </div>

  <!-- Tambahkan script PureCounter di bawah ini -->
  <script src="https://cdn.jsdelivr.net/npm/purecounter.js"></script>
  <script>
    var counters = document.querySelectorAll('.purecounter');
    counters.forEach(function(counter) {
      counter.innerHTML = counter.dataset.purecounterEnd;
    });
  </script>
</body>
</html>
