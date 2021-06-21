<?php

//memanggil helper
require_once "Koneksi.php";
require_once "Model/kode.php";

//memanggil Model
require_once "Model/AdminModel.php";
require_once "Model/AuthModel.php";
require_once "Model/PelangganModel.php";
// require_once("Model/ModulModel.php");
// require_once("Model/PraktikanModel.php");
// require_once("Model/PraktikumModel.php");

// //memanggil Controller
require_once "Controller/AdminController.php";
require_once "Controller/AuthController.php";
require_once "Controller/PelangganController.php";
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
            $auth->index();
        } else if ($aksi == 'loginadmin') {
            $auth->loginadmin();
        } elseif ($aksi == 'registerPelanggan') {
            $auth->registerPelanggan();
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
        } else if ($aksi == 'authPelanggan') {
            $auth->authPelanggan();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else if ($aksi == 'storePelanggan') {
            $auth->storePelanggan();
        } else {
            require_once "View/menu/error-404.php";
        }
    } else if ($page == "admin") {
        $admin = new AdminController();
        require_once "View/menu/menu_admin.php";
        if ($aksi == 'view') {
            $admin->index();
        } else if ($aksi == 'daftarPelanggan') {
            $admin->pelanggan();
        } else if ($aksi == 'hapusPelanggan') {
            $admin->deletePelanggan();
        } else if ($aksi == 'daftarProduk') {
            $admin->produk();
        } else if ($aksi == 'tambahProduk') {
            $admin->storeKopi();
        } else if ($aksi == 'hapusProduk') {
            $admin->deleteKopi();
        } else if ($aksi == 'editProduk') {
            $admin->editKopi();
        } else if ($aksi == 'updateProduk') {
            $admin->updateKopi();
        } else if ($aksi == 'tambahKategori') {
            $admin->storeKategori();
        } else if ($aksi == 'hapusKategori') {
            $admin->deleteKategori();
        } else if ($aksi == 'daftarKurir') {
            $admin->kurir();
        } else if ($aksi == 'tambahKurir') {
            $admin->storeKurir();
        } else if ($aksi == 'hapusKurir') {
            $admin->deleteKurir();
        } else if ($aksi == 'transaksi') {
            require_once "View/admin/transaksi.php";
        } else if ($aksi == 'pembayaran') {
            require_once "View/admin/pembayaran.php";
        } else {
            require_once "View/menu/error-404.php";
        }
    } else if ($page == "pelanggan") {
        $pelanggan = new PelangganController();
        require_once "View/menu/menu_pelanggan.php";
        if ($aksi == 'view') {
            $pelanggan->index();
            // require_once "View/pelanggan/index.php";
        } else if ($aksi == 'editProfil') {
            $pelanggan->edit();
            // require_once "View/pelanggan/profil.php";
        } else if ($aksi == 'updateProfil') {
            $pelanggan->update();
        } else if ($aksi == 'keranjang') {
            require_once "View/pelanggan/keranjang.php";
        } else if ($aksi == 'pembayaran') {
            require_once "View/pelanggan/pembayaran.php";
        } else if ($aksi == 'akunBank') {
            require_once "View/pelanggan/akun_bank.php";
        } else {
            require_once "View/menu/error-404.php";
        }
    } else {
        echo "Page Not Found";
    }
} else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}
