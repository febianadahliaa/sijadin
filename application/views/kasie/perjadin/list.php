<!DOCTYPE html>
<html>
<head>
	<title>Daftar Perjadin Pegawai</title>
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
						<a href="<?php echo site_url('kasie/perjadin_pegawai/add') ?>"><i class="fas fa-plus"></i> Input Perjadin</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>NIP</th>
										<th>Nama Pegawai</th>
										<th>ID Kegiatan</th>
										<th>Kegiatan</th>
										<th>Tanggal</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($perjadin as $row): ?>
									<tr>
										<td><?php echo $row->nip ?></td>
										<td><?php echo $row->nip ?></td>
										<td><?php echo $row->idKegiatan ?></td>
										<td><?php echo $row->namaKegiatan ?></td>
										<td><?php echo $row->tanggal ?></td>
										
										<td width="250">
											<a href="<?php echo site_url('kasie/perjadin_pegawai/edit/'.$row->idPerjadin) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('kasie/perjadin_pegawai/delete/'.$row->idPerjadin) ?>')"
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