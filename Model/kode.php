<?php 
    
    function kodeProduk(){
        
        $sql = "SELECT max(kopi_id) as id from kopi";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        $urutan = (int) substr($code,2,3);
        $urutan++;
        $huruf = "KP";
        $code = $huruf.sprintf("%03s",$urutan);
        return $code;
    }

    function kodeTransaksi(){
        
        $sql = "SELECT max(transaksi_id) as id from transaksi";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        $urutan = (int) substr($code,3,3);
        $urutan++;
        $huruf = "TRX";
        $code = $huruf.sprintf("%03s",$urutan);
        return $code;
    }

    function KodePembayaran(){
        
        $sql = "SELECT max(pembayaran_id) as id from pembayaran";
        $query = koneksi()->query($sql);
        $hasil = $query->fetch_array();
        $code = $hasil['id'];
        $urutan = (int) substr($code,3,3);
        $urutan++;
        $huruf = "PMB";
        $code = $huruf.sprintf("%03s",$urutan);
        return $code;
    }

    function formatRupiah($harga)
    {
    $formating = "Rp " . number_format($harga, 2, ',', '.');
    return $formating;
    }
