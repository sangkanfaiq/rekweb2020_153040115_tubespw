<?php
    include "../koneksi.php";

    $departement = mysqli_query($connect,"SELECT nama_departement, SUM(jumlah_barang) As total FROM tb_penerimaan left join tb_detail_penerimaan on tb_penerimaan.kode_terima = tb_detail_penerimaan.kode_terima left join tb_departement on tb_penerimaan.kode_departement = tb_departement.kode_departement GROUP BY nama_departement");
?>


<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>GRAFIK PENGIRIMAN BARANG</h3>
            </div>
            <div class="custom-bar-chart">
              <ul class="y-axis">


              </ul>
              <?php
                while($data = mysqli_fetch_array($departement)) {
              ?>
              
              <div class="bar">
                <div class="title"><?php echo $data['nama_departement']?></div>
                <div class="value tooltips" data-original-title="<?php echo $data['total']?>" data-toggle="tooltip" data-placement="top"><?php echo $data['total'] * (10/100)?></div>
              </div>
              <?php
                }
              ?>
              
            </div>
            <!--custom chart end-->
        </div>   
      </section>
    </section>