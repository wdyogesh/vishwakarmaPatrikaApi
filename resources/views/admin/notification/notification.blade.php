@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.notification')}}</a></li>
        </ol>
        <a href="{{URL::to('admin/notification/add')}}" class="btn btn-primary">{{trans('labels.send_notification')}}</a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <span id="success"></span>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.notification')}}</h4>
                    <div class="table-responsive" id="table-display">
                        @include('admin.notification.notificationtable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection