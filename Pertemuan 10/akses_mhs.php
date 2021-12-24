<?php
// Mendefinisikan URL webservice yang akan digunakan
$url = "http://localhost/pwd/Pertemuan%2010/getdatamhs.php";
// Request HTTP ke url
$client = curl_init($url);
// Set Option request menjadi string
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
// Mengirim hasil untuk digunakan di browser
$response = curl_exec($client);
// Decode format json ke array
$result = json_decode($response);
// Looping data yang ada dalam result
foreach ($result as $r) {
    echo "<p>";
    echo "NIM : " . $r->nim . "<br />";
    echo "Nama : " . $r->nama . "<br />";
    echo "jenis kel : " . $r->jkel . "<br />";
    echo "Alamat : " . $r->alamat . "<br />";
    echo "Tgl Lahir : " . $r->tgllhr . "<br />";
    echo "</p>";
}
