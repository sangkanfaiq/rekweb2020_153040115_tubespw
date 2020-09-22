<?php
    session_start();
    
    // include "../laporan/fpdf.php";
    require('../fpdf/fpdf.php');
    include "../fungsi_tanggal.php";


    class PDF extends FPDF {

        function Header() {
            $this->Image("../kop-sanaco.png",20,10,20);
            $this->SetFont('Arial','B',20);
            $this->Cell(70);
            //judul
            $this->Cell(70,5,'PT. SANACO',0,1,'C');
            $this->Cell(70);
            $this->SetFont('Arial','B',20);
            $this->Cell(70,12,'CAHAYA RASA',0,1,'C');
            $this->Cell(70);
            $this->Cell(70,7,'',0,1,'C');
            $this->Cell(70);
            $this->SetFont('Arial','',11);
            $this->Cell(70,5,'Kp. Munjul RT.002/RW.004 Kelurahan Sindanglaka',0,1,'C');
            $this->Cell(70);
            $this->SetFont('Arial','',11);
            $this->Cell(70,5,'Kecamatan Karang Tengah Kabupaten Cianjur',0,1,'C');
            $this->Cell(70);
            $this->SetFont('Arial','',11);
            $this->Cell(70,5,'Website : www.sanacocahayarasa.co.id',0,1,'C');
            //double underline
            $this->SetLineWidth(1);
            $this->Line(5,52,210,52);
            $this->SetLineWidth(0);
            $this->Line(10,52,100,52);
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
            $this->Cell(110);
            $this->Cell(110,5,'Cianjur, '.tgl_indo(date('Y-m-d')),0,1,'C');
            $this->Cell(110);
            $this->Cell(110,5,'Mengetahui',0,1,'C');
            $this->Cell(110);
            $this->Cell(110,5,'Direktur Utama',0,1,'C');
            $this->Ln(20);
            $this->Cell(110);
            $this->SetFont('Arial','U',12);
            $this->Cell(110,5,'Euis Kartika',0,1,'C');
            // $this->Cell(110);
            // $this->SetFont('Arial','',12);
            // $this->Cell(110,5,'(NIP. 123456778 1234 12345)',0,1,'C');


        }
    }
    $pdf = new PDF('P','mm','Legal');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(70);
    $pdf->Cell(70,10,'DETAIL PENGIRIMAN BARANG',0,1,'C');
    $pdf->Ln(10);

    include "../../koneksi.php";
    
    $query =  mysqli_query($connect,  "SELECT * FROM tb_penerimaan left join tb_departement on tb_penerimaan.kode_departement = tb_departement.kode_departement where(tb_penerimaan.kode_terima = kode_terima) GROUP BY tb_penerimaan.kode_terima");
    $row = mysqli_fetch_array($query);

    $pdf->SetFont('Arial','',10);
    $pdf->Cell(40,5,'Nomor Kirim : ',0,0,'L',0);
    $pdf->Cell(70,5,$row['kode_terima'],0,1,'L');

    $pdf->Cell(40,5,'Tanggal Kirim : ',0,0,'L',0);
    $pdf->Cell(70,5,$row['tanggal_terima'],0,1,'L');

    $pdf->Cell(40,5,'Departement : ',0,0,'L',0);
    $pdf->Cell(70,5,$row['nama_departement'],0,1,'L');

    $pdf->Cell(40,5,'Penanggung Jawab : ',0,0,'L',0);
    $pdf->Cell(70,5,$row['nama_manager'],0,1,'L');
    $pdf->Ln(10);
    


    


    $pdf->SetFillColor(24,224,23);
    $pdf->SetFont('Arial','B',10);
    // $pdf->Cell(30,6,'KODE BARANG',1,0,'C',0);
    $pdf->Cell(50,6,'NAMA BARANG',1,0,'C',0);
    $pdf->Cell(60,6,'KATEGORI',1,0,'C',0);
    $pdf->Cell(50,6,'SPESIFIKASI',1,0,'C',0);
    $pdf->Cell(35,6,'TOTAL',1,0,'C',0);;
    $pdf->Ln(6);

    $pdf->SetFont('Arial','',10);

    include "../../koneksi.php";

    

    $query =  mysqli_query($connect, "SELECT * FROM tb_penerimaan left join tb_detail_penerimaan on tb_penerimaan.kode_terima = tb_detail_penerimaan.kode_terima left join tb_barang on tb_detail_penerimaan.kode_barang = tb_barang.kode_barang ");

    while($row = mysqli_fetch_array($query)) {
        $pdf->SetFont('Arial','',11);
        // $pdf->Cell(30,6,$row['kode_barang'],1,0,'L',0);
        $pdf->Cell(50,6,$row['nama_barang'],1,0,'L',0);

        $show = mysqli_query($connect, "SELECT * FROM tb_kategori");
            $y = mysqli_fetch_array($show);
            $pdf->Cell(60,6,$y['nama_kategori'],1,0,'L',0);

        $pdf->Cell(50,6,$row['spesifikasi'],1,0,'L',0);
        $pdf->Cell(35,6,$row['jumlah_barang'],1,0,'C',0);
        $pdf->Ln(6);
    }

    $pdf->Ln(120);
    $pdf->ttd();




    


    $pdf->Output();
?>