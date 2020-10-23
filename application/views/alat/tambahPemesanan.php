<div class="container mt-4 mb-4">
    <div class="row">
        <div class="col-lg-12 mb-4 ml-auto mr-auto">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Tambah Pemesanan</h1>
            </div>
        </div>
        <div class="container">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <form class="row">
                <div class="col-lg-10">
                    <form action="<?= base_url('Alat/tambahPemesanan') ?>" method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nama ALat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?= $row['nama_alat']; ?> " readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="harga" name="harga" value="<?= $row['harga']; ?>">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= $row['deskripsi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Gambar Alat</div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/img/produk/') . $row['gambar']; ?>" class="img-thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sewa</button>
                </div>
            </form>
        </div>
    </div>
</div>