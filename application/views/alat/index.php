<link href="assets/vendor/bootstrap/css/bootstrap.min.js" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.css">
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-lg-12 mb-4">
      <h6 class="lead" style="text-align:center;">Selamat datang di SINGO LIAR
        <hr>
      </h6>
    </div>
  </div>

  <div class="row">
        <?php foreach ($alat as $row) { ?>
            <div class="col-xl-4 col-sm-12 mb-4">
                <div class="card category shadow-sm pull-right">
                    <img class="card-img-top" src="<?= filter_var(base_url('assets/img/produk/' . $row['gambar']), FILTER_DEFAULT); ?> " height="225px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_alat']; ?></h5>
                        <h6>Rp<?= $row['harga']; ?>,-/</h6>
                        <p class="card-text"><?= $row['deskripsi']; ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="<?= base_url() ?>alat/detail/<?= $row['id_alat']; ?>" class="btn btn-outline-primary">Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
  </div>
</div>
