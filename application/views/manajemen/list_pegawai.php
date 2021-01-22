<!-- Begin Page Content -->
<div class="container-fluid px-md-4">

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg">
            <h3 class="text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Page Content -->
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

            <!-- </?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?> -->

            <!-- <a href="<?= base_url('manajemen/pegawai/add'); ?>" class="badge badge-pill badge-primary mb-4"><i class="fas fa-user-plus"></i>Tambah Data Pegawai Baru</a> btn btn-primary mb-3 -->
            <a class="btn btn-primary btn-sm mb-4" href="<?= base_url('manajemen/pegawai/add'); ?>" role="button"><i class="fas fa-user-plus mr-2"></i> Tambah Data Pegawai Baru</a>

            <div class="table-responsive">
                <table class="table table-hover table-sm dataTables" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">NIP</th>
                            <th>Nama Pegawai</th>
                            <th class="text-center">Jabatan</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data_pegawai as $key => $value) : ?>
                            <tr id="<?= $value->nip ?>">
                                <td class="number text-center"><?= $key + 1 ?></td>
                                <td class="nip text-center"><?= $value->nip ?></td>
                                <td><?= $value->name ?></td>
                                <td><?= $value->position ?></td>
                                <td class="action text-center" width="250">
                                    <a href="" class="badge badge-pill badge-warning mr-1 open-reset-modal" data-nip="<?= $value->nip ?>" data-toggle="modal" data-target="#resetPasswordModal">Reset Password</a>
                                    <a href="<?= base_url('manajemen/pegawai/delete/' . $value->nip) ?>" class="badge badge-pill badge-danger deleteUser" data-toggle="modal" data-target="#deleteModal">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- Ending Page Content -->