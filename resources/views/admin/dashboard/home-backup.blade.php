@extends('admin.theme.default')
@section('content')
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/category')}}">
                        <div class="card-body cb-rounded gradient-1 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getcategory)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.categories')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-list-alt"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/item')}}">
                        <div class="card-body cb-rounded gradient-2 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getitems)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.items')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-cutlery"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/addons')}}">
                        <div class="card-body cb-rounded gradient-3 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($addons)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.addons')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/users')}}">
                        <div class="card-body cb-rounded gradient-4 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getusers)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.users')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/orders')}}">
                        <div class="card-body cb-rounded gradient-3 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getorderscount)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.orders')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/reviews')}}">
                        <div class="card-body cb-rounded gradient-6 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getreview)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.reviews')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/promocode')}}">
                        <div class="card-body cb-rounded gradient-7 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getpromocode)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.promocodes')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-gift"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/driver')}}">
                        <div class="card-body cb-rounded gradient-8 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getdriver)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.drivers')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-car"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/pincode')}}">
                        <div class="card-body cb-rounded gradient-9 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($getpincode)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.pincodes')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-map-pin"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/banner')}}">
                        <div class="card-body cb-rounded gradient-8 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{count($banners)}}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.banners')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-bullhorn"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/orders')}}">
                        <div class="card-body cb-rounded gradient-1 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{Auth::user()->currency}}{{ number_format($order_total-$order_tax, 2) }}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.earnings')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-usd"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card mb-3">
                    <a href="{{URL::to('/admin/orders')}}">
                        <div class="card-body cb-rounded gradient-3 py-3">
                            <div class="media align-items-center">
                                <div class="media-body">
                                    <h2 class="card-widget__title">{{Auth::user()->currency}}{{ number_format($order_tax, 2) }}</h2></h2>
                                    <h5 class="card-widget__subtitle">{{trans('labels.tax')}}</h5>
                                </div>
                                <span class="card-widget__icon"><i class="fa fa-calculator"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 d-flex">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('labels.today_order') }}</h4>
                        <div class="table-responsive" id="table-display">
                            @include('orders.orderstable')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3 d-flex">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">{{ trans('labels.users') }}</h4>
                            </div>
                            <div class="col-md-6">
                                <select name="useryear" class="form-control-sm rounded float-right col-auto" id="useryear" data-url="{{ URL::to('/admin/home') }}">
                                    @foreach($user_years as $useryear)
                                        <option value="{{$useryear->year}}">{{$useryear->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <canvas id="userschart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">{{ trans('labels.orders') }}</h4>
                            </div>
                            <div class="col-md-6">
                                <select name="getyear" class="form-control rounded float-right col-lg-3 col-md-6" id="getyear" data-url="{{ URL::to('/admin/home') }}">
                                    @foreach($order_years as $orderyear)
                                        <option value="{{$orderyear->year}}">{{$orderyear->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <canvas id="orderschart" height="80px"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--- orders-chart-script --->
<script type="text/javascript">
    var orderschart = null;
    var labels = {{ Js::from($orderlabels) }};
    var deliverydata = {{ Js::from($deliverydata) }};
    var pickupdata = {{ Js::from($pickupdata) }};
    var year = {{ Js::from($year) }};
    createOrdersChart(labels, deliverydata, pickupdata, year);
    $('#getyear').change(function() {
        let year = $("#getyear").val();
        let myurl = $("#getyear").attr('data-url');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: myurl,
            method: "GET",
            data: {getyear: year},
            dataType: "JSON",
            success: function(data) {
                createOrdersChart(data.orderlabels, data.deliverydata, data.pickupdata, year)
            },
            error: function(data) {
                alert("Something went wrong!!");
                console.log(data);
            }
        });
    });
    function createOrdersChart(labels, deliverydata, pickupdata, year) {
        const chartdata = {
            labels: labels,
            datasets: [{
                label: 'OrderType : Delivery for year : ' + year,
                backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                borderWidth: 2,
                data: deliverydata,
            },{
                label: 'OrderType : Pickup for year : ' + year,
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', ],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', ],
                borderWidth: 2,
                data: pickupdata,
            }]
        };
        const config = {type: 'bar',data: chartdata,options: {}};
        if (orderschart != null) {
            orderschart.destroy();
        }
        orderschart = new Chart(document.getElementById('orderschart'), config);
    }
</script>
<!--- users-chart-script --->
<script type="text/javascript">
    var userschart = null;
    var labels = {{ Js::from($userslabels) }};
    var userdata = {{ Js::from($userdata) }};
    var year = {{ Js::from($year) }};
    createUsersChart(labels, userdata, year);
    $('#useryear').change(function() {
        let year = $("#useryear").val();
        let myurl = $("#useryear").attr('data-url');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: myurl,
            method: "GET",
            data: {useryear: year},
            dataType: "JSON",
            success: function(data) {
                createUsersChart(data.userslabels, data.userdata, year)
            },
            error: function(data) {
                alert("Something went wrong!!");
                console.log(data);
            }
        });
    });
    function createUsersChart(labels, userdata, year) {
        const chartdata = {
            labels: labels,
            datasets: [{
                label: 'Users for year : ' + year,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.4)','rgba(255, 150, 86, 0.4)',
                    'rgba(140, 162, 198, 0.4)','rgba(255, 206, 86, 0.4)',
                    'rgba(255, 99, 132, 0.4)','rgba(255, 159, 64, 0.4)',
                    'rgba(255, 205, 86, 0.4)','rgba(75, 192, 192, 0.4)',
                    'rgba(54, 170, 235, 0.4)','rgba(153, 102, 255, 0.4)',
                    'rgba(201, 203, 207, 0.4)','rgba(255, 159, 64, 0.4)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)','rgba(255, 150, 86, 1)',
                    'rgba(140, 162, 198, 1)','rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)','rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)','rgba(75, 192, 192, 1)',
                    'rgba(54, 170, 235, 1)','rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)','rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1,
                data: userdata,
            }]
        };
        const config = {type: 'doughnut',data: chartdata,options: {}};
        if (userschart != null) {
            userschart.destroy();
        }
        userschart = new Chart(document.getElementById('userschart'), config);
    }
