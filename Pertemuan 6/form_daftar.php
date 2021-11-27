<?php
# Alfian Hakim / 1900018398
include "koneksi.php";

if (isset($_POST['daftar'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $pass = md5($_POST['password']);
    $sql = "INSERT INTO users(id_user,password, nama_lengkap, email, alamat) VALUES ('$id_user', '$pass',
    '$nama','$email','$alamat')";
    $query = mysqli_query($con, $sql);
    mysqli_close($con);
    header('location:tampil_users.php');
}

echo "<h2>Tambah User</h2>
<form method=post>
<table>
<tr><td>Username</td><td> : <input name='id_user' type='text'></td></tr>
<tr><td>Password</td><td> : <input name='password' type='password'></td></tr>
<tr><td>Nama Lengkap</td><td> : <input name='nama' type='text'></td></tr>
<tr><td>Email </td><td> : <input name='email' type='text'></td></tr>
<tr><td>Alamat </td><td> : <input name='alamat' type='text'></td></tr>
<tr><td colspan=2><input type='submit' name='daftar' value='SIMPAN'> <a href=tampil_users.php>List User</a></td></tr>
</table>
</form>";
