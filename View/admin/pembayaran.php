<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pembayaran</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
</head>

<body>
  <div id="app">
    <div id="main">
      <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <div class="page-title">
          <h3>Pembayaran</h3>
        </div>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Pembayaran</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>ID Pembayaran</th>
                    <th>Nomor Rek.</th>
                    <th>ID Transaksi</th>
                    <th>Nominal Transfer</th>
                    <th>Bukti Transfer</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pembayaran as $row) : ?>
                    <tr>
                      <td><?= $row['id pembayaran'] ?></td>
                      <td><?= $row['no rekening'] ?></td>
                      <td><?= $row['id transaksi'] ?></td>
                      <td><?= $row['nominal transfer'] ?></td>
                      <td><img src="upload/trxupload/<?= $row['bukti transfer'] ?>" alt="<?= $row['bukti transfer'] ?>" width="150" height="100"></td>
                      <td><?php
                          if ($row['status'] == 2) { ?>
                          <span class="badge bg-warning">Menunggu Konfirmasi</span>
                        <?php } else if ($row['status'] == 3) { ?>
                          <span class="badge bg-secondary">Proses pengiriman</span>
                        <?php } else if ($row['status'] == 4) { ?>
                          <span class="badge bg-success">Terkirim</span>
                        <?php } ?>
                      </td>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href="index.php?page=admin&aksi=konfirmasiPembayaran&id=<?= $row['id pembayaran'] ?>" class="btn btn-primary">Konfirmasi</a>
                          <a href="index.php?page=admin&aksi=pembatalanPembayaran&id=<?= $row['id pembayaran'] ?>" class="btn btn-danger">Batalkan</a>
                          <!-- <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-warning">Detail</a> -->
                          <!-- <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-danger">Hapus</a> -->
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/pages/dashboard.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
  <script>
    // Simple Datatable
    let table1 = document.querySelector("#table1");
    let dataTable = new simpleDatatables.DataTable(table1);
  </script>
</body>

</html>