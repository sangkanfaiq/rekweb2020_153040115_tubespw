<?php
    include "../../koneksi.php";
    
    $kode_keluar = $_GET['kode_keluar'];
    $hapus_tabel_pengeluaran = mysqli_query($connect, "DELETE FROM tb_pengeluaran WHERE kode_keluar = '$kode_keluar'") or die (mysql_error());
        if($hapus_tabel_pengeluaran) {
            $hapus_tabel_pengeluaran = mysqli_query($connect, "DELETE FROM tb_detail_pengeluaran WHERE kode_keluar = '$kode_keluar'");
        }

        echo "
                <meta http-equiv='refresh' content='0; url=../beranda.php?hal=data_pengeluaran'>
            ";

?>