<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

    <<<<<<< HEAD <!-- Data Tables -->
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
                            =======
                            <!-- Page heading -->
                            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                            <div class="row">
                                <div class="col-lg">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="perjadinSaya" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                >>>>>>> hdd
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Kegiatan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataPerSaya">
                                                <?php if (gettype($data_perjadin) == 'string') { ?>
                                                    <tr>
                                                        <td class="text-center" colspan="3">Tidak Ada Perjadin!</td>
                                                    </tr>
                                                <?php } else { ?>
                                                    <?php foreach ($data_perjadin as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $key + 1 ?></td>
                                                            <td><?= date("d-M-Y", strtotime($value->date)) ?></td>
                                                            <td><?= $value->attribute . ' ' . $value->activity ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php } ?>
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

                <!-- <div class="card ml-2 mr-2">
        <div class="card-header">
            <h5>DAFTAR PERJADIN SAYA</h5>
        </div>

        <div class="card-body"> -->
                <!-- <div class="row justify-content-start">
                <div class="col-md-4 input-group mb-3">
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
                <div class="col-md-4 input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="monthSelect">Tahun</label>
                    </div>
                    <select class="custom-select" id="month" name="Month">
                        <option value='0'>--Pilih--</option>
                        <option value='01'>2020</option>
                    </select>
                </div>
            </div>
            <br> -->
                <!-- <div class="table-responsive">
        <table class="table table-striped" id="perjadinSaya" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                </tr>
            </thead>
            <tbody id="dataPerSaya">
                <?php if (gettype($data_perjadin) == 'string') { ?>
                    <tr>
                        <td class="text-center" colspan="3">Tidak Ada Perjadin!</td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($data_perjadin as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= date("d-M-Y", strtotime($value->date)) ?></td>
                            <td><?= $value->attribute . ' ' . $value->activity ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php } ?>
            </tbody>
        </table>
    </div> <!-- /.table-responsive 
</div> <!-- /.card-body 
</div> 
</div> <!-- /.container-fluid -->