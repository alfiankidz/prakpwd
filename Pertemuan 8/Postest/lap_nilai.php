<?php
// Menyertakan koneksi ke database
include 'koneksi.php';

// Mengambil nilai nim ke dalam variabel nim
$nim = $_GET['nim'];
// Query untuk mengambil semua data mahasiswa
$mahasiswa = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '" . $nim . "'");
// Fetch data mahasiswa kedalam array
$data = mysqli_fetch_array($mahasiswa);

// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(190, 7, 'LAPORAN NILAI MAHASISWA UNIVERSITAS AHMAD DAHLAN', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1,);
$pdf->SetFont('Arial', 'B', 10);
// Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(30, 5, 'Nim', 0, 0);
$pdf->Cell(80, 5, ': ' . $data['nim'], 0, 0);
$pdf->Cell(30, 5, 'Tgl Lahir', 0, 0);
$pdf->Cell(58, 5, ': ' . $data['tgllhr'], 0, 1);
// Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(30, 5, 'Nama', 0, 0);
$pdf->Cell(80, 5, ': ' . $data['nama'], 0, 0);
$pdf->Cell(30, 5, 'Alamat', 0, 0);
$pdf->Cell(58, 5, ': ' . $data['alamat'], 0, 1);
// Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(30, 5, 'Gender', 0, 0);
$pdf->Cell(80, 5, ': ' . $data['jkel'], 0, 0);
$pdf->Cell(30, 5, 'Jurusan', 0, 0);
$pdf->Cell(58, 5, ': ' . $data['jurusan'], 0, 1);

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1,);
// Menentukan jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 10);
// Mencetak string (width, height, text, border, ln(pindah baris), align);
$pdf->Cell(40, 6, 'KODE MK', 1, 0, 'C');
$pdf->Cell(30, 6, 'SKS', 1, 0, 'C');
$pdf->Cell(90, 6, 'MATAKULIAH', 1, 0, 'C');
$pdf->Cell(30, 6, 'NILAI', 1, 1, 'C');
$pdf->SetFont('Arial', '', 10);

// Query untuk mengambil data dari gabungan tabel
$laporan = mysqli_query($con, "SELECT * FROM khs AS k INNER JOIN mahasiswa AS m ON k.nim = m.nim INNER JOIN matakuliah AS mk ON mk.kode = k.kodemk WHERE m.nim = '" . $nim . "'");
// While loop fetch array sampai selesai
while ($row = mysqli_fetch_array($laporan)) {
    // Mencetak string (width, height, text, border, ln(pindah baris), align);
    $pdf->Cell(40, 6, $row['kode'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['sks'], 1, 0, 'C');
    $pdf->Cell(90, 6, $row['namamk'], 1, 0, 'C');
    $pdf->Cell(30, 6, $row['nilai'], 1, 1, 'C');
}
// Output dokumen (destination, filename)
$pdf->Output("D", "Laporan_Nilai_" . $data['nim'] . ".pdf");
