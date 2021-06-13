<?php

//memanggil helper
require_once("Koneksi.php");

//memanggil Model
require_once("Model/AdminModel.php");
require_once("Model/AuthModel.php");
// require_once("Model/DaftarPrakModel.php");
// require_once("Model/ModulModel.php");
// require_once("Model/PraktikanModel.php");
// require_once("Model/PraktikumModel.php");

// //memanggil Controller
require_once("Controller/AdminController.php");
require_once("Controller/AuthController.php");
// require_once("Controller/DaftarprakController.php");
// require_once("Controller/ModulController.php");
// require_once("Controller/PraktikanController.php");
// require_once("Controller/PraktikumController.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page

    // require_once akan Dirubah Saat Modul 2
    if ($page == "auth") {
        $auth = new AuthController();
        if ($aksi == 'view') {
            // require_once("View/auth/login.php");
            $auth->index();
        } else if ($aksi == 'loginadmin') {
            // require_once("View/auth/loginadmin.php");
            $auth->loginadmin();
        }elseif ($aksi == 'registerPelanggan') {
            // require_once("View/auth/register.php");
            $auth->registerPelanggan();
        }else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
            // require_once("View/menu/menu_admin.php");
            // require_once("View/admin/index.php");
        } else if ($aksi == 'authPelanggan') {
            // require_once("View/menu/menu_pelanggan.php");
            // require_once("View/pelanggan/index.php");
            $auth->authPelanggan();
        } else if ($aksi == 'logout') {
            // require_once("View/auth/login.php");
            $auth->logout();
        } else if ($aksi == 'storePelanggan') {
            // require_once("View/auth/login.php");
            $auth->storePelanggan();
        } else {
            require_once("View/menu/error-404.php");
        }
    } else if ($page == "admin") {
        $admin = new AdminController();
        require_once("View/menu/menu_admin.php");
        if ($aksi == 'view') {
            // require_once("View/admin/index.php");
            $admin->index();
        } else if ($aksi == 'daftarPelanggan') {
            // require_once("View/admin/daftarPelanggan.php");
            $admin->pelanggan();
        } else if ($aksi == 'daftarProduk') {
            // require_once("View/admin/daftarProduk.php");
            $admin->produk();
        } else if ($aksi == 'kurir') {
            require_once("View/admin/kurir.php");
        } else if ($aksi == 'transaksi') {
            require_once("View/admin/transaksi.php");
        } else if ($aksi == 'pembayaran') {
            require_once("View/admin/pembayaran.php");
        }else {
            require_once("View/menu/error-404.php");
        }
    } else if ($page == "pelanggan") {
        require_once("View/menu/menu_pelanggan.php");
        if ($aksi == 'view') {
            require_once("View/pelanggan/index.php"); 
        } else if ($aksi == 'editProfil') {
            require_once("View/pelanggan/profil.php");
        } else if ($aksi == 'keranjang') {
            require_once("View/pelanggan/keranjang.php");
        } else if ($aksi == 'pembayaran') {
            require_once("View/pelanggan/pembayaran.php");
        } else if ($aksi == 'akunBank') {
            require_once("View/pelanggan/akun_bank.php");
        } else {
            require_once("View/menu/error-404.php");
        }
    } else {
        echo "Page Not Found";
    }
} else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}
