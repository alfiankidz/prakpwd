<?php
# Menyertakan(include) file koneksi ke database.
include "koneksi.php";
# Sintaks SQL untuk menghapus users berdasarkan id_user yang ditentukan.
$sql = "delete from users where id_user= '$_GET[id]'";
# Menjalankan query SQL
mysqli_query($con, $sql);
# Menghentikan koneksi ke database.
mysqli_close($conn);
# Redirect ke tampil_user.php
header('location:tampil_user.php');
