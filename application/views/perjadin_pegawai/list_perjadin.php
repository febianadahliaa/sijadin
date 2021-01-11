<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

	<<<<<<< HEAD <!-- Tabel data perjadin -->
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
							=======
							<!-- Page heading -->
							<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

							<div class="row">
								<div class="col-lg">
									<div class="table-responsive">
										<table class="table table-hover" id="dataTable-list" width="100%" cellspacing="0">
											<thead class="thead-dark">
												>>>>>>> hdd
												<tr>
													<th class="text-center">No.</th>
													<th class="text-center">NIP</th>
													<th>Nama Pegawai</th>
													<th>Kegiatan</th>
													<th class="text-center">Tanggal</th>
													<th class="text-center">Action</th>
												</tr>
											</thead>

											<tbody id="dataPerPeg">
												<?php foreach ($data_perjadin as $key => $nilai) : ?>
													<tr id="<?= $nilai->perjadin_id ?>">
														<td class="number text-center"><?= $key + 1 ?></td>
														<td class="nip text-center" data-nip="<?= $nilai->nip ?>"><?= $nilai->nip ?></td>
														<td class="name"><?= $nilai->name ?></td>
														<td class="attribute" data-attribute="<?= $nilai->attribute ?>" data-activity="<?= $nilai->activity_id ?>"><?= $nilai->attribute . ' ' . $nilai->activity ?></td>
														<td class="date text-center" data-date="<?= $nilai->date ?>"><?= date("d-M-Y", strtotime($nilai->date)) ?></td>
														<td class="action text-center" width="250">
															<a class="btn btn-sm open-edit-dialog" data-id="<?= $nilai->perjadin_id ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</a>
															<a href="<?= base_url('perjadin_pegawai/list_perjadin/delete/' . $nilai->perjadin_id) ?>" class="btn btn-sm text-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</a>
														</td>
													</tr>
												<?php endforeach; ?>
											</tbody>
										</table> -->
									</div>
									<!-- Ending table-responsive -->
								</div>
								<!-- Ending Col -->
							</div>
							<!-- Ending Row -->
				</div>
				<!-- Ending Page Content -->

				<<<<<<< HEAD </div>
					<!-- /.container-fluid -->


					<!-- <script>
function deleteConfirm(url) {
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script> -->
					=======
					<!-- Tabel data perjadin -->
					<!-- <div class="card ml-4 mr-4">
	<div class="card-header">
		<h5>DAFTAR PERJADIN PEGAWAI</h5>
	</div>
	<div class="card-body"> -->
					<!-- <div class="row justify-content-start">
				<div class="col-md-4 input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="monthSelect">Bulan</label>
					</div>
					<select class="custom-select" id="monthPeg" name="MonthPeg">
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
				<div class="col-md-4 input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="monthSelect">Tahun</label>
					</div>
					<select class="custom-select" id="yearPeg" name="YearPeg">
						<option value='0'>--Pilih--</option>
						<option value='01'>2020</option>
					</select>
				</div>
			</div>
			<br> -->
					<!-- <div class="table-responsive">
			<table class="table table-hover" id="dataTable-list" width="100%" cellspacing="0">
				<thead class="thead-dark">
					<tr>
						<th class="text-center">No.</th>
						<th class="text-center">NIP</th>
						<th>Nama Pegawai</th>
						<th>Kegiatan</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>

				<tbody id="dataPerPeg">
					<?php foreach ($data_perjadin as $key => $nilai) : ?>
						<tr id="<?= $nilai->perjadin_id ?>">
							<td class="number text-center"><?= $key + 1 ?></td>
							<td class="nip text-center" data-nip="<?= $nilai->nip ?>"><?= $nilai->nip ?></td>
							<td class="name"><?= $nilai->name ?></td>
							<td class="attribute" data-attribute="<?= $nilai->attribute ?>" data-activity="<?= $nilai->activity_id ?>"><?= $nilai->attribute . ' ' . $nilai->activity ?></td>
							<td class="date text-center" data-date="<?= $nilai->date ?>"><?= date("d-M-Y", strtotime($nilai->date)) ?></td>
							<td class="action text-center" width="250">
								<a class="btn btn-sm open-edit-dialog" data-id="<?= $nilai->perjadin_id ?>" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i> Edit</a>
								<a href="<?= base_url('perjadin_pegawai/list_perjadin/delete/' . $nilai->perjadin_id) ?>" class="btn btn-sm text-danger delete" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div> 
</div> card mb-3 

</div>  /.container-fluid -->
					>>>>>>> hdd