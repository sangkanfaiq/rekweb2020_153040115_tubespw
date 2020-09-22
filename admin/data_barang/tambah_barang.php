<?php
    include "../koneksi.php";
    $query = "SELECT max(kode_barang) as maxKode FROM tb_barang";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kode_barang = $data['maxKode'];
    $no_urut = (int) substr($kode_barang,3,3);
    $no_urut ++ ;
    $char = "BRG";
    $kode_barang = $char . sprintf("%03s",$no_urut);
    echo $kode_barang;




    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $kode_kategori = $_POST['kode_kategori'];
        $spesifikasi = $_POST['spesifikasi'];
        $stock = $_POST['stock'];

        $simpan = mysqli_query($connect, "INSERT INTO tb_barang VALUES ('$kode_barang','$nama_barang','$kode_kategori','$spesifikasi','$stock')");

        echo "
            <script>
                window.alert('Data barang berhasil ditambahkan') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_barang'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-bars"></i> Tambah Barang</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Tambah Barang</h4>
              <form class="form-horizontal style-form" method="post">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kode Barang</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="kode_barang" value="<?php echo $kode_barang?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Nama Barang</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_barang" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-4">
                      <?php
                        include "../koneksi.php";
                        echo "<select class='form-control' name='kode_kategori'>";
                        $tampil = mysqli_query($connect,"SELECT * FROM tb_kategori");
                        
                        while($data = mysqli_fetch_array($tampil)) {
                            echo "<option value = $data[kode_kategori]>$data[nama_kategori]</option>";

                        }
                            echo "</select>";


                      ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Spesifikasi</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="spesifikasi" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Stock</label>
                  <div class="col-sm-4">
                    <input type="number" class="form-control" name="stock" required="">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Simpan</button>
                        <a href="?hal=data_barang" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

   
    </section>
</section>