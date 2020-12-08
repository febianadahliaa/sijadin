<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- </?php $this->load->view('kasie/_partials/breadcrumb.php') ?> -->

    <!-- Data Tables -->
    <div class="card mb-3">
        <div class="card-header">
            <h5>DAFTAR PERJADIN SAYA</h5>
        </div>

        <div class="card-body">
            <div>
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
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-hover" id="dataTable-saya" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_perjadin as $value) : ?>
                            <tr>
                                <td><?= date("d-m-Y", strtotime($value->date)) ?></td>
                                <td><?= $value->attribute . ' ' . $value->activity ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->
        </div> <!-- /.card-body -->
    </div>
</div> <!-- /.container-fluid -->