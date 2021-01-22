<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

	<!-- <div class="card ml-4 mr-4">
		<div class="card-header">
			<h1 class="h3 text-gray-800"><?= $title; ?></h1>
		</div> -->

	<!-- <div class="card-body"> -->

	<!-- Page heading -->
	<div class="row">
		<div class="col-lg-8">
			<h3 class="text-gray-800"><strong><?= $title ?></strong></h3>
			<hr class="sidebar-divider">
		</div>
	</div>

	<!-- Notification -->
	<div class="row">
		<div class="col-lg-8">
			<?php if ($this->session->flashdata('success')) : ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
			<?php elseif ($this->session->flashdata('danger')) : ?>
				<div class="alert alert-danger" role="alert">
					<?php echo $this->session->flashdata('danger'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Page Content -->
	<div class="row">
		<div class="col-lg-8">
			<!-- Form untuk input -->
			<form action="<?php echo base_url('perjadin_pegawai/input_perjadin/add') ?>" method="post" enctype="multipart/form-data">
				<div class="form-row">
					<div class="form-group col-lg-7 mb-0">
						<label class="mt-2" for="nip">Nama Pegawai</label>
						<select class="form-control custom-select" id='nip' name="nip">
							<option value="" selected>--Pilih NIP--</option>
							<?php foreach ($data_user as $value) { ?>
								<option value="<?= $value->nip ?>" <?= set_select('nip', $value->nip) ?> data-name='<?= $value->name ?>'><?= $value->nip . ' - ' . $value->name ?></option>
							<?php } ?>
						</select>
					</div>

					<!-- <div class="form-group col-lg-7 mb-0">
						<label class="mt-2" for="nama">Nama Pegawai</label>
						<input class="form-control" type="text" name="name" id='name' placeholder="-" value="<?= set_value('name') ?>" readonly />
					</div> -->
					<div class="form-group col-12">
						<?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-lg-4 mb-0">
						<label class="mt-2" for="attribute">Atribut</label>
						<select class="form-control custom-select" id="attribute" name="attribute">
							<option value="" selected>--Pilih Atribut--</option>
							<?php foreach ($data_attr as $value) { ?>
								<option value="<?= $value->attribute_id ?>" <?= set_select('attribute', $value->attribute_id) ?> data-attribute='<?= $value->attribute ?>'><?= $value->attribute_id . ' - ' . $value->attribute ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-lg-5 mb-0">
						<label class="mt-2" for="activity">Kegiatan</label>
						<select class="form-control custom-select" id="activity" type="text" name="activity">
							<option value="" selected>--Pilih Kegiatan--</option>
						</select>
					</div>
					<div class="form-group col-lg-3 mb-0">
						<label class="mt-2" for="kode">Kode</label>
						<input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="text" id="code" name="code" list="code" placeholder="-" readonly />
						<div class="invalid-feedback"><?php echo form_error('kode') ?></div>
					</div>
					<div class="form-group col-12">
						<?= form_error('activity', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input class="form-control" type="date" id="date" name="date" value="<?= set_value('date') ?>" />
						<?= form_error('date', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-sm mt-2">Input Data</button>
				</div>
			</form>
		</div> <!-- End .col page content -->
	</div> <!-- End .row page content -->
	<!-- </div> End .Card-Body -->
	<!-- </div> End .Card -->
</div> <!-- End .container-fluid -->