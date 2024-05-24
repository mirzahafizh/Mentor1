<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $koneksi = mysqli_connect("localhost", "rt0x2164", "3SJJAE2dt6VU39", "rt0x2164_dbhome");

    if (!$koneksi) {
        echo json_encode(['success' => false, 'message' => 'Koneksi database gagal']);
        exit();
    }

    $query = "DELETE FROM submissions WHERE id = $id";
    if (mysqli_query($koneksi, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => mysqli_error($koneksi)]);
    }

    mysqli_close($koneksi);
} else {
    echo json_encode(['success' => false, 'message' => 'ID tidak ditemukan']);
}
?>
