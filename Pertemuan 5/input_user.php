<?php
# Menyertakan(include) file koneksi ke database.
include "koneksi.php";
# Menangkap data id_user yang dikirim form kedalam variabel.
$id_user = $_POST['id_user'];
# Menangkap data nama yang dikirim form kedalam variabel.
$nama = $_POST['nama'];
# Menangkap data email yang dikirim form kedalam variabel.
$email = $_POST['email'];
# Menangkap data password yang dikirim form kedalam variabel dan mengenkripsi menjadi md5.
$pass = md5($_POST['password']);
# Sintaks SQL untuk memasukan data yang ada pada variabel ke dalam database.
$sql = "INSERT INTO users(id_user,password, nama_lengkap, email) VALUES ('$id_user', '$pass',
'$nama','$email')";
# Menjalankan query sintaks SQL
$query = mysqli_query($con, $sql);
# Menghentikan koneksi ke database.
mysqli_close($con);
# Redirect ke halaman tampil_user.php
header('location:tampil_user.php');
