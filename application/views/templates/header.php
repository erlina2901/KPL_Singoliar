<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="<?= filter_var(base_url(), FILTER_DEFAULT); ?>assets/fontawesome/css/all.css" rel="stylesheet">
  <title><?= $title; ?> </title>
</head>
<body style="background-image: url('<?= filter_var(base_url('assets/img/aa.jpg'), FILTER_DEFAULT); ?>');"> 

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container">
      <a class="navbar-brand text-warning" href="<?= filter_var(base_url('member/index'), FILTER_DEFAULT) ?>">PT. SINGO LIAR</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-light" href="<?= filter_var(base_url('member/index'), FILTER_DEFAULT); ?>">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="<?= filter_var(base_url('about'), FILTER_DEFAULT); ?>">Contact Us</a>
          </li>
      </div>

      <!-- Nav Item - User Information -->
      <div class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="img-profile rounded-circle" src="<?= filter_var(base_url('assets/img/avatar/') . $user['image'], FILTER_DEFAULT); ?>" style="width:30px; height:30px; background-color: #238e00; box-shadow: 3px 2px 10px black;">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="<?= filter_var(base_url('member/profile'), FILTER_DEFAULT); ?>">
            <i class="fas fa-user"></i>
            Profile
          </a>
          <a class="dropdown-item" href="<?= filter_var(base_url('member/change_password'), FILTER_DEFAULT); ?>">
            <i class="fas fa-key"></i>
            Ubah Password
          </a>
          <div class="dropdown"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            Keluar
          </a>
        </div>
      </div>
    </div>
    </div>
  </nav>
  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anda yakin keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
          <a class="btn btn-primary" href="<?= filter_var(base_url('auth/logout'), FILTER_DEFAULT); ?>">Ya</a>
        </div>
      </div>
    </div>
  </div>
