@extends('admin.theme.default')
@section('content')
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-9">
                            <a href="{{URL::to('/admin/item')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-cutlery"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title">{{count($getitems)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.items')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-4">
                            <a href="{{URL::to('/admin/users')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-users"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title">{{count($getusers)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.users')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-3">
                            <a href="{{URL::to('/admin/orders')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-shopping-cart"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title">{{count($getorderscount)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.orders')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-6">
                            <a href="{{URL::to('/admin/reviews')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-star"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title">{{count($getreview)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.reviews')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-1">
                            <a href="{{URL::to('/admin/orders')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-usd"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title">{{Helper::currency_format($order_total-$order_tax)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.earnings')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-7">
                            <a href="{{URL::to('/admin/orders')}}">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-calculator"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"> {{Helper::currency_format($order_tax)}}</h2></h2>
                                            <h5 class="card-widget__subtitle">{{trans('labels.tax')}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">{{ trans('labels.earnings') }}</h4>
                            </div>
                            <div class="col-md-6">
                                <select name="earningsyear" class="form-control-sm rounded float-right col-auto" id="earningsyear" data-url="{{ URL::to('/admin/home') }}">
                                    @foreach($earnings_years as $earnings)
                                        <option value="{{$earnings->year}}">{{$earnings->year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <canvas id="earningschart" height="80px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-6 d-flex">
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
                        <div class="">
                            <canvas id="userschart" class="users-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('labels.top_items') }}</h4>
                        @if (count($topitems) > 0)
                            <div class="table-responsive" id="table-items">
                                @include('admin.dashboard.topproducttable')
                            </div>
                        @else
                            <h4 class="col-12 no-data-center text-muted">{{trans('labels.no_data')}}</h4>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('labels.top_users') }}</h4>
                        @if (count($topusers) > 0)
                            <div class="table-responsive" id="table-users">
                                @include('admin.dashboard.topuserstable')
                            </div>
                        @else
                            <h4 class="col-12 no-data-center text-muted">{{trans('labels.no_data')}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ trans('labels.today_order') }}</h4>
                        <div class="table-responsive" id="table-display">
                            @include('admin.orders.orderstable')
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title">{{ trans('labels.orders_overview') }}</h4>
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
<script src="{{url('resources/views/admin/orders/orders.js')}}"></script>

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
                console.log(data);
            }
        });
    });
    function createOrdersChart(labels, deliverydata, pickupdata, year) {
        const chartdata = {
            labels: labels,
            datasets: [{
                label: 'Delivery orders ',
                backgroundColor: ['#87CEEB', '#BA55D3','#28C667','#4C3F90','#DC59C7','#374A1A','#FFE690','#F58840','#F33D80','#F6BF08','#CCFFCC','#3DF37A'],
                borderColor: ['#87CEEB', '#BA55D3','#28C667','#4C3F90','#DC59C7','#374A1A','#FFE690','#F58840','#F33D80','#F6BF08','#CCFFCC','#3DF37A'],
                data: deliverydata,
            },{
                label: 'Pickup orders ',
                backgroundColor: ['#FF7F50', '#A52A2A','#FFE690','#F58840','#F33D80','#F6BF08','#CCFFCC','#3DF37A','#87CEEB', '#BA55D3','#28C667','#4C3F90'],
                borderColor: ['#FF7F50', '#A52A2A','#FFE690','#F58840','#F33D80','#F6BF08','#CCFFCC','#3DF37A','#87CEEB', '#BA55D3','#28C667','#4C3F90'],
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
                console.log(data);
            }
        });
    });
    function createUsersChart(labels, userdata, year) {
        const chartdata = {
            labels: labels,
            datasets: [{
                label: 'Users ',
                backgroundColor: ['rgba(54, 162, 235, 0.4)','rgba(255, 150, 86, 0.4)','rgba(140, 162, 198, 0.4)','rgba(255, 206, 86, 0.4)','rgba(255, 99, 132, 0.4)','rgba(255, 159, 64, 0.4)','rgba(255, 205, 86, 0.4)','rgba(75, 192, 192, 0.4)','rgba(54, 170, 235, 0.4)','rgba(153, 102, 255, 0.4)','rgba(201, 203, 207, 0.4)','rgba(255, 159, 64, 0.4)',],
                borderColor: ['rgba(54, 162, 235, 1)','rgba(255, 150, 86, 1)','rgba(140, 162, 198, 1)','rgba(255, 206, 86, 1)','rgba(255, 99, 132, 1)','rgba(255, 159, 64, 1)','rgba(255, 205, 86, 1)','rgba(75, 192, 192, 1)','rgba(54, 170, 235, 1)','rgba(153, 102, 255, 1)','rgba(201, 203, 207, 1)','rgba(255, 159, 64, 1)',],
                borderWidth: 2,
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
<!--- earnings-chart-script --->
<script type="text/javascript">
    var earningschart = null;
    var labels = {{ Js::from($earningslabels) }};
    var earningsdata = {{ Js::from($earningsdata) }};
    var year = {{ Js::from($year) }};
    createEarningsChart(labels, earningsdata, year);
    $('#earningsyear').change(function() {
        let year = $("#earningsyear").val();
        let myurl = $("#earningsyear").attr('data-url');
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: myurl,
            method: "GET",
            data: {earningsyear: year},
            dataType: "JSON",
            success: function(data) {
                createEarningsChart(data.earningslabels, data.earningsdata, year)
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
    function createEarningsChart(labels, earningsdata, year) {
        const chartdata = {
            labels: labels,
            datasets: [{
                label: 'Earnings ' + year,
                backgroundColor: ['#FF7F50'],
                borderColor: ['#FF7F50'],
                pointStyle: 'circle',
                pointRadius: 5,
                pointHoverRadius: 10,
                data: earningsdata,
            }]
        };
        const config = {type: 'line',data: chartdata,options: {}};
        if (earningschart != null) {
            earningschart.destroy();
        }
        earningschart = new Chart(document.getElementById('earningschart'), config);
    }
</script>

@endsection
