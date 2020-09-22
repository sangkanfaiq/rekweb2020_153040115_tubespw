<section id="main-content">
    <section class="wrapper">
    <div class="row ">
          <div class="col-md-12">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-user"></i> Data Admin</h4>
                <hr>
                <div class="text-center">
                    <a href="?hal=tambah_admin" class="btn btn-primary">Tambah Admin</a>
                </div>
                <br>
                <thead>
                    <?php
                        include "../koneksi.php";
                        $query = mysqli_query($connect,"SELECT * FROM tb_login");
                    ?>

                  <tr>
                    <th> Kode Admin</th>
                    <th class="hidden-phone">Nama Admin</th>
                    <th class="hidden-phone">Jabatan</th>
                    <th class="hidden-phone">Status Admin</th>
                    
                    <th>Aksi</th>
                  </tr>
                </thead>
                    
                    

                <tbody>
                    <?php
                        while($data = mysqli_fetch_array($query)){
                    ?>

                        <td class="hidden-phone"><?php echo $data['id_login'] ?></td>
                        <td class="hidden-phone"><?php echo $data['nama_admin'] ?></td>
                        <td class="hidden-phone"><?php echo $data['jabatan_admin'] ?></td>
                        <td class="hidden-phone"><?php echo $data['status_admin'] ?></td>
                               
                    <td>
                      <a href="beranda.php?hal=ubah_admin&id_login=<?php echo $data['id_login']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                      <a href="data_admin/hapus_admin.php?id_login=<?php echo $data['id_login'] ?>" class="btn btn-danger btn-xs" onclick="return confirm ('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o "></i></a>
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