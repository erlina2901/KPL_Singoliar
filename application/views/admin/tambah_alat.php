<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->

	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url("admin/") ?>dashboard">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?= base_url("admin/") ?>alat_berat">Alat Berat</a>
			</li>
			<li class="breadcrumb-item active">Tambah Alat Berat</li>
		</ol>

		<div class="container">
			<!-- <div class="col-lg-12"> -->
			<?= $this->session->flashdata('message'); ?>
			<!-- </div> -->
			<div class="row">
				<div class="col-lg-10">
					<?= form_open_multipart('admin/addAlat'); ?>
					<div class="form-group">
						<label>Nama Alat</label>
						<input type="text" id="nama_alat" name="nama_alat" class="form-control col-md-4" value="<?= set_value('nama_alat'); ?>" required>
					</div>
					<div class="form-group">
						<label>No. Polisi</label>
						<input type="text" id="no_pol" name="no_pol" class="form-control col-md-4" value="<?= set_value('no_pol'); ?>" required>
					</div>
					<div class="form-group">
						<label>Merk</label>
						<input type="text" id="merk" name="merk" class="form-control col-md-4" value="<?= set_value('merk'); ?>" required>
					</div>
					<div class="form-group">
						<label>Operator</label>
						<input type="text" id="operator" name="operator" class="form-control col-md-4" value="<?= set_value('operator'); ?>" required>
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" id="harga" name="harga" class="form-control col-md-4" required>
						<?= form_error('harga', '<small class="text-danger" >', '</small>'); ?>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<input type="text" id="deskripsi" name="deskripsi" class="form-control col-md-4" value="<?= set_value('deskripsi'); ?>" required>
					</div>
					<div class="form-group">
						<label>Status</label>
						<input type="text" id="status" name="status" class="form-control col-md-4" value="<?= set_value('status'); ?>" required>
					</div>

					<div class="form-group">
						<label>Gambar</label>
						<div class="col-sm-8">
							<div class="row">
								<div class="col-sm-7">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="Image" name="image" required>
										<label class="custom-file-label" for="image">Choose file</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<button type="submit" name="submit" value="tambah" class="btn btn-primary">Simpan</button>
					<a href="<?= base_url('admin/alat_berat'); ?>" class="btn btn-danger">Batal</a>

					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->