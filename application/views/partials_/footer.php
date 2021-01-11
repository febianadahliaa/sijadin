</div>
<!-- End of Main Content -->

<!-- Footer -->
<!-- <footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; sijadin <?= date('Y'); ?></span>
        </div>
    </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Apakah yakin ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik tombol "Keluar" di bawah ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Keluar</a>
            </div>
        </div>
    </div>
</div> -->

<!-- Edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h1 class="modal-title h3 text-gray-800" id="editModalLabel">Edit Perjadin Pegawai</h1>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo base_url('perjadin_pegawai/list_perjadin/edit') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-row ml-3">
                        <input class="form-control" type="hidden" id="perjadin_id" name="perjadin_id" value="">
                        <div class="form-group col-lg-5 mb-0">
                            <label class="mt-2" for="nip">NIP</label>
                            <select class="form-control custom-select" id='nip' name="nip">
                                <option value="" selected>--Pilih NIP--</option>
                                <?php foreach ($data_user as $value) { ?>
                                    <option value="<?= $value->nip ?>" <?= set_select('nip', $value->nip) ?> data-name='<?= $value->name ?>'><?= $value->nip ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 mb-0">
                            <label class="mt-2" for="nama">Nama Pegawai</label>
                            <input class="form-control" type="text" name="name" id='name' placeholder="-" value="<?= set_value('name') ?>" readonly />
                        </div>
                        <div class="form-group col-8">
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-row ml-3">
                        <div class="form-group col-lg-4 mb-0">
                            <label class="mt-2" for="attribute">Atribut</label>
                            <select class="form-control custom-select" id="attribute" name="attribute">
                                <option value="" selected>--Pilih Atribut--</option>
                                <?php foreach ($data_attr as $value) { ?>
                                    <option value="<?= $value->attribute_id ?>" <?= set_select('attribute', $value->attribute_id) ?> data-attribute='<?= $value->attribute ?>'><?= $value->attribute_id . '-' . $value->attribute ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-5 mb-0">
                            <label class="mt-2" for="activity">Kegiatan</label>
                            <select class="form-control custom-select" id="activity" type="text" name="activity">
                                <option value="" selected>--Pilih Kegiatan--</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-2 mb-0">
                            <label class="mt-2" for="kode">Kode</label>
                            <input class="form-control <?php echo form_error('kode') ? 'is-invalid' : '' ?>" type="text" id="code" name="code" list="code" placeholder="-" readonly />
                            <div class="invalid-feedback"><?php echo form_error('kode') ?></div>
                        </div>
                        <div class="form-group col-8">
                            <?= form_error('activity', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                    <div class="form-row ml-3">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input class="form-control" type="date" id="date" name="date" value="<?= set_value('date') ?>" />
                            <?= form_error('date', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input class="btn btn-success" type="submit" name="btn" value="Simpan" />
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Logout with Sweet Alert -->
<script type="text/javascript">
    $(".logout").click(function() {
        Swal.fire({
            titleText: 'Apakah yakin ingin keluar?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Keluar",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('auth/logout') ?>', {
                    icon: 'success',
                }
            }
        });
    });
</script>

<!-- Delete with Sweet Alert -->
<script type="text/javascript">
    $(".delete").click(function() {
        var id = $(this).parents("tr").attr("id");

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak akan bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Hapus",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batalkan",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('perjadin_pegawai/list_perjadin/delete/') ?>' + id,
                    type: 'DELETE',
                    error: function() {
                        Swal.fire('Something is wrong', '', "error");
                    },
                    success: function(data) {
                        $("#" + id).remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Perjadin berhasil dihapus!',
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1400);
                    }
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Data anda aman ✧◝(⁰▿⁰)◜✧',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                })
            }
        })
    });
</script>

