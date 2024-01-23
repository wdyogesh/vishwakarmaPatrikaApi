@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.addons')}}</a></li>
        </ol>
        <a href="{{URL::to('admin/addons/add')}}" class="btn btn-primary" >{{trans('labels.add_addons')}}</a>
    </div>
</div>
<!-- row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="message"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class ="card-title">{{trans('labels.all_addons')}}</h4>
                    <div class="table-responsive" id="table-display">
                        @include('admin.addons.addonstable');
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->
@endsection
@section('script')
    <script src="{{url('resources/views/admin/addons/addons.js')}}"></script>
@endsection
