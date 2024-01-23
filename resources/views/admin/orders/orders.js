// orders-scripts
function OrderStatusUpdate(id, status, myurl) {
    swal({
        title: are_you_sure,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: yes,
        cancelButtonText: no,
        closeOnConfirm: false,
        closeOnCancel: false,
        showLoaderOnConfirm: true,
    },
        function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url: myurl,
                    data: { id: id, status: status },
                    method: 'POST',
                    dataType: 'json',
                    success: function (response) {
                        if (response == 1) {
                            location.reload();
                        } else {
                            swal("Cancelled", wrong, "error");
                        }
                    },
                    error: function (e) {
                        swal("Cancelled", wrong, "error");
                    }
                });
            } else {
                swal("Cancelled", record_safe, "error");
            }
        });
}
$(document).on("click", ".open-AddBookDialog", function () {
    $(".modal-body #order_id").val($(this).data('id'));
    $(".modal-body #order_number").val($(this).attr('data-number'));
});
function assigndriver() {
    var id = $("#order_id").val();
    var driver_id = $('#driver_id').val();
    var order_number = $('#order_number').val();
    var driverurl = $('#driverurl').val();
    $('#preloader').show();
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: driverurl,
        method: 'POST',
        data: { id: id, driver_id: driver_id },
        dataType: "json",
        success: function (data) {
            if (data.status == 1) {
                location.reload();
            } else {
                $('#preloader').hide();
                $('#myModal').modal().show();
                $('.driver_error').show().html(data.errors.driver_id);
                $('.id_error').show().html(data.errors.id);
                $('.modal-body #order_id').val(id);
                $('.modal-body #order_number').val(order_number);
            }
        },
        error: function (data) {
            $('#preloader').hide();
            return false;
        }
    });
}

if(window.location.href.includes("report")){
    var table = $('.reportstable .zero-configuration').DataTable( {
        lengthChange: false,
        buttons: [ 'excel']
    });
    table.buttons().container().appendTo( '#DataTables_Table_0_wrapper .col-md-6:eq(0)' );
}