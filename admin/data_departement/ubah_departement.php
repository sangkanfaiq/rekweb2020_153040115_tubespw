<?php

    $kode_departement = $_GET['kode_departement'];



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $kode_departement = $_POST['kode_departement'];
        $nama_departement = $_POST['nama_departement'];
        $nama_manager = $_POST['nama_manager'];

        $simpan = mysqli_query($connect, "UPDATE tb_departement SET nama_departement = '$nama_departement', nama_manager = '$nama_manager' WHERE kode_departement = '$kode_departement'");

        echo "
            <script>
                window.alert('Data berhasil diubah') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_departement'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-building"></i> Ubah Departement</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_departement WHERE kode_departement = '$kode_departement'");
            while($data = mysqli_fetch_array($query)){
            
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Ubah Departement</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_departement" value="<?php echo $kode_departement?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Departement</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_departement" value="<?php echo $data['nama_departement'] ?>">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Penanggung Jawab</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_manager" value="<?php echo $data['nama_manager'] ?>">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Ubah</button>
                        <a href="?hal=data_departement" class="btn btn-warning">Kembali</a>
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