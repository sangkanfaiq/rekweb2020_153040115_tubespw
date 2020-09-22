<section id="main-content">
    <section class="wrapper">
        <div class="col-md-6">
            <div class="form-panel">
                <h3><i class="fa fa-file-o"></i> Laporan Penerimaan Barang</h3>
                <form method="POST" action="laporan/laporan_pengiriman.php">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" name="tgl-awal">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tgl-akhir">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary" name="cetak_pengiriman"><i class="fa fa-print" style="padding:7px 7px"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</section>