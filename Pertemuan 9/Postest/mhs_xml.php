<?php
include "koneksi.php"; // Menyertakan koneksi ke database
header('Content-Type: text/xml'); // Memberikan header pengenal bahwa program tersebut adalah skrip XML
$query = "SELECT * FROM mahasiswa"; // SQL Query mengambil data pada tabel mahasiswa
$hasil = mysqli_query($con, $query); // Eksekusi SQL Query
$jumField = mysqli_num_fields($hasil); // Mengambil berapa jumlah field
echo "<?xml version='1.0'?>"; // Pengenal Skrip XML ke dalam versi penulisan PHP
echo "<data>"; // Pembuka tag data
while ($data = mysqli_fetch_array($hasil)) { // Fetching data database sampai habis
    echo "<mahasiswa>"; // Pembuka tag mahasiswa 
    echo "<nim>", $data['nim'], "</nim>"; // Menampilkan nim
    echo "<nama>", $data['nama'], "</nama>"; // Menampilkan nama
    echo "<jkel>", $data['jkel'], "</jkel>"; // Menampilkan jkel
    echo "<alamat>", $data['alamat'], "</alamat>"; // Menampilkan alamat
    echo "<tgllhr>", $data['tgllhr'], "</tgllhr>"; // Menampilkan tgllhr
    echo "</mahasiswa>"; // Penutup tag mahasiswa
}
echo "</data>"; // Penutup tag data
