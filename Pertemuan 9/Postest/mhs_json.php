<?php
include "koneksi.php"; // Menyertakan koneksi ke database
$sql = "select * from mahasiswa order by nim"; // SQL Query mengambil data mahasiswa berurut nim
$tampil = mysqli_query($con, $sql); // Eksekusi SQL Query
if (mysqli_num_rows($tampil) > 0) { // Kondisi jika jumlah row data lebih dari 0
    $no = 1; // Deklarasi variabel no
    $response = array(); // Membuat variabel untuk array()
    $response["data"] = array(); // Membuat variabel array untuk array()
    while ($r = mysqli_fetch_array($tampil)) { // Fetching data sampai data habis
        $h['nim'] = $r['nim']; // Memasukan data nim kedalam array nim
        $h['nama'] = $r['nama']; // Memasukan data nama kedalam array nama
        $h['jkel'] = $r['jkel']; // Memasukan data jkel kedalam array jkel
        $h['alamat'] = $r['alamat']; // Memasukan data alamat kedalam array alamat
        $h['tgllhr'] = $r['tgllhr']; // Memasukan data tgllhr kedalam array tgllhr
        array_push($response["data"], $h); // Memasukan array 'h' kedalam array response["data"]
    }
    echo json_encode($response); // Mengubah array $response ke bentuk JSON
} else {
    $response["message"] = "tidak ada data"; // Membuat array untuk pesan tidak ada data
    echo json_encode($response); // Mengubah array yg ada pada response kedalam bentuk JSON
}
