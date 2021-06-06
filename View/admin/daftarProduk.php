<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Produk</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css" />
    <link rel="stylesheet" href="assets/vendors/toastify/toastify.css">
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css"
    />
    <link
      rel="stylesheet"
      href="assets/vendors/bootstrap-icons/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="assets/css/app.css" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
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
          <h3>Produk</h3>
        </div>
        <div class="page-content">
          <section class="section">
            <div class="row" id="table-hover-row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Produk</h4>
                    <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                      <button
                        type="button"
                        class="btn btn-outline-success"
                        data-bs-toggle="modal"
                        data-bs-target="#Produk"
                      >
                        Tambah Produk
                      </button>
                    </div>
                    <div
                      class="modal fade text-left"
                      id="Produk"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="myModalLabel33"
                      aria-hidden="true"
                    >
                      <div
                        class="
                          modal-dialog
                          modal-dialog-centered
                          modal-dialog-scrollable
                        "
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">
                              Form Tambah Produk
                            </h4>
                            <button
                              type="button"
                              class="close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            >
                              <i data-feather="x"></i>
                            </button>
                          </div>
                          <form action="#">
                            <div class="modal-body">
                              <label>Nama Produk : </label>
                              <div class="form-group">
                                <input
                                  type="text"
                                  placeholder="Nama"
                                  class="form-control"
                                />
                              </div>
                              <label>Harga : </label>
                              <div class="form-group">
                                <input
                                  type="number"
                                  placeholder="Harga"
                                  class="form-control"
                                />
                              </div>
                              <label>Gambar : </label>
                              <div class="form-group">
                              <input type="file" name="image" class="form-control basic-filepond">
                              </div>
                              
                            </div>
                            <div class="modal-footer">
                              <button
                                type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal"
                              >
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                              </button>
                              <button
                                type="button"
                                class="btn btn-primary ml-1"
                                data-bs-dismiss="modal"
                              >
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tambah</span>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                          <thead>
                            <tr>
                              <th>NAMA PRODUK</th>
                              <th>JENIS PRODUK</th>
                              <th>HARGA PRODUK</th>
                              <th>AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="text-bold-500">Coffe Latte</td>
                              <td>Espresso</td>
                              <td>10000</td>
                              <td>
                              <a
                                  href="index.php?page=praktikum&aksi=edit&id=#"
                                  class="btn btn-warning"
                                  >Edit</a
                                >
                                <a
                                  href="index.php?page=praktikum&aksi=edit&id=#"
                                  class="btn btn-danger"
                                  >Hapus</a
                                >
                              </td>
                            </tr>
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
                    <h4 class="card-title">Data Kategori</h4>
                    <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                      <button
                        type="button"
                        class="btn btn-outline-success"
                        data-bs-toggle="modal"
                        data-bs-target="#Kategori"
                      >
                        Tambah Kategori
                      </button>
                    </div>
                    <div
                      class="modal fade text-left"
                      id="Kategori"
                      tabindex="-1"
                      role="dialog"
                      aria-labelledby="myModalLabel33"
                      aria-hidden="true"
                    >
                      <div
                        class="
                          modal-dialog
                          modal-dialog-centered
                          modal-dialog-scrollable
                        "
                        role="document"
                      >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel33">
                              Form Tambah Kategori
                            </h4>
                            <button
                              type="button"
                              class="close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            >
                              <i data-feather="x"></i>
                            </button>
                          </div>
                          <form action="#">
                            <div class="modal-body">
                              <label>Nama Kategori: </label>
                              <div class="form-group">
                                <input
                                  type="text"
                                  placeholder="Kategori"
                                  class="form-control"
                                />
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button
                                type="button"
                                class="btn btn-light-secondary"
                                data-bs-dismiss="modal"
                              >
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                              </button>
                              <button
                                type="button"
                                class="btn btn-primary ml-1"
                                data-bs-dismiss="modal"
                              >
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tambah</span>
                              </button>
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
                            <tr>
                              <td class="text-bold-500">Espresso</td>
                              <td>
                                <a
                                  href="index.php?page=praktikum&aksi=edit&id=#"
                                  class="btn btn-warning"
                                  >Edit</a
                                >
                                <a
                                  href="index.php?page=praktikum&aksi=edit&id=#"
                                  class="btn btn-danger"
                                  >Hapus</a
                                >
                              </td>
                            </tr>
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
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
    <!-- filepond -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
      FilePond.create( document.querySelector('.basic-filepond'), { 
        allowImagePreview: false,
        allowMultiple: false,
        allowFileEncode: false,
        required: false
    });
    </script>
  </body>
</html>
