<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <!-- <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.ico" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo ms-3">
                            <a href="#"><img src="assets/images/logo/kopa.png" alt="Logo"><h5>ngopee.</h5></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Hai, Admin</li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=view" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=daftarPelanggan" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Pelanggan</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=daftarProduk" class='sidebar-link'>
                                <i class="bi bi-cup-fill"></i>
                                <span>Produk</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=transaksi" class='sidebar-link'>
                                <i class="bi bi-cash"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=pembayaran" class='sidebar-link'>
                                <i class="bi bi-credit-card-2-back-fill"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=admin&aksi=kurir" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>Kurir</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="index.php?page=auth&aksi=logout" class='sidebar-link'>
                                <i class="bi bi-door-closed"></i>
                                <span>logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>