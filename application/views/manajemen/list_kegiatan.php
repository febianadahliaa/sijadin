<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg">
            <h3 class="text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg">
            <?php if ($this->session->flashdata('error') != '') : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('message') != '') : ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Page Content -->
    <div class="row mb-4">
        <div class="col-lg-6">
            <!-- <a href="<?= base_url('manajemen/kegiatan/add_attribute'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Atribut</a> -->
            <a class="btn btn-secondary btn-sm mb-4" href="<?= base_url('manajemen/kegiatan/add_attribute'); ?>" role="button" data-toggle="modal" data-target="#addDataAttribute"><i class="fas fa-plus mr-2"></i>Tambah Data Atribut</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="15%" class="text-center">No.</th>
                            <th width="15%" class="text-center">Kode</th>
                            <th width="55%" class="text-center">Atribut</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_atribut as $key => $value) : ?>
                            <tr id="<?= $value->attribute_id ?>">
                                <td class="number text-center"><?= $key + 1 ?></td>
                                <td class="kode text-center"><?= $value->attribute_id ?></td>
                                <td><?= $value->attribute ?></td>
                                <td class="action text-center" width="250">
                                    <a href="<?= base_url('manajemen/kegiatan/delAttr/' . $value->attribute_id) ?>" class="badge badge-pill badge-danger deleteAttr" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- <a href="<?= base_url('manajemen/kegiatan/addOriAct'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Kegiatan Origin</a> -->
            <a class="btn btn-warning btn-sm mb-4" href="<?= base_url('manajemen/kegiatan/addOriAct'); ?>" role="button" data-toggle="modal" data-target="#addDataOriActivity"><i class="fas fa-plus mr-2"></i>Tambah Data Kegiatan Origin</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="15%" class="text-center">No.</th>
                            <th width="15%" class="text-center">Kode</th>
                            <th width="55%" class="text-center">Kegiatan Origin</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_kegiatan_origin as $key => $value) : ?>
                            <tr id="<?= $value->activity_id ?>">
                                <td class="number text-center"><?= $key + 1 ?></td>
                                <td class="kode text-center"><?= $value->activity_id ?></td>
                                <td><?= $value->activity ?></td>
                                <td class="action text-center" width="250">
                                    <a href="<?= base_url('manajemen/kegiatan/delOriAct/' . $value->activity_id) ?>" class="badge badge-pill badge-danger deleteOriAct" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="row mb-4">
        <div class="col">
            <!-- <a href="<?= base_url('manajemen/kegiatan/addAct'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Kegiatan</a> -->
            <a class="btn btn-info btn-sm mb-4" href="<?= base_url('manajemen/kegiatan/addAct'); ?>" role="button" data-toggle="modal" data-target="#addDataActivity"><i class="fas fa-plus mr-2"></i>Tambah Data Kegiatan</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%" class="text-center">No.</th>
                            <th width="10%" class="text-center">Kode</th>
                            <th width="20%" class="text-center">Atribut</th>
                            <th width="45%" class="text-center">Kegiatan</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_kegiatan as $key => $value) : ?>
                            <tr id="<?= $value->activity_code ?>">
                                <td class="number text-center"><?= $key + 1 ?></td>
                                <td class="kode text-center"><?= $value->activity_code ?></td>
                                <td><?= $value->attribute ?></td>
                                <td><?= $value->activity ?></td>
                                <td class="action text-center" width="250">
                                    <a href="<?= base_url('manajemen/kegiatan/delAct/' . $value->activity_code) ?>" class="badge badge-pill badge-danger deleteAct" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->

</div>
<!-- Ending Page Content -->