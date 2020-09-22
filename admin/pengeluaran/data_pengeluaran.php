<?php
    include "fungsi_tanggal.php";

?>

<section id="main-content">
    <section class="wrapper">
    <div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-share"></i> Data Pengeluaran Barang</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambah_pengeluaran" class="btn btn-primary">Tambah Pengeluaran</a>
                </div>
                <br>
                <thead>
                    <?php
                        include "../koneksi.php";
                        $query = mysqli_query($connect,"SELECT * FROM tb_pengeluaran left join tb_login on tb_pengeluaran.id_login = tb_login.id_login left join tb_departement on tb_pengeluaran.kode_departement = tb_departement.kode_departement");
                    ?>

                  <tr>
                    <th class="hidden-phone">Kode</th>
                    <th class="hidden-phone">Tanggal</th>
                    <th class="hidden-phone">Jumlah Item</th>
                    <th class="hidden-phone">Nama Departement</th>
                    <th class="hidden-phone">Nama Admin</th>
                    <th class="hidden-phone">Keterangan</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                    
                    

                <tbody>
                    <?php
                        while($data = mysqli_fetch_array($query)) {
                    ?>

                        <td class="hidden-phone"><?php echo $data['kode_keluar'] ?></td>
                        <td class="hidden-phone"><?php echo tgl_indo ($data['tanggal_keluar']); ?></td>
                        <td class="hidden-phone"><?php echo $data['jumlah_item'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_departement'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                        <td class="hidden-phone"><?php echo $data['keterangan'] ?></td>
                               
                    <td>
                      <a href="beranda.php?hal=detail_pengeluaran&kode_keluar=<?php echo $data['kode_keluar']?>" class="btn btn-primary btn-xs"><i class="fa fa-code-fork" data-toggle="tooltip" title="Detail"></i></a>
                      <a href="pengeluaran/hapus_pengeluaran.php?kode_keluar=<?php echo $data['kode_keluar'] ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o "></i></a>
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