<?php
// Mendefinisikan URL webservice yang akan digunakan
$pesan = "";
if (isset($_POST['cari'])) {
    $nim = $_POST['cari'];
    $url = "http://localhost/pwd/Pertemuan%2010/postest/getdatamhs.php?nim=" . $nim;
    $pesan = "<b>Hasil Pencarian Nim : " . $nim . "</b>";
} else {
    $url = "http://localhost/pwd/Pertemuan%2010/getdatamhs.php";
}

$client = curl_init($url); // Request HTTP ke url
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1); // Set Option request menjadi string
$response = curl_exec($client); // Mengirim hasil untuk digunakan di browser
$result = json_decode($response); // Decode format json ke array
?>

<h3>Form Pencarian Dengan Web Service</h3>
<form action="" method="POST">
    <label>NIM :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?= $pesan; ?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nim</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Alamat</th>
        <th>Tgl lahir</th>
        <th>Jurusan</th>
    </tr>

    <?php
    $no = 1;
    // Looping data yang ada dalam result
    foreach ($result as $r) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $r->nim; ?></td>
            <td><?= $r->nama; ?></td>
            <td><?= $r->jkel; ?></td>
            <td><?= $r->alamat; ?></td>
            <td><?= $r->tgllhr; ?></td>
            <td><?= $r->jurusan; ?></td>
        </tr>
    <?php }; ?>
</table>