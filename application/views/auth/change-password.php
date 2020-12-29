<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->					
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <div class="row">
        <div class="col-lg-6">
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
            <form action="<?= base_url('auth/changepassword'); ?>" method="post">
                <div class="form-group">
                    <label for="currentPassword">Password lama</label>
                    <input type="password" class="form-control" id="currentPassword" name="currentPassword">
                    <?= form_error('currentPassword', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="newPassword1">Password baru</label>
                    <input type="password" class="form-control" id="newPassword1" name="newPassword1">
                </div>
                <div class="form-group">
                    <label for="newPassword2">Ulangi password baru</label>
                    <input type="password" class="form-control" id="newPassword2" name="newPassword2">
                    <?= form_error('newPassword2', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Ubah password</button>
                </div>
            </form>
        </div>
    </div>

</div> <!-- /.container-fluid -->