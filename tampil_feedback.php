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
      
    </style>
</head>
<body>
    <h1>Tabel Feedback</h1>
    <table>
        <tr>
            <th>Feedback</th>
           
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
        if ($result->num_rows > 0) 
            while ($row = $result->fetch_assoc()) {
                // Memastikan kunci 'id' ada sebelum mengaksesnya
                if (array_key_exists('id', $row)) {
                    echo "<tr data-id='" . $row['id'] . "'>";
                    echo "<td>" . $row['feedback'] . "</td>";
                  
            }
        } else {
            echo "<tr><td colspan='2'>Tidak ada data feedback.</td></tr>";
        }

     
  