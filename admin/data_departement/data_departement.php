<section id="main-content">
    <section class="wrapper">
    <div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-building"></i> Data Departement</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambah_departement" class="btn btn-primary">Tambah Departement</a>
                </div>
                <br>
                <thead>
                    <?php
                        include "../koneksi.php";
                        $query = mysqli_query($connect,"SELECT * FROM tb_departement");
                    ?>

                  <tr>
                    <th> Kode Departement</th>
                    <th class="hidden-phone">Nama Departement</th>
                    <th class="hidden-phone">Penanggung Jawab</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                    
                    

                <tbody>
                    <?php
                        while($data = mysqli_fetch_array($query)){
                    ?>

                        <td class="hidden-phone"><?php echo $data['kode_departement']?></td>
                        <td class="hidden-phone"><?php echo $data['nama_departement'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_manager'] ?></td>
                               
                    <td>
                      <a href="beranda.php?hal=ubah_departement&kode_departement=<?php echo $data['kode_departement']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="data_departement/hapus_departement.php?kode_departement=<?php echo $data['kode_departement'] ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o "></i></a>
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