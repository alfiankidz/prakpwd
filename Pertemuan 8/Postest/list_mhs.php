<?php
require('fpdf/fpdf.php'); // Memanggil library FPDF
$pdf = new FPDF('l', 'mm', 'A5'); // Intance object dan memberikan pengaturan halaman PDF
$pdf->AddPage(); // Membuat halaman baru
$pdf->SetFont('Arial', 'B', 16); // Menentukan jenis font yang akan digunakan
$pdf->Cell(190, 7, 'DAFTAR MAHASISWA UNIVERSITAS AHMAD DAHLAN', 0, 1, 'C'); // Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(10, 7, '', 0, 1); // Memberikan space kebawah agar tidak terlalu rapat
$pdf->SetFont('Arial', 'B', 10); // Menentukan jenis font yang akan digunakan
$pdf->Cell(20, 6, 'NIM', 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
$pdf->Cell(50, 6, 'NAMA MAHASISWA', 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
$pdf->Cell(25, 6, 'J KEL', 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
$pdf->Cell(50, 6, 'ALAMAT', 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
$pdf->Cell(30, 6, 'TANGGAL LHR', 1, 1); // Mencetak string (width, height, text, border, ln(pindah baris) );
$pdf->SetFont('Arial', '', 10); // Menentukan jenis font yang akan digunakan
include 'koneksi.php'; // Menyertakan file koneksi ke database
$mahasiswa = mysqli_query($con, "select * from mahasiswa"); // Query untuk mengambil semua data mahasiswa
while ($row = mysqli_fetch_array($mahasiswa)) { // While loop fetch array data mahasiswa
    $pdf->Cell(20, 6, $row['nim'], 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
    $pdf->Cell(50, 6, $row['nama'], 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
    $pdf->Cell(25, 6, $row['jkel'], 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
    $pdf->Cell(50, 6, $row['alamat'], 1, 0); // Mencetak string (width, height, text, border, ln(pindah baris) );
    $pdf->Cell(30, 6, $row['tgllhr'], 1, 1); // Mencetak string (width, height, text, border, ln(pindah baris) );
}
$pdf->Output(); // Mengirim document ke browser untuk didownload
