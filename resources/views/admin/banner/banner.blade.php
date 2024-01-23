@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.banners')}}</a></li>
        </ol>
        @php
        if(request()->is('admin/bannersection-1*')){
            $url = URL::to('admin/bannersection-1/add');
            $section = 1;
        }else if(request()->is('admin/bannersection-2*')){
            $url = URL::to('admin/bannersection-2/add');
            $section = 2;
        }else if(request()->is('admin/bannersection-3*')){
            $url = URL::to('admin/bannersection-3/add');
            $section = 3;
        }else{
            $url = URL::to('admin/banner/add');
            $section = 0;
        }
        @endphp
        <a href="{{$url}}" class="btn btn-primary">{{trans('labels.add_banner')}}</a>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.all_banner')}}</h4>
                    <div class="table-responsive" id="table-display">
                        @include('admin.banner.bannertable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
@section('script')
<script src="{{url('resources/views/admin/banner/banner.js')}}"></script>
@endsection
