<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page heading -->					
    <h1 class="h3 mb-4 text-gray-800"><?= $title . ' Pegawai'; ?></h1>

	<div class="row">
        <div class="col-lg">

			<!-- Pilih bulan dan tahun -->
			<form action="<?php base_url() ?>list_perjadin/dataByTime" method="post">
				<div class="row">
					<div class="col-md-2.5">
						<input type="month" id="year_month" name="year_month">
					</div>

					<div class="col-md">
						<input class="btn btn-primary btn-sm mb-3" type="submit" name="btn" value="Tampilkan" />
					</div>

					<!-- <div class="col-sm-1">
						<select id="bulan" name="bulan">
							<option value="1">Januari</option>
							<option value="2">Februari</option>
							<option value="3">Maret</option>
							<option value="4">April</option>
							<option value="5">Mei</option>
							<option value="6">Juni</option>
							<option value="7">Juli</option>
							<option value="8">Agustus</option>
							<option value="9">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</div> -->
				</div>
			</form>

            <!-- Tabel list perjadin pegawai -->
            <table class="table table-hover searchable sortable">

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
					<?php foreach ($perjadin_data as $pd): ?>
						<tr>
							<td><?php echo $pd->nip ?></td>
							<td><?php echo $pd->name ?></td>
							<td><?php echo $pd->attribute . ' ' . $pd->activity ?></td>
							<td><?php echo $pd->date ?></td>
							<td width="250">
								<a href="<?= base_url('/edit/' . $pd->id) ?>"
									class="badge badge-primary">Edit</a>
								<a onclick="deleteConfirm('<?= base_url('/list_perjadin/delete/' . $pd->id) ?>')"
									href="#!" class="badge badge-danger">Hapus</a>

                                <!-- <a href="<//?= base_url('/edit/' . $pd->id) ?>" class="badge badge-primary">edit</a>
                                <a onclick="deleteConfirm('</?= base_url(); ?>perjadin_pegawai/list_perjadin/delete/</?= $pd['id']; ?>')" href="#!" class="badge badge-danger">hapus</a> -->
                            </td>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				
            </table>
			
        </div>
    </div>

</div> <!-- /.container-fluid -->
			

<!-- <script>
function deleteConfirm(url) {
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script> -->
