function StatusUpdate(id,status,myurl) {
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
    function(isConfirm) {
        if (isConfirm) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url:myurl,
                data: {id: id,status: status},
                method: 'POST',
                success: function(response) {
                    if (response.status == 1) {
                        location.reload();
                    } else {
                        swal("Cancelled", wrong, "error");
                    }
                },
                error: function(e) {
                    swal("Cancelled", wrong, "error");
                }
            });
        } else {
            swal("Cancelled", record_safe, "error");
        }
    });
}
$(document).on("click", ".open-table-modal", function () {
    $(".modal-body #bookingid").val( $(this).data('id') );
});
function set_table_number(status,tableurl){
    var bookingid = $('#bookingid').val();
    var table_number = $('#table_number').val();
    $('#preloader').show();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url:tableurl,
        method:'POST',
        data:{'id':bookingid,'table_number':table_number,'status':status},
        dataType:"json",
        success:function(response){
            if (response.status == 1) {
                location.reload();
            }else{
                $('#preloader').hide();
                $('.table_error').show().html(response.message);
                $(".modal-body #bookingid").val(response.id);
            }
        },error:function(response){
            $('#preloader').hide();
            $('.table_error').show().html(response.message);
            $(".modal-body #bookingid").val(response.id);
            return false;
        }
    });
}