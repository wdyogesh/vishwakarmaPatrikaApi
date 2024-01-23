@extends('admin.theme.default')
@section('content')
<!-- row -->
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.users')}}</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <!-- End Row -->
    <div class="row">
        <div class="col-lg-3 col-md-6 col-12 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="text-center">
                        <img src='{{Helper::image_path($getusers->profile_image)}}' class="rounded-circle user-profile-image" alt="">
                        <h5 class="mt-3 mb-1">{{$getusers->name}}</h5>
                        <p class="m-0">{{$getusers->email}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="text-center">
                        <i class="mdi mdi-cart" style="font-size: 70px"></i>
                        <h5 class="mt-3 mb-1">{{count($getorders)}}</h5>
                        <p class="m-0">{{trans('labels.orders')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="text-center">
                        <i class="mdi mdi-send" style="font-size: 70px"></i>
                        <h5 class="mt-3 mb-1">
                            {{$getusers->referral_code == "" ? '-' : $getusers->referral_code}}
                        </h5>
                        <p class="m-0">{{trans('labels.referral_code')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-12 d-flex">
            <div class="card w-100">
                <div class="card-body">
                    <div class="row d-flex">
                        <div class="col-md-6 align-self-center mb-2">
                            <h4 class="card-title text-left">{{trans('labels.wallet')}}</h4><hr>
                            <div class="media">
                                <i class="mdi mdi-wallet" style="font-size: 70px"></i>
                                <div class="media-body text-left pt-2 w-50">
                                    <p class="text-muted mb-0">{{trans('labels.wallet_balance')}}</p>
                                    <h3 class="media-heading text-bold-400 mt-2 my_wallet">{{Helper::currency_format(@$getusers->wallet)}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-left">
                            <h4 class="card-title text-left">{{trans('labels.manage_wallet')}}</h4><hr>
                            <input type="hidden" name="id" id="id" value="{{@$getusers->id}}">
                            <span class="text-danger dn" id="money_error"></span>
                            <input type="text" class="form-control mt-2 mb-2" name="money" placeholder="{{trans('labels.amount')}}" id="price">
                            <button class="btn btn-sm btn-raised btn-success add" data-type="add" data-url="{{URL::to('admin/users/change-wallet')}}"> <i class="fa fa-arrow-up"></i> {{trans('labels.add_money')}}</button>
                            <button class="btn btn-sm btn-raised btn-warning deduct" data-type="deduct" data-url="{{URL::to('admin/users/change-wallet')}}"> <i class="fa fa-arrow-down"></i> {{trans('labels.deduct_money')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ trans('labels.orders') }}</h4>
                    <div class="table-responsive" id="table-display">
                        @include('admin.orders.orderstable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
@section('script')
<script src="{{url('resources/views/admin/orders/orders.js')}}"></script>
<script src="{{url('resources/views/admin/users/users.js')}}"></script>
@endsection
