function DeleteData(id,deleteurl) {
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
                url:deleteurl,
                data: {id: id},
                method: 'POST',
                success: function(response) {
                    if (response == 1) {
                        location.reload()
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