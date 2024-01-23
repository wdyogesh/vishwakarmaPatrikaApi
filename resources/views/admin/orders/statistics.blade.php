<div class="row">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-3">
            <a href="{{request()->is('admin/orders*') ? URL::to('/admin/orders') : 'javascript:void(0)' }}">
                <div class="card-body cb-rounded gradient-4 py-3">
                    <div class="media align-items-center">
                        <span class="card-widget__icon"><i class="fa fa-shopping-cart"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{count($getorders)}}</h2>
                            <h6 class="card-widget__subtitle">{{trans('labels.orders')}}</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-3">
            <a href="{{request()->is('admin/orders*') ? URL::to('/admin/orders?status=processing') : 'javascript:void(0)' }}">
                <div class="card-body cb-rounded gradient-1 py-3">
                    <div class="media align-items-center">
                        <span class="card-widget__icon"><i class="fa fa-hourglass"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$totalprocessing}}</h2>
                            <h6 class="card-widget__subtitle">{{trans('labels.processing')}}</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-3">
            <a href="{{request()->is('admin/orders*') ? URL::to('/admin/orders?status=completed') : 'javascript:void(0)' }}">
                <div class="card-body cb-rounded gradient-9 py-3">
                    <div class="media align-items-center">
                        <span class="card-widget__icon"><i class="fa fa-check"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$totalcompleted}}</h2>
                            <h6 class="card-widget__subtitle">{{trans('labels.completed')}}</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card mb-3">
            <a href="{{request()->is('admin/orders*') ? URL::to('/admin/orders?status=cancelled') : 'javascript:void(0)' }}">
                <div class="card-body cb-rounded gradient-5 py-3">
                    <div class="media align-items-center">
                        <span class="card-widget__icon"><i class="fa fa-close"></i></span>
                        <div class="media-body">
                            <h2 class="card-widget__title">{{$totalcancelled}}</h2>
                            <h6 class="card-widget__subtitle">{{trans('labels.cancelled')}}</h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>