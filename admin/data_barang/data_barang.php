

<section id="main-content">
    <section class="wrapper">
    <div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-bars"></i> Data Barang</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambah_barang" class="btn btn-primary">Tambah Barang</a>
                </div>
                <br>
                <thead>
                    <?php
                        include "../koneksi.php";
                        $query = mysqli_query($connect,"SELECT * FROM tb_barang left join tb_kategori on tb_barang.kode_kategori = tb_kategori.kode_kategori");
                    ?>

                  <tr>
                    <th> Kode Barang</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Nama Kategori</th>
                    <th class="hidden-phone">Spesifikasi</th>
                    <th class="hidden-phone">Stock Awal</th>
                    <!-- <th class="hidden-phone">Hasil Produksi</th> -->
                    <th class="hidden-phone">Stock Kini</th>
                    
                    <th></th>
                  </tr>
                </thead>
                    
                    

                <tbody>
                    <?php
                        while($data = mysqli_fetch_array($query)){
                        //menghitung stock
                        error_reporting(0);
                        $jumlah_barang_terima = "SELECT SUM(jumlah_produksi) AS jumlah_produksi FROM tb_produksi where kode_barang = '$data[kode_barang]'";
                        $hasil_barang_masuk = @mysqli_query($connect,$jumlah_barang_terima) or die (mysqli_error());
                        $barang_terima = mysqli_fetch_array($hasil_barang_masuk);    
                    ?>

                        <td class="hidden-phone"><?php echo $data['kode_barang'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_barang'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_kategori'] ?></td>
                        <td class="hidden-phone"><?php echo $data['spesifikasi'] ?></td>
                        <td class="hidden-phone"><?php echo $data['stock'] ?></td>
                        
                        
                        <!-- <td class="hidden-phone">
                            
                            <?php
                                include "../koneksi.php";

                                $show = mysqli_query($connect, "SELECT * FROM tb_produksi");
                                
                                $f = mysqli_fetch_array($show);
                                  
                                echo $f['jumlah_produksi'];   

                            ?>
                            
                            
                        </td> -->
                        

                        <td class="hidden-phone"><?php echo $data['stock'] + $barang_terima['jumlah_produksi']?></td>
                               
                    <td>
                      <a href="beranda.php?hal=ubah_barang&kode_barang=<?php echo $data['kode_barang']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="data_barang/hapus_barang.php?kode_barang=<?php echo $data['kode_barang'] ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
              <br><br>

              <!-- <a href="data_barang/export_barang.php" class="btn btn-primary">Export</a> -->
              <!-- <a href="data_barang/cetak_barang.php" class="btn btn-primary" style="padding:8px 25px" target="_blank">Print</a> -->
                
              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
    </section>
</section>