<?php
$servername = "localhost";
$username = "rt0x2164";
$password = "3SJJAE2dt6VU39";
$dbname = "rt0x2164_dbhome";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$row = []; // Menyediakan variabel $row untuk mencegah pesan kesalahan

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $gambar = '';
    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['gambar']['tmp_name'];
        $filename = $_FILES['gambar']['name'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $gambar = uniqid().'.'.$extension;
        $newPath = './uploads/'.$gambar;
        move_uploaded_file($file, $newPath);
    }

    // Hapus gambar lama dari direktori jika ada
    $query = mysqli_query($conn, "SELECT gambar FROM fasilitas WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $file = $row['gambar'];
    $oldPath = './uploads/'.$file;
    if (file_exists($oldPath) && !empty($gambar)) {
        if (unlink($oldPath)) {
            // Update data dengan gambar baru
            $update = mysqli_query($conn, "UPDATE fasilitas SET gambar = '$gambar', judul = '$judul', deskripsi = '$deskripsi' WHERE id = '$id'");
            if ($update) {
                echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'dashboardadmin.php?menu=editfasilitas';</script>";
                exit;
            } else {
                echo "Gagal update data";
            }
        } else {
            echo "Gagal hapus gambar";
        }
    } else {
        // Update data tanpa mengubah gambar
        $update = mysqli_query($conn, "UPDATE fasilitas SET judul = '$judul', deskripsi = '$deskripsi' WHERE id = '$id'");
        if ($update) {
            echo "<script>alert('Data berhasil diupdate!'); window.location.href = 'dashboardadmin.php?menu=editfasilitas';</script>";
            exit;
        } else {
            echo "Gagal update data";
        }
    }
}

if (isset($_GET['hapus_id'])) {
    $id = $_GET['hapus_id'];

    $query = mysqli_query($conn, "SELECT gambar FROM fasilitas WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
    $file = $row['gambar'];
    $path = './uploads/'.$file;
    if (file_exists($path)) {
        if (unlink($path)) {
            $delete = mysqli_query($conn, "DELETE FROM fasilitas WHERE id = '$id'");

            if ($delete) {
                echo "Berhasil hapus data";
            } else {
                echo "Gagal hapus data";
            }
        } else {
            echo "Gagal hapus file";
        }
    } else {
        echo "File tidak ditemukan";
    }

    // Redirect kembali ke datafasilitas.php setelah selesai menghapus data
    header("Location: datafasilitas.php");
    exit;
}

// Jika tidak ada aksi edit atau hapus, maka tampilkan form edit
// Anda dapat menyesuaikan form edit sesuai kebutuhan Anda
// Berikut ini hanya contoh sederhana

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM fasilitas WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Fasilitas</title>
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
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
</head>
<body>
    <h2>Edit Fasilitas</h2>
    <form method="POST" action="" enctype="multipart/form-data" class="container">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?php echo $row['judul']; ?>">
        <br><br>
        <label>Deskripsi:</label>
        <textarea name="deskripsi"><?php echo $row['deskripsi']; ?></textarea>
        <br><br>
        <label>Gambar:</label>
        <input type="file" name="gambar">
        <br><br>
        <input type="submit" name="edit" value="Update" class="btn">
    </form>
</body>
</html>