</script>

    <!--- orders-script --->
    <script type="text/javascript">
        function OrderStatusUpdate(id, status) {
            swal({
                title: "{{ trans('messages.are_you_sure') }}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ trans('messages.yes') }}",
                cancelButtonText: "{{ trans('messages.no') }}",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ URL::to('admin/orders/update') }}",
                        data: {id: id,status: status},
                        method: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            if (response == 1) {
                                location.reload();
                            } else {
                                swal("Cancelled", "{{ trans('messages.wrong') }}", "error");
                            }
                        },
                        error: function(e) {
                            swal("Cancelled", "{{ trans('messages.wrong') }}", "error");
                        }
                    });
                } else {
                    swal("Cancelled", "{{ trans('messages.record_safe') }}", "error");
                }
            });
        }
        $(document).on("click", ".open-AddBookDialog", function() {
            $(".modal-body #order_id").val($(this).data('id'));
            $(".modal-body #order_number").val($(this).attr('data-number'));
        });
        function assigndriver() {
            var id = $("#order_id").val();
            var driver_id = $('#driver_id').val();
            var order_number = $('#order_number').val();
            $('#preloader').show();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ URL::to('admin/orders/assign-driver') }}",
                method: 'POST',
                data: {id: id,driver_id: driver_id},
                dataType: "json",
                success: function(data) {
                    $('#preloader').hide();
                    if (data.status == 1) {
                        location.reload();
                    } else {
                        $('#myModal').modal().show();
                        $('.driver_error').show().html(data.errors.driver_id);
                        $('.id_error').show().html(data.errors.id);
                        $('.modal-body #order_id').val(id);
                        $('.modal-body #order_number').val(order_number);
                    }
                },
                error: function(data) {
                    console.log(data)
                }
            });
        }
    </script>

@endsection
