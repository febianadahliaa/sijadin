<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page heading -->					
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <div class="row">
        <div class="col-lg-6">
            
            <!-- alert dengan tombol close -->
            <?php if ($this->session->flashdata('error')) : ?>
            <!-- <div class="alert alert-warning alert-danger fade show" role="alert">
                <?= $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <?php endif; ?>
            
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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambahkan Menu Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']; ?></td>
                            <td>
                                <a href="javascript:;" data-menu="<?= $m['menu'] ?>" class="badge badge-primary" data-toggle="modal" data-target="#editMenuModal">edit</a>

                                <!-- <a 
                                    href="javascript:;"
                                    data-id="<?php echo $dt['id'] ?>"
                                    data-nama="<?php echo $dt['nama'] ?>"
                                    data-alamat="<?php echo $dt['alamat'] ?>"
                                    data-pekerjaan="<?php echo $dt['pekerjaan'] ?>"
                                    data-toggle="modal" data-target="#edit-data">
                                    <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-info">Ubah</button>
                                </a> -->



                                <a onclick="deleteConfirm('<?= base_url(); ?>menu/delete/<?= $m['id']; ?>')" href="#!" class="badge badge-danger">hapus</a>
                            </td>
                        </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div> <!-- /.container-fluid -->


<!-- MODAL -->

<!-- Modal tambah menu -->
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url(); ?>menu/add" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit menu -->
<div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="<?= base_url(); ?>menu/edit" method="post" role="form"> <!-- role="form" ???? -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu"> <!-- value="<?= $menu['menu'] ?>" -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#editMenuModal').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal = $(this)

            // Isi nilai pada field
            // modal.find('#id').attr("value",div.data('id'));
            modal.find('#menu').attr("value", div.data('menu'));
            // modal.find('#alamat').html(div.data('alamat'));
            // modal.find('#pekerjaan').attr("value",div.data('pekerjaan'));
        });
    });
</script>




<!-- Modal hapus menu -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Apakah yakin ingin menghapus menu <?= $m['menu']; ?> ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">Menu yang telah dihapus tidak dapat dikembalikan.</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteConfirmationModal').modal();
	}
</script>