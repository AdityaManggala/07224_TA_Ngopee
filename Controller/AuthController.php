<?php 

    class AuthController{
        private $model;

        public function __construct()
        {
            $this->model = new AuthModel();
        }

        /** Function index berfungsi untuk mengatur tampilan awal */
        public function index()
        {
            require_once("View/auth/login.php");
        }

        /** Function login_aslab berfungsi untuk mengatur halaman login untuk aslab */
        public function loginadmin()
        {
            require_once("View/auth/loginadmin.php");
        }

        /** Function daftar_praktikan berfungsi untuk mengatur halaman daftar */
        public function registerPelanggan()
        {
            require_once("View/auth/register.php");
        }

        /** Function authAslab berfungsi untuk authentication aslab */
        public function authAdmin()
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = $this->model->prosesAuthAdmin($email,$password);
            if ($data) {
                $_SESSION['role_id']='A';
                $_SESSION['A']=$data;
                header("location: index.php?page=admin&aksi=view&pesan=berhasil login");
            }else{
                header("location: index.php?page=auth&aksi=loginadmin&pesan=password atau npm salah");
            }
        }
        /** Function authPraktikan berfungsi untuk authentication praktikan */
        public function authPelanggan()
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = $this->model->prosesAuthPelanggan($email,$password);
            if ($data) {
                header("location: index.php?page=pelanggan&aksi=view&pesan=berhasil login");
            }else{
                header("location: index.php?page=auth&aksi=login&pesan=password atau npm salah");
            }
        }

        public function logout()
        {
            session_destroy();
            header("location: index.php?page=auth&aksi=view&pesan=berhasil logout!!");
        }
        
        /**
         * proses storePraktikan berfungsi untuk memproses data untuk ditambahkan ke database
         */
        public function storePelanggan()
        {
            $nama = $_POST['nama'];
            $alamat= $_POST['alamat'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $no_telp = $_POST['no_telp'];
            if($this->model->prosesStorePelanggan($nama, $alamat, $email, $password, $no_telp)){
                header("location: index.php?page=auth&aksi=view&pesan=berhasil daftar");
            }else{
                header("location: index.php?page=auth&aksi=registerPelanggan&pesan=gagal daftar");
            }
        }
    }
?>