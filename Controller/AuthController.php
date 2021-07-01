<?php

class AuthController
{
    private $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function index()
    {
        require_once("View/auth/login.php");
    }

    public function loginadmin()
    {
        require_once("View/auth/loginadmin.php");
    }

    public function registerPelanggan()
    {
        require_once("View/auth/register.php");
    }

    public function authAdmin()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAdmin($email, $password);
        if ($data) {
            $_SESSION['role'] = 'A';
            $_SESSION['A'] = $data;
            header("location: index.php?page=admin&aksi=view&pesan=berhasil login");
        } else {
            header("location: index.php?page=auth&aksi=loginadmin&pesan=password atau npm salah");
        }
    }

    public function authPelanggan()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthPelanggan($email, $password);
        if ($data) {
            $_SESSION['role'] = 'B';
            $_SESSION['B'] = $data;
            $_SESSION['status'] = 'OK';
            header("location: index.php?page=pelanggan&aksi=view&pesan=berhasil login");
        } else {
            header("location: index.php?page=auth&aksi=view&pesan=password atau npm salah");
        }
    }

    public function logout()
    {
        session_destroy();
        header("location: index.php?page=auth&aksi=view&pesan=berhasil logout!!");
    }

    public function storePelanggan()
    {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $no_telp = $_POST['no_telp'];
        if ($this->model->prosesStorePelanggan($nama, $alamat, $email, $password, $no_telp)) {
            header("location: index.php?page=auth&aksi=view&pesan=berhasil daftar");
        } else {
            header("location: index.php?page=auth&aksi=registerPelanggan&pesan=gagal daftar");
        }
    }
}
