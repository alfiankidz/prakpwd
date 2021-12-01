<?php
# Menyertakan file koneksi ke database
include 'koneksi.php';
?>
<h3>Form Pencarian Dengan PHP MAHASISWA</h3>
<form action="" method="get">
    <label>Cari :</label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>
<?php
# Mengecek jika ada request GET cari
if (isset($_GET['cari'])) {
    # Menyimpan value GET cari kedalam variabel
    $cari = $_GET['cari'];
    # Menampilkan isi dari var $cari
    echo "<b>Hasil pencarian : " . $cari . "</b>";
}
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
    </tr>
    <?php
    # Mengecek jika ada request GET cari
    if (isset($_GET['cari'])) {
        # Menyimpan value GET cari kedalam variabel
        $cari = $_GET['cari'];
        # Sintaks SQL untuk mencari nama mahasiswa yang mengandung kata dari variabel $cari
        $sql = "select * from mahasiswa where nama like'%" . $cari . "%'";
        # Eksekusi sintaks SQL
        $tampil = mysqli_query($con, $sql);
    } else {
        # Jika tidak ada request GET akan menampilkan semua data mahasiswa tanpa kondisi
        $sql = "select * from mahasiswa";
        # Eksekusi sintaks SQL
        $tampil = mysqli_query($con, $sql);
    }
    # Deklarasi var $no berisi angka 1
    $no = 1;
    # Fetch data $tampil kedalam array, akan berhenti jika semua data sudah difetch
    while ($r = mysqli_fetch_array($tampil)) {
    ?>
        <tr>
            <!-- Menampilkan no dan melakukan increment -->
            <td><?php echo $no++; ?></td>
            <!-- Menampilkan nama mahasiswa -->
            <td><?php echo $r['nama']; ?></td>
        </tr>
    <?php } ?>
</table>