<?php
    include "../../koneksi.php";

    $kode_produksi = $_GET['kode_produksi'];
    $query = mysqli_query($connect, "DELETE FROM tb_produksi WHERE kode_produksi = '$kode_produksi'") or die(mysql_error);

    echo "
            <meta http-equiv='refresh' content='0; url=../beranda.php?hal=data_produksi'>
        ";

?>