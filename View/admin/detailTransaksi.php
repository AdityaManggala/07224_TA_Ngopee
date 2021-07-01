<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/printAdmin.css" type="text/css" media="print" />
</head>

<body>
    <!-- <nav class="navbar navbar-light">
        <div class="container d-block">
            <a href="index.html"><i class="bi bi-chevron-left"></i></a>
            <a class="navbar-brand ms-4" href="index.html">
                <img src="assets/images/logo/logo.png">
            </a>
        </div>
    </nav> -->

    <div id="app">
        <div id="main">
            <div class="container">
                <div class="page-heading">
                    <h3>Detail Transaksi</h3>
                </div>
                <div class="page-content">
                    <section class="section">
                        <div class="row" id="table-hover-row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div>
                                            <img src="assets/images/logo/icon.png" width="40" height="40">
                                            <h5>Ngopee</h5>
                                        </div>
                                        <h6 class="float-end"><?= $user['transaksi_tgl'] ?></h6>
                                        <h4 class="card-title mb-5">Invoice : <?= $user['transaksi_id'] ?></h4>
                                        <dl class="row mb-10">
                                            <dt class="col-sm-1">Nama</dt>
                                            <dd class="col-sm-11"><?= $user['user_nama'] ?></dd>
                                            <dt class="col-sm-1">Alamat</dt>
                                            <dd class="col-sm-11"><?= $user['user_alamat'] ?></dd>
                                            <dt class="col-sm-1">Nomor</dt>
                                            <dd class="col-sm-11"><?= $user['user_notelp'] ?></dd>
                                        </dl>

                                        <h4 class="card-highlighted mb-3">Detail Item</h4>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th class="col-5">Nama Item</th>
                                                        <th class="col-3">Jenis Item</th>
                                                        <th class="col-2">Qty</th>
                                                        <th class="col-2">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php foreach ($data as $row) : ?>
                                                        <tr>
                                                            <td class="text-bold-500"><?= $row['kopi_nama'] ?></td>
                                                            <td class="text-bold-500"><?= $row['jenisproduk_nama'] ?></td>
                                                            <td class="text-bold-500"><?= $row['qty'] ?></td>
                                                            <td class="text-bold-500"><?= $row['kopi_harga'] ?></td>
                                                            <!-- <td>
                                                        </td> -->
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <?php if (!empty($data)) : ?>
                                                <div class="alert alert-info">
                                                    TOTAL HARGA =
                                                    <?php
                                                    $harga = 0;
                                                    foreach ($data as $row) {
                                                        $harga += $row['kopi_harga'] * $row['qty'];
                                                    } ?>
                                                    <?= formatRupiah($harga) ?>
                                                <?php else : ?>
                                                <?php endif; ?>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button onclick="window.print();" class=" btn btn-primary me-1 mb-1" id="print-btn">print</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



</body>

</html>