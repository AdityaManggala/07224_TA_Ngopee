<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ngopee</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css" />
  <link rel="stylesheet" href="assets/css/app.css" />
  <link rel="shortcut icon" href="assets/images/logo/favicon.ico" type="image/x-icon">
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

  <div class="container">
    <div class="row">
      <?php foreach ($kopi as $item) : ?>
        <div class="col-xl-3 col-lg-6 col-md-4 col-sm-6">
          <div class="card">
            <img src="upload/<?= $item['gambarKopi'] ?>" class="card-img-top img-fluid" alt="singleminded" />
            <div class="card-body ">
              <h5 class="card-title"><?= $item['namaKopi'] ?></h5>
              <p class="card-text"><?= $item['descKopi'] ?></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <span><?= formatRupiah($item['hargaKopi']) ?></span>
              <button class="btn btn-light-primary">Read More</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>