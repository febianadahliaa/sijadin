</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; sijadin <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
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
                    }
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'Data anda aman :)',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                })
            }
        })
    });
</script>

<!-- Autofill Input -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#nip').change(function() {
            var name = $(this).find(':selected').data('name');
            $('#name').val(name);
        });

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
                            $('#activity').html('<option value="0"> --Pilih Kegiatan-- </option>');
                        }
                    }
                });
            }
        });

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

<!-- Perjadin Saya -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#month').change(function() {
            var month = $(this).find(':selected').val();
            html = '';
            if (month.localeCompare('0') != 0) {
                $.ajax({
                    url: '<?= base_url('perjadin_saya/filterMonth/') ?>' + month,
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.length > 2) {
                            var result = $.parseJSON(data);
                            var numb = 1;
                            $.each(result, function(key, value) {
                                html += "<tr><td>" + numb + "</td><td>" + value['date'] + "</td><td>" + value['attribute'] + ' ' + value['activity'] + "</td></tr>";
                                numb += 1;
                                $('#dataPerSaya').html(html);
                            })
                        } else {
                            html += "<tr> <td class = 'text-center' colspan = '3' > Tidak Ada Perjadin! </td></tr>";
                            $('#dataPerSaya').html(html);
                        }
                    }
                });
            } else {
                $.ajax({
                    url: '<?= base_url('perjadin_saya/perjadinSaya/') ?>',
                    type: 'POST',
                    success: function(data) {
                        // console.log(data);
                        if (data.length > 2) {
                            var result = $.parseJSON(data);
                            var numb = 1;
                            $.each(result, function(key, value) {
                                html += "<tr><td>" + numb + "</td><td>" + value['date'] + "</td><td>" + value['attribute'] + ' ' + value['activity'] + "</td></tr>";
                                numb += 1;
                                $('#dataPerSaya').html(html);
                            })
                        } else {
                            html += "<tr> <td class = 'text-center' colspan = '3' > Tidak Ada Perjadin! </td></tr>";
                            $('#dataPerSaya').html(html);
                        }
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

</body>

</html>