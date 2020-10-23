<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->

	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= filter_var(base_url("admin/"), FILTER_DEFAULT) ?>dashboard">Dashboard</a>
			</li>
			<li class="breadcrumb-item">
				<a href="<?= filter_var(base_url("admin/"), FILTER_DEFAULT) ?>sewa">Penyewaan</a>
			</li>
			<li class="breadcrumb-item active">Tambah Penyewaan</li>
		</ol>

		<div class="container">
			<div class="col-lg-12">
				<?= $this->session->flashdata('message'); ?>
			</div>
			<div class="row">
				<div class="col-lg-10">
					<?= form_open_multipart('admin/addSewa'); ?>
					<div class="form-group">
						<label>Jenis Alat</label>
						<select name="id_alat" class="form-control col-md-4" required>
							<!-- <option value="none">--Pilih Produk--</option> -->
							<?php
							foreach ($nama_alat as $row) {
								?>
								<option value="<?php echo $row['id_alat']; ?> "><?php echo $row['nama_alat']; ?></option>
							<?php
							}
							?>
						</select>
					</div>
					
					<div class="form-group">
						<label>Nama Penyewa</label>
						<input type="text" id="nama_penyewa" name="nama_penyewa" class="form-control col-md-4" value="<?= set_value('nama_penyewa'); ?>" required>
					</div>

					<div class="form-group">
						<label>Jumlah</label>
						<input type="text" id="jumlah" name="jumlah" class="form-control col-md-4" value="<?= set_value('jumlah'); ?>" required>
					</div>

					<div class="form-group">
						<label>Total Jam Sewa</label>
						<input type="text" id="totaljam_sewa" name="totaljam_sewa" class="form-control col-md-4" value="<?= set_value('totaljam_sewa'); ?>" required>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" id="alamat" name="alamat" class="form-control col-md-4" value="<?= set_value('alamat'); ?>" required>
					</div>

					<a href="<?= base_url('admin/sewa'); ?>" class="btn btn-danger">Batal</a>
					<button type="submit" name="submit" value="tambah" class="btn btn-success">Simpan</button>

					</form>
					<br>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->
