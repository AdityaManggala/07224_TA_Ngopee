<?php

//memanggil helper
require_once "Koneksi.php";
require_once "Model/kode.php";

//memanggil Model
require_once "Model/AdminModel.php";
require_once "Model/AuthModel.php";
require_once "Model/PelangganModel.php";

// //memanggil Controller
require_once "Controller/AdminController.php";
require_once "Controller/AuthController.php";
require_once "Controller/PelangganController.php";

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
        if ($_SESSION['role'] == 'A') {
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
                $admin->transaksi();
            } else if ($aksi == 'kirimTransaksi') {
                $admin->kirimtransaksi();
            } else if ($aksi == 'pembayaran') {
                $admin->pembayaran();
            } else if ($aksi == 'konfirmasiPembayaran') {
                $admin->konfirmasiPembayaran();
            } else if ($aksi == 'pembatalanPembayaran') {
                $admin->batalkanPembayaran();
            } else {
                require_once "View/menu/error-404.php";
            }
        } else {
            header("location: index.php?page=auth&aksi=loginadmin");
        }
    } else if ($page == "pelanggan") {
        $pelanggan = new PelangganController();
        require_once "View/menu/menu_pelanggan.php";
        if ($_SESSION['role'] == 'B') {
            if ($aksi == 'view') {
                $pelanggan->index();
            } else if ($aksi == 'getKopiByid') {
                $pelanggan->getDataKopiById();
            } else if ($aksi == 'editProfil') {
                $pelanggan->edit();
            } else if ($aksi == 'updateProfil') {
                $pelanggan->update();
            } else if ($aksi == 'akunBank') {
                $pelanggan->akunBank();
            } else if ($aksi == 'tambahAkunBank') {
                $pelanggan->storeAkunBank();
            } else if ($aksi == 'hapusAkunBank') {
                $pelanggan->DeleteAkunBank();
            } else if ($aksi == 'keranjang') {
                $pelanggan->keranjang();
            } else if ($aksi == 'tambahKeranjang') {
                $pelanggan->inputKeranjang();
            } else if ($aksi == 'hapusKeranjang') {
                $pelanggan->deleteKeranjang();
            } else if ($aksi == 'simpanTransaksi') {
                $pelanggan->simpanTransaksi();
            } else if ($aksi == 'riwayatTransaksi') {
                $pelanggan->riwayatTransaksi();
            } else if ($aksi == 'pembayaran') {
                $pelanggan->pembayaran();
            } else if ($aksi == 'storePembayaran') {
                $pelanggan->storePembayaran();
            } else {
                require_once "View/menu/error-404.php";
            }
        } else {
            header("location: index.php?page=auth&aksi=view");
        }
    }
} else {
    header("location: index.php?page=auth&aksi=view"); //Jangan ada spasi habis location
}
