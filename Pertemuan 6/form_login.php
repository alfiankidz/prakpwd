<?php
# Alfian Hakim / 1900018398
# img src='captcha.php' untuk mengenerate dan menampilkan captcha.
echo "<h2>Login</h2>
<form method=post action=cek_login.php>
<table>
<tr><td>Username</td><td> : <input name='id_user' type='text'></td></tr>
<tr><td>Password</td><td> : <input name='paswd' type='text'></td></tr>
<tr><td>Captcha<br>
<img src='captcha.php' /></td><td> : <input name='captcha_code' type='text'></td></tr>
<tr><td colspan=2><input type='submit' value='LOGIN'></td></tr>
<tr><td><a href=form_daftar.php>Tambah User</a></td></tr>
</table>
</form>";
