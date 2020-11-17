<!DOCTYPE html>
<html>
<head>
	<title>Perjadin Saya</title>
	<?php $this->load->view('kasie/_partials/head.php') ?>
</head>

<body id="page-top">
	<?php $this->load->view('kasie/_partials/navbar.php') ?>
	<div id="wrapper">
		<?php $this->load->view('kasie/_partials/sidebar.php') ?>
		<div id="content-wrapper">
			<div class="container-fluid">
				<?php $this->load->view('kasie/_partials/breadcrumb.php') ?>

				<!-- Data Tables -->					
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('kasie/perjadin/add') ?>"><i class="fas fa-plus"></i> Input Perjadin</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Kegiatan</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($perjadin as $perjadin_): ?>
									<tr>
										<td><?php echo $perjadin_->tanggal ?></td>
										<td><?php echo $perjadin_->namaKegiatan ?></td>
										
										<td width="250">
											<a href="<?php echo site_url('kasie/perjadin_pegawai/edit/'.$perjadin_->idPerjadin) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('kasie/perjadin_pegawai/delete/'.$perjadin_->idPerjadin) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div> <!-- /.container-fluid -->
			<?php $this->load->view('kasie/_partials/footer.php') ?>			
		</div> <!-- /.content-wrapper -->
	</div> <!-- /#wrapper -->

	<?php $this->load->view('kasie/_partials/scrolltop.php') ?>
	<?php $this->load->view('kasie/_partials/modal.php') ?>
	<?php $this->load->view('kasie/_partials/js.php') ?>

	<!-- <script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script> -->

</body>

</html>