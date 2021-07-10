<?php
$pdf = new FPDF('l', 'mm', 'A4');
// membuat halaman baru
$pdf->AddPage();
$pdf->SetTitle("Laporan pemesanan kontrakan | carikontrakan", 1);

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string 
$pdf->Cell(275, 7, 'CARI KONTRAKAN', 0, 1, 'C');
$pdf->Image(base_url() . "assets/images/icon.png", 10, 10, 20, 0, 'PNG');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(275, 7, 'LAPORAN DATA PESANAN KONTRAKAN', 0, 1, 'C');
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(275, 7, 'Pesanan Kontrakan Periode Tanggal ' . $tgl1 . ' Sampai Tanggal ' . $tgl2, 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(10, 6, 'No', 1, 0, 'C');
$pdf->Cell(40, 6, 'Nama User', 1, 0, 'C');
$pdf->Cell(40, 6, 'Tgl Pesanan', 1, 0, 'C');
$pdf->Cell(30, 6, 'Tgl Menempati', 1, 0, 'C');
$pdf->Cell(40, 6, 'Kontrakan', 1, 0, 'C');
$pdf->Cell(25, 6, 'Pemilik', 1, 0, 'C');
$pdf->Cell(40, 6, 'Total Bayar', 1, 0, 'C');
$pdf->Cell(50, 6, 'Status', 1, 1, 'C');
$pdf->SetFont('Arial', '', 8, 'C');
$no = 1;
foreach ($result as $key) {
    $pdf->Cell(10, 6, $no++ . '.', 1, 0, 'C');
    $pdf->Cell(40, 6, $key->nama_user, 1, 0);
    $pdf->Cell(40, 6, $key->tgl_pesanan, 1, 0);
    $pdf->Cell(30, 6, $key->tgl_masuk, 1, 0);
    $pdf->Cell(40, 6, $key->nama_kontrakan, 1, 0);
    $pdf->Cell(25, 6,  $key->nama_owner, 1, 0);
    $pdf->Cell(40, 6, rupiah($key->harga), 1, 0);
    $pdf->Cell(50, 6, $key->status_pemesanan, 1, 1);
}
$pdf->ln();
// $pdf->ln();
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Tangerang, ' . date('Y-m-d'), 0, 1, 'C');
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Mengetahui,', 0, 1, 'C');
// $pdf->ln();
// $pdf->ln();
// $pdf->ln();
// $pdf->ln();
// $pdf->Cell(217, 6, '', 0, 0);
// $pdf->Cell(60, 6, 'Pemilik', 'T', 1, 'C');
$pdf->Output();
