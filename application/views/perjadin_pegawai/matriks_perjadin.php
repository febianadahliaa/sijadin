<!-- Begin Page Content -->
<div class="container-fluid">
	
	<!-- Page heading -->					
    <h1 class="h3 mb-4 text-gray-800"><?= $title . ' Pegawai'; ?></h1>

	<div class="row">
        <div class="col-lg">
            
			<!-- Pilih bulan -->
			<div class="dropdown">
				<button class="btn btn-primary btn-sm mb-3 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bulan</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<?php
					// $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 12 months');
					// $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 0 months');
					// while($month < $end){
					// 	$selected = (date('n', $month)==date('F'))? ' selected' :'';
					// 	echo '<option'.$selected.' value="'.date('F', $month).'">'.date('F', $month).'</option>'."\n";
					// 	$month = strtotime("+1 month", $month);
					// }
					?>
					<a class="dropdown-item" href="#">Action</a>
					<a class="dropdown-item" href="#">Another action</a>
					
				</div>
			</div>
			

            <!-- Tabel matriks perjadin pegawai -->
            <table class="table table-responsive">
                
				<thead>
                    <tr>
                        <th scope="col">Nama</th>
						<?php for ($day=1; $day <= date('t'); $day++) { ?>
							<th><?= $day; ?></th>
						<?php } ?>
                    </tr>
                </thead>

                <tbody>
					<?php $names = array(); ?>
					<?php foreach ($perjadin as $p) : ?>
                        <tr>
							<?php
								// if (in_array($p['name'], $names)) {
								// 	continue;
								// }
								// $names[] = $p['name'];
							?>
                            
							<td ><?= $p['name']; ?></td>
																
							<?php for ($day=1; $day <= date('t'); $day++) { ?>
								
								<?php $dates = date('d', strtotime($p['date'])); ?>
								
								<?php if ($dates == $day) { ?>
									<td><?= 'TRUE'; ?></td>
								<?php } else { ?>
									<td><?= ''; ?></td>
								<?php } ?>
								
							<?php } ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>

        </div>
    </div>

</div> <!-- /.container-fluid -->