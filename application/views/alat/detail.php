<link href="assets/vendor/bootstrap/css/bootstrap.min.js" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.css">
<div class="container">
    <div class="row mt-5">
		<div class="col-md-3">
        </div> 
        <div class="col-md-6">

            <div class="card mb-5  align-self-center">
                <div class="card-body">
                    <p class="card-img-top ml-auto mr-auto"> <img src="<?= base_url('assets/img/produk/' . $alat['gambar']); ?>" style="max-width:300px;"> </p>
                    <h5 class="card-title"><?= $alat['nama_alat']; ?></h5>
                    <h6><?php echo rupiah2 ($alat['harga']); ?></h6>
                    <p class="card-text"><?= $alat['deskripsi']; ?></p>
                    <p class="card-text">Stok:<?= $alat['stok']; ?></p>
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?= base_url(); ?>member" class="btn btn-success"><i class="fa fa-chevron-circle-left mr-1" aria-hidden="true"></i>Kembali</a>
                        </div>
                        <div class="col-lg-8">
                            <form class="form-inline ml-auto " method="post" action="<?= base_url('alat/tambahPemesanan/' . $alat['id_alat']); ?>">
                            <input class="form-control col-md-9 mr-2" type="text" placeholder="Alamat" name="alamat" minlength="1" maxlength="50" required>
                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i class="fa mr-1" aria-hidden="true"></i>Sewa</button>
                                <input class="form-control col-md-4 mr-2" type="text" placeholder="Jumlah" name="jumlah" minlength="1" maxlength="4" pattern="\d*" required>
                                <input class="form-control col-md-4 mr-1" type="text" placeholder="Jam Sewa" name="totaljam_sewa" minlength="1" maxlength="4" pattern="\d*" required>
                                <h10 class="card-text">Tanggal Pakai<br>
                                
                                <input class="form-control col-md-10 mr-2" type="date" placeholder="Tanggal Pakai" name="tanggal_pakai" minlength="1" maxlength="50" required>
                                <br><h10 class="card-text">Tanggal Selesai
                                <br>
                                <input class="form-control col-md-10 mr-2" type="date" placeholder="Tanggal Selesai" name="tanggal_selesai" minlength="1" maxlength="50" required>
                            </form>
                        </div>
                    </div>
                    <!-- <a href="<?= base_url(); ?>produk" class="btn btn-primary ml-3"><i class="fa fa-cart-plus mr-1" aria-hidden="true"></i>Pesan</a> -->
                </div>
            </div>

        </div>
    </div>
</div>
