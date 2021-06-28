<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk</title>

  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />

  <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />

  <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
</head>

<body>
  <div id="app">
    <div id="main">
      <header class="mb-3">
        <a href="#sidebar" class="burger-btn d-block d-xl-none">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <h3>Produk</h3>
      </div>
      <div class="page-content">
        <section class="section">
          <div class="row" id="table-hover-row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Kategori</h4>
                  <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Kategori">
                      Tambah Kategori
                    </button>
                  </div>
                  <div class="modal fade text-left" id="Kategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel33">
                            Form Tambah Kategori
                          </h4>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <form action="index.php?page=admin&aksi=tambahKategori" method="POST" role="form">
                          <div class="modal-body">
                            <label>Nama Kategori: </label>
                            <div class="form-group">
                              <input type="text" placeholder="Kategori" class="form-control" name="nama" />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                              <i class="bx bx-x d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Close</span>
                            </button>
                            <input type="submit" name="submit" class="btn btn-primary ml-1" value="Tambah">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th class="col-9">NAMA KATEGORI</th>
                          <th class="col-3">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($jenis as $row) : ?>
                          <tr>
                            <td class="text-bold-500"><?= $row['nama'] ?></td>
                            <td>
                              <a href="index.php?page=admin&aksi=hapusKategori&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="section">
          <div class="row" id="table-hover-row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Data Produk</h4>
                  <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#tambahuser">
                      Tambah Produk
                    </button>
                  </div>
                  <div class="modal fade text-left" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <!-- role="document" -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel33">
                            Form Tambah Produk
                          </h4>
                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                          </button>
                        </div>
                        <form action="index.php?page=admin&aksi=tambahProduk" method="POST" enctype="multipart/form-data" role="form">
                          <div class="modal-body">
                            <label>Nama Produk : </label>
                            <div class="form-group">
                              <input type="text" placeholder="Nama" class="form-control" name="nama" />
                            </div>
                            <label>Jenis Produk : </label>
                            <div class="form-group">
                              <select name="jenisproduk" class="form-select" require>
                                <?php foreach ($jenis as $row) : ?>
                                  <option value="<?= $row['id'] ?>">
                                    <?= $row['nama'] ?>
                                  </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <label>Harga : </label>
                            <div class="form-group">
                              <input type="number" placeholder="Harga" class="form-control" name="harga" />
                            </div>
                            <label>Gambar : </label>
                            <div class="form-group">
                              <input type="file" name="image" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                              <i class="bx bx-x d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Close</span>
                            </button>
                            <input type="submit" name="submit" class="btn btn-primary ml-1" value="Tambah">
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                      <thead>
                        <tr>
                          <th>KODE PRODUK</th>
                          <th>NAMA PRODUK</th>
                          <th>JENIS PRODUK</th>
                          <th>HARGA PRODUK</th>
                          <th>GAMBAR PRODUK</th>
                          <th>AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($kopi as $row) : ?>
                          <tr>
                            <td><?= $row['idKopi'] ?></td>
                            <td><?= $row['namaKopi'] ?></td>
                            <td><?= $row['jenisKopi'] ?></td>
                            <td><?= formatRupiah($row['hargaKopi']) ?></td>
                            <td><img src="upload/<?= $row['gambarKopi'] ?> " alt="<?= $row['namaKopi'] ?>" width="150" height="100"></td>
                            <td>
                              <input type="hidden" name="namafoto" value="<?= $row['gambarKopi'] ?>">
                              <a href="index.php?page=admin&aksi=editProduk&id=<?= $row['idKopi'] ?>" class="btn btn-warning">Edit</a>
                              <a href="index.php?page=admin&aksi=hapusProduk&id=<?= $row['idKopi'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
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
  </div>iv>
  <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/pages/dashboard.js"></script>

  <script src="assets/js/main.js"></script>
</body>

</html>