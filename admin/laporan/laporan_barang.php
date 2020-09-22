<?php
   
    
    // include "../laporan/fpdf.php";
    require('../fpdf/fpdf.php');
    $today = date('Y-m-d');
    include "../fungsi_tanggal.php";


    class PDF extends FPDF {

        function Header() {
            $this->Ln(10);
            $this->Image("../kop-sanaco.png",20,20,20);
            $this->SetFont('Arial','B',20);
            $this->Cell(120);
            //judul
            $this->Cell(120,5,'PT. SANACO',0,1,'C');
            $this->Cell(120);
            $this->SetFont('Arial','B',20);
            $this->Cell(120,12,'CAHAYA RASA',0,1,'C');
            $this->Cell(120);
            $this->Cell(120,7,'',0,1,'C');
            $this->Cell(120);
            $this->SetFont('Arial','',11);
            $this->Cell(120,5,'Kp. Munjul RT.002/RW.004 Kelurahan Sindanglaka',0,1,'C');
            $this->Cell(120);
            $this->SetFont('Arial','',11);
            $this->Cell(120,5,'Kecamatan Karang Tengah Kabupaten Cianjur',0,1,'C');
            $this->Cell(120);
            $this->SetFont('Arial','',11);
            $this->Cell(120,5,'Website : www.sanacocahayarasa.co.id',0,1,'C');
            //double underline
            $this->SetLineWidth(1);
            $this->Line(10,62,340,62);
            $this->SetLineWidth(0);
            $this->Line(10,62,340,62);
            $this->Ln(10);
        }

        function Footer(){
            $this->SetY(15);
            $this->SetFont('Arial','I',8);
            // $this->Cell(0,10,'Halaman'.$this->PageNo().' / {nb}',0,0,'R');
        }

        function ttd() {
            $this->Ln(2);
            $this->SetFont('Arial','',12);
            $this->Cell(190);
            $this->Cell(190,5,'Cianjur, '.tgl_indo(date('Y-m-d')),0,1,'C');
            $this->Cell(190);
            $this->Cell(190,5,'Mengetahui',0,1,'C');
            $this->Cell(190);
            $this->Cell(190,5,'Direktur Utama',0,1,'C');
            $this->Ln(20);
            $this->Cell(190);
            $this->SetFont('Arial','U',12);
            $this->Cell(190,5,'Euis Kartika',0,1,'C');
            $this->Cell(190);
            $this->SetFont('Arial','',12);
            $this->Cell(190,5,'(NIP. 123456778 1234 12345)',0,1,'C');


        }
    }
    $pdf = new PDF('L','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(120);
    $pdf->Cell(110,10,'LAPORAN DATA BARANG',0,1,'C');
    $pdf->Ln(10);

    // $pdf->SetFont('Arial','',12);
    // $pdf->Cell(40,5,'Tanggal : '. tgl_indo($today) ,0,0,'L');
    // $pdf->Ln(7);

    $pdf->SetFillColor(24,224,23);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,6,'KODE BARANG',1,0,'C',0);
    $pdf->Cell(60,6,'NAMA BARANG',1,0,'C',0);
    $pdf->Cell(60,6,'KATEGORI',1,0,'C',0);
    $pdf->Cell(60,6,'SPESIFIKASI',1,0,'C',0);
    $pdf->Cell(50,6,'STOCK AWAL',1,0,'C',0);
    $pdf->Cell(50,6,'STOCK KINI',1,0,'C',0);
    $pdf->Ln(6);

    $pdf->SetFont('Arial','',10);

    include "../../koneksi.php";

    $query = mysqli_query($connect, "SELECT * FROM tb_barang left join tb_kategori on tb_barang.kode_kategori = tb_kategori.kode_kategori");

    while($row = mysqli_fetch_array($query)) {
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(50,6,$row['kode_barang'],1,0,'C',0);
        $pdf->Cell(60,6,$row['nama_barang'],1,0,'L',0);
        $pdf->Cell(60,6,$row['nama_kategori'],1,0,'C',0);
        $pdf->Cell(60,6,$row['spesifikasi'],1,0,'C',0);
        $pdf->Cell(50,6,$row['stock'],1,0,'C',0);
        $pdf->Cell(50,6,$row['stock'],1,0,'C',0);
        $pdf->Ln(6);
    }

    $pdf->Ln(10);
    $pdf->ttd();




    


    $pdf->Output();
?>