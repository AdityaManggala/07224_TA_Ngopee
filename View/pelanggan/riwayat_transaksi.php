<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container">
        <div class="page-heading">
            <h3>Riwayat Transaksi</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Transaksi </h4>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="col-2">ID transaksi</th>
                                                <th class="col-3">Tanggal Transaksi</th>
                                                <th class="col-3">Status Transaksi</th>
                                                <th class="col-4">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) : ?>

                                                <?php foreach ($data as $row) : ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?= $row['transaksi_id'] ?></td>
                                                        <td class="text-bold-500"><?= $row['transaksi_tgl'] ?></td>
                                                        <td><?php
                                                            if ($row['status_id'] == 1) { ?>
                                                                <span class="badge bg-danger">Belum Bayar</span>
                                                            <?php } else if ($row['status_id'] == 2) { ?>
                                                                <span class="badge bg-warning">Menunggu Konfirmasi</span>
                                                            <?php } else if ($row['status_id'] == 3) { ?>
                                                                <span class="badge bg-info">Menunggu pengiriman</span>
                                                            <?php } else if ($row['status_id'] == 4) { ?>
                                                                <span class="badge bg-success">Terkirim</span>
                                                            <?php } else if ($row['status_id'] == 5) { ?>
                                                                <span class="badge bg-dark">Dibatalkan Admin</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['status_id'] == 1) : ?>
                                                                <a href="index.php?page=pelanggan&aksi=pembayaran&id=<?= $row['transaksi_id'] ?>" class="btn btn-success">Bayar</a>
                                                            <?php else : ?>
                                                                <a href="index.php?page=pelanggan&aksi=detailTransaksi&id=<?= $row['transaksi_id'] ?>" class="btn btn-warning">Detail</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    Data Kosong
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


</body>

</html>