<?php
    include "../koneksi.php";
    $query = "SELECT max(kode_departement) as maxKode FROM tb_departement";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kode_departement = $data['maxKode'];
    $no_urut = (int) substr($kode_departement,3,3);
    $no_urut ++ ;
    $char = "DPT";
    $kode_departement = $char . sprintf("%03s",$no_urut);
    echo $kode_departement;




    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        include "../koneksi.php";

        $kode_departement = $_POST['kode_departement'];
        $nama_departement = $_POST['nama_departement'];
        $nama_manager = $_POST['nama_manager'];

        $simpan = mysqli_query($connect, "INSERT INTO tb_departement VALUES ('$kode_departement','$nama_departement','$nama_manager')");

        echo "
            <script>
                window.alert('Data departement berhasil ditambahkan') 
            </script>
        ";

        echo "
            <meta http-equiv='refresh' content='0; url=?hal=data_departement'>
        ";

    }

?>





<section id="main-content">
    <section class="wrapper">


    <h3><i class="fa fa-building"></i> Tambah Departement</h3>
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Form Tambah Departement</h4>
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
                    <input type="text" class="form-control" name="nama_departement" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Penanggung Jawab</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_manager" required="">
                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button class="btn btn-primary" name="">Simpan</button>
                        <a href="?hal=data_departement" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
                
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>

   
    </section>
</section>