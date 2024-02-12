<?php
    require ('assets/fpdf/fpdf.php');

    $pdf = new FPDF('P', 'mm', "A4");

    $pdf->AddPage();

    $pdf->SetFont('Times', 'B', 20);

    $pdf->Cell(71, 10, '', 0, 0);
    $pdf->Cell(59, 5, 'Data Buku', 0, 0);
    $pdf->Cell(59, 10, '', 0, 1);

    $pdf->Cell(0, 10, '', 0, 1);

    $pdf->SetFont('Times', 'B', 7);
    // Heading pada tabel
    $pdf->Cell(7, 6, 'No', 1, 0, 'C');
    $pdf->Cell(27, 6, 'Judul', 1, 0, 'C');
    $pdf->Cell(27, 6, 'Pengarang', 1, 0, 'C');
    $pdf->Cell(27, 6, 'Penerbit', 1, 0, 'C');
    $pdf->Cell(22, 6, 'Tahun Terbit', 1, 0, 'C');
    $pdf->Cell(27, 6, 'ISBN', 1, 0, 'C');
    $pdf->Cell(27, 6, 'Kategori', 1, 0, 'C');
    $pdf->Cell(30, 6, 'Jumlah', 1, 1, 'C');

    // Heading pada tabel
    $pdf->SetFont('Times', '', 6);
                    include "function.php";
                        $ambil = mysqli_query($conn, "SELECT * FROM data_buku");
                        $no = 1;   
                        
                        while ($data = mysqli_fetch_row($ambil)) {
                    
                            $pdf->Cell(7, 6, $no++, 1, 0,'C');
                            $pdf->Cell(27, 6, $data["1"], 1, 0);
                            $pdf->Cell(27, 6, $data["2"], 1, 0);
                            $pdf->Cell(27, 6, $data["3"], 1, 0);
                            $pdf->Cell(22, 6, $data["4"], 1, 0);
                            $pdf->Cell(27, 6, $data["5"], 1, 0);
                            $pdf->Cell(27, 6, $data["6"], 1, 0);
                            $pdf->Cell(30, 6, $data["7"], 1, 1, 'L');
                        
                            }
                        
    $pdf->Output();
?>