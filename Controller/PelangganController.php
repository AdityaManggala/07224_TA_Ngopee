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
        if ($this->model->ProsesUpdate($id, $nama, $alamat, $email, $password, $no_telp)) {
            header("location: index.php?page=pelanggan&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=pelanggan&aksi=edit&pesan=Gagal Ubah Data");
        }
    }
}
