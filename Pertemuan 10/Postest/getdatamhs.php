<?php
require_once "../koneksi.php"; // Memanggil file koneksi ke database sekali

if (!empty($_GET['nim'])) {
    // Query SQL ambil data berdasar nim
    $sql = "select * from mahasiswa where nim = '" . $_GET['nim'] . "'";
} else {
    // Query SQL ambil semua data mahasiswa
    $sql = "select * from mahasiswa";
}

$query = mysqli_query($con, $sql); // Eksekusi SQL Query
while ($row = mysqli_fetch_assoc($query)) { // Fetching data sampai habis
    $data[] = $row; // Menyimpan tiap row / baris data ke dalam array
}
header('content-type: application/json'); // Header pengenal bahwa program ini adalah aplikasi JSON
echo json_encode($data); // Mengubah array $data kedalam JSON
mysqli_close($con); // Menutup koneksi ke database
