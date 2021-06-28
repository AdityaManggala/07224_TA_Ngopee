<?php
class AdminModel
{

        public function getKopi()
        {
                $sql = "SELECT k.Kopi_id as idKopi,
                        k.kopi_nama as namaKopi,
                        jp.jenisproduk_nama as jenisKopi,
                        k.kopi_harga as hargaKopi,
                        k.kopi_keterangan as descKopi,
                        k.kopi_gambar as gambarKopi
                        from kopi as k
                        JOIN jenis_produk as jp ON (k.jenisproduk_id = jp.jenisproduk_id)";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function getKopiById($id)
        {
                $sql = "SELECT k.Kopi_id as idKopi,
                        k.kopi_nama as namaKopi,
                        jp.jenisproduk_nama as jenisKopi,
                        k.kopi_harga as hargaKopi,
                        k.kopi_keterangan as descKopi,
                        k.kopi_gambar as gambarKopi
                        from kopi as k
                        JOIN jenis_produk as jp ON (k.jenisproduk_id = jp.jenisproduk_id)
                        Where k.kopi_id = '$id'";
                $query = koneksi()->query($sql);
                return $query->fetch_assoc();
        }

        public function prosesStoreKopi($jenis, $nama, $harga, $gambar, $deskripsi)
        {
                $id = kodeProduk();
                $sql = "INSERT INTO kopi(kopi_id,jenisproduk_id,kopi_nama,kopi_harga,kopi_gambar,kopi_keterangan)
                Values ('$id',$jenis,'$nama',$harga,'$gambar','$deskripsi')";
                return koneksi()->query($sql);
        }

        public function getGambarKopi($id)
        {
                $sql = "SELECT kopi_gambar from kopi where kopi_id like '$id'";
                $query = koneksi()->query($sql);
                return $query->fetch_assoc();
        }

        public function ProsesUpdateKopi($id, $nama, $jenisproduk, $harga, $namaFile, $desc)
        {
                $sql = "UPDATE kopi SET Kopi_nama = '$nama',jenisproduk_id = $jenisproduk, kopi_harga = $harga, kopi_gambar = '$namaFile', kopi_keterangan = '$desc' where kopi_id LIKE '$id' ";
                return koneksi()->query($sql);
        }

        public function prosesDeleteKopi($id)
        {
                $sql = "DELETE from kopi where kopi_id = '$id'";
                return koneksi()->query($sql);
        }

        public function getJenisProduk()
        {
                $sql = "SELECT jenisproduk_id as id, jenisproduk_nama as nama From jenis_produk";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesStoreKategori($nama)
        {
                $sql = "INSERT into jenis_produk(jenisproduk_nama) value ('$nama')";
                return koneksi()->query($sql);
        }

        public function prosesDeleteKategori($id)
        {
                $sql = "DELETE from jenis_produk where jenisproduk_id = $id";
                return koneksi()->query($sql);
        }

        public function getTransaksi()
        {
                $sql = "SELECT t.transaksi_id as 'id transaksi',
                        t.pembayaran_id as 'id pembayaran',
                        t.transaksi_tgl as 'tgl trx',
                        k.kurir_desc as 'nama kurir',
                        up.user_nama as 'nama pembeli',
                        ua.user_nama as 'nama admin',
                        t.status_id as 'status'
                        from transaksi as t
                        JOIN user up ON t.pembeli_id = up.user_id
                        JOIN kurir k ON t.kurir_id = k.kurir_id
                        JOIN user ua ON t.admin_id = ua.user_id
                        where t.status_id > 2 AND t.status_id <5";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesKirimTransaksi($id)
        {
                $sql = "UPDATE transaksi SET status_id = 4 where transaksi_id = '$id'";
                return koneksi()->query($sql);
        }

        public function getPelanggan()
        {
                $sql = "SELECT user_nama as nama,
                        user_id as id,
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

        public function prosesdeletePelanggan($id)
        {
                $sql = "DELETE from user where user_id =$id";
                return koneksi()->query($sql);
        }

        public function getPembayaran()
        {
                $sql = "SELECT p.pembayaran_id as 'id pembayaran', 
                        p.transaksi_id as 'id transaksi', 
                        ab.akunbank_norek as 'no rekening', 
                        p.pembayaran_nominaltrans as 'nominal transfer', 
                        p.pembayaran_buktitransfer as 'bukti transfer', 
                        p.pembayaran_keterangan as 'keterangan', 
                        t.status_id as status 
                        from pembayaran p 
                        JOIN transaksi t ON(p.transaksi_id = t.transaksi_id) 
                        JOIN akun_bank ab ON(p.akunbank_id = ab.akunbank_id)
                        where t.status_id = 2";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesKonfirmasiPembayaran($id, $idAdmin)
        {
                $sql = "UPDATE transaksi SET status_id = 3, admin_id = $idAdmin where pembayaran_id = '$id'";
                return koneksi()->query($sql);
        }

        public function prosespembatalanPembayaran($id)
        {
                $sql = "UPDATE transaksi SET status_id = 5 where pembayaran_id = '$id'";
                return koneksi()->query($sql);
        }

        public function getKurir()
        {
                $sql = "SELECT * FROM Kurir";
                $query = koneksi()->query($sql);
                $hasil = [];
                while ($data = $query->fetch_assoc()) {
                        $hasil[] = $data;
                }
                return $hasil;
        }

        public function prosesStoreKurir($nama)
        {
                $sql = "INSERT into kurir(kurir_desc) value ('$nama')";
                return koneksi()->query($sql);
        }

        public function prosesDeleteKurir($id)
        {
                $sql = "DELETE from kurir where kurir_id = $id";
                return koneksi()->query($sql);
        }
}
// $tes = new AdminModel();
// var_export($tes->prosesKonfirmasiPembayaran('PMB001'));
// die();
