<?php

    $id_login = $_GET['id_login'];



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $id_login = $_POST['id_login'];
        $username = $_POST['username'];
        $password_admin = $_POST['password_admin'];
        $nama_admin = $_POST['nama_admin'];
        $jabatan_admin = $_POST['jabatan_admin'];
        $status_admin = $_POST['status_admin'];

        $ubah = mysqli_query($connect, "UPDATE tb_login SET username = '$username', password_admin = '$password_admin', nama_admin = '$nama_admin', jabatan_admin = '$jabatan_admin', status_admin '$status_admin' WHERE id_login = '$id_login'");

        echo "
            <script>
                window.alert('Data admin berhasil diubah') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_admin'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-user"></i> Ubah Data Admin</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_login WHERE id_login = '$id_login'");
            while($data = mysqli_fetch_array($query)){
            
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Ubah Admin</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Admin</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_login" value="<?php echo $id_login?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Username</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Password</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="password_admin" value="<?php echo $data['password_admin'] ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Admin</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_admin" value="<?php echo $data['nama_admin'] ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="jabatan_admin" value="<?php echo $data['jabatan_admin'] ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Status Admin</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="status_admin" value="<?php echo $data['status_admin'] ?>">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Ubah</button>
                        <a href="?hal=data_admin" class="btn btn-warning">Kembali</a>
                    </div>
                </div>

              </form>
                
                <?php
                    }   
                ?>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

   
    </section>
</section>