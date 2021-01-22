<!-- Begin Page Content -->
<div class="container-fluid px-md-4">
    <!-- Back Button -->
    <a class="btn btn-outline-primary btn-sm mb-4" href="<?= base_url('manajemen/pegawai'); ?>" role="button"><i class="fas fa-arrow-left mr-2"></i>Kembali ke Manajemen Pegawai</a>

    <!-- Page heading -->
    <div class="row">
        <div class="col-lg-8">
            <h3 class="text-gray-800"><strong><?= $title ?></strong></h3>
            <hr class="sidebar-divider">
        </div>
    </div>

    <!-- Notification -->
    <div class="row">
        <div class="col-lg-8">
            <?php
            if ($this->session->flashdata('error') != '') {
                echo '<div class="alert alert-danger" role="alert">';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <?php
            if ($this->session->flashdata('message') != '') {
                echo '<div class="alert alert-success" role="alert">';
                echo $this->session->flashdata('message');
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-8">
            <form action="<?= base_url('manajemen/pegawai/add'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nip">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" value="<?= set_value('nip') ?>">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="name">Nama Pegawai</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="roleId">Role</label>
                        <select name="roleId" id="roleId" class="form-control custom-select">
                            <option value="" selected>--Pilih Role--</option>
                            <?php foreach ($data_role as $value) { ?>
                                <option value="<?= $value->id ?>" <?= set_select('roleId', $value->id) ?>><?= ucfirst(str_replace('_', ', ', $value->role)) ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('roleId', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control custom-select">
                            <option value="" selected>--Pilih Jenis Kelamin--</option>
                            <option value="female" <?= set_select('gender', 'female') ?>>Perempuan</option>
                            <option value="male" <?= set_select('gender', 'male') ?>>Laki-laki</option>
                        </select>
                        <?= form_error('gender', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="positionId">Jabatan</label>
                        <select name="positionId" id="positionId" class="form-control custom-select">
                            <option value="" selected>--Pilih Jabatan--</option>
                            <?php foreach ($data_position as $value) { ?>
                                <option value="<?= $value->id ?>" <?= set_select('positionId', $value->id) ?>><?= $value->position ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('positionId', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone">Nomor HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone') ?>">
                        <?= form_error('phone', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Input Data</button>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- Ending Page Content -->