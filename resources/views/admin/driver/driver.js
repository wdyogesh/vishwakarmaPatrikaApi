function StatusUpdate(id,status,statusurl) {
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
                url:statusurl,
                data: {id: id,status: status},
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
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