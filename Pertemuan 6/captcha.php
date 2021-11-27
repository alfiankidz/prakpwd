<?php
# Memulai Session
session_start();
# Generate sebuah integer acak lalu di enkripsi md5
$random_alpha = md5(rand());
# Digunakan untuk memotong variabel $random_alpha mulai dari 0 sampai 6
$captcha_code = substr($random_alpha, 0, 6);
# Membuat session 'captcha_code' dengan isi variabel '$captcha_code'
$_SESSION["captcha_code"] = $captcha_code;
# Membuat gambar objek dengan lebar 70 dan tinggi 30
$target_layer = imagecreatetruecolor(70, 30);
# Menetapkan warna backgroud captcha (RGB) pada objek gambar '$target_layer'
$captcha_background = imagecolorallocate($target_layer, 255, 160, 119);
# Mengisi (fill) gambar ($target_layer) dengan warna ($captcha_backgroud)
imagefill($target_layer, 0, 0, $captcha_background);
# Menetapkan warna teks captcha (RGB) pada objek gambar '$target_layer'
$captcha_text_color = imagecolorallocate($target_layer, 0, 0, 0);
# Menggambar sebuah string secara horizontal
# Format: imagestring(gambar_objek, font, x, y, string, warna_string)
imagestring($target_layer, 5, 5, 5, $captcha_code, $captcha_text_color);
# Mengirimkan header format image/jpeg
header("Content-type: image/jpeg");
# Untuk mengoutputkan gambar ke browser
imagejpeg($target_layer);
