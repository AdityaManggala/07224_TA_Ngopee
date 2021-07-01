<?php
class AdminController
{
    private $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }

    public function index()
    {
        $jumlahmenu = $this->model->jumlahMenu();
        extract($jumlahmenu);
        $jumlahkategori = $this->model->jumlahKategori();
        extract($jumlahkategori);
        $success = $this->model->jumlahTransaksiSelesai();
        extract($success);
        $proses = $this->model->jumlahTransaksiproses();
        extract($proses);
        $pelanggan = $this->model->jumlahPelanggan();
        extract($pelanggan);
        require_once("View/admin/index.php");
    }

    public function produk()
    {
        $kopi = $this->model->getKopi();
        $jenis = $this->model->getJenisProduk();
        extract($jenis);
        extract($kopi);
        require_once("View/admin/daftarProduk.php");
    }

    public function storeKopi()
    {
        $nama = $_POST['nama'];
        $jenisproduk = $_POST['jenisproduk'];
        $harga = $_POST['harga'];
        $gambar = $_FILES['image']['tmp_name'];
        $lokasi = __DIR__ . '/../upload/';
        $namaFile = $nama . ".jpg";
        $deskripsi = $_POST['desc'];

        //move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../upload/' . $namaFile);
        if (move_uploaded_file($gambar, $lokasi . $namaFile)) {
            $query = $this->model->prosesStoreKopi($jenisproduk, $nama, $harga, $namaFile, $deskripsi);
            if ($query) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil daftar");
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal daftar");
            }
        } else {
            // echo ;
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal upload");
        }
    }

    public function deleteKopi()
    {
        $id = $_GET['id'];
        $getgambar = $this->model->getGambarKopi($id);
        $data = $getgambar['kopi_gambar'];
        $lokasi = __DIR__ . '/../upload/';
        if (file_exists($lokasi . $data)) {
            unlink($lokasi . $data);
            if ($this->model->prosesDeleteKopi($id)) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil hapus kopi");
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal hapus");
            }
        }
    }

    public function editKopi()
    {
        $id = $_GET['id'];
        $data = $this->model->getKopiById($id);
        $jenis = $this->model->getJenisProduk();
        extract($data);
        extract($jenis);
        require_once("View/admin/editProduk.php");
    }

    public function updateKopi()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenisproduk = $_POST['jenisproduk'];
        $harga = $_POST['harga'];
        $desc = $_POST['desc'];
        $namagambar = $_FILES['image']['name'];
        $getgambar = $_POST['namafoto'];
        $namaFile = $nama . ".jpg";
        $lokasi = __DIR__ . '/../upload/';
        if (isset($namagambar)) {

            $gambar = $_FILES['image']['tmp_name'];

            if (file_exists($lokasi . $getgambar)) {
                unlink($lokasi . $getgambar);
                if (move_uploaded_file($gambar, $lokasi . $namaFile)) {
                    if ($this->model->prosesUpdateKopi($id, $nama, $jenisproduk, $harga, $namaFile, $desc)) {
                        header("location: index.php?page=admin&aksi=daftarProduk&pesan=Berhasil Ubah Data");
                    } else {
                        unlink($lokasi . $namaFile);
                        header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Ubah Data");
                    }
                } else {
                    header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Upload Gambar");
                }
            } else {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Menghapus Gambar lama");
            }
        } else {
            $namaFile = $getgambar;
            if ($this->model->prosesUpdateKopi($id, $nama, $jenisproduk, $harga, $namaFile, $desc)) {
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Berhasil Ubah Data&id");
            } else {
                unlink($lokasi . $namaFile);
                header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal Ubah Data");
            }
        }
    }



    public function storeKategori()
    {
        $nama = $_POST['nama'];
        if ($this->model->prosesStoreKategori($nama)) {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil daftar");
        } else {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=gagal daftar");
        }
    }

    public function deleteKategori()
    {
        $id = $_GET['id'];
        if ($this->model->prosesDeleteKategori($id)) {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=berhasil hapus jenis produk");
        } else {
            header("location: index.php?page=admin&aksi=daftarProduk&pesan=Gagal hapus jenis produk");
        }
    }

    public function pelanggan()
    {
        $pelanggan = $this->model->getPelanggan();
        extract($pelanggan);
        require_once("View/admin/daftarPelanggan.php");
    }

    public function deletePelanggan()
    {
        $id = $_GET['id'];
        if ($this->model->prosesdeletePelanggan($id)) {
            header("location: index.php?page=admin&aksi=daftarPelanggan&pesan=berhasilhapus");
        } else {
            header("location: index.php?page=admin&aksi=daftarPelanggan&pesan=Gagalhapus");
        }
    }

    public function transaksi()
    {
        $data = $this->model->getTransaksi();
        extract($data);
        require_once("View/admin/transaksi.php");
    }

    public function kirimtransaksi()
    {
        $id = $_GET['id'];
        if ($this->model->prosesKirimTransaksi($id)) {
            header("location: index.php?page=admin&aksi=transaksi&pesan=berhasilkirim");
        } else {
            header("location: index.php?page=admin&aksi=transaksi&pesan=Gagalkirim");
        }
    }

    public function pembayaran()
    {
        $pembayaran = $this->model->getPembayaran();
        extract($pembayaran);
        require_once("View/admin/pembayaran.php");
    }

    public function konfirmasiPembayaran()
    {
        $idAdmin = $_SESSION['A']['user_id'];
        $id = $_GET['id'];
        if ($this->model->prosesKonfirmasiPembayaran($id, $idAdmin)) {
            header("location: index.php?page=admin&aksi=pembayaran&pesan=Berhasil konfirmasi");
        } else {
            header("location: index.php?page=admin&aksi=pembayaran&pesan=Gagal konfirmasi");
        }
    }

    public function batalkanPembayaran()
    {
        $id = $_GET['id'];
        if ($this->model->prosesPembatalanPembayaran($id)) {
            header("location: index.php?page=admin&aksi=pembayaran&pesan=Berhasil dibatalkan");
        } else {
            header("location: index.php?page=admin&aksi=pembayaran&pesan=Gagal dibatalkan");
        }
    }

    public function kurir()
    {
        $kurir = $this->model->getKurir();
        extract($kurir);
        require_once("View/admin/kurir.php");
    }

    public function storeKurir()
    {
        $nama = $_POST['nama'];
        if ($this->model->prosesStoreKurir($nama)) {
            header("location: index.php?page=admin&aksi=daftarKurir&pesan=berhasil daftar");
        } else {
            header("location: index.php?page=admin&aksi=daftarKurir&pesan=gagal daftar");
        }
    }

    public function deleteKurir()
    {
        $id = $_GET['id'];
        if ($this->model->prosesDeleteKurir($id)) {
            header("location: index.php?page=admin&aksi=daftarKurir&pesan=berhasil hapus");
        } else {
            header("location: index.php?page=admin&aksi=daftarKurir&pesan=Gagal hapus");
        }
    }

    public function detailTransaksi()
    {
        $id = $_GET['id'];
        $data = $this->model->getDetailRiwayatTransaksi($id);
        extract($data);
        $user = $this->model->getUserByTransaksi($id);
        extract($user);
        require_once("View/admin/detailTransaksi.php");
    }
}
