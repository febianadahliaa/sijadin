<!-- Begin Page Content -->
<div id="container-fluid">
	<!-- </?php $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

	<!-- Tabel data perjadin -->
	<div class="card mb-3">
		<div class="card-header">
			<h5>DAFTAR PERJADIN PEGAWAI</h5>
		</div>
		<div class="card-body">
			<!-- <div>
				<select id="bulan" name="Bulan">
					<option value="januari">Januari</option>
					<option value="februari">Februari</option>
					<option value="maret">Maret</option>
					<option value="april">April</option>
					<option value="mei">Mei</option>
					<option value="juni">Juni</option>
					<option value="juli">Juli</option>
					<option value="agustus">Agustus</option>
					<option value="september">September</option>
					<option value="oktober">Oktober</option>
					<option value="november">November</option>
					<option value="desember">Desember</option>
				</select>
			</div> -->
			<br>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable-list" class="display">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama Pegawai</th>
							<th>Kegiatan</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_perjadin as $nilai) : ?>
							<tr>
								<td><?= $nilai->nip ?></td>
								<td><?= $nilai->name ?></td>
								<td><?= $nilai->attribute . ' ' . $nilai->activity ?></td>
								<td><?= date("d-m-Y", strtotime($nilai->date)) ?></td>
								<td width="250">
									<a href="<?php echo site_url('/kasie/edit/' . $nilai->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('/kasie/delete/' . $nilai->id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<!-- <table class="table table-hover" id="dataTable-list" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama Pegawai</th>
							<th>Kegiatan</th>
							<th>Tanggal</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($data_perjadin as $nilai) : ?>
							<tr>
								<td><?php echo $nilai->nip ?></td>
								<td><?php echo $nilai->name ?></td>
								<td><?php echo $nilai->attribute . ' ' . $nilai->activity ?></td>
								<td><?php echo $nilai->date ?></td>
								<td width="250">
									<a href="<?php echo site_url('/kasie/edit/' . $nilai->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a onclick="deleteConfirm('<?php echo site_url('/kasie/delete/' . $nilai->id) ?>')" href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table> -->
			</div>
		</div>
	</div> <!-- card mb-3 -->

</div> <!-- /.container-fluid -->


<!-- <script>
function deleteConfirm(url) {
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script> -->