<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Bank</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="container">
        <div class="page-heading">
            <h3>Akun bank</h3>
        </div>
        <div class="page-content">
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Akun Bank </h4>
                                <div class="col-12 d-flex justify-content-start mt-4 mb-2">
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#bank">
                                        Tambah Akun
                                    </button>
                                </div>
                                <div class="modal fade text-left" id="bank" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">
                                                    Form Tambah Akun Bank
                                                </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="index.php?page=pelanggan&aksi=tambahAkunBank" method="POST" role="form">
                                                <div class="modal-body">
                                                    <label>No rek </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nomor Rekening" class="form-control" name="norek" />
                                                    </div>
                                                    <label>Pemilik Rekening </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Owner" class="form-control" name="owner" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="submit" name="submit" id="submit" class="btn btn-primary ml-1" value="Tambah">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th class="col-4">Pemilik Rekening</th>
                                                <th class="col-5">No Rekening</th>
                                                <th class="col-3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($data)) : ?>
                                                <?php foreach ($data as $row) : ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?= $row['pemilik'] ?></td>
                                                        <td class="text-bold-500"><?= $row['norek'] ?></td>
                                                        <td>
                                                            <a href="index.php?page=pelanggan&aksi=hapusAkunBank&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
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