<?php
    include "fungsi_tanggal.php";

?>

<section id="main-content">
    <section class="wrapper">
    <div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-cog"></i> Data Produksi</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambah_produksi" class="btn btn-primary">Tambah Produksi</a>
                </div>
                <br>
                <thead>
                    <?php
                        include "../koneksi.php";
                        $query = mysqli_query($connect,"SELECT * FROM tb_produksi left join tb_barang on tb_produksi.kode_barang = tb_barang.kode_barang");
                    ?>

                  <tr>
                    <th class="hidden-phone">Kode Produksi</th>
                    <th class="hidden-phone">Tanggal Produksi</th>
                    <th class="hidden-phone">Nama Barang</th>
                    <th class="hidden-phone">Jumlah Produksi</th>
                    
                    <th></th>
                  </tr>
                </thead>
                    
                    

                <tbody>
                    <?php
                        
                        while($data = mysqli_fetch_array($query)) {
                    ?>

                        <td class="hidden-phone"><?php echo $data['kode_produksi'] ?></td>
                        <td class="hidden-phone"><?php echo tgl_indo ($data['tanggal_produksi']); ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_barang'] ?></td>
                        <td class="hidden-phone"><?php echo $data['jumlah_produksi'] ?></td>
                               
                    <td>
                      <a href="beranda.php?hal=ubah_produksi&kode_produksi=<?php echo $data['kode_produksi']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="data_produksi/hapus_produksi.php?kode_produksi=<?php echo $data['kode_produksi'] ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o "></i></a>
                    </td>
                  </tr>
                  <?php
                        }
                  ?>

                </tbody>
              </table>
                
              
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
    </section>
</section>