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
                    <div class="col-12 d-flex justify-content-end">
                      <button
                        type="button"
                        class="btn btn-outline-success"
                        data-bs-toggle="modal"
                        data-bs-target="#inlineForm"
                      >
                        Tambah Produk
                      </button>
                    </div>
                    <div
                      class="modal fade text-left"
                      id="inlineForm"
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
                              <label>Email: </label>
                              <div class="form-group">
                                <input
                                  type="text"
                                  placeholder="Email Address"
                                  class="form-control"
                                />
                              </div>
                              <label>Password: </label>
                              <div class="form-group">
                                <input
                                  type="password"
                                  placeholder="Password"
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
                  </div>
                  <div class="card-content">
                    <!-- <div class="card-body">
                                    <a href="#" class="btn btn-primary note-float-right">Primary</a>
                                    </div> -->
                    <!-- table hover -->
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th>NAME</th>
                            <th>RATE</th>
                            <th>SKILL</th>
                            <th>TYPE</th>
                            <th>LOCATION</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-bold-500">Michael Right</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">UI/UX</td>
                            <td>Remote</td>
                            <td>Austin,Taxes</td>
                            <td>
                              <a href="#"
                                ><i
                                  class="
                                    badge-circle badge-circle-light-secondary
                                    font-medium-1
                                  "
                                  data-feather="mail"
                                ></i>
                              </a>
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
                    <div class="col-12 d-flex justify-content-end">
                      <button
                        type="button"
                        class="btn btn-outline-success"
                        data-bs-toggle="modal"
                        data-bs-target="#inlineForm"
                      >
                        Tambah Kategori
                      </button>
                    </div>
                    <div
                      class="modal fade text-left"
                      id="inlineForm"
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
                              <label>Email: </label>
                              <div class="form-group">
                                <input
                                  type="text"
                                  placeholder="Email Address"
                                  class="form-control"
                                />
                              </div>
                              <label>Password: </label>
                              <div class="form-group">
                                <input
                                  type="password"
                                  placeholder="Password"
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
                  </div>
                  <div class="card-content">
                    <div class="table-responsive">
                      <table class="table table-hover mb-0">
                        <thead>
                          <tr>
                            <th>NAME</th>
                            <th>RATE</th>
                            <th>SKILL</th>
                            <th>TYPE</th>
                            <th>LOCATION</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-bold-500">Michael Right</td>
                            <td>$15/hr</td>
                            <td class="text-bold-500">UI/UX</td>
                            <td>Remote</td>
                            <td>Austin,Taxes</td>
                            <td>
                              <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-warning">Edit</a>
                              <a href="index.php?page=praktikum&aksi=edit&id=#" class="btn btn-danger">Hapus</a>
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

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
  </body>
</html>
