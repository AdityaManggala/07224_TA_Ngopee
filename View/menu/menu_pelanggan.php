<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"> -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.ico" type="image/x-icon">
</head>

<body>
    <div id="app">
        <!-- <div id="main" class="container">/>class='layout-navbar'/> -->
        <div class="container">
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <a class="navbar-brand" href="index.php?page=pelanggan&aksi=view">
                        <img src="assets/images/logo/icon.png">
                        <h5>Ngopee</h5>
                    </a>
                    <!-- <div class="container-fluid"> -->

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown me-3">
                                <a class="nav-link active" href="index.php?page=pelanggan&aksi=keranjang" data-bs-toggle="#" aria-expanded="false">
                                    <i class='bi bi-cart bi-sub fs-4 text-gray-600'></i>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-menu d-flex">
                                    <div class="user-name text-end me-3">
                                        <h6 class="mb-0 text-gray-600"><?= $_SESSION['B']['user_nama'] ?></h6>
                                        <p class="mb-0 text-sm text-gray-600">Member</p>
                                    </div>
                                    <div class="user-img d-flex align-items-center">
                                        <div class="avatar avatar-md">
                                            <img src="assets/images/faces/1.jpg">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <h6 class="dropdown-header">Hello, <?= $_SESSION['B']['user_nama'] ?></h6>
                                </li>
                                <li><a class="dropdown-item" href="index.php?page=pelanggan&aksi=editProfil"><i class="icon-mid bi bi-person me-2"></i> Edit
                                        Profil</a></li>
                                <li><a class="dropdown-item" href="index.php?page=pelanggan&aksi=akunBank"><i class="icon-mid bi bi-wallet me-2"></i>
                                        Akun Bank</a></li>
                                <li>
                                <li><a class="dropdown-item" href="index.php?page=pelanggan&aksi=riwayatTransaksi"><i class="icon-mid bi bi-bag-check me-2"></i>
                                        Riwayat Transaksi</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?page=auth&aksi=view"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- </div> -->
                </nav>
            </header>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>