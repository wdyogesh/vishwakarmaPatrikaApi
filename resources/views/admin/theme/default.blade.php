<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @Helper::appdata()->title }} | {{ trans('labels.admin_title') }} </title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ Helper::image_path(@Helper::appdata()->favicon) }}">
    <!-- Favicon icon -->
    <link href="{{ url('/storage/app/public/admin-assets/assets/plugins/pg-calendar/css/pignose.calendar.min.css') }}"
        rel="stylesheet"><!-- Pignose Calender -->
    <link href="{{ url('/storage/app/public/admin-assets/assets/plugins/chartist/css/chartist.min.css') }}"
        rel="stylesheet"><!-- Chartist -->
    <link
        href="{{ url('/storage/app/public/admin-assets/assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
    <link href="{{ url('/storage/app/public/admin-assets/assets/plugins/sweetalert/css/sweetalert.css') }}"
        rel="stylesheet"><!-- Custom Stylesheet -->
    <link
        href="{{ url('/storage/app/public/admin-assets/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}"
        rel="stylesheet"><!-- Date picker plugins css -->
    <link href="{{ url('/storage/app/public/admin-assets/assets/css/style.css') }}" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="{{ url('/storage/app/public/admin-assets/assets/plugins/toastr/css/toastr.min.css') }}"
        rel="stylesheet">
</head>

