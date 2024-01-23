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
                        swal.close();
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
$(document).on('click','.add, .deduct',function(){
    event.preventDefault();
    var type = $(this).attr('data-type');
    var myurl = $(this).attr('data-url');
    var id = $('#id').val();
    var money = $('#price').val();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:myurl,
        data:{id:id,type:type,money:money},
        method:'POST',
        success:function(data){
            if(data.success == 0){
                $('#money_error').show();
                $('#money_error').text(data.errors.id || data.errors.type || data.errors.money || data.errors.amount);
            }else{
                $('#price').val('');
                $('#money_error').hide();
                $('.my_wallet').text(data.wallet);
                toastr.success(data.message);
            }
        },
        error:function (response) {
            $('#money_error').show();
            $('#money_error').text(response.responseJSON.errors.id || response.responseJSON.errors.type || response.responseJSON.errors.money || response.responseJSON.errors.amount);
        }
    });
});