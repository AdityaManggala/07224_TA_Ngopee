<?php 
    Class AdminModel{
        
        public function getKopi()
        {
            $sql = "SELECT k.Kopi_id as idKopi, 
                    k.kopi_nama as namaKopi, 
                    jp.jenisproduk_nama as jenisKopi, 
                    k.kopi_harga as hargaKopi 
                    from kopi as k
                    JOIN jenis_produk as jp ON (k.jenisproduk_id = jp.jenisproduk_id)";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil;
        }

        public function getJenisProduk()
        {
           $sql ="SELECT jenisproduk_id as id, jenisproduk_nama as nama From jenis_produk";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil; 
        }

        public function getKurir()
        {
            $sql="SELECT * FROM Kurir";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil;
        }

        public function getTransaksi()
        {
            $sql = "SELECT t.transaksi_id as 'id transaksi', 
                    p.pembayaran_id as 'id pembayaran',
                    t.transaksi_tgl as 'tgl trx',
                    k.kurir_desc as 'nama kurir', 
                    up.user_nama as 'nama pembeli',
                    ua.user_nama as 'nama admin',
                    t.status_id as 'status'
                    from transaksi as t 
                    JOIN user as up ON (t.pembeli_id = up.user_id) 
                    JOIN kurir as k ON (t.kurir_id = k.kurir_id)
                    JOIN user as ua ON (t.admin_id = ua.user_id)
                    JOIN pembayaran as p ON(t.pembayaran_id = p.pembayaran_id) 
                    JOIN status as s ON(t.status_id = s.status_id)";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil;
        }

        public function getPelanggan()
        {
            $sql = "SELECT user_nama as nama, 
                    user_alamat as alamat, 
                    user_email as email,
                    user_password as password, 
                    user_notelp as nomor 
                    FROM user where role_id = 'B'";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil;
        }

        public function getPembayaran()
        {
        $sql = "SELECT p.pembayaran_id as 'id pembayaran',
                    t.transaksi_id as 'id transaksi',
                    ab.akunbank_norek as 'no rekening',
                    p.pembayaran_nominaltrans as 'nominal transfer',
                    p.pembayaran_buktitransfer as 'bukti transfer',
                    p.pembayaran_keterangan as 'keterangan'
                    from pembayaran as p
                    JOIN transaksi as t ON(p.transaksi_id = t.transaksi_id)
                    JOIN akun_bank as ab ON(p.akunbank_id = ab.akunbank_id)";
            $query = koneksi()->query($sql);
            $hasil = [];
            while ($data = $query->fetch_assoc()) {
                    $hasil[] = $data;
            }
            return $hasil;
        }
    }
//     $tes = new AdminModel();
//     var_dump($tes->getKopi());
//     die();
?>