<!-- Begin Page Content -->
<div id="container-fluid">
	<!-- </?php $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

	<?php if ($this->session->flashdata('success')) : ?>
		<div class="alert alert-success ml-4 mr-4" role="alert">
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php elseif ($this->session->flashdata('danger')) : ?>
		<div class="alert alert-danger ml-4 mr-4" role="alert">
			<?php echo $this->session->flashdata('danger'); ?>
		</div>
	<?php endif; ?>

	<div class="card ml-4 mr-4">
		<div class="card-header">
			<h1 class="h3 text-gray-800"><?= $title; ?></h1>
		</div>

		<div class="card-body">
			<!-- Form untuk input -->
			<form action="<?php echo base_url('perjadin_pegawai/input_perjadin/add') ?>" method="post" enctype="multipart/form-data">
				<div class="form-row">
					<div class="form-group col-lg-3 mb-0">
						<label class="mt-2" for="nip">NIP</label>
						<select class="form-control custom-select" id='nip' name="nip">
							<option value="" selected>--Pilih NIP--</option>
							<?php foreach ($data_user as $value) { ?>
								<option value="<?= $value->nip ?>" <?= set_select('nip', $value->nip) ?> data-name='<?= $value->name ?>'><?= $value->nip ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group col-lg-5 mb-0">
						<label class="mt-2" for="nama">Nama Pegawai</label>
						<input class="form-control" type="text" name="name" id='name' placeholder="-" value="<?= set_value('name') ?>" readonly />
					</div>
					<div class="form-group col-8">
						<?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-lg-3 mb-0">
						<label class="mt-2" for="attribute">Atribut</label>
						<select class="form-control custom-select" id="attribute" name="attribute">
							<option value="" selected>--Pilih Atribut--</option>
							<?php foreach ($data_attr as $value) { ?>
								<option value="<?= $value->attribute_id ?>" <?= set_select('attribute', $value->attribute_id) ?> data-attribute='<?= $value->attribute ?>'><?= $value->attribute_id . '-' . $value->attribute ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-lg-4 mb-0">
						<label class="mt-2" for="activity">Kegiatan</label>
						<select class="form-control custom-select" id="activity" type="text" name="activity">
							<option value="" selected>--Pilih Kegiatan--</option>
						</select>
					</div>
					<div class="form-group col-lg-1 mb-0">
						<label class="mt-2" for="kode">Kode</label>
						<input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="text" id="code" name="code" list="code" placeholder="-" readonly />
						<div class="invalid-feedback"><?php echo form_error('kode') ?></div>
					</div>
					<div class="form-group col-8">
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

				<input class="btn btn-success" type="submit" name="btn" value="Tambahkan" />
			</form>

			<!-- <script>
				function autofill() {
					var nip = document.getElementById('nip').value;
					$.ajax({
						url: "<?php echo base_url(); ?>input_perjadin/searchUser",
						data: '&nip=' + nip,
						success: function(data) {
							var hasil = JSON.parse(data);

							$.each(hasil, function(key, val) {

								document.getElementById('nip').value = val.nip;
								document.getElementById('nama').value = val.nama;
							});
						}
					});
				}
			</script> -->
		</div> <!-- End .Card-Body -->
	</div> <!-- End .Card -->
</div> <!-- End #container-fluid -->