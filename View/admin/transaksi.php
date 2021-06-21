<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transaksi</title>

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
          <h3>Transaksi</h3>
        </div>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Data Transaksi</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped" id="table1">
                <thead>
                  <tr>
                    <th>ID Transaksi</th>
                    <th>ID Pembayaran</th>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Sales</th>
                    <th>Layanan Kurir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>TRX001</td>
                    <td>PMB001</td>
                    <td>2021-06-06</td>
                    <td>Graiden</td>
                    <td>Sujiman</td>
                    <td>JNE</td>
                    <td>
                      <span class="badge bg-success">Telah dikirim</span>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-primary">Kirim</a>
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-warning">Detail</a>
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-danger">Hapus</a>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>TRX002</td>
                    <td>PMB002</td>
                    <td>2021-06-07</td>
                    <td>Gaden</td>
                    <td>Sukijan</td>
                    <td>JNE</td>
                    <td>
                      <span class="badge bg-warning">Menunggu pengiriman</span>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-primary">Kirim</a>
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-warning">Detail</a>
                        <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-danger">Hapus</a>
                      </div>
                    </td>
                  </tr>
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