$(document).ready(function() {
    // Open Modal Reset Password
    $('.open-reset-modal').click(function() {
        var nip = $(this).data('nip');
        $('input#nip').val(nip);
    })

    // Autofill Name
    $('#nip').change(function() {
        var name = $(this).find(':selected').data('name');
        $('#name').val(name);
    });

    // Datatables Perjadin
    $('.dataTable-list').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    
    // Datatables Perjadin Saya
    $('.dataTable-saya').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    
    // Datatables Pegawai
    $('.dataTable-pegawai').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
    });
    
    // Datatables
    $('.dataTables').DataTable({
        "lengthMenu": [
            [+5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "info": false,
        "bLengthChange": false
    });

    // Auto Close Alert
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 4000);
});