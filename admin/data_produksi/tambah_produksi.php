<?php
    include "../koneksi.php";
    $today = date('Ymd');
    $query = "SELECT max(kode_produksi) as maxKode FROM tb_produksi";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kode_produksi = $data['maxKode'];
    $no_urut = (int) substr($kode_produksi,3,3);
    $no_urut ++ ;
    $char = "PRD";
    $kode_produksi = $char . sprintf("%03s",$no_urut);
    echo $kode_produksi;




    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $kode_produksi = $_POST['kode_produksi'];
        $kode_barang = $_POST['kode_barang'];
        $jumlah_produksi = $_POST['jumlah_produksi'];

        $simpan = mysqli_query($connect, "INSERT INTO tb_produksi VALUES ('$kode_produksi','$today','$kode_barang','$jumlah_produksi')");

        echo "
            <script>
                window.alert('Data produksi berhasil ditambahkan') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_produksi'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-bars"></i> Tambah Produksi</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Tambah Produksi</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Produksi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_produksi" value="<?php echo $kode_produksi?>"readonly>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-4">
                      <?php
                        include "../koneksi.php";
                        echo "<select class='form-control' name='kode_barang'>";
                        $tampil = mysqli_query($connect,"SELECT * FROM tb_barang");
                        
                        while($data = mysqli_fetch_array($tampil)) {
                            echo "<option value = $data[kode_barang]>$data[nama_barang]</option>";

                        }
                            echo "</select>";


                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Jumlah Produksi</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="jumlah_produksi" required>
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Simpan</button>
                        <a href="?hal=data_produksi" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

   
    </section>
</section>