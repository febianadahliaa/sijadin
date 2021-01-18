<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

    <!-- Page heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mb-4">
        <div class="col-lg-6">
            <a href="<?= base_url('manajemen/kegiatan/addAttr'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Atribut</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTable-management" width="100%" cellspacing="0">
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
            <a href="<?= base_url('manajemen/kegiatan/addOriAct'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Kegiatan Origin</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTable-management" width="100%" cellspacing="0">
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
            <a href="<?= base_url('manajemen/kegiatan/addAct'); ?>" class="badge badge-pill badge-primary mb-3">Tambah Data Kegiatan</a>
            <div class="table-responsive">
                <table class="table table-hover table-sm dataTable-management" width="100%" cellspacing="0">
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