<body>
    <!--******************* Preloader start ********************-->
    <div id="preloader" class="bg-light">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class='loader-icon'><img src="{{ Helper::image_path(@Helper::appdata()->logo) }}" alt="Swipy">
                </div>
            </div>
        </div>
    </div>
    <!--******************* Preloader end ********************-->
    <div id="main-wrapper">
        @include('admin.theme.header')
        @include('admin.theme.sidebar')
        <div class="content-body">

            @if (Helper::check_alert() == 0)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger text-center mb-0">
                                <a href="{{ URL::to('admin/settings') }}" class="text-dark"> <i class="fa fa-cog"></i>
                                    {{ trans('messages.settings_note') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')

        </div>
        <!-- /#page-wrapper -->
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <!-- Modal Change Password-->
                            <div class="modal fade text-left" id="ChangePasswordModal" tabindex="-1" role="dialog"
                                aria-labelledby="RditProduct" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <label class="modal-title text-text-bold-600"
                                                id="RditProduct">{{ trans('labels.edit_profile') }}</label>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div id="errors" style="color: red;"></div>
                                        <form method="post" id="change_password_form">
                                            @csrf
                                            <div class="modal-body">
                                                <label>{{ trans('labels.email') }} </label>
                                                <div class="form-group">
                                                    <input type="email"
                                                        placeholder="{{ trans('labels.email') }}"
                                                        class="form-control" name="email" id="email"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                                <label>{{ trans('labels.mobile') }} </label>
                                                <div class="form-group">
                                                    <input type="text"
                                                        placeholder="{{ trans('labels.mobile') }}"
                                                        class="form-control" name="mobile" id="mobile"
                                                        value="{{ Auth::user()->mobile }}">
                                                </div>
                                                <hr>
                                                <h5>{{ trans('labels.change_password') }}</h5>
                                                <label>{{ trans('labels.old_password') }} </label>
                                                <div class="form-group">
                                                    <input type="password"
                                                        placeholder="{{ trans('labels.old_password') }}"
                                                        class="form-control" name="oldpassword" id="oldpassword"
                                                        value=" ">
                                                </div>
                                                <label>{{ trans('labels.new_password') }} </label>
                                                <div class="form-group">
                                                    <input type="password"
                                                        placeholder="{{ trans('labels.new_password') }}"
                                                        class="form-control" name="newpassword" id="newpassword">
                                                </div>
                                                <label>{{ trans('labels.confirm_password') }} </label>
                                                <div class="form-group">
                                                    <input type="password"
                                                        placeholder="{{ trans('labels.confirm_password') }}"
                                                        class="form-control" name="confirmpassword"
                                                        id="confirmpassword">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="reset" class="btn btn-outline-secondary btn-lg"
                                                    data-dismiss="modal" value="{{ trans('labels.close') }}">
                                                <input type="button" class="btn btn-outline-primary btn-lg"
                                                    @if (env('Environment') == 'sendbox') onclick="myFunction()" @else onclick="changePassword()" @endif
                                                    value="{{ trans('labels.update') }}">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--Modal: order-modal-->
                            <div class="modal fade" id="order-modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-notify modal-info" role="document">
                                    <div class="modal-content text-center">
                                        <div class="modal-header d-flex justify-content-center">
                                            <p class="heading">{{ trans('messages.be_up_to_date') }}</p>
                                        </div>
                                        <div class="modal-body"><i
                                                class="fa fa-bell fa-4x animated rotateIn mb-4"></i>
                                            <p>{{ trans('messages.new_order_arrive') }}</p>
                                        </div>
                                        <div class="modal-footer flex-center">
                                            <a role="button" class="btn btn-outline-secondary-modal waves-effect"
                                                onClick="window.location.reload();"
                                                data-dismiss="modal">{{ trans('labels.okay') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Modal: modalPush-->


                            <!-- ASSIGN-DRIVER-MODAL-START -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close"
                                                data-dismiss="modal">&times;</button>
                                        </div>
                                        <form method="post" id="assign">
                                            @csrf
                                            <input type="hidden" name="driverurl" id="driverurl"
                                                value="{{ URL::to('admin/orders/assign-driver') }}">
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" id="order_id"
                                                    name="order_id" readonly>
                                                <div class="form-group">
                                                    <label for="category_id"
                                                        class="col-form-label">{{ trans('labels.order_number') }}</label>
                                                    <input type="text" class="form-control" id="order_number"
                                                        readonly="">
                                                    <span class="id_error text-danger"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category_id"
                                                        class="col-form-label">{{ trans('messages.select_driver') }}
                                                        <span class="text-danger">*</span></label>
                                                    <select class="form-control" name="driver_id" id="driver_id"
                                                        required="required">
                                                        <option value="" selected>{{ trans('messages.select_driver') }}
                                                        </option>
                                                        @if (is_array(@$getdriver) || is_object(@$getdriver))
                                                            @foreach (@$getdriver as $driver)
                                                                <option value="{{ $driver->id }}">
                                                                    {{ $driver->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    <span class="driver_error text-danger"></span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">{{ trans('labels.close') }}</button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="assigndriver()"
                                                    data-dismiss="modal">{{ trans('labels.save') }}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- ASSIGN-DRIVER-MODAL-END -->


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--********************************** Footer start ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>{{ @Helper::appdata()->copyright }} &amp; {{ trans('labels.designed_developed_by') }} <a
                        href="https://infotechgravity.com/"
                        target="_blank">{{ trans('labels.gravity_infotech') }}</a></p>
            </div>
        </div>
        <!--********************************** Footer end ***********************************-->
    </div>
    <!-- /#wrapper -->
    @include('admin.theme.script')
    <script>
        let are_you_sure = "{{ trans('messages.are_you_sure') }}";
        let yes = "{{ trans('messages.yes') }}";
        let no = "{{ trans('messages.no') }}";
        let wrong = "{{ trans('messages.wrong') }}";
        let cannot_delete = "{{ trans('messages.cannot_delete') }}";
        let last_image = "{{ trans('messages.last_image') }}";
        let record_safe = "{{ trans('messages.record_safe') }}";
        let select = "{{ trans('labels.select') }}";
        let variation = "{{ trans('labels.variation') }}";
        let enter_variation = "{{ trans('labels.variation') }}";
        let product_price = "{{ trans('labels.product_price') }}";
        let qty = "{{ trans('labels.qty') }}";
        let enter_product_price = "{{ trans('labels.product_price') }}";
        let sale_price = "{{ trans('labels.sale_price') }}";
        let enter_sale_price = "{{ trans('labels.sale_price') }}";

        function currency_format(price) {
            if ("{{ @Helper::appdata()->currency_position }}" == 1) {
                return "{{ @Helper::appdata()->currency }}" + parseFloat(price).toFixed(2);
            } else {
                return parseFloat(price).toFixed(2) + "{{ @Helper::appdata()->currency }}";
            }
        }
    </script>





    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.success("{{ session('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "timeOut": 10000
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";
            $('#oldpassword').val('');
        });

        function myFunction() {
            "use strict";
            alert("You don't have rights in Demo Admin panel");
        }
    </script>
    <script type="text/javascript">
        function changeStatus(status) {
            "use strict";
            $('#preloader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/change-status') }}",
                data: {
                    'status': status
                },
                success: function(response) {
                    location.reload();
                }
            });
        }

        function changePassword() {
            "use strict";
            var email = $("#email").val();
            var oldpassword = $("#oldpassword").val();
            var mobile = $("#mobile").val();
            var newpassword = $("#newpassword").val();
            var confirmpassword = $("#confirmpassword").val();
            if ($("#change_password_form").valid()) {
                $('#preloader').show();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ url('admin/changePassword') }}",
                    method: 'POST',
                    data: {
                        'email': email,
                        'mobile': mobile,
                        'oldpassword': oldpassword,
                        'newpassword': newpassword,
                        'confirmpassword': confirmpassword
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#preloader').hide();
                        $("#loading-image").hide();
                        if (data.error.length > 0) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<div class="alert alert-danger mt-1">' + data.error[count] +
                                    '</div>';
                            }
                            $('#errors').html(error_html);
                            setTimeout(function() {
                                $('#errors').html('');
                            }, 10000);
                        } else {
                            location.reload();
                        }
                    },
                    error: function(data) {
                        $('#preloader').hide();
                    }
                });
            }
        }
        var noticount = 0;
        (function noti() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/getorder') }}",
                method: 'GET', //Get method,
                dataType: "json",
                success: function(response) {
                    noticount = localStorage.getItem("count");
                    if (response > 9) {
                        $('#notificationcount').text(response + "+");
                    } else {
                        $('#notificationcount').text(response);
                    }
                    if (response != 0) {
                        if (noticount != response) {
                            localStorage.setItem("count", response);
                            jQuery("#order-modal").modal('show');
                            var audio = new Audio(
                                "{{ url('/') }}/storage/app/public/assets/notification/notification.mp3"
                            );
                            audio.play();
                        }
                    } else {
                        localStorage.setItem("count", response);
                    }
                    setTimeout(noti, 5000);
                }
            });
        })();

        function clearnoti() {
            $('#preloader').show();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('admin/clearnotification') }}",
                dataType: "json",
                success: function(response) {
                    $('#preloader').hide();
                }
            });
        }
    </script>
    <script type="text/javascript">
        $('#tax, #amount, #min_order_amount, #max_order_qty, #max_order_amount, #lat, #lang, #referral_amount, #price, #product_price, #sale_price, #delivery_charge, #mobile')
            .keyup(function() {
                "use strict";
                var val = $(this).val();
                if (isNaN(val)) {
                    val = val.replace(/[^0-9\.]/g, '');
                    if (val.split('.').length > 2) {
                        val = val.replace(/\.+$/, "");
                    }
                }
                $(this).val(val);
            });
    </script>
</body>

</html>
