<?php

    $kode_produksi = $_GET['kode_produksi'];



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $kode_produksi = $_POST['kode_produksi'];
        $nama_barang = $_POST['nama_barang'];
        $jumlah_produksi = $_POST['jumlah_produksi'];

        $simpan = mysqli_query($connect, "UPDATE tb_produksi SET kode_produksi = '$kode_produksi', jumlah_produksi = '$jumlah_produksi' WHERE kode_produksi = '$kode_produksi'");

        echo "
            <script>
                window.alert('Data produksi berhasil diubah') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_produksi'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-angle-right"></i> Ubah Data Produksi</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <?php
            $query = mysqli_query($connect, "SELECT * FROM tb_produksi WHERE kode_produksi = '$kode_produksi'");
            while($data = mysqli_fetch_array($query)){
            
        ?>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Ubah Produksi</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Produksi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_produksi" value="<?php echo $kode_produksi?>"readonly>
                  </div>
                </div>

                <!-- <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="nama_barang" value="<?php echo $data['nama_barang'] ?>">
                  </div>
                </div> -->
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Produksi</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="jumlah_produksi" value="<?php echo $data['jumlah_produksi'] ?>">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Ubah</button>
                        <a href="?hal=data_produksi" class="btn btn-warning">Kembali</a>
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