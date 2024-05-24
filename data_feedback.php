<!DOCTYPE html>
<html>
<head>
    <title>Tabel Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto;
            width: 80%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #337ab7;
        }
        .btn-back {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            background-color: #337ab7;
            color: white;
            border: none;
            transition: background-color 0.3s;
            font-size: 14px;
        }
        .btn-back:hover {
            background-color: #23527c;
        }
        .btn-delete {
            background-color: #d9534f;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-delete:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <h1>Tabel Feedback</h1>
    <table>
        <tr>
            <th>Feedback</th>
            <th>Aksi</th>
        </tr>
        <?php
        // Koneksi ke database
        $servername = "localhost";
        $username = "rt0x2164";
        $password = "3SJJAE2dt6VU39";
        $dbname = "rt0x2164_dbhome";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Mengambil data dari tabel feedback
        $sql = "SELECT * FROM feedback";
        $result = $conn->query($sql);

        // Menampilkan data ke dalam tabel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr data-id='" . $row['id'] . "'>";
                echo "<td>" . $row['feedback'] . "</td>";
                echo "<td><button class='btn-delete' onclick='deleteFeedback(" . $row['id'] . ")'>Hapus</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data feedback.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

    <script>
        // Fungsi untuk menghapus data menggunakan AJAX
        function deleteFeedback(id) {
            if (confirm('Anda yakin ingin menghapus data ini?')) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                // Menghapus baris dari tabel tanpa memuat ulang halaman
                                var row = document.querySelector("tr[data-id='" + id + "']");
                                if (row) {
                                    row.parentNode.removeChild(row);
                                    alert("Data berhasil dihapus.");
                                }
                            } else {
                                alert("Gagal menghapus data: " + response.message);
                            }
                        } else {
                            console.error("Terjadi kesalahan: " + xhr.status);
                        }
                    }
                };
                xhr.open("GET", "delete_feedback.php?id=" + id, true);
                xhr.send();
            }
        }
    </script>
</body>
</html>
