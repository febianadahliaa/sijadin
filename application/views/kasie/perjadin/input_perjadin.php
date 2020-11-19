<!DOCTYPE html>
<html>
<head>
	<title>Input Perjadin Pegawai</title>
	<?php $this->load->view('kasie/_partials/head.php') ?>
</head>

<body id="page-top">
	<?php $this->load->view('kasie/_partials/navbar.php') ?>
	<div id="wrapper">
		<?php $this->load->view('kasie/_partials/sidebar.php') ?>
		<div id="content-wrapper">
			<div id="container-fluid">
				<!-- <?php // $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('kasie/perjadin_pegawai/') ?>"><i class="fas fa-arrow-left"></i> Daftar perjadin pegawai</a>
					</div>

					<div class="card-body">
						
						<!-- Form untuk input -->
						<form action="<?php base_url('kasie/perjadin_pegawai/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nip">NIP</label>
								<!-- <input class="form-control <?php // echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="nip" placeholder="NIP pegawai" /> -->
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>" type="text" name="nip" list="nip" placeholder="NIP pegawai">
							    <datalist id="nip">
							    	<option value="3400xxx1">
							    	<option value="3400xxx2">
							    	<option value="12345678">
							    	<option value="20000000">
							    </datalist>
								<div class="invalid-feedback"><?php echo form_error('nip') ?></div>
							</div>

							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama pegawai" />
								<div class="invalid-feedback"><?php echo form_error('nama') ?></div>
							</div>

							<div class="form-group">
								<label for="kode">Kode</label>
								<input class="form-control <?php echo form_error('kode') ? 'is-invalid':'' ?>" type="text" name="kode" placeholder="Kode kegiatan" />
								<div class="invalid-feedback"><?php echo form_error('kode') ?></div>
							</div>

							<!-- <div class="form-group">
								<label for="kegiatan">Kegiatan</label>
								<input class="form-control <?php //echo form_error('kegiatan') ? 'is-invalid':'' ?>" type="text" name="kegiatan" placeholder="Nama kegiatan" />
								<div class="invalid-feedback"><?php //echo form_error('kegiatan') ?></div>
							</div> -->

							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="kegiatan">Kegiatan</label>
									<input class="form-control <?php echo form_error('kegiatan') ? 'is-invalid':'' ?>" type="text" name="kegiatan" list="kegiatan" placeholder="">
								    <datalist id="kegiatan">
								    	<option value="xxx">
								    	<option value="yyy">
								    	<option value="zzz">
								    </datalist>
									<div class="invalid-feedback"><?php echo form_error('kegiatan') ?></div>
								</div>
								<div class="form-group col-md-4">
									<label for="kode">Atribut</label>
									<input class="form-control <?php echo form_error('atribut') ? 'is-invalid':'' ?>" type="text" name="atribut" list="atribut" placeholder="">
								    <datalist id="atribut">
								    	<option value="A">
								    	<option value="B">
								    	<option value="C">
								    </datalist>
								    <div class="invalid-feedback"><?php echo form_error('atribut') ?></div>
								</div>
							</div>

							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" type="date" name="tanggal" placeholder="Tanggal kegiatan" />
								<div class="invalid-feedback"><?php echo form_error('tanggal') ?></div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Input" />
						</form>

					</div>

				</div>

			</div> <!-- /.container-fluid -->
			<?php $this->load->view('kasie/_partials/footer.php') ?>
		</div> <!-- /.content-wrapper -->
	</div> <!-- /#wrapper -->

	<?php $this->load->view('kasie/_partials/scrolltop.php') ?>
	<?php $this->load->view('kasie/_partials/js.php') ?>

</body>

</html>