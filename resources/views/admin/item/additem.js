// for add item
var variation_row = 1;
function variation_fields() {
    "use strict";
    variation_row++;
    var objTo = document.getElementById('more_variation_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "form-group mb-0 removeclass"+variation_row);
    divtest.innerHTML = '<div class="row panel-body variations"><div class="col-sm-4"><div class="form-group"><label for="variation" class="col-form-label">'+variation+'</label><input type="text" class="form-control variation" name="variation[]" id="variation" placeholder="'+enter_variation+'" required=""></div></div><div class="col-sm-4"><div class="form-group"><label for="product_price" class="col-form-label">'+product_price+'</label><input type="text" class="form-control product_price" id="product_price" name="product_price[]" placeholder="'+enter_product_price+'" required=""></div></div><div class="col-sm-3"><div class="form-group"><label for="" class="col-form-label">'+qty+'</label><input type="number" class="form-control" min="0" value="0" name="available_qty[]" placeholder="'+qty+'"></div></div><div class="col-sm-4 d-none"><div class="form-group"><label for="product_price" class="col-form-label">'+sale_price+'</label><input type="text" class="form-control sale_price" id="sale_price" name="sale_price[]" placeholder="'+enter_sale_price+'" required="" value="0"></div></div><div class="col-sm-1"><div class="form-group"><div class="input-group"><div class="input-group-btn pt-35"><button class="btn btn-danger" type="button" onclick="remove_variation_fields('+ variation_row +');"> x </button></div></div></div></div><div class="clear"></div></div>';
    objTo.appendChild(divtest)
}
function remove_variation_fields(rid) {
    "use strict";
    $('.removeclass'+rid).remove();
}
// for update item
$(document).ready(function() {
    "use strict";
    $('#addproduct').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        form_data.append('file',$('#file')[0].files);
        $('#preloader').show();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $("#storeimagesurl").val() ,
            method:"POST",
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                $('#preloader').hide();
                var msg = '';
                $('div.gallery').html('');  
                if(result.error.length > 0){
                    for(var count = 0; count < result.error.length; count++){
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#iiemsg').html(msg);
                    setTimeout(function(){
                      $('#iiemsg').html('');
                    }, 5000);
                }else{
                    msg += '<div class="alert alert-success mt-1">'+result.success+'</div>';
                    $('#message').html(msg);
                    $("#AddProduct").modal('hide');
                    $("#addproduct")[0].reset();
                    location.reload();
                }
            },
        })
    });
    $('#editimg').on('submit', function(event){
        event.preventDefault();
        var form_data = new FormData(this);
        $('#preloader').show();
        $.ajax({
            url: $("#updateimageurl").val() ,
            method:'POST',
            data:form_data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(result) {
                $('#preloader').hide();
                var msg = '';
                if(result.error.length > 0){
                    for(var count = 0; count < result.error.length; count++){
                        msg += '<div class="alert alert-danger">'+result.error[count]+'</div>';
                    }
                    $('#emsg').html(msg);
                    setTimeout(function(){
                      $('#emsg').html('');
                    }, 5000);
                }else{
                    location.reload();
                }
            },
        });
    });
});
function updateItemImage(id,imageurl) {
    "use strict";
    $('#preloader').show();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:imageurl,
        data: {id: id},
        method: 'POST',
        dataType: 'json',
        success: function(response) {
            $('#preloader').hide();
            jQuery("#EditImages").modal('show');
            $('#idd').val(response.ResponseData.id);
            $('.galleryim').html("<img src="+response.ResponseData.img+" class='img-fluid rounded ' style='max-height: 200px;'>");
            $('#old_img').val(response.ResponseData.image);
        },
        error: function(error) {
            $('#preloader').hide();
        }
    })
}
function DeleteVariation(id,item_id,deleteurl) {
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
                data: {id: id,item_id: item_id,},
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    } else if  (response == 2) {
                        swal("Cancelled", cannot_delete, "error");
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
function deleteItemImage(id,item_id,deleteurl) {
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
                data: {id: id,item_id: item_id,},
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response == 1) {
                        location.reload();
                    } else if (response == 2) {
                        swal("Cancelled", last_image, "error");
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
function edititem_fields() {
    "use strict";
    var counter = document.getElementById('counter');
    var editroom = counter.innerHTML;
   editroom++;
   var editobjTo = document.getElementById('edititem_fields')
   var editdivtest = document.createElement("div");
   editdivtest.setAttribute("class", "form-group mb-0 editremoveclass"+editroom);
   editdivtest.innerHTML = '<input type="hidden" class="form-control" id="variation_id" name="variation_id['+ editroom +']"><div class="row panel-body"><div class="col-sm-4"><div class="form-group"><label for="variation" class="col-form-label">'+variation+'</label><input type="text" class="form-control variation" name="variation['+ editroom +']" id="variation" placeholder="'+enter_variation+'" required=""></div></div><div class="col-sm-4"><div class="form-group"><label for="product_price" class="col-form-label">'+product_price+'</label><input type="text" class="form-control product_price" id="product_price" name="product_price['+ editroom +']" placeholder="'+enter_product_price+'" required=""></div></div><div class="col-sm-3"><div class="form-group"><label for="" class="col-form-label">'+qty+'</label><input type="number" class="form-control" name="available_qty['+ editroom +']" placeholder="'+qty+'" min="0" required=""></div></div><div class="col-sm-4 d-none"><div class="form-group"><label for="product_price" class="col-form-label">'+sale_price+'</label><input type="text" class="form-control sale_price" id="sale_price" name="sale_price['+ editroom +']" placeholder="'+enter_sale_price+'" required="" value="0"></div></div><div class="col-sm-1"> <div class="form-group"> <div class="input-group"> <div class="input-group-btn pt-35"> <button class="btn btn-danger" type="button" onclick="remove_edit_fields('+ editroom +');"> x </button></div></div></div></div><div class="clear"></div>';
   counter.innerHTML = editroom;
   editobjTo.appendChild(editdivtest)
}
function remove_edit_fields(rid) {
    "use strict";
  $('.editremoveclass'+rid).remove();
}
// common
function get_variation(x) {
    "use strict";
    const currenturl = window.location.href;
    if(x.value == 1){
        document.getElementById('price_row').style.display = 'none';
        if(currenturl.includes("add") == true){
            document.getElementById('variations').style.display = 'flex';
        }else{
            document.getElementById('variations').style.display = 'grid';
        }
        $('.variations').show();
        $('.btn-add-variations').show();
        $(".variation").prop('required',true);
        $(".attribute").prop('required',true);
        $(".product_price").prop('required',true);
        $(".sale_price").prop('required',true);
        $("#price").prop('required',false);
    }else{
        document.getElementById('price_row').style.display = 'flex';
        document.getElementById('variations').style.display = 'none';
        $('#edititem_fields').html('');
        $('.variations').hide();
        $('.btn-add-variations').hide();
        $(".variation").prop('required',false);
        $(".attribute").prop('required',false);
        $(".product_price").prop('required',false);
        $(".sale_price").prop('required',false);
        $("#price").prop('required',true);
        $('#extrarows').html('');
    }
}
$('#cat_id').on('change',function(){
    "use strict";
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:$(this).attr('data-url'),
        data: {id: $(this).val()},
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status == 1) {
                var html = '<option value="" selected>'+select+'</option>';
                $.each( response.data, function( key, value ) {
                    html += '<option value="'+value.id+'" data-cat-id="'+value.cat_id+'">'+value.subcategory_name+'</option>';
                });
                $('#subcat_id').html(html);
            } else {
                $('.emsg').html(wrong)
            }
        },
        error: function(e) {
            $('.emsg').html(wrong)
        }
    });
});
$(document).ready(function() {
    "use strict";
    var itemImagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            $('div.gallery').html('');
            var n=0;
            for (var i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<div>')).attr('class', 'imgdiv').attr('id','img_'+n).html('<img src="'+event.target.result+'" class="img-fluid rounded hw-50 m-2">').appendTo(placeToInsertImagePreview); 
                    n++;
                }
                reader.readAsDataURL(input.files[i]);                                  
            }
        }
    };
    $('#image').on('change', function() {
        itemImagesPreview(this, 'div.gallery');
    });
});
function StatusUpdate(id, status, statusurl) {
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
                url: statusurl,
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
function StatusFeatured(id, status, featuredurl) {
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
                url: featuredurl,
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
// delete item
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
                url: deleteurl,
                data: {id: id},
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