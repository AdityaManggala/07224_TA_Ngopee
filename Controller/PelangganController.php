<?php
class PelangganController
{
    private $model;

    public function __construct()
    {
        $this->model = new PelangganModel();
    }

    public function index()
    {
        $kopi = $this->model->getKopi();
        extract($kopi);
        require_once("View/pelanggan/index.php");
    }

    public function getDataKopiById()
    {
        $id = $_GET['id'];
        $kopibyid = $this->model->getKopiById($id);
        extract($kopibyid);
        require_once("View/pelanggan/index.php");
    }
    public function edit()
    {
        $id = $_SESSION['B']['user_id'];
        $data = $this->model->get($id);
        extract($data);
        require_once("View/pelanggan/profil.php");
    }

    public function update()
    {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $no_telp = $_POST['notelp'];
        if ($this->model->ProsesUpdateProfil($id, $nama, $alamat, $email, $password, $no_telp)) {
            header("location: index.php?page=pelanggan&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=pelanggan&aksi=edit&pesan=Gagal Ubah Data");
        }
    }

    public function akunBank()
    {
        $id = $_SESSION['B']['user_id'];
        $data = $this->model->daftarAkunBank($id);
        extract($data);
        require_once("View/pelanggan/akun_bank.php");
    }

    public function storeAkunBank()
    {
        $id = $_SESSION['B']['user_id'];
        $norek = $_POST['norek'];
        $owner = $_POST['owner'];
        if ($this->model->prosesStoreAkunBank($id, $norek, $owner)) {
            header("location: index.php?page=pelanggan&aksi=akunBank&pesan=berhasil menambah akun bank");
        } else {
            header("location: index.php?page=pelanggan&aksi=akunBank&pesan=gagal menambah akun bank");
        }
    }

    public function DeleteAkunBank()
    {
        $id = $_GET['id'];
        if ($this->model->prosesDeleteAkunBank($id)) {
            header("location: index.php?page=pelanggan&aksi=akunBank&pesan=berhasil Hapus akun bank");
        } else {
            header("location: index.php?page=pelanggan&aksi=akunBank&pesan=gagal Hapus akun bank");
        }
    }

    public function keranjang()
    {
        $id = $_SESSION['B']['user_id'];
        $data = $this->model->getCart($id);
        if (!empty($data)) {
            extract($data);
        }
        require_once("View/pelanggan/keranjang.php");
    }

    public function inputKeranjang()
    {
        $id = $_GET['id'];
        $idpembeli = $_SESSION['B']['user_id'];
        // echo $idpembeli;
        // die();
        if (empty($this->model->cekTrx($idpembeli))) {
            // echo "tes";
            // die();
            $this->model->prosesTransaksiawal($idpembeli, $id);
        } else {
            // echo "tesa";
            // die();
            if (empty($this->model->cekDetailDataExist($idpembeli, $id))) {
                $this->model->prosesAddToCart($id, $idpembeli);
            }
        }
        header("location: index.php?page=pelanggan&aksi=view");
    }

    public function deleteKeranjang()
    {
        $id = $_GET['id'];
        $idtrx = $_GET['idtrx'];
        $this->model->prosesDeleteFromCart($id, $idtrx);
        header("location: index.php?page=pelanggan&aksi=keranjang");
    }

    public function simpanTransaksi()
    {
        $id = $_GET['idtrx'];
        if ($this->model->prosesSimpanTransaksi($id)) {
            header("location: index.php?page=pelanggan&aksi=riwayatTransaksi&pesan=berhasil simpan transaksi");
        } else {
            header("location: index.php?page=pelanggan&aksi=keranjang&pesan=gagal");
        }
    }

    public function riwayatTransaksi()
    {
        $id = $_SESSION['B']['user_id'];
        $data = $this->model->daftarTransaksi($id);
        extract($data);
        require_once("View/pelanggan/riwayat_transaksi.php");
    }

    public function pembayaran()
    {
        $id = $_GET['id'];
        $akunbank = $_SESSION['B']['user_id'];
        $bank = $this->model->daftarAkunBank($akunbank);
        $data = $this->model->getPembayaran($id);
        $nominal = $this->model->getNominalTotalbayar($id);
        $kurir = $this->model->getKurir();
        extract($data);
        extract($bank);
        extract($nominal);
        extract($kurir);
        require_once("View/pelanggan/pembayaran.php");
    }

    public function storePembayaran()
    {
        $idtrx = $_POST['idtrx'];
        $id = $_POST['idpmb'];
        $akunbank = $_POST['akunbank'];
        $nominal = $_POST['nominal'];
        $gambar = $_FILES['image']['tmp_name'];
        $kurir = $_POST['kurir'];
        $bukti = $idtrx . ".jpg";
        $lokasigambar = __DIR__ . '/../upload/trxupload/';
        $desc = $_POST['desc'];

        if (move_uploaded_file($gambar, $lokasigambar . $bukti)) {
            $query = $this->model->prosesStorePembayaran($id, $idtrx, $akunbank, $nominal, $bukti, $desc, $kurir);
            if ($query) {
                header("location: index.php?page=pelanggan&aksi=view&pesan=pembayaran berhasil");
            } else {
                header("location: index.php?page=pelanggan&aksi=r   iwayatTransaksi&pesan=pembayaran gagal");
            }
        } else {
            header("location: index.php?page=pelanggan&aksi=riwayatTransaksi&pesan=gagal upload");
        }
    }

    public function detailRiwayatTransaksi()
    {
        $id = $_GET['id'];
        $data = $this->model->getDetailRiwayatTransaksi($id);
        extract($data);
        $user = $this->model->getUserByTransaksi($id);
        extract($user);
        require_once("View/pelanggan/detail_transaksi.php");
    }
}
