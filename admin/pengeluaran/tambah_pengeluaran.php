<?php
    include "../koneksi.php";

    $today = date("Ymd");
    // $query = "SELECT MAX(RIGHT(kode_keluar,12)) As akhir FROM tb_pengeluaran WHERE RIGHT(kode_keluar,12) LIKE '$today%'";
    // $hasil = mysqli_query($connect, $query);
    // $data = mysqli_fetch_array($hasil);
    // $no_akhir_terima = $data['akhir'];
    // $no_akhir_urut = substr($no_akhir_terima, 8, 4);
    // $no_urut_selanjutnya = $no_akhir_urut + 1;
    // $no_terima_selanjutnya = $today . sprintf('%04s', $no_urut_selanjutnya);
    // $kode = "T";
    // $no_baru = $kode.$no_terima_selanjutnya;
    $query = "SELECT max(kode_keluar) as maxKode FROM tb_pengeluaran";
    $hasil = mysqli_query($connect,$query);
    $data = mysqli_fetch_array($hasil);
    $kode_keluar = $data['maxKode'];
    $no_urut = (int) substr($kode_keluar,3,3);
    $no_urut ++ ;
    $char = "K";
    $kode_keluar = $char . sprintf("%04s",$no_urut);
    echo $kode_keluar;


    //proses tambah

    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['tambah'])) {
        $kode_keluar = $_POST['kode_keluar'];
        $kode_barang = $_POST['kode_barang'];
        $jumlah = $_POST['jumlah'];

        //cek kode barang yg sama di tabel sementara
        $cek_data = "SELECT kode_barang FROM tb_sementara WHERE kode_barang = '$kode_barang'";
        $ada = mysqli_query($connect, $cek_data) or die (mysqli_error());

            if(mysqli_num_rows($ada) > 0) {
                //jika ada 1 kode barang yg duplikat di tabel sementara maka jumlah kode barang tsb akan ditambahkan melalui proses UPDATE
                $ubah = mysqli_query($connect, "UPDATE tb_sementara SET jumlah = jumlah + '$jumlah' WHERE kode_barang = '$kode_barang'");

            } else {
                //apabila kode barang tidak ada maka data akan ditambahkan (INSERT)
                $simpan = mysqli_query($connect, "INSERT INTO tb_sementara VALUES ('','$kode_keluar','$kode_barang','$jumlah')");
                if($simpan){
                    echo "<meta http-equiv='refresh' content='0 url=?hal=tambah_pengeluaran'>";
                }
            }


    }

    //proses simpan data ke tabel penerimaan dan detail penerimaan
    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])) {
        $kode_keluar = $_POST['kode_keluar'];
        $jumlah_item = $_POST['jumlah_item'];
        $kode_departement = $_POST['kode_departement'];
        $id_login = $_SESSION['id_login'];
        $keterangan = $_POST['keterangan'];

        $simpanData = mysqli_query($connect, "INSERT INTO tb_pengeluaran VALUES ('$kode_keluar','$today','$jumlah_item','$kode_departement','$id_login','$keterangan')");

        if($simpanData) {

            //pindahkan data yg ada di tabel sementara ke tabel detail_penerimaan
            $simpanTMP = mysqli_query($connect,"INSERT INTO tb_detail_penerimaan (kode_keluar,kode_barang,jumlah_barang) SELECT kode,kode_barang,jumlah FROM tb_sementara");


            //setelah dipindahkan maka hapus semua data yg ada di tabel sementara
            $hapusTMP = mysqli_query($connect,"DELETE FROM tb_sementara") or die(mysqli_error());

            echo "<script> window.alert('Data berhasil disimpan')</script>";

            echo "<meta http-equiv='refresh' content='0; url=?hal=data_pengeluaran'>";


        }

    }
?>



