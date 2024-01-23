@extends('admin.theme.default')
@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{URL::to('/admin/home')}}">{{trans('labels.dashboard')}}</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">{{trans('labels.role_management')}}</a></li>
        </ol>
        <a href="{{URL::to('admin/roles/add')}}" class="btn btn-primary">{{trans('labels.add_new')}}</a>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{trans('labels.role_management')}}</h4>
                    <div class="table-responsive" id="table-display">
                        @include('admin.roles.rolestable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{url('resources/views/admin/roles/roles.js')}}"></script>
@endsection
