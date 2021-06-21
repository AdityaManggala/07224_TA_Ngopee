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


    public function daftarTransaksi($id)
    {
        $sql = "SELECT 
                t.transaksi_id as 'id transaksi',
                p.pembayaran_id as 'id pembayaran',
                t.transaksi_tgl as 'tgl trx',
                k.kurir_desc as 'nama kurir',
                up.user_nama as 'nama pembeli',
                ua.user_nama as 'nama admin',
                t.status_id as 'status'
                from
                transaksi as t
                JOIN user as up ON (t.pembeli_id = up.user_id)
                JOIN kurir as k ON (t.kurir_id = k.kurir_id)
                JOIN user as ua ON (t.admin_id = ua.user_id)
                JOIN pembayaran as p ON(t.pembayaran_id = p.pembayaran_id)
                JOIN status as s ON(t.status_id = s.status_id)
                where 
                t.pembeli_id = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesTransaksi()
    {
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
                idAkun =$id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesStoreAkunBank($id, $norek, $owner)
    {
        $sql = "INSERT into akun_bank(user_id,akunbank_norek,akunbank_pemilik) Values($id, $norek, $owner)";
        return koneksi()->query($sql);
    }

    public function prosesDeleteAkunBank($id)
    {
        $sql = "DELETE From akun_bank where akunbank_id = $id";
        return koneksi()->query($sql);
    }


    public function ProsesUpdate($id, $nama, $alamat, $email, $password, $no_telp)
    {
        $sql = "UPDATE user SET user_nama = '$nama',user_alamat = '$alamat',user_email = '$email',user_password = '$password',user_notelp = '$no_telp' Where user_id = $id";
        return koneksi()->query($sql);
    }
}
