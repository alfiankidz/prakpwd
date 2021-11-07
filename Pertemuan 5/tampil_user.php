<?php
echo "<h2>User</h2>
<form method=POST action=form_user.php>
<input type=submit value='Tambah User'>
</form>
<table border=1>
<tr><th>No</th><th>Username</th><th>NamaLengkap</th><th>Email</th><th>Aksi</th
></tr>";
# Menyertakan(include) file koneksi ke database.
include "koneksi.php";
# Sintaks SQL untuk mengambil semua data users berdasarkan urut id_user.
$sql = "select * from users order by id_user";
# Menjalankan query sintaks SQL
$tampil = mysqli_query($con, $sql);
# Kondisi jika rows variabel $tampil lebih dari 0
if (mysqli_num_rows($tampil) > 0) {
    # Jika kondisi terpenuhi akan melooping data sebanyak rows.
    $no = 1;
    # Looping sebanyak rows , dan mendapatkan data berdasarkan array dan menampilaknnya.
    while ($r = mysqli_fetch_array($tampil)) {
        echo "<tr><td>$no</td><td>$r[id_user]</td>
        <td>$r[nama_lengkap]</td>
        <td>$r[email]</td>
        <td><a href='hapus_user.php?id=$r[id_user]'>Hapus</a></td>
        </tr>";
        $no++;
    }
    echo "</table>";
} else {
    # Jika kondisi if tidak terpenuhi menampilkan 0 Results.
    echo "0 results";
}
echo "<br><a href='form_login.php'><button>Login User</button></a>";
# Menghentikan koneksi ke database.
mysqli_close($con);
