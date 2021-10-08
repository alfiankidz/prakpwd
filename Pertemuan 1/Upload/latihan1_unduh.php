<?php
$myDir = "C:/xampp/htdocs/PWD/Pertemuan 1/Upload File/files/";
$dir = opendir($myDir);
echo "Isi folder (klik link untuk download) : <br>";
while ($tmp = readdir($dir)) {
    echo "<a href='files/$tmp' target='_blank'>$tmp</a><br>";
}
closedir($dir);
echo "<br><a href=latihan1.php> Upload File </a><br>";
