<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

	<!-- Page heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">
			<div class="row">
				<!-- Set to Indonesia locale date -->
				<?php setlocale(LC_ALL, 'IND'); ?>
				<div class="col-md-4 input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="yearSelect">Tahun</label>
					</div>
					<select class="custom-select" id="year" name="year">
						<option value='0'>--Pilih--</option>
						<?php for ($i = date('Y', strtotime($maxMinYear[0]->min)); $i <= date('Y', strtotime($maxMinYear[0]->max)); $i++) {
							echo '<option value="' . $i . '">' . $i . '</option>';
						} ?>
					</select>
				</div>
				<div class="col-md-4 input-group mb-3">
					<div class="input-group-prepend">
						<label class="input-group-text" for="monthSelect">Bulan</label>
					</div>
					<select class="custom-select" id="month" name="month">
						<option value='0'>--Pilih--</option>
						<?php for ($i = 1; $i <= 12; $i++) { ?>
							<option value="<?= $i ?>"><?= strftime('%B', mktime(0, 0, 0, $i, 10)); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

			<!-- Tabel matriks perjadin pegawai -->
			<div class="table-responsive">
				<table id="dataMatrix" class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th class="text-right" scope="col">Nama</th>
							<?php for ($day = 1; $day <= 11; $day++) {
								if ($day >= 7) {
									echo '<th>' . ($day + 20) . '</th>';
								} else if ($day > 5 && $day < 7) {
									echo '<th>...</th>';
								} else {
									echo '<th>' . $day . '</th>';
								}
							} ?>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center" colspan="20">Silakan pilih bulan dan tahun!</td>
						</tr>
						<!-- <?php foreach ($allUser as $au) {
									echo '<tr>';
									echo '<td class="text-right"><span class="badge badge-dark">' . $au->name . '</span></td>';
									for ($day = 1; $day <= date('t'); $day++) {
										foreach ($matrix as $m) {
											if (date('d', strtotime($m->date)) == $day && $m->date != null && $au->nip == $m->nip) {
												$result = '&#10003;';
												break;
											} else {
												$result = '';
											}
										}
										echo '<td><span class="badge badge-success">' . $result . '</span></td>';
									}
									echo '</tr>';
								} ?> -->
					</tbody>
				</table>
			</div>
			<!-- Ending table-responsive -->
		</div>
		<!-- Ending Col -->
	</div>
	<!-- Ending Row -->
</div>
<!-- Ending Page Content -->

<!-- Tabel data perjadin -->
<!-- <div class="card mb-3">
		<div class="card-header">
			<h1 class="h3 text-gray-800"><?= $title; ?></h1>
		</div>
		<div class="card-body"> -->
<!-- Set to Indonesia locale date -->
<!-- <?php setlocale(LC_ALL, 'IND'); ?>
			<div>
				<select class="custom-select col-md-2" id="month" name="month">
					<?php for ($i = 1; $i <= 12; $i++) { ?>
						<option value="<?= $i ?>"><?= strftime('%B', mktime(0, 0, 0, $i, 10)); ?></option>
					<?php } ?>
				</select>
			</div>
			<br /> -->

<!-- Tabel matriks perjadin pegawai -->
<!-- <div class="table-responsive">
				<table class="table matrix">
					<thead class="thead-dark">
						<tr>
							<th scope="col">Nama</th>
							<?php for ($day = 1; $day <= date('t'); $day++) {
								echo '<th>' . $day . '</th>';
							} ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($allUser as $key => $au) {
							echo '<tr>';
							echo '<td>' . $au->name . '</td>';
							for ($day = 1; $day <= date('t'); $day++) {
								foreach ($matrix as $m) {
									if (date('d', strtotime($m->date)) == $day && $m->date != null && $au->nip == $m->nip) {
										$result = '&#10003;';
										break;
									} else {
										$result = '';
									}
								}
								echo '<td><span class="badge badge-success">' . $result . '</span></td>';
							}
							echo '</tr>';
						} ?>
					</tbody>
				</table>
			</div> -->
<!-- Ending table-responsive -->

<!-- <div class="table-responsive">
				<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama Pegawai</th>
							<th>Kode Kegiatan</th>
							<th>Kegiatan</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($perjadin as $row) : ?>
						<tr>
							<td><?php echo $row->nip ?></td>
							<td><?php echo $row->nip ?></td>
							<td><?php echo $row->idKegiatan ?></td>
							<td><?php echo $row->namaKegiatan ?></td>
							<td><?php echo $row->tanggal ?></td>
							
							<td width="250">
								<a href="<?php echo site_url('kasie/perjadin_pegawai/edit/' . $row->idPerjadin) ?>"
									class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
								<a onclick="deleteConfirm('<?php echo site_url('kasie/perjadin_pegawai/delete/' . $row->idPerjadin) ?>')"
									href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>

</div> /.container-fluid -->