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

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pelajaran = $_POST['pelajaran'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn, "UPDATE profilguru SET nama = '$nama', pelajaran = '$pelajaran', deskripsi = '$deskripsi' WHERE id = '$id'");

    if ($update) {
        echo "<script>alert('Data berhasil di edit'); window.location.href = 'dashboardadmin.php?menu=profilguru';</script>";
    } else {
        echo "Gagal update data";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM profilguru WHERE id = '$id'");
    $row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Surat Administrasi</title>
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

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
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
        <h2>Edit Surat Administrasi</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Nama:</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>
            <label>File:</label>
            <input type="file" name="gambar">
            
            <label>Nama Surat:</label>
            <input type="text" name="pelajaran" value="<?php echo $row['pelajaran']; ?>"><br><br>
            <label>Deskripsi:</label>
            <textarea name="deskripsi"><?php echo $row['deskripsi']; ?></textarea><br><br>
            <input type="submit" name="edit" value="Update">
        </form>
    </div>
</body>
</html>

<?php
} else {
    echo "ID tidak ditemukan";
}
?>
