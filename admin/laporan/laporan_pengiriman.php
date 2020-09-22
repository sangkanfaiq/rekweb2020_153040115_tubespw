<?php

    include "../../koneksi.php";
    include "../fpdf/fpdf.php";
    include "../fungsi_tanggal.php";
    // $tgl_awal = $_POST['tgl_awal'];
    // $tgl_akhir = $_POST['tgl_akhir'];


    $pdf = new FPDF('L','mm',array(210,297));
    $pdf->addPage();

    $pdf->SetFont('Arial','B',18);
    $pdf->Cell(90);
    $pdf->Cell(90,10,'Laporan Pengiriman Barang',0,1,'C');
    $pdf->Ln(2);

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(50,6,'Tanggal',1,0,'L');
    $pdf->Cell(40,6,'Kode Pengiriman',1,0,'L');
    $pdf->Cell(40,6,'Nama Barang',1,0,'L');
    $pdf->Cell(40,6,'Jumlah Barang',1,0,'L');
    $pdf->Cell(50,6,'Nama Departement',1,0,'L');
    $pdf->Cell(40,6,'Keterangan',1,0,'L');

    $query = mysqli_query($connect, "SELECT distinct * FROM tb_penerimaan left join tb_detail_penerimaan on tb_penerimaan.kode_terima = tb_detail_penerimaan.kode_terima left join tb_barang on tb_detail_penerimaan.kode_barang = tb_barang.kode_barang left join tb_departement on tb_penerimaan.kode_departement = tb_departement.kode_departement  GROUP BY tb_penerimaan.kode_terima");

    while($data = mysqli_fetch_array($query)) {

        $pdf ->Ln(6);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(50,6,tgl_indo($data['tanggal_terima']),1,0,'L');
        $pdf->Cell(40,6,$data['kode_terima'],1,0,'L');
        $pdf->Cell(40,6,$data['nama_barang'],1,0,'L');
        $pdf->Cell(40,6,$data['jumlah_barang'],1,0,'L');
        $pdf->Cell(50,6,$data['nama_departement'],1,0,'L');
        $pdf->Cell(40,6,$data['keterangan'],1,0,'L');


    }


    $pdf->Output();
    

?>