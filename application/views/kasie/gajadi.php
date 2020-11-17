<!DOCTYPE html>
<html>
<head>
	<title>Beranda</title>
</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
				<h1 class="h2">Sistem Data Perjalanan Dinas</h1>
				<p>Pilih action yang ingin Anda lakukan</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-5 mx-auto mt-5">
				<div class="card-header"><a href="<?php echo site_url('kasie/perjadin/perjadinku') ?>">Perjadin saya</a></div>
				<div class="card-header"><a href="<?php echo site_url('kasie/perjadin/input_perjadin') ?>">Input Perjadin</a></div>
				<div class="card-header"><a href="<?php echo site_url('kasie/perjadin/list_perjadin') ?>">List Perjadin Seluruh Pegawai</a></div>
				<div class="card-header"><a href="<?php echo site_url('kasie/perjadin/matriks_perjadin') ?>">Matriks Perjadin Seluruh Pegawai</a></div>
			</div>
		</div>
	</div>

</body>

</html>
