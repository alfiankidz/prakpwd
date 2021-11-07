<?php
# Menyertakan(include) file koneksi ke database.
include "koneksi.php";
# Menangkap data id_user yang dikirim form login kedalam variabel.
$id_user = $_POST['id_user'];
# Menangkap data password yang dikirim form login kedalam variabel dan mengenkripsi menjadi md5.
$pass = md5($_POST['paswd']);
# Sintaks SQL untuk mencari users berdasarkan id_user dan password
$sql = "SELECT * FROM users WHERE id_user='$id_user' AND password='$pass'";
# Menjalankan query SQL
$login = mysqli_query($con, $sql);
# Mengetahui berapa banyak baris data yang ketemu (rows)
$ketemu = mysqli_num_rows($login);
# Mengubah data menjadi sebuah array
$r = mysqli_fetch_array($login);

# Kondisi jika rows lebih dari 0.
if ($ketemu > 0) {
    # Menjalankan session
    session_start();
    # Menyimpan data id_user kedalam session dengan variabel iduser.
    $_SESSION['iduser'] = $r['id_user'];
    # Menyimpan data password kedalam session dengan variabel passuser.
    $_SESSION['passuser'] = $r['password'];
    echo "USER BERHASIL LOGIN<br>";
    # Menampilkan variabel iduser yang tersimpan pada session.
    echo "id user =", $_SESSION['iduser'], "<br>";
    # Menampilkan variabel passuser yang tersimpan pada session.
    echo "password=", $_SESSION['passuser'], "<br>";
    echo "<a href=logout.php><b>LOGOUT</b></a></center>";
} else {
    echo "<center>Login gagal! username & password tidak benar<br>";
    echo "<a href=form_login.php><b>ULANGILAGI</b></a></center>";
}
# Menghentikan koneksi ke database.
mysqli_close($con);
