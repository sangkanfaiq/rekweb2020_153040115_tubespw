<?php
    include "../fungsi_export.php";
    include "../../koneksi.php";

    $hasil = mysqli_query($connect, "SELECT * FROM tb_barang left join tb_kategori on tb_barang.kode_kategori = tb_kategori.kode_kategori");

    $nama_file = "DataBarang.xls";
    $judul = "Daftar Barang";
    $tablehead = 2;
    $tablebody = 3;
    $no_urut = 1;



    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=".$nama_file."");
    header("Content-Transfer-Encoding:binary");
    xlsBOF();
    xlsWriteLabel(0,0,$judul);
    $kolomhead = 0;

    xlsWriteLabel($tablehead,$kolomhead++, "No");
    xlsWriteLabel($tablehead,$kolomhead++, "Kode Barang");
    xlsWriteLabel($tablehead,$kolomhead++, "Nama Barang");
    xlsWriteLabel($tablehead,$kolomhead++, "Kategori");
    xlsWriteLabel($tablehead,$kolomhead++, "Spesifikasi");
    xlsWriteLabel($tablehead,$kolomhead++, "Stock");

    while($data = mysqli_fetch_array($hasil)) {
        $kolombody = 0;

        xlsWriteLabel($tablehead,$kolomhead++,$no_urut);
        xlsWriteLabel($tablehead,$kolomhead++,$data['kode_barang']);
        xlsWriteLabel($tablehead,$kolomhead++,$data['nama_barang']);
        xlsWriteLabel($tablehead,$kolomhead++,$data['nama_kategori']);
        xlsWriteLabel($tablehead,$kolomhead++,$data['spesifikasi']);
        xlsWriteLabel($tablehead,$kolomhead++,$data['stock']);

        $tablebody++;
        $no_urut++;


    }

    xlsBOF();
    exit();


?>