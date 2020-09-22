<?php
    include "../../koneksi.php";
    
    $kode_terima = $_GET['kode_terima'];
    $hapus_tabel_penerimaan = mysqli_query($connect, "DELETE FROM tb_penerimaan WHERE kode_terima = '$kode_terima'") or die (mysql_error());
        if($hapus_tabel_penerimaan) {
            $hapus_tabel_penerimaan = mysqli_query($connect, "DELETE FROM tb_detail_penerimaan WHERE kode_terima = '$kode_terima'");
        }

        echo "
                <meta http-equiv='refresh' content='0; url=../beranda.php?hal=data_penerimaan'>
            ";

?>