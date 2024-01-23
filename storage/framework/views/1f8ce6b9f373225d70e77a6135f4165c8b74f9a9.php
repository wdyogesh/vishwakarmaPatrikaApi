<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-9">
                            <a href="<?php echo e(URL::to('/admin/item')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-cutlery"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo e(count($getitems)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.items')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-4">
                            <a href="<?php echo e(URL::to('/admin/users')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-users"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo e(count($getusers)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.users')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-3">
                            <a href="<?php echo e(URL::to('/admin/orders')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-shopping-cart"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo e(count($getorderscount)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.orders')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-6">
                            <a href="<?php echo e(URL::to('/admin/reviews')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-star"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo e(count($getreview)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.reviews')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-1">
                            <a href="<?php echo e(URL::to('/admin/orders')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-usd"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo e(Helper::currency_format($order_total-$order_tax)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.earnings')); ?></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 pb-2">
                        <div class="card mb-3 h-100 gradient-7">
                            <a href="<?php echo e(URL::to('/admin/orders')); ?>">
                                <div class="card-body cb-rounded p-3">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="fa fa-calculator"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"> <?php echo e(Helper::currency_format($order_tax)); ?></h2></h2>
                                            <h5 class="card-widget__subtitle"><?php echo e(trans('labels.tax')); ?></h5>
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
                                <h4 class="card-title"><?php echo e(trans('labels.earnings')); ?></h4>
                            </div>
                            <div class="col-md-6">
                                <select name="earningsyear" class="form-control-sm rounded float-right col-auto" id="earningsyear" data-url="<?php echo e(URL::to('/admin/home')); ?>">
                                    <?php $__currentLoopData = $earnings_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $earnings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($earnings->year); ?>"><?php echo e($earnings->year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <h4 class="card-title"><?php echo e(trans('labels.users')); ?></h4>
                            </div>
                            <div class="col-md-6">
                                <select name="useryear" class="form-control-sm rounded float-right col-auto" id="useryear" data-url="<?php echo e(URL::to('/admin/home')); ?>">
                                    <?php $__currentLoopData = $user_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $useryear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($useryear->year); ?>"><?php echo e($useryear->year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <h4 class="card-title"><?php echo e(trans('labels.top_items')); ?></h4>
                        <?php if(count($topitems) > 0): ?>
                            <div class="table-responsive" id="table-items">
                                <?php echo $__env->make('admin.dashboard.topproducttable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php else: ?>
                            <h4 class="col-12 no-data-center text-muted"><?php echo e(trans('labels.no_data')); ?></h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(trans('labels.top_users')); ?></h4>
                        <?php if(count($topusers) > 0): ?>
                            <div class="table-responsive" id="table-users">
                                <?php echo $__env->make('admin.dashboard.topuserstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php else: ?>
                            <h4 class="col-12 no-data-center text-muted"><?php echo e(trans('labels.no_data')); ?></h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3 w-100">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo e(trans('labels.today_order')); ?></h4>
                        <div class="table-responsive" id="table-display">
                            <?php echo $__env->make('admin.orders.orderstable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4 class="card-title"><?php echo e(trans('labels.orders_overview')); ?></h4>
                            </div>
                            <div class="col-md-6">
                                <select name="getyear" class="form-control rounded float-right col-lg-3 col-md-6" id="getyear" data-url="<?php echo e(URL::to('/admin/home')); ?>">
                                    <?php $__currentLoopData = $order_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderyear): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($orderyear->year); ?>"><?php echo e($orderyear->year); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <canvas id="orderschart" height="80px"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('resources/views/admin/orders/orders.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--- orders-chart-script --->
<script type="text/javascript">
    var orderschart = null;
    var labels = <?php echo e(Js::from($orderlabels)); ?>;
    var deliverydata = <?php echo e(Js::from($deliverydata)); ?>;
    var pickupdata = <?php echo e(Js::from($pickupdata)); ?>;
    var year = <?php echo e(Js::from($year)); ?>;
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
    var labels = <?php echo e(Js::from($userslabels)); ?>;
    var userdata = <?php echo e(Js::from($userdata)); ?>;
    var year = <?php echo e(Js::from($year)); ?>;
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
    var labels = <?php echo e(Js::from($earningslabels)); ?>;
    var earningsdata = <?php echo e(Js::from($earningsdata)); ?>;
    var year = <?php echo e(Js::from($year)); ?>;
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.theme.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mpg1lamw0vps/public_html/ecom/mywinkel.in/admin/resources/views/admin/dashboard/home.blade.php ENDPATH**/ ?>