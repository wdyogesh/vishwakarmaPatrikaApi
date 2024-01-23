

$('#addons_name').keyup(function() {
    "use strict";
    $(this).val($(this).val().replace(/,/g,''));
});

function get_price(x) {
    "use strict";
    if(x.value == 1){

        document.getElementById('price_row').classList.remove('d-flex');

        document.getElementById('price_row').style.display = 'none';

    }else{

        document.getElementById('price_row').style.display = 'flex';

    }

}



function StatusUpdate(id,status,statusurl) {
    "use strict";
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

function Delete(id,deleteurl) {
    "use strict";

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