<!-- Begin Page Content -->
<div id="container-fluid">
	<!-- </?php $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

	<!-- Tabel data perjadin -->
	<div class="card ml-4 mr-4">
		<div class="card-header">
			<h5>DAFTAR PERJADIN PEGAWAI</h5>
		</div>
		<div class="card-body">
			<div class="row justify-content-start">
				<div class="col-4 input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="monthSelect">Bulan</label>
					</div>
					<select class="custom-select" id="month" name="Month">
						<option value='0'>--Pilih--</option>
						<option value='01'>Januari</option>
						<option value='02'>Februari</option>
						<option value='03'>Maret</option>
						<option value='04'>April</option>
						<option value='05'>Mei</option>
						<option value='06'>Juni</option>
						<option value='07'>Juli</option>
						<option value='08'>Agustus</option>
						<option value='09'>September</option>
						<option value='10'>Oktober</option>
						<option value='11'>November</option>
						<option value='12'>Desember</option>
					</select>
				</div>
				<div class="col-4 input-group mb-3">
					<div class="input-group-prepend ml-3">
						<label class="input-group-text" for="monthSelect">Tahun</label>
					</div>
					<select class="custom-select" id="month" name="Month">
						<option value='0'>--Pilih--</option>
						<option value='01'>2020</option>
					</select>
				</div>
			</div>
			<br>
			<div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class="table-dark text-center">NIP</th>
							<th class="table-dark">Nama Pegawai</th>
							<th class="table-dark">Kegiatan</th>
							<th class="table-dark text-center">Tanggal</th>
							<th class="table-dark text-center">Action</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($data_perjadin as $nilai) : ?>
							<tr id="<?= $nilai->perjadin_id ?>">
								<td class="text-center"><?php echo $nilai->nip ?></td>
								<td><?php echo $nilai->name ?></td>
								<td><?php echo $nilai->attribute . ' ' . $nilai->activity ?></td>
								<td class="text-center"><?php echo date("d-m-Y", strtotime($nilai->date)) ?></td>
								<td class="text-center" width="250">
									<a href="#" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
									<a href="<?= base_url('perjadin_pegawai/list_perjadin/delete/' . $nilai->perjadin_id) ?>" class="btn btn-small text-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
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