<section id="main-content">
    <section class="wrapper">

        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-share"></i> Tambah Pengiriman</h4>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">

                            <form method="POST" enctype="multipart/form-data" class="form-horizontal style-form">

                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">No Kirim</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="kode_keluar" value="<?php echo $kode_keluar?>" readonly>
                                    </div>


                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Nama Barang</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" type="text" name="kode_barang" id="kode_barang" onchange="changeValue(this.value)">

                                        <?php
                                            $tampil = mysqli_query($connect, "SELECT * FROM tb_barang");
                                            while($w=mysqli_fetch_array($tampil)){
                                                echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
                                            }  

                                        ?>
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Jumlah</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="jumlah" required="">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                    <button class="btn btn-primary" name="tambah">Tambah</button>
                                    </div>
                                </div>

                                


                            </form>
                        
                        </div> <!-- akhir row kiri -->

                        <div class="col-md-7">
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <?php
                                        include "../koneksi.php";
                                        $query = mysqli_query($connect, "SELECT * FROM tb_sementara left join tb_barang on tb_sementara.kode_barang = tb_barang.kode_barang");

                                    ?>

                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>

                                </thead>
                                
                                <tbody>
                                    <?php
                                        while($data = mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['kode_barang']?></td>
                                        <td><?php echo $data['nama_barang']?></td>
                                        <td><?php echo $data['jumlah']?></td>
                                        <td>
                                            <a href="penerimaan/hapus_sementara.php?id=<?php echo $data['id']?>" onclick="return confirm('Yakin akan dihapus?')" class="btn btn-danger" name="hapus"><i class="fa fa-trash-o"></i></a>  
                                        </td>   
                                    </tr>                    
                                    <?php
                                        }
                                    ?>   

                                </tbody>




                            </table>
                        
                        </div>

                    </div>

                </div>
            </div>

        </div>
        

        <div class="form-panel"> <!-- panel bawah -->
            <h4 class="mb"><i class="fa fa-save"></i> Simpan Data Pengiriman</h4>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">

                            <form method="POST" enctype="multipart/form-data" class="form-horizontal style-form">

                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">No Kirim</label>
                                    <div class="col-sm-6">
                                    <input class="form-control" type="text" name="kode_keluar" value="<?php echo $kode_keluar?>" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Departement</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" type="text" name="kode_departement" id="kode_departement" onchange="changeValue(this.value)">

                                        <?php
                                            $tampil = mysqli_query($connect, "SELECT * FROM tb_departement");
                                            while($w=mysqli_fetch_array($tampil)){
                                                echo "<option value=$w[kode_departement] selected>$w[nama_departement]</option>";
                                            }  

                                        ?>
                                        </select>
                                    </div>
                                </div>

                                 

                                <div class="form-group">
                                    <label class="col-sm-3 col-sm-3 control-label">Keterangan</label>
                                    <div class="col-sm-6">
                                    <input class="form-control" type="text" name="keterangan" id="keterangan" required="">
                                    </div>
                                </div>
                                <br><br>


                                <div class="form-group">
                                    <div class="col-sm-5">
                                    <button class="btn btn-primary" name="simpan">Simpan</button>
                                    <a href="?hal=data_pengeluaran" class="btn btn-warning">Kembali</a>
                                    </div>
                                </div>
                                


                            
                        
                        </div> <!-- akhir row kiri -->

                        <div class="col-md-7">

                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label">Penerima</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="penerima" id="penerima" value="<?php echo $_SESSION['nama_admin']?>" readonly>
                                </div>

                            </div>

                            <br><br><br>

                            <?php
                            //hitung jumlah item yg akan disimpan
                             include "../koneksi.php";
                             $item = mysqli_query($connect, "SELECT kode_barang FROM tb_sementara");
                             $jumlah_item = mysqli_num_rows($item);

                            ?> 

                            <div class="form-group">
                                <label class="col-sm-4 col-sm-4 control-label">Jumlah Item Barang</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="jumlah_item" value="<?php echo $jumlah_item?>" readonly>
                                </div>

                            </div>
                            
                        </form>
                        </div>

                    </div>

                </div>
            </div>

        </div>


    </section>
</section>