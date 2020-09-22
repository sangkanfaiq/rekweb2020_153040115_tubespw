<?php
    include "../koneksi.php";
    $kode_terima = $_GET['kode_terima'];

    $data_atas = mysqli_query($connect, "SELECT * FROM tb_penerimaan left join tb_departement on tb_penerimaan.kode_departement = tb_departement.kode_departement WHERE kode_terima = '$kode_terima'");

    $x = mysqli_fetch_array($data_atas);

    include "fungsi_tanggal.php";

?>




<section id="main-content">
    <section class="wrapper">
        <div class="col-lg-12 mt">
            <div class="row content-panel">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="pull-left">
                        <h2>Detail Pengiriman Barang</h2>
                        <br>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-5">
                            <br>
                            <div>
                                <div class="pull-left">Nomor Kirim : </div>
                                <div class="pull-right"><?php echo $x['kode_terima']?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Tanggal Kirim : </div>
                                <div class="pull-right"><?php echo tgl_indo($x['tanggal_terima']);?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Departement : </div>
                                <div class="pull-right"><?php echo $x['nama_departement']?></div>
                                <div class="clearfix"></div>
                            </div>

                            <div>
                                <div class="pull-left">Penanggung Jawab : </div>
                                <div class="pull-right"><?php echo $x['nama_manager']?></div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <br><br>

                        <table class="table">
                            <thead>
                                <?php 
                                    include "../koneksi.php";
                                    $data_bawah =  mysqli_query($connect, "SELECT * FROM tb_penerimaan left join tb_detail_penerimaan on tb_penerimaan.kode_terima = tb_detail_penerimaan.kode_terima left join tb_barang on tb_detail_penerimaan.kode_barang = tb_barang.kode_barang where tb_penerimaan.kode_terima = '$kode_terima'");
                                ?>

                                <tr>
                                    <th style="width:100px">Kode Barang</th>
                                    <th class="text-left">Nama Barang</th>
                                    <th class="text-left">Kategori</th>
                                    <th class="text-left">Spesifikasi</th>
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
                                    
                                    <td>
                                        <?php
                                            include "../koneksi.php";
                                            $show = mysqli_query($connect, "SELECT * FROM tb_kategori");
                                            while($y = mysqli_fetch_array($show)) {
                                        ?>
                                        <?php echo $y['nama_kategori']?>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $data['spesifikasi']?></td>
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
                                <a href="penerimaan/cetak_pengiriman.php" class="btn btn-primary" style="padding:8px 30px">Print</a>
                                <a href="beranda.php?hal=data_penerimaan" class="btn btn-warning" style="padding:8px 20px">Kembali</a>
                            </div>
                        </div>


                </div>
            </div>
        </div>
    </section>
</section>