<?php

class PelangganModel
{
    public function get($id)
    {
        $sql = "SELECT * FROM user where role_id = 'B' AND user_id = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getKopi()
    {
        $sql = "SELECT 
                k.Kopi_id as idKopi,
                k.kopi_nama as namaKopi,
                jp.jenisproduk_nama as jenisKopi,
                k.kopi_harga as hargaKopi,
                k.kopi_keterangan as descKopi,
                k.kopi_gambar as gambarKopi
                from
                kopi as k
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
        $sql = "SELECT 
                k.Kopi_id as idKopi,
                k.kopi_nama as namaKopi,
                jp.jenisproduk_nama as jenisKopi,
                k.kopi_harga as hargaKopi,
                k.kopi_keterangan as descKopi,
                k.kopi_gambar as gambarKopi
                from 
                kopi as k
                JOIN jenis_produk as jp ON (k.jenisproduk_id = jp.jenisproduk_id)
                where kopi_id = '$id'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
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

    public function prosesTransaksiawal($id, $idproduk)
    {
        $kode = kodeTransaksi();
        $sql = "INSERT into transaksi(transaksi_id,pembeli_id,kurir_id,pembayaran_id,admin_id,status_id,transaksi_tgl) 
        Values ('$kode',$id,'','','',0,'null')";
        koneksi()->query($sql);

        $sql = "INSERT into detail_transaksi(kopi_id,transaksi_id,qty) Values('$idproduk','$kode',1)";
        return koneksi()->query($sql);
    }

    public function getidtrx($id)
    {
        $sql = "SELECT transaksi_id from transaksi Where status_id = 0 AND pembeli_id = $id";
        $query = koneksi()->query($sql);
        $idtransaksi = $query->fetch_assoc();
        if (!empty($idtransaksi)) {
            $hasil = $idtransaksi['transaksi_id'];
            return $hasil;
        } else {
            return "DATA KOSONG";
        }
    }

    public function cekDetailDataExist($idpembeli, $idproduk)
    {
        $sql = "SELECT * from detail_transaksi dt
        JOIN transaksi tr
        on tr.transaksi_id = dt.transaksi_id
        where
        AND dt.kopi_id = '$idproduk' 
        AND tr.pembeli_id = $idpembeli 
        AND tr.status_id = 0";
        $query = koneksi()->query($sql);
        return $query;
    }

    public function daftarAkunBank($id)
    {
        $sql = "SELECT
                ab.akunbank_id as id,
                u.user_id as idAkun,
                ab.akunbank_norek as norek,
                ab.akunbank_pemilik as pemilik
                From
                akun_bank as ab
                JOIN user as u ON (ab.user_id = u.user_id)
                where 
                u.user_id =$id";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function prosesStoreAkunBank($id, $norek, $owner)
    {
        $sql = "INSERT into akun_bank(user_id,akunbank_norek,akunbank_pemilik) Values($id, '$norek', '$owner')";
        return koneksi()->query($sql);
    }

    public function prosesDeleteAkunBank($id)
    {
        $sql = "DELETE From akun_bank where akunbank_id = $id";
        return koneksi()->query($sql);
    }


    public function ProsesUpdateProfil($id, $nama, $alamat, $email, $password, $no_telp)
    {
        $sql = "UPDATE user SET user_nama = '$nama',user_alamat = '$alamat',user_email = '$email',user_password = '$password',user_notelp = '$no_telp' Where user_id = $id";
        return koneksi()->query($sql);
    }

    public function daftarTransaksi($id)
    {
        $sql = "SELECT * from transaksi t
                where pembeli_id = $id AND t.status_id > 0";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function getDetailRiwayatTransaksi($idtrx)
    {
        $sql = "SELECT dt.kopi_id,kp.kopi_nama,dt.qty,dt.transaksi_id,
                kp.kopi_harga,jp.jenisproduk_nama FROM detail_transaksi dt 
            JOIN kopi kp on kp.kopi_id = dt.kopi_id 
            JOIN transaksi tr on tr.transaksi_id = dt.transaksi_id
            JOIN jenis_produk jp on jp.jenisproduk_id = kp.jenisproduk_id  
            where dt.transaksi_id = '$idtrx' 
            AND tr.status_id > 0";
        $query = koneksi()->query($sql);
        $cart = [];
        while ($data = $query->fetch_assoc()) {
            $cart[] = $data;
        }
        return $cart;
    }

    public function getUserByTransaksi($idtrx)
    {
        $sql = "SELECT us.user_nama, us.user_alamat, us.user_notelp,
                tr.transaksi_id, tr.transaksi_tgl 
                from transaksi tr
                JOIN user us ON tr.pembeli_id = us.user_id
                Where tr.transaksi_id = '$idtrx'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getCart($id)
    {
        $hasil = $this->getidtrx($id);
        if ($hasil != "DATA KOSONG") {
            $sql = "SELECT dt.kopi_id,kp.kopi_nama,dt.qty,dt.transaksi_id,kp.kopi_harga FROM detail_transaksi dt 
            JOIN kopi kp on kp.kopi_id = dt.kopi_id 
            JOIN transaksi tr on tr.transaksi_id = dt.transaksi_id 
            where dt.transaksi_id = '$hasil' 
            AND tr.pembeli_id = $id
            AND tr.status_id = 0";
            $query = koneksi()->query($sql);
            $cart = [];
            while ($data = $query->fetch_assoc()) {
                $cart[] = $data;
            }
            return $cart;
        }
    }

    public function prosesAddToCart($idproduk, $iduser)
    {

        $kode = $this->getidtrx($iduser);
        $produkExist = $this->getItemByid($kode, $idproduk);
        if (!empty($produkExist)) {
            $produk = $this->getItemQtyCartByid($idproduk, $kode);
            $sql = "UPDATE detail_transaksi SET qty = $produk+1 where transaksi_id ='$kode' AND kopi_id = '$idproduk'";
            return koneksi()->query($sql);
        } else {
            $sql = "INSERT into detail_transaksi(kopi_id,transaksi_id,qty) Values('$idproduk','$kode',1)";
            return koneksi()->query($sql);
        }
    }

    public function prosesDeleteFromCart($id, $idtransaksi)
    {
        $sql = "DELETE FROM detail_transaksi where kopi_id = '$id' AND transaksi_id = '$idtransaksi'";
        koneksi()->query($sql);
    }

    public function prosesSimpanTransaksi($id)
    {
        $tgl = date("Y-m-d H:i:s");
        $kode = KodePembayaran();
        $this->tambahpembayaran($kode, $id);
        $sql = "UPDATE transaksi SET pembayaran_id = '$kode',status_id = 1,transaksi_tgl = '$tgl' where transaksi_id = '$id'";
        return koneksi()->query($sql);
    }

    public function tambahpembayaran($kode, $id)
    {
        $sqlpembayaran = "INSERT into pembayaran(pembayaran_id,transaksi_id) Values('$kode','$id')";
        return koneksi()->query($sqlpembayaran);
    }

    public function cekTrx($id)
    {
        $sql = "SELECT pembeli_id from transaksi where pembeli_id = $id AND status_id = 0";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getItemByid($idtransaksi, $idproduk)
    {
        $sql = "SELECT * From detail_transaksi where transaksi_id = '$idtransaksi' AND kopi_id = '$idproduk'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getItemQtyCartByid($idproduk, $idtransaksi)
    {
        $sql = "SELECT qty from detail_transaksi 
        where transaksi_id = '$idtransaksi' AND kopi_id = '$idproduk'";
        $query = koneksi()->query($sql);
        $item = $query->fetch_assoc();
        if (!empty($item)) {
            $hasil = $item['qty'];
            return $hasil;
        } else {
            return "DATA KOSONG";
        }
    }

    public function getPembayaran($id)
    {
        $sql = "SELECT pembayaran_id, akunbank_id, transaksi_id FROM pembayaran where transaksi_id = '$id'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function getNominalTotalbayar($id)
    {
        $sql = "SELECT SUM(dt.qty*kp.kopi_harga) as total from detail_transaksi dt
                JOIN kopi kp on kp.kopi_id = dt.kopi_id 
                JOIN transaksi tr on tr.transaksi_id = dt.transaksi_id 
                where tr.transaksi_id = '$id'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStorePembayaran($id, $idtrx, $akunbank, $nominal, $bukti, $desc, $kurir)
    {
        $sql = "UPDATE pembayaran SET akunbank_id = $akunbank, pembayaran_nominaltrans = $nominal, 
        pembayaran_buktitransfer = '$bukti', pembayaran_keterangan = '$desc' where pembayaran_id ='$id'";
        $this->prosesUpdatetrxPembayaran($idtrx, $kurir);
        return koneksi()->query($sql);
    }

    public function prosesUpdatetrxPembayaran($id, $kurir)
    {
        $sql = "UPDATE transaksi SET kurir_id = $kurir, status_id = 2 where transaksi_id = '$id'";
        return koneksi()->query($sql);
    }
}
