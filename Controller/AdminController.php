<?php
    class AdminController{
        private $model;

        public function __construct()
        {
            $this->model = new AdminModel();
        }
        
        public function index()
        {
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

        public function pelanggan()
        {
            $pelanggan = $this->model->getPelanggan();
            extract($pelanggan);
            require_once("View/admin/daftarPelanggan.php");
        }
        
    }
// $tes = new AdminController();
// var_dump($tes->produk());
// die();