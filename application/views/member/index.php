<link href="assets/vendor/bootstrap/css/bootstrap.min.js" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.css">

<body>

  <!-- OUR TEAM -->
  <section>
<div class="container mt-4 mb-4">
<div class="row">
        <div class="col-lg-10 mb-4 ml-auto mr-auto">
        <h6 class="lead" style="text-align:center;"> 
        <marquee scrollDelay="20" scrollamount="10" direction="right">Selamat datang di PT. SINGO LIAR Indonesia</marquee>
            <?= $this->session->flashdata('message'); ?>
            <div class="bd-example mt-3">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>

                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= base_url('assets/img/produk/singo.jpg'); ?> " class="d-block w-100 rounded" alt="...">
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

<div class="row text-center">
        <?php foreach ($alat as $row) { ?>
            <div class="col-xl-4 col-sm-12 mb-3">
                <div class="card category shadow-sm pull-right">
                    <img class="card-img-top" src="<?= base_url('assets/img/produk/' . $row['gambar']); ?> " height="225px" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_alat']; ?></h5>
                        <h6 class="badge badge-pill badge-success"><?php echo rupiah2 ($row['harga']); ?>,-/jam</h6>
                    </div>
                    <div class="card-footer bg-success border-0">
                        <a href="<?= base_url() ?>alat/detail/<?= $row['id_alat']; ?>" class="btn btn-sm btn-info">Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</section>
</body>
