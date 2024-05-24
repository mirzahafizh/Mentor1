<!DOCTYPE html>
<html>
<head>
    <title>Data Submission</title>
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
    <h1>Data Submission</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Alasan Mengirim Surat</th>
            <th>File PDF</th>
            <th>Aksi</th>
        </tr>
        <?php 
        // Menghubungkan ke database
        $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");
        // Memeriksa koneksi
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal: " . mysqli_connect_error();
            exit();
        }

        // Mengambil data dari database
        $query = "SELECT id, nama, alamat, alasan, file FROM submissions";
        $result = mysqli_query($koneksi, $query);

        // Menampilkan data ke dalam tabel
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr data-id='" . htmlspecialchars($row['id']) . "'>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                echo "<td>" . htmlspecialchars($row['alasan']) . "</td>";
                echo "<td><a href='uploads/" . htmlspecialchars($row['file']) . "' target='_blank'>" . htmlspecialchars($row['file']) . "</a></td>";
                echo "<td><button class='btn-delete' onclick='deleteSubmission(" . htmlspecialchars($row['id']) . ")'>Hapus</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Tidak ada data submission.</td></tr>";
        }

        // Menutup koneksi
        mysqli_close($koneksi);
        ?>
    </table>

    <script>
        // Fungsi untuk menghapus data menggunakan AJAX
        function deleteSubmission(id) {
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
                xhr.open("GET", "delete.php?id=" + id, true);
                xhr.send();
            }
        }
    </script>
</body>
</html>