<!-- Modal Edit -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.open-edit-dialog').click(function() {
            var perjadin_id = $(this).data('id');
            var nip = $(this).parents('#' + perjadin_id).children('.nip').data('nip');
            var attribute = $(this).parents('#' + perjadin_id).children('.attribute').data('attribute');
            var activity_id = $(this).parents('#' + perjadin_id).children('.attribute').data('activity');
            var date = $(this).parents('#' + perjadin_id).children('.date').data('date');

            if (perjadin_id) {
                // Fill Perjadin Id
                $('input#perjadin_id.form-control').val(perjadin_id);

                // Fill NIP
                var selectNip = $('select#nip.form-control.custom-select option').filter(function() {
                    return $(this).text() == nip;
                });
                selectNip.prop('selected', true);

                // Fill Name
                $('input#name.form-control').val(selectNip.data('name'));

                // Fill Attribute
                $('select#attribute.form-control.custom-select option').filter(function() {
                    return $(this).data('attribute') == attribute;
                }).prop('selected', true);

                // Fill Activity
                var id_attr = $('select#attribute.form-control.custom-select option').filter(function() {
                    return $(this).data('attribute') == attribute;
                }).val();
                if (id_attr) {
                    $.ajax({
                        url: '<?= base_url('perjadin_pegawai/input_perjadin/searchAct/') ?>' + id_attr,
                        type: 'POST',
                        success: function(data) {
                            if (data) {
                                $('#activity').html(data);
                                $('select#activity.form-control.custom-select option').filter(function() {
                                    return $(this).val() == activity_id;
                                }).prop('selected', true);
                            } else {
                                $('#activity').html('<option value="">--Pilih Kegiatan--</option>');
                                $('select#activity.form-control.custom-select option').filter(function() {
                                    return $(this).val() == activity_id;
                                }).prop('selected', true);
                            }
                        }
                    });
                } else {
                    $('#activity').html('<option value="">--Pilih Kegiatan--</option>');
                    $('select#activity.form-control.custom-select option').filter(function() {
                        return $(this).val() == activity_id;
                    }).prop('selected', true);
                }

                // Fill Code
                if (activity_id != 0 && id_attr != 0) {
                    $.ajax({
                        url: '<?= base_url('perjadin_pegawai/input_perjadin/getKode/') ?>' + id_attr + '/' + activity_id,
                        type: 'POST',
                        success: function(data) {
                            if (data) {
                                $('#code').attr('value', data)
                            } else {
                                $('#code').attr('value', '-')
                            }
                        }
                    });
                } else {
                    $('#code').attr('value', '-')
                }

                // Fill Date
                $('input#date.form-control').val(date);
            }
        })
    });
</script>

<!-- Autofill Input -->
<script type="text/javascript">
    $(document).ready(function() {
        // Autofill Name
        $('#nip').change(function() {
            var name = $(this).find(':selected').data('name');
            $('#name').val(name);
        });

        // Autofill Activity
        $('#attribute').change(function() {
            var id_attr = $(this).find(':selected').val();
            if (id_attr) {
                $.ajax({
                    url: '<?= base_url('perjadin_pegawai/input_perjadin/searchAct/') ?>' + id_attr,
                    type: 'POST',
                    success: function(data) {
                        if (data) {
                            $('#activity').html(data);
                        } else {
                            $('#activity').html('<option value="">--Pilih Kegiatan--</option>');
                        }
                    }
                });
            } else {
                $('#activity').html('<option value="">--Pilih Kegiatan--</option>');
            }
        });

        // Autofill Code
        $('#activity').change(function() {
            var id_attr = $('#attribute').find(':selected').val();
            var id_act = $(this).find(':selected').val();
            if (id_act != 0 && id_attr != 0) {
                $.ajax({
                    url: '<?= base_url('perjadin_pegawai/input_perjadin/getKode/') ?>' + id_attr + '/' + id_act,
                    type: 'POST',
                    success: function(data) {
                        // var result = $.parseJSON(data);
                        if (data) {
                            $('#code').attr('value', data)
                        } else {
                            $('#code').attr('value', '-')
                        }
                    }
                });
            } else {
                $('#code').attr('value', '-')
            }
        });
    });
</script>

<!-- Filter Month Matrix Perjadin -->
<script type="text/javascript">
    $(document).ready(function() {
        var year;
        // Select Year
        $('#year').change(function() {
            year = $(this).find(':selected').val();
            $('select#month.custom-select').val('0');
            $.ajax({
                url: '<?= base_url('perjadin_pegawai/matriks_perjadin/tableMatrix/0/0') ?>',
                type: 'GET',
                success: function(data) {
                    $('#dataMatrix').html(data);
                }
            });
        });
        // Select Month
        $('#month').change(function() {
            var month = $(this).find(':selected').val();
            html = '';
            if (month.localeCompare('0') != 0 && year.localeCompare('0') != 0) {
                $.ajax({
                    url: '<?= base_url('perjadin_pegawai/matriks_perjadin/tableMatrix/') ?>' + year + '/' + month,
                    type: 'GET',
                    success: function(data) {
                        $('#dataMatrix').html(data);
                    }
                });
            } else {
                $.ajax({
                    url: '<?= base_url('perjadin_pegawai/matriks_perjadin/tableMatrix/') ?>' + year + '/' + month,
                    type: 'GET',
                    success: function(data) {
                        $('#dataMatrix').html(data);
                    }
                });
            }
        });
    });
</script>

<!-- Auto Close Alert -->
<script type="text/javascript">
    $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 4000);
    });
</script>

<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable-list').DataTable({
            "lengthMenu": [
                [+5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#perjadinSaya').DataTable({
            "lengthMenu": [
                [+5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
        });
    });
</script>

</body>

</html>