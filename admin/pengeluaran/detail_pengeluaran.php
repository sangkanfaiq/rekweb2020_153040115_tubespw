<?php
    include "../koneksi.php";
    $kode_keluar = $_GET['kode_keluar'];

    $data_atas = mysqli_query($connect, "SELECT * FROM tb_pengeluaran left join tb_departement on tb_pengeluaran.kode_departement = tb_departement.kode_departement WHERE kode_keluar = '$kode_keluar'");

    $x = mysqli_fetch_array($data_atas);

    include "fungsi_tanggal.php";

?>




<section id="main-content">
    <section class="wrapper">
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="pull-left">
                        <h2>Detail Pengeluaran Barang</h2>
                        <br>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-5">
                            <br>
                            <div>
                                <div class="pull-left">Nomor keluar : </div>
                                <div class="pull-right"><?php echo $x['kode_keluar']?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Tanggal Kirim : </div>
                                <div class="pull-right"><?php echo tgl_indo($x['tanggal_keluar']);?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Departement : </div>
                                <div class="pull-right"><?php echo $x['nama_departement']?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Nama Admin : </div>
                                <div class="pull-right"><?php echo $_SESSION['nama_admin']?></div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <br><br>

                        <table class="table">
                            <thead>
                                <?php 
                                    include "../koneksi.php";
                                    $data_bawah =  mysqli_query($connect, "SELECT * FROM tb_pengeluaran left join tb_detail_pengeluaran on tb_pengeluaran.kode_keluar = tb_detail_pengeluaran.kode_keluar left join tb_barang on tb_detail_pengeluaran.kode_barang = tb_barang.kode_barang where tb_pengeluaran.kode_keluar = '$kode_keluar'");
                                ?>

                                <tr>
                                    <th style="width:100px">Kode Barang</th>
                                    <th class="text-left">Nama Barang</th>
                                    <th style="width:30px">Total</th>
                                </tr>   
                            </thead>

                            <tbody>
                                <?php
                                    while($data = mysqli_fetch_array($data_bawah)) {
                                ?>

                                <tr>
                                        
                                    <td><?php echo $data['kode_barang']?></td>
                                    <td><?php echo $data['nama_barang']?></td>
                                    <td><?php echo $data['jumlah_barang']?></td>
                                </tr>

                                <?php
                                    }
                                ?>
                            
                            </tbody>
                        </table>
                        <br><br>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <a href="beranda.php?hal=data_pengeluaran" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </section>
</section>