@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.drivers')}}</a></li>
        </ol>
        <a href="{{URL::to('admin/driver/add')}}" class="btn btn-primary" >{{trans('labels.add_new')}}</a>
    </div>
</div>
<div class="container-fluid">
    <section class="users-section">
        @include('admin.driver.card-view')
    </section>
</div>
@endsection
@section('script')
<script src="{{url('resources/views/admin/driver/driver.js')}}"></script>
@endsection
