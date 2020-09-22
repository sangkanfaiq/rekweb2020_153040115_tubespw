<?php
    if($_GET['hal'] == 'beranda') {
        include "beranda.php";
    
    } else if($_GET['hal'] == 'home' ) {
        include "home.php";

    } else if($_GET['hal'] == 'data_kategori') {
        include "data_kategori/data_kategori.php";

    } else if($_GET['hal'] == 'tambah_kategori') {
        include "data_kategori/tambah_kategori.php";
        
    } else if($_GET['hal'] == 'ubah_kategori') {
        include "data_kategori/ubah_kategori.php";
        
    } else if($_GET['hal'] == 'data_barang') {
        include "data_barang/data_barang.php";
        
    } else if($_GET['hal'] == 'tambah_barang') {
        include "data_barang/tambah_barang.php";
        
    } else if($_GET['hal'] == 'ubah_barang') {
        include "data_barang/ubah_barang.php";
        
    } else if($_GET['hal'] == 'data_admin') {
        include "data_admin/data_admin.php";
        
    } else if($_GET['hal'] == 'tambah_admin') {
        include "data_admin/tambah_admin.php";
        
    } else if($_GET['hal'] == 'ubah_admin') {
        include "data_admin/ubah_admin.php";
        
    } else if($_GET['hal'] == 'data_departement') {
        include "data_departement/data_departement.php";
        
    } else if($_GET['hal'] == 'tambah_departement') {
        include "data_departement/tambah_departement.php";
        
    } else if($_GET['hal'] == 'ubah_departement') {
        include "data_departement/ubah_departement.php";
        
    } else if($_GET['hal'] == 'data_produksi') {
        include "data_produksi/data_produksi.php";
        
    } else if($_GET['hal'] == 'tambah_produksi') {
        include "data_produksi/tambah_produksi.php";
        
    } else if($_GET['hal'] == 'ubah_produksi') {
        include "data_produksi/ubah_produksi.php";
        
    } else if($_GET['hal'] == 'data_penerimaan') {
        include "penerimaan/data_penerimaan.php";
        
    } else if($_GET['hal'] == 'tambah_penerimaan') {
        include "penerimaan/tambah_penerimaan.php";
        
    } else if($_GET['hal'] == 'detail_penerimaan') {
        include "penerimaan/detail_penerimaan.php";
        
    } else if($_GET['hal'] == 'data_pengeluaran') {
        include "pengeluaran/data_pengeluaran.php";
        
    } else if($_GET['hal'] == 'tambah_pengeluaran') {
        include "pengeluaran/tambah_pengeluaran.php";
        
    } else if($_GET['hal'] == 'detail_pengeluaran') {
        include "pengeluaran/detail_pengeluaran.php";
        
    } else if($_GET['hal'] == 'laporan_transaksi') {
        include "laporan/laporan_transaksi.php";
        
    }

?>