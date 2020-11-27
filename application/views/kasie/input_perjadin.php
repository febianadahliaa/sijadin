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
				<!-- </?php $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

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
						<script src="<?php echo base_url(); ?>assets/ajax.js"></script>
						<form action="<?php base_url('kasie/perjadin_pegawai/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-row">
								<div class="form-group col-md-4">
									<label for="nip">NIP</label>
									<input class="form-control <?php echo form_error('nip') ? 'is-invalid':'' ?>" list="daftar_nip_pegawai" type="text" name="nip" id="nip" placeholder="NIP pegawai" onchange="return autofill()";>
									<datalist id='daftar_nip_pegawai'>
										<?php
										foreach ($data_user->result() as $nilai)
										{
											echo "<option value='$nilai->nip'>$nilai->nama</option>";
										}
										?>
									</datalist>
									<!-- <div class="invalid-feedback"></?php echo form_error('nip') ?></div> -->
								</div>

								<div class="form-group col-md-8">
									<label for="nama">Nama</label>
									<input class="form-control </?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" placeholder="Nama pegawai" />
									<!-- <div class="invalid-feedback"></?php echo form_error('nama') ?></div> -->
								</div>
							</div>
							
							<div class="form-row">
								<div class="form-group col-md-3">
									<label for="atribut">Atribut</label>
									<input class="form-control <?php echo form_error('atribut') ? 'is-invalid':'' ?>" type="text" name="atribut" list="atribut" placeholder="Atribut kegiatan">
								    <datalist id="atribut">
								    	<option value="A01 - Pengawasan">
								    	<option value="B01 - REvisit">
								    	<option value="C01 - Pemeriksaan">
								    </datalist>
								    <div class="invalid-feedback"><?php echo form_error('atribut') ?></div>
								</div>
								<div class="form-group col-md-7">
									<label for="kegiatan">Kegiatan</label>
									<input class="form-control <?php echo form_error('kegiatan') ? 'is-invalid':'' ?>" type="text" name="kegiatan" list="kegiatan" placeholder="Nama kegiatan">
								    <datalist id="kegiatan">
								    	<option value="A02 - Survei perdagangan besar">
								    	<option value="A03 - Survei kerangka sampel area">
								    	<option value="A04 - Survei ubinan">
								    </datalist>
									<div class="invalid-feedback"><?php echo form_error('kegiatan') ?></div>
								</div>
								<div class="form-group col-md-2">
									<label for="kode">Kode</label>
									<input class="form-control <?php echo form_error('kode') ? 'is-invalid':'' ?>" type="text" name="kode" list="kode" placeholder="Kode kegiatan">
								    <datalist id="kode">
								    	<option value="A1">
								    	<option value="B1">
								    	<option value="C1">
								    </datalist>
								    <div class="invalid-feedback"><?php echo form_error('kode') ?></div>
								</div>
							</div>

							<!-- <div class="form-group">
								<label for="kode">Kode</label>
								<input class="form-control </?php //echo form_error('kode') ? 'is-invalid':'' ?>" type="text" name="kode" placeholder="Kode kegiatan" />
								<div class="invalid-feedback"></?php //echo form_error('kode') ?></div>
							</div>
							<div class="form-group">
								<label for="kegiatan">Kegiatan</label>
								<input class="form-control </?php //echo form_error('kegiatan') ? 'is-invalid':'' ?>" type="text" name="kegiatan" placeholder="Nama kegiatan" />
								<div class="invalid-feedback"></?php //echo form_error('kegiatan') ?></div>
							</div> -->

							<div class="form-group">
								<label for="tanggal">Tanggal</label>
								<input class="form-control <?php echo form_error('tanggal') ? 'is-invalid':'' ?>" type="date" name="tanggal" placeholder="Tanggal kegiatan" />
								<div class="invalid-feedback"><?php echo form_error('tanggal') ?></div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Input" />
						</form>

						<script>
							function autofill(){
								var nip =document.getElementById('nip').value;
								$.ajax({
											url:"<?php echo base_url();?>index.php/input_perjadin/searchUser",
											data:'&nip='+nip,
											success:function(data){
												var hasil = JSON.parse(data);  
											
									$.each(hasil, function(key,val){ 
										
									document.getElementById('nip').value=val.nip;
												document.getElementById('nama').value=val.nama;
										});
									}
										});
							}
						</script>



						<!-- <script>
							function autofill() {
								var nip = document.getElementById('nip').value;
								$.ajax({
										url:"</?php echo base_url();?>index.php/input_perjadin/searchUser",
										data:'&nip='+nip,
										success:function(data) {
											var hasil = JSON.parse(data);  
											
											$.each(hasil, function(key,val) { 
										
												document.getElementById('nip').value=val.nip;
												document.getElementById('nama').value=val.nama;  
											});
										}
								});			
							}
						</script> -->

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