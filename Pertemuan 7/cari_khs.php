<?php
# Menyertakan file koneksi ke database
include 'koneksi.php';
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
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
        <th>NIM</th>
        <th>Nama Mhs</th>
        <th>Kode MK</th>
        <th>Nama MK</th>
        <th>Nilai</th>
    </tr>

    <?php
    # Mengecek jika ada request GET cari
    if (isset($_GET['cari'])) {
        # Menyimpan value GET cari kedalam variabel
        $cari = $_GET['cari'];
        # Sintaks SQL untuk mencari beberapa field dari gabungan tabel dengan kondisi NIM = $cari
        $sql = "SELECT m.nim, m.nama, mk.kode, mk.namamk, k.nilai FROM khs AS k INNER JOIN mahasiswa AS m ON k.nim = m.nim INNER JOIN matakuliah AS mk ON mk.kode = k.kodemk WHERE m.nim = '" . $cari . "'";
        # Eksekusi sintaks SQL
        $tampil = mysqli_query($con, $sql);
    } else {
        # Jika tidak ada request GET akan menampilkan semua data gabungan tabel tanpa kondisi
        $sql = "SELECT m.nim, m.nama, mk.kode, mk.namamk, k.nilai FROM khs AS k INNER JOIN mahasiswa AS m ON k.nim = m.nim INNER JOIN matakuliah AS mk ON mk.kode = k.kodemk ORDER BY m.nim ASC";
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
            <!-- Menampilkan nim mahasiswa -->
            <td><?php echo $r['nim']; ?></td>
            <!-- Menampilkan nama mahasiswa -->
            <td><?php echo $r['nama']; ?></td>
            <!-- Menampilkan kode matakuliah -->
            <td><?php echo $r['kode']; ?></td>
            <!-- Menampilkan nama matakuliah -->
            <td><?php echo $r['namamk']; ?></td>
            <!-- Menampilkan nilai matakuliah -->
            <td><?php echo $r['nilai']; ?></td>
        </tr>
    <?php } ?>

</table>