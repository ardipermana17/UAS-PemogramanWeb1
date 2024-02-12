<?php
    require ('assets/fpdf/fpdf.php');

    $pdf = new FPDF('P', 'mm', "A4");

    $pdf->AddPage();

    $pdf->SetFont('Times', 'B', 20);

    $pdf->Cell(71, 10, '', 0, 0);
    $pdf->Cell(59, 5, 'Data Pengunjung', 0, 0);
    $pdf->Cell(59, 10, '', 0, 1);

    $pdf->Cell(0, 10, '', 0, 1);

    $pdf->SetFont('Times', 'B', 9);
    // Heading pada tabel
    $pdf->Cell(9, 6, 'No', 1, 0, 'C');
    $pdf->Cell(36, 6, 'NIM', 1, 0, 'C');
    $pdf->Cell(36, 6, 'Nama', 1, 0, 'C');
    $pdf->Cell(36, 6, 'Kelas', 1, 0, 'C');
    $pdf->Cell(36, 6, 'Nomor Handphone', 1, 0, 'C');
    $pdf->Cell(36, 6, 'Alamat', 1, 1, 'C');
    // Heading pada tabel
    $pdf->SetFont('Times', '', 9);
                    include "function.php";
                        $ambil = mysqli_query($conn, "SELECT * FROM data_pengunjung");
                        $no = 1;   
                        
                        while ($data = mysqli_fetch_row($ambil)) {
                    
                            $pdf->Cell(9, 6, $no++, 1, 0,'C');
                            $pdf->Cell(36, 6, $data["1"], 1, 0);
                            $pdf->Cell(36, 6, $data["2"], 1, 0);
                            $pdf->Cell(36, 6, $data["3"], 1, 0);
                            $pdf->Cell(36, 6, $data["4"], 1, 0);
                            $pdf->Cell(36, 6, $data["5"], 1, 1);
                        
                            }
                        
    $pdf->Output();
?>