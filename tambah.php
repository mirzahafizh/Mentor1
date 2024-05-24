<?php
// Menghubungkan ke database
$koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Menangani pengiriman form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $pelajaran = mysqli_real_escape_string($koneksi, $_POST['pelajaran']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    
    // Periksa apakah direktori uploads sudah ada, jika tidak, buat direktori baru
    $folder = './uploads/';
    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $destination = $folder . $nama_file;
    if (move_uploaded_file($source, $destination)) {
        // Menyimpan data ke database
        $query = "INSERT INTO profilguru (file, nama, pelajaran, deskripsi) VALUES ('$nama_file', '$nama', '$pelajaran', '$deskripsi')";
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil disimpan.');</script>";
            // Redirect kembali ke dashboardadmin.php?menu=profilguru setelah data berhasil ditambahkan
            echo "<script>window.location.href = 'dashboardadmin.php?menu=profilguru';</script>";
            exit;
        } else {
            echo "<p class='message'>Terjadi kesalahan: " . mysqli_error($koneksi) . "</p>";
        }
    } else {
        echo "<p class='message'>Gagal memindahkan file.</p>";
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Surat Administrasi</title>
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

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
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
            width: 100%;
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
    <div class="container">
        <h2>Tambah Surat Administrasi</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Nama</label>
            <input type="text" name="nama" />

            <label>File</label>
            <input type="file" name="gambar" />

            <label>Nama Surat</label>
            <input type="text" name="pelajaran" />

            <label>Deskripsi</label>
            <textarea name="deskripsi"></textarea>

            <input type="submit" name="tambah" value="Tambah">
        </form>
    </div>
</body>
</html>
