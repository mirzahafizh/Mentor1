<?php
// Pastikan koneksi ke database telah dilakukan sebelumnya
include 'dbfasilitas.php';

if (isset($_POST['tambah'])) {
    // Ambil nilai dari form
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    
    // Proses upload gambar
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = './uploads/';

    // Periksa apakah direktori uploads sudah ada, jika tidak, buat direktori baru
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $destination = $folder . $nama_file;
    if (move_uploaded_file($source, $destination)) {
        // Simpan data ke dalam tabel fasilitas
        $insert = mysqli_query($conn, "INSERT INTO fasilitas (gambar, judul, deskripsi) VALUES ('$nama_file', '$judul', '$deskripsi')");

        if ($insert) {
            echo '<script>alert("Data berhasil ditambahkan!");</script>';
            echo '<script>window.location.href = "dashboardadmin.php?menu=editfasilitas";</script>';
        } else {
            echo '<script>alert("Gagal menambahkan data!");</script>';
        }
    } else {
        echo '<script>alert("Gagal memindahkan file!");</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Fasilitas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
            text-align: center; /* Posisikan form ke tengah */
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        .message {
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #964b00;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF4081;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #F50057;
        }
    </style>
    <script>
        function showNotification() {
            alert("Data berhasil ditambahkan!");
            window.location.href = "dashboardadmin.php?menu=editfasilitas";
        }
    </script>
</head>
<body>
    <h2>Tambah Fasilitas</h2>
    <form action="" method="post" enctype="multipart/form-data" class="container" onsubmit="showNotification()">
        <label>Judul:</label>
        <input type="text" name="judul" required><br><br>
        <label>Gambar:</label>
        <input type="file" name="gambar" required><br><br>
        <label>Deskripsi:</label>
        <textarea name="deskripsi" required></textarea><br><br>
        <input type="submit" name="tambah" value="Tambah" class="btn">
    </form>
</body>
</html